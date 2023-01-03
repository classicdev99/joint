<?php
namespace App\Controllers;  
use App\Models\Staff;
use App\Models\User;
use CodeIgniter\API\ResponseTrait;
use Exception;

class AuthController extends BaseController {
    use ResponseTrait;
    
    public function __construct() {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();

        if(empty($this->session->get("isLoggedIn"))) {
            return redirect()->to('staff/login'); 
        }
    }
    
    public function register(){
        $role = $this->request->uri->getSegment('1');
        
        switch($role) {
            case "staff":
                $data['title_meta'] = view('layouts/title-meta', ['title' => 'Staff Register']);
                $data['page_title'] = view('layouts/page-title', ['li_1' => 'Staff Register']);
                break;
        }
        $data['role'] = $role;
        return view('register',$data);
    }

    public function postRegister() {
	    $role = $this->request->uri->getSegment('1');
	    $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        switch($role) {
            case "staff":
                $data['title_meta'] = view('layouts/title-meta', ['title' => 'Staff Register']);
                $data['page_title'] = view('layouts/page-title', ['li_1' => 'Staff Register']);
                break;
        }
        $data['role'] = $role;

		helper(['form']);

        $rules = [
            'username' 		=> 'required|min_length[3]|max_length[20]',
			'email' 		=> 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
			'password' 		=> 'required|min_length[6]|max_length[200]',
		];

        if($this->validate($rules)){
			$model = new User();
			$user = [
				'username' 	=> $this->request->getVar('username'),
				'email' 	=> $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
			];
			$model->index($user);
            $this->session->setFlashdata('registered', 'Successfully registered.');
			return redirect()->to('' . $role . '/login');
		}else{
			$data['validation'] = $this->validator;
			return view('register', $data);
		}
	}

    public function login() {
        $role = $this->request->uri->getSegment('1');
        
        switch($role) {
            case "staff":
                $data['title_meta'] = view('layouts/title-meta', ['title' => 'Staff Login']);
                $data['page_title'] = view('layouts/page-title', ['li_1' => 'Staff Login']);
                break;
        }
        $data['role'] = $role;
        
        return view('login', $data);
    }
	
	public function postLogin() {
        $model = new Staff();
	    $role = $this->request->uri->getSegment('1');
	    $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $staff = $model->getStaffByEmail($email);
        if($staff){
            $pass = $staff['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $session_data = [
                    'id'       => $staff['id'],
                    'username'     => $staff['name'],
                    'email'    => $staff['email'],
                    'isLoggedIn'     => TRUE,
                    'role' => $role,
                    'isAdmin' => $staff['role'] == 0,
                ];
                $this->session->set($session_data);
                return redirect()->to('' . $role .'/dashboard');
            }else{
                $this->session->setFlashdata('login_error', 'Wrong Password');
                return redirect()->to($role.'/login');
            }
        }else{
            $this->session->setFlashdata('login_error', 'Email is not registered');
            return redirect()->to($role.'/login');
        }
	}
	
    public function logout() {
        $role = $this->session->role;
		$this->session->setFlashdata('log out', 'Successfully logged out.');
		return redirect()->to($role.'/login');
	}
}