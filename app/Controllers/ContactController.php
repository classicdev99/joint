<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Models\Masterprefix;
use App\Models\Masterleadsource;
use App\Models\Mastercustomertype;
use App\Models\Masterproductcategory;
class contactController extends BaseController
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
        $data['page_title'] = view('layouts/page-title', ['title' => 'Contacts', 'li_1' => 'Dashboard', 'li_2' => 'Contacts']);

        $model = new Contact();
        $data['contacts'] = $model->getContacts();
        return view('contact/contact_list', $data);
    }

    public function contact_add()
    {
        $c = new Contact();
        $data['account'] = $c->getAllAccounts();
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Contact', 'li_1' => 'Dashboard', 'li_2' => 'Contacts', 'li_3' => 'Create Contact']);
        $prefixes=new Masterprefix();
        $data['prefixes'] = $prefixes->findAll();
        $leadsources=new Masterleadsource();
        $data['leadsources'] = $leadsources->findAll();
        $customertypes=new Mastercustomertype();
        $data['customertypes'] = $customertypes->findAll();
        $productcategoryes=new Masterproductcategory();
        $data['productcategoryes'] = $productcategoryes->findAll();
        return view('contact/contact_add', $data);
    }

    public function save_contact()
    {
        $model = new Contact();
        $model->index($_POST);
        return redirect()->to('/staff/contact');
    }

    public function contact_delete($id)
    {
        $model = new Contact();
        $model->deleteContact($id);
        return redirect()->to('/staff/contact');
    }

    public function contact_edit($id)
    {
        $model = new Contact();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Contact', 'li_1' => 'Dashboard', 'li_2' => 'Contacts', 'li_3' => 'Create Contact']);
        $data['record'] = $model->editContact($id);
        $data['contacts'] = $model->getContacts();
        $c = new Contact();
        $data['account'] = $c->getAllAccounts();
        $prefixes=new Masterprefix();
        $data['prefixes'] = $prefixes->findAll();
        $leadsources=new Masterleadsource();
        $data['leadsources'] = $leadsources->findAll();
        $customertypes=new Mastercustomertype();
        $data['customertypes'] = $customertypes->findAll();
        $productcategoryes=new Masterproductcategory();
        $data['productcategoryes'] = $productcategoryes->findAll();
        return view('contact/contact_edit', $data);
    }

    public function update_contact($id)
    {
        $model = new Contact();
        $model->upadteContact($id, $_POST);
        return redirect()->to('/staff/contact');
    }
}
