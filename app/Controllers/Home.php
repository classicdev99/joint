<?php
namespace App\Controllers;

use App\Models\Event;
use App\Models\LeaveModel;
use App\Models\ProjectModel;
use App\Models\Staff;
use App\Models\Task;
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

        $taskModel = new Task();
        $tasks = $taskModel->getTasks();
        $index = 0;
        $data['events'] = [];
        foreach($tasks as  $one){
            $data['events'][$index]['title'] = $one['subject'];
            $data['events'][$index]['start'] = $one['due_date'];
            $data['events'][$index]['end'] = $one['due_date'];
            $data['events'][$index]['backgroundColor'] = "#00a65a";
            $index++;
        }

        $projectModel = new ProjectModel();
        $projects = $projectModel->findAll();
        foreach($projects as $one){
            $data['events'][$index]['title'] = $one['project_name'];
            $data['events'][$index]['start'] = $one['start_date'];
            $data['events'][$index]['end'] = $one['end_date'];
            $data['events'][$index]['backgroundColor'] = "#1A87B6";
            $index++;
        }
        $this->session->set("events", $data['events']);
        // foreach ($events as $key => $value) {
    
        //     $data['events'][$key]['title'] = $value->title;
        //     $data['events'][$key]['start'] = $value->start_date;
        //     $data['events'][$key]['end'] = $value->end_date;
        //     $data['events'][$key]['backgroundColor'] = "#00a65a";
        // }     

        $index = 0;
        $data['notifications'] = [];
        if(session('isAdmin')){
            $leaveModel = new LeaveModel();
            $leaves = $leaveModel->where('state', 0)->findAll();
            foreach($leaves as $leave){
                $data['notifications'][$index]['title'] = 'Leave Application Requested.';
                $data['notifications'][$index]['detail'] = $leave['employee_name'];
                $index++;
            }
           
        }
        $this->session->set("notifications", $data['notifications']);

        $staffModel = new Staff();
        $staff = $staffModel->getStaffs(session('id'));

        $data['staff']['kpi'] = $staff['kpi'];
        $data['staff']['sales'] = $staff['sales'];
        return view('dashboard', $data);
    }
}