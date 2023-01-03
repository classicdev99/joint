<?php

namespace App\Controllers;
use App\Models\ActivityLog;
use App\Models\TDO;
use App\Controllers\BaseController;

class TDOSController extends BaseController
{
     public function __construct() {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function index() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'TDOs', 'li_1'=>'Dashboard', 'li_2'=>'TDOs']);

         $model = new TDO();
         
        $data['TDOs'] = $model->getTDOs();
        return view('TDO/TDO_list', $data);
    }
    
    public function TDO_add() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Create TDO', 'li_1'=>'Dashboard', 'li_2'=>'TDOs', 'li_3'=>'Create TDO']);
        
        return view('TDO/TDO_add', $data);
    }
   
    public function save_TDO()
    {
        $model = new TDO();
        $model->index($_POST);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "TDO",
            'action' => "create",
        ];
        $activityLog->index($log);
        
        return redirect()->to('/staff/TDO');
    }

    public function TDO_delete($id)
    {
        $model = new TDO();
        $model->deleteTDO($id);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "TDO",
            'action' => "delete",
        ];
        $activityLog->index($log);
        
        return redirect()->to('/staff/TDO');
    }

    public function TDO_edit($id)
    {
        $model = new TDO();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create TDO', 'li_1' => 'Dashboard', 'li_2' => 'TDOs', 'li_3' => 'Create TDO']);
        $data['record'] = $model->editTDO($id);

        return view('TDO/TDO_edit', $data);
    }

    public function update_TDO($id)
    {
        $model = new TDO();
        $model->upadteTDO($id, $_POST);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "TDO",
            'action' => "update",
        ];
        $activityLog->index($log);
        
        return redirect()->to('/staff/TDO');
    }
}