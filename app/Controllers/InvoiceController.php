<?php

namespace App\Controllers;

use App\Models\Invoices;
use App\Models\Contact;

class InvoiceController extends BaseController
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
        $data['page_title'] = view('layouts/page-title', ['title' => 'Invoices', 'li_1' => 'Dashboard', 'li_2' => 'Invoices']);

        $model = new Invoices();
        $data['invoices'] = $model->getInvoices();
        return view('invoice/invoice_list', $data);
    }

    public function invoice_add()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Invoice', 'li_1' => 'Dashboard', 'li_2' => 'Invoices', 'li_3' => 'Create Invoice']);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        return view('invoice/invoice_add', $data);
    }

    public function save_invoices()
    {
        $model = new Invoices();
        $model->index($_POST);

        return redirect()->to('/staff/invoice');
    }

    public function invoice_delete($id)
    {
        $model = new Invoices();
        $model->deleteInvoice($id);

        return redirect()->to('/staff/invoice');
    }

    public function invoice_edit($id)
    {
        $model = new Invoices();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'update Invoice', 'li_1' => 'Dashboard', 'li_2' => 'Invoices', 'li_3' => 'Upadate Invoice']);

        $data['record'] = $model->editInvoice($id);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        return view('invoice/invoice_edit', $data);
    }

    public function update_invoice($id)
    {
        $model = new Invoices();
        $model->updateInvoice($id, $_POST);

        return redirect()->to('/staff/invoice');
    }
}
