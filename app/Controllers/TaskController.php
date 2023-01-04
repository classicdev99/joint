<?php

namespace App\Controllers;

use App\Models\ActivityLog;
use App\Models\ProjectModel;
use App\Models\Task;
use App\Models\Contact;

class taskController extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Tasks', 'li_1' => 'Dashboard', 'li_2' => 'Tasks']);

        $model = new Task();

        $data['tasks'] = $model->getTasks();
        return view('task/task_list', $data);
    }

    public function task_add()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Task', 'li_1' => 'Dashboard', 'li_2' => 'Tasks', 'li_3' => 'Create Task']);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        return view('task/task_add', $data);
    }

    public function save_task()
    {
        $model = new Task();
        $model->index($_POST);
        $activityLog = new ActivityLog();
        $log = [
            'activity' => "task",
            'action' => "create",
        ];
        $activityLog->index($log);
        $this->update_calendar();
        return redirect()->to('/staff/task');
    }

    public function task_delete($id)
    {
        $model = new Task();
        $model->deleteTask($id);
        $activityLog = new ActivityLog();
        $log = [
            'activity' => "task",
            'action' => "delete",
        ];
        $activityLog->index($log);
        $this->update_calendar();
        return redirect()->to('/staff/task');
    }

    public function task_edit($id)
    {
        $model = new Task();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Update Task', 'li_1' => 'Dashboard', 'li_2' => 'Tasks', 'li_3' => 'Update Task']);
        $data['record'] = $model->editTask($id);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        return view('task/task_edit', $data);
    }

    public function update_Task($id)
    {
        $model = new Task();
        $model->upadteTask($id, $_POST);
        $activityLog = new ActivityLog();
        $log = [
            'activity' => "task",
            'action' => "update",
        ];
        $activityLog->index($log);
        $this->update_calendar();
        return redirect()->to('/staff/task');
    }

    public function update_calendar(){
        $taskModel = new Task();
        $tasks = $taskModel->getTasks();
        $index = 0;
        $data = [];
        foreach($tasks as  $one){
            $data[$index]['title'] = $one['subject'];
            $data[$index]['start'] = $one['due_date'];
            $data[$index]['end'] = $one['due_date'];
            $data[$index]['backgroundColor'] = "#00a65a";
            $index++;
        }

        $projectModel = new ProjectModel();
        $projects = $projectModel->findAll();
        foreach($projects as $one){
            $data[$index]['title'] = $one['project_name'];
            $data[$index]['start'] = $one['start_date'];
            $data[$index]['end'] = $one['end_date'];
            $data[$index]['backgroundColor'] = "#1A87B6";
            $index++;
        }
        $this->session->set("events", $data);
    }
}