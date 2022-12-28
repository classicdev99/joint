<?php
namespace App\Controllers;

use App\Models\Event;
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
        $model = new Event();

        $db = \Config\Database::connect();
        $builder = $db->table('events');   
        $query = $builder->select('*')
                    ->limit(10)->get();
 
        $data = $query->getResult();
 
        foreach ($data as $key => $value) {
            $data['events'][$key]['title'] = $value->title;
            $data['events'][$key]['start'] = $value->start_date;
            $data['events'][$key]['end'] = $value->end_date;
            $data['events'][$key]['backgroundColor'] = "#00a65a";
        }     
        
        return view('dashboard', $data);
    }
}