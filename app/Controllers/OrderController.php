<?php

namespace App\Controllers;

use App\Models\Orders;
use App\Models\Contact;

use App\Controllers\BaseController;

class OrderController extends BaseController
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
        $data['page_title'] = view('layouts/page-title', ['title' => 'Orders', 'li_1' => 'Dashboard', 'li_2' => 'Orders']);

        $model = new Orders();

        $data['Orders'] = $model->getOrders();
        return view('Orders/Orders_list', $data);
    }

    public function Orders_add()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Orders', 'li_1' => 'Dashboard', 'li_2' => 'Orders', 'li_3' => 'Create Orders']);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        return view('Orders/Orders_add', $data);
    }

    public function save_Orders()
    {
        $model = new Orders();
        $model->index($_POST);
        return redirect()->to('/staff/Orders');
    }

    public function Orders_delete($id)
    {
        $model = new Orders();
        $model->deleteOrders($id);
        return redirect()->to('/staff/Orders');
    }

    public function Orders_edit($id)
    {
        $model = new Orders();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Update Orders', 'li_1' => 'Dashboard', 'li_2' => 'Orders', 'li_3' => 'Update Orders']);
        $data['record'] = $model->editOrders($id);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        return view('Orders/Orders_edit', $data);
    }

    public function update_Orders($id)
    {
        $model = new Orders();
        $model->upadteOrders($id, $_POST);
        return redirect()->to('/staff/Orders');
    }
}
