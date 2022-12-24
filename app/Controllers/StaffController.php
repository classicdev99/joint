<?php
namespace App\Controllers;

class staffController extends BaseController {
    public function __construct() {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        $this->db = \Config\Database::connect();
        
        if(empty($this->session->get("isLoggedIn"))) {
            return redirect()->to('staff/login'); 
        }
    }
    
    
    
    public function account() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Account List', 'li_1'=>'Dashboard', 'li_2'=>'Account List']);
        $data['role'] = "staff";
        
        return view('account/account_list', $data);
    }
    
    public function account_add() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Add Account', 'li_1'=>'Dashboard', 'li_2'=>'Account', 'li_3'=>'Add Account']);
        $data['role'] = "staff";
        
        return view('account/account_add', $data);
    }
    
    public function contact() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Contact List', 'li_1'=>'Dashboard', 'li_2'=>'Contact List']);
        $data['role'] = "staff";
        
        return view('contact/contact_list', $data);
    }
    
    public function lead() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Lead List', 'li_1'=>'Dashboard', 'li_2'=>'Lead List']);
        $data['role'] = "staff";
        
        return view('lead/lead_list', $data);
    }
    
    public function task() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Task List', 'li_1'=>'Dashboard', 'li_2'=>'Task List']);
        $data['role'] = "staff";
        
        return view('task/task_list', $data);
    }
    
    public function product() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Product List', 'li_1'=>'Dashboard', 'li_2'=>'Product List']);
        $data['role'] = "staff";
        
        return view('product/product_list', $data);
    }
    
    
}