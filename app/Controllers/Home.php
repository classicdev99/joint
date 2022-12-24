<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function __construct() {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        
        $this->session = session();
    }
    
    public function index() {
        return redirect()->to(base_url('staff/login'));
    }
    
    public function dashboard() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Dashboard', 'li_1'=>'Dashboard']);
        
        return view('dashboard', $data);
    }
}