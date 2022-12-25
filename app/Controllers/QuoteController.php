<?php

namespace App\Controllers;

use App\Models\Quotes;
use App\Models\InvoicedItem;
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
    //    var_dump($_POST);
    //    die;
        $model = new Quotes();
        $invoicedItem = new InvoicedItem();
        $quote = [
            'quote_name'      => $this->request->getPost('quote_name'),
            'subject'       => $this->request->getPost('subject'),
            'pic_name'      => $this->request->getPost('pic_name'),
            'account_name'       => $this->request->getPost('account_name'),
            'contact_name'     => $this->request->getPost('contact_name'),
            'delivery_term'     => $this->request->getPost('delivery_term'),
            'deal_name'          => $this->request->getPost('deal_name'),
            'validity'     => $this->request->getPost('validity'),
            'cutom_quote_date'      => $this->request->getPost('cutom_quote_date'),
        ];

        $quote_id = $model->index($quote);

        $i = 0;
        do{
            if($this->request->getPost('productName' . $i) == null)
                break;
            $item = [
                    'product_name'      => $this->request->getPost('productName' . $i),
                    'list_price'       => $this->request->getPost('listPrice' . $i),
                    'quantity'      => $this->request->getPost('quantity' . $i),
                    'amount'       => $this->request->getPost('amount' . $i),
                    'discount'     => $this->request->getPost('discount' . $i),
                    'tax'     => $this->request->getPost('tax' . $i),
                    'total'          => $this->request->getPost('total' . $i),
                    'quote_id'      => $quote_id,
                ];
            $i ++;
            $invoicedItem->index($item);
        }while(true);
      


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
        $invoicedItem = new InvoicedItem();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Quote', 'li_1' => 'Dashboard', 'li_2' => 'Quotes', 'li_3' => 'Create Quote']);
        $data['record'] = $model->editQuotes($id);
        $data['invoiced_items'] = $invoicedItem->getQuoteItems($id);

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
        $invoicedItem = new InvoicedItem();

        $quote = [
            'quote_name'      => $this->request->getPost('quote_name'),
            'subject'       => $this->request->getPost('subject'),
            'pic_name'      => $this->request->getPost('pic_name'),
            'account_name'       => $this->request->getPost('account_name'),
            'contact_name'     => $this->request->getPost('contact_name'),
            'delivery_term'     => $this->request->getPost('delivery_term'),
            'deal_name'          => $this->request->getPost('deal_name'),
            'validity'     => $this->request->getPost('validity'),
            'cutom_quote_date'      => $this->request->getPost('cutom_quote_date'),
        ];


        $model->upadteQuotes($id, $quote);
        $invoicedItem->deleteQuoteItems($id);
        $i = 1;
        do{
            if($this->request->getPost('productName' . $i) == null)
                break;
            $item = [
                    'product_name'      => $this->request->getPost('productName' . $i),
                    'list_price'       => $this->request->getPost('listPrice' . $i),
                    'quantity'      => $this->request->getPost('quantity' . $i),
                    'amount'       => $this->request->getPost('amount' . $i),
                    'discount'     => $this->request->getPost('discount' . $i),
                    'tax'     => $this->request->getPost('tax' . $i),
                    'total'          => $this->request->getPost('total' . $i),
                    'quote_id'      => $id,
                ];
            $i ++;
            $invoicedItem->index($item);
        }while(true);
        
        return redirect()->to('/staff/quotes');
    }

    public function change_currency() {
        $myr = 1.00;
        $usd = 4.42;
        $currencies = array(1.00, 4.42);
        
        $new = $this->request->getPost('new');
        $old = $this->request->getPost('old');
        $result = array($currencies[$new], $currencies[$old] / $currencies[$new]);
        return json_encode($result);
        // if ($currency == 0)
        //     echo json_encode($myr / $usd);
        // if ($currency == 1)
        //     echo json_encode($usd / $usd);
            
    }
}