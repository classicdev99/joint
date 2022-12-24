<?php
namespace App\Controllers;  
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
	    $role = $this->request->uri->getSegment('1');
	    $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $session_data = [
            'user_id' => 1,
            'name' => "Lim Mei Mei",
            'email' => $email,
            'isLoggedIn' => TRUE,
            'role' => $role,
        ];
        $this->session->set($session_data);
        
        return redirect()->to($role.'/dashboard');
	}
	
    public function logout() {
        $role = $this->session->role;
		$this->session->setFlashdata('log out', 'Successfully logged out.');
		return redirect()->to($role.'/login');
	}
}