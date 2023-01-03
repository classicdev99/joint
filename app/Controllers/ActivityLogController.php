<?php

namespace App\Controllers;
use App\Models\ActivityLog;

class ActivityLogController extends BaseController
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
        $data['page_title'] = view('layouts/page-title', ['title' => 'Activity Logs', 'li_1' => 'Dashboard', 'li_2' => 'Activity Logs']);

        $model = new ActivityLog();
        $data['activitylogs'] = $model->getActivityLogs();
        return view('activitylog/activitylog_list', $data);
    }

    
    // public function activitylog_add()
    // {
    //     $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
    //     $data['page_title'] = view('layouts/page-title', ['title' => 'Create Invoice', 'li_1' => 'Dashboard', 'li_2' => 'Invoices', 'li_3' => 'Create Invoice']);

    //     $contact = new Contact();
    //     $data['contacts'] = $contact->getContacts();
    //     $data['accounts'] = $contact->getAllAccounts();

    //     $model = new Product();
    //     $data['products'] = $model->getProducts();
        
    //     return view('invoice/invoice_add', $data);
    // }
}