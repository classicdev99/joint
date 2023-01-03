<?php

namespace App\Controllers;
 
use App\Models\ActivityLog;
use CodeIgniter\Controller;
use App\Models\LeaveModel;
class Leave extends BaseController
{
    public function index()
    {   
        $data=array('title'=>'Leave'); 
        $leaveModel = new LeaveModel(); 
        $data['data'] = $leaveModel->findAll();
        return view('ssak/leave-list',$data);
    }
    // insert data
    public function store() {
        $leaveModel = new LeaveModel();
        $id = $this->request->getVar('id');
        $data = [
            'leave_type' => $this->request->getVar('leave_type'),
            'reason'  => $this->request->getVar('reason'),
            'from_date'  => $this->request->getVar('from_date'),
            'till_date'  => $this->request->getVar('till_date'),
            'employee_name'  => $this->request->getVar('employee_name'),
        ];
        if(empty($id))
        {
            $leaveModel->insert($data);
            $result['error']=false;
            $result['message']='Added Successfully';

            $activityLog = new ActivityLog();
            $log = [
                'activity' => "leave application",
                'action' => "create",
            ];
            $activityLog->index($log);
        }else{
            $leaveModel->update($id, $data);
            $result['error']=false;
            $result['message']='Updated Successfully';

            $activityLog = new ActivityLog();
            $log = [
                'activity' => "leave application",
                'action' => "update",
            ];
            $activityLog->index($log);
        }
        echo json_encode($result);
    }
    
    // show single user
    public function singleData($id = null){
        $leaveModel = new LeaveModel();
        $data = $leaveModel->where('id', $id)->first();
        $result['error']=false;
        $result['message']=$data;
        echo json_encode($result);
    }
 
    // delete user
    public function delete($id = null){
        $leaveModel = new LeaveModel();
        $leaveModel->where('id', $id)->delete($id);
        $result['error']=false;
        $result['message']='Deleted Successfully';

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "leave application",
            'action' => "delete",
        ];
        $activityLog->index($log);
        echo json_encode($result);
    }  
}