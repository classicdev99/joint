<?php

namespace App\Controllers;

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
        return redirect()->to('/staff/task');
    }

    public function task_delete($id)
    {
        $model = new Task();
        $model->deleteTask($id);
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
        return redirect()->to('/staff/task');
    }
}
