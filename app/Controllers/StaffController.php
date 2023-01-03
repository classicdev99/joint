<?php
namespace App\Controllers;
use App\Models\Staff;

class staffController extends BaseController {
    public function __construct() {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        $this->db = \Config\Database::connect();
        
        if(empty($this->session->get("isLoggedIn"))) {
            return redirect()->to('staff/login'); 
        }
    }
    
    public function index()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Staffs', 'li_1' => 'Dashboard', 'li_2' => 'Staffs']);

        $model = new Staff();

        $data['staffs'] = $model->getStaffs();
        return view('staff/staff_list', $data);
    }

    public function staff_add()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Add Staff', 'li_1' => 'Dashboard', 'li_2' => 'Staffs', 'li_3' => 'Add Staff']);
        return view('staff/staff_add', $data);
    }

    public function save_staff()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Staffs', 'li_1' => 'Dashboard', 'li_2' => 'Staffs']);

		helper(['form']);

        $rules = [
            'name' 		    => 'required|min_length[1]|max_length[20]',
			'email' 		=> 'required|min_length[3]|max_length[50]|valid_email|is_unique[staffs.email]',
			'password' 		=> 'required|min_length[1]|max_length[200]',
            'confirm' 		=> 'required|matches[password]',
		];

        if($this->validate($rules)){
			$model = new Staff();
			$staff = [
				'name' 	=> $this->request->getVar('name'),
				'email' 	=> $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'phone_no'    => $this->request->getVar('phone'),
                'role' => $this->request->getVar('role'),
			];
			$model->index($staff);
            return redirect()->to('/staff/staffs');
		}else{
			$data['validation'] = $this->validator;
			return view('staff/staff_add', $data);
		}
    }

    public function staff_delete($id)
    {
        $model = new Staff();
        $model->deleteStaff($id);
        return redirect()->to('/staff/staffs');
    }

    public function staff_edit($id)
    {
        $model = new Staff();
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Update Staff', 'li_1' => 'Dashboard', 'li_2' => 'Staffs', 'li_3' => 'Update Staff']);
        $data['record'] = $model->editStaff($id);
        return view('staff/staff_edit', $data);
    }

    public function update_staff($id)
    {
        $model = new Staff();
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Staffs', 'li_1' => 'Dashboard', 'li_2' => 'Staffs']);

		helper(['form']);
        $old_email = $model->editStaff($id)['email'];
        $is_unique = "";
        if ($this->request->getVar('email') != $old_email)
            $is_unique = '|is_unique[staffs.email]';
            
        $rules = [
            'name' 		    => 'required|min_length[1]|max_length[20]',
			'email' 		=> 'required|min_length[3]|max_length[50]|valid_email'.$is_unique,
			'password' 		=> 'required|min_length[1]|max_length[200]',
            'confirm' 		=> 'required|matches[password]',
		];


        if($this->validate($rules)){

			$staff = [
				'name' 	=> $this->request->getVar('name'),
				'email' 	=> $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'phone_no'    => $this->request->getVar('phone'),
                'role' => $this->request->getVar('role'),
			];
			$model->updateStaff($id,$staff);
            return redirect()->to('/staff/staffs');
		}else{
			$data['validation'] = $this->validator;
            $data['record'] = $model->editStaff($id);
			return view('staff/staff_edit', $data);
		}
    }
}