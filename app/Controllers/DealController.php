<?php

namespace App\Controllers;

use App\Models\Deal;
use App\Models\Contact;

class DealController extends BaseController
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
        $data['page_title'] = view('layouts/page-title', ['title' => 'Deals', 'li_1' => 'Dashboard', 'li_2' => 'Deals']);

        $model = new Deal();
        $data['deals'] = $model->getDeals();
        return view('deal/deal_list', $data);
    }

    public function deal_add()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Deal', 'li_1' => 'Dashboard', 'li_2' => 'Deals', 'li_3' => 'Create Deal']);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        return view('deal/deal_add', $data);
    }

    public function save_deal()
    {
        $model = new Deal();
        $model->index($_POST);
        return redirect()->to('/staff/deal');
    }

    public function deal_delete($id)
    {
        $model = new Deal();
        $model->deleteDeal($id);
        return redirect()->to('/staff/deal');
    }

    public function deal_edit($id)
    {
        $model = new Deal();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'update Deal', 'li_1' => 'Dashboard', 'li_2' => 'Deals', 'li_3' => 'upadate Deal']);
        $data['record'] = $model->editDeal($id);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        return view('deal/deal_edit', $data);
    }

    public function update_deal($id)
    {
        $model = new Deal();
        $model->updateDeal($id, $_POST);
        return redirect()->to('/staff/deal');
    }
}
