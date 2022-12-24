<?php

namespace App\Controllers;
use App\Models\MeetingModel;
class Meeting extends BaseController
{
    public function index()
    {  
        $data=array('title'=>'Meeting'); 
        $meetingModel = new MeetingModel(); 
        $data['data'] = $meetingModel->findAll();
        return view('ssak/meeting-list',$data);
    }
    
    public function store() {
        $meetingModel = new MeetingModel();
        $id = $this->request->getVar('id');
        $data = [
            'meeting_title' => $this->request->getVar('meeting_title'),
            'dates'  => $this->request->getVar('dates'),
            'times'  => $this->request->getVar('times'),
            'attendees'  => $this->request->getVar('attendees'),
            'agenda'  => $this->request->getVar('agenda'),
            'discussion'  => $this->request->getVar('discussion'),
            'conclusion'  => $this->request->getVar('conclusion'),
        ];
        if(empty($id))
        {
            $meetingModel->insert($data);
            $result['error']=false;
            $result['message']='Added Successfully';
        }else{
            $meetingModel->update($id, $data);
            $result['error']=false;
            $result['message']='Updated Successfully';
        }
        echo json_encode($result);
    }
    
    // show single user
    public function singleData($id = null){
        $meetingModel = new MeetingModel();
        $data = $meetingModel->where('id', $id)->first();
        $result['error']=false;
        $result['message']=$data;
        echo json_encode($result);
    }
 
    // delete user
    public function delete($id = null){
        $meetingModel = new MeetingModel();
        $meetingModel->where('id', $id)->delete($id);
        $result['error']=false;
        $result['message']='Deleted Successfully';
        echo json_encode($result);
    }  
}
