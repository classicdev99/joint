<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\ProjectTaskModel;
class Project extends BaseController
{
    public function index()
    {   
        $data=array('title'=>'Project'); 
        $projectModel = new ProjectModel(); 
        $data['data'] = $projectModel->findAll();
        return view('ssak/project-list',$data);
    }
    public function store() {
        $projectModel = new ProjectModel();
        $id = $this->request->getVar('id');
        $data = [
            'project_name' => $this->request->getVar('project_name'),
            'project_owner'  => $this->request->getVar('project_owner'),
            'start_date'  => $this->request->getVar('start_date'),
            'end_date'  => $this->request->getVar('end_date'),
            'project_overview'  => $this->request->getVar('project_overview'),
            'status'  => $this->request->getVar('status'),
            'project_proup'  => $this->request->getVar('project_proup'),
        ];
        if(empty($id))
        {
            $projectModel->insert($data);
            $result['error']=false;
            $result['message']='Added Successfully';
        }else{
            $projectModel->update($id, $data);
            $result['error']=false;
            $result['message']='Updated Successfully';
        }
        echo json_encode($result);
    }
    
    // show single user
    public function singleData($id = null){
        $projectModel = new ProjectModel();
        $data = $projectModel->where('id', $id)->first();
        $result['error']=false;
        $result['message']=$data;
        echo json_encode($result);
    }
 
    // delete user
    public function delete($id = null){
        $projectModel = new ProjectModel();
        $projectModel->where('id', $id)->delete($id);
        $result['error']=false;
        $result['message']='Deleted Successfully';
        echo json_encode($result);
    } 
    
    public function task($id)
    {
        $data=array('title'=>'Project'); 
        $projectModel = new ProjectTaskModel(); 
        $data['data'] = $projectModel->where('project_id',$id)->findAll();
        $data['project_id']=$id;
        return view('ssak/project-task-list',$data);
    }

    public function taskStore() {
        $projectModel = new ProjectTaskModel();
        $id = $this->request->getVar('id');
        $data = [
            'title' => $this->request->getVar('title'),
            'description'  => $this->request->getVar('description'),
            'start_date'  => $this->request->getVar('start_date'),
            'end_date'  => $this->request->getVar('end_date'),
            'status'  => $this->request->getVar('status'),
            'project_id'  => $this->request->getVar('project_id')
        ];
        if(empty($id))
        {
            $projectModel->insert($data);
            $result['error']=false;
            $result['message']='Added Successfully';
        }else{
            $projectModel->update($id, $data);
            $result['error']=false;
            $result['message']='Updated Successfully';
        }
        echo json_encode($result);
    }

    // show single user
    public function taskSingleData($id = null){
        $projectModel = new ProjectTaskModel();
        $data = $projectModel->where('id', $id)->first();
        $result['error']=false;
        $result['message']=$data;
        echo json_encode($result);
    }
 
    // delete user
    public function taskDelete($id = null){
        $projectModel = new ProjectTaskModel();
        $projectModel->where('id', $id)->delete($id);
        $result['error']=false;
        $result['message']='Deleted Successfully';
        echo json_encode($result);
    } 
}
