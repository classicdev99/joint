<?php

namespace App\Controllers;

use App\Models\Quotes;
use App\Models\Contact;

use App\Models\Quoteinformation;
use App\Models\Masterpaymentterm;
class QuoteController extends BaseController
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
        $data['page_title'] = view('layouts/page-title', ['title' => 'Quotes', 'li_1' => 'Dashboard', 'li_2' => 'Quotes']);

        $model = new Quotes();

        $data['quotes'] = $model->getQuotes();
        return view('quotes/quote_list', $data);
    }

    public function Quote_add()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Quote', 'li_1' => 'Dashboard', 'li_2' => 'Quotes', 'li_3' => 'Create Quote']);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();
        $Masterpaymentterm=new Masterpaymentterm();
        $data['paymentterms'] = $Masterpaymentterm->findAll();
        return view('quotes/quote_add', $data);
    }

    public function save_Quote()
    {
        $model = new Quotes();
        $model->index($_POST);
        return redirect()->to('/staff/quotes');
    }

    public function Quote_delete($id)
    {
        $model = new Quotes();
        $model->deleteQuotes($id);
        return redirect()->to('/staff/quotes');
    }

    public function Quote_edit($id)
    {
        $model = new Quotes();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Quote', 'li_1' => 'Dashboard', 'li_2' => 'Quotes', 'li_3' => 'Create Quote']);
        $data['record'] = $model->editQuotes($id);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();
        $Masterpaymentterm=new Masterpaymentterm();
        $data['paymentterms'] = $Masterpaymentterm->findAll();
        return view('quotes/quote_edit', $data);
    }

    public function update_Quote($id)
    {
        $model = new Quotes();
        $model->upadteQuotes($id, $_POST);
        return redirect()->to('/staff/quotes');
    }
}
