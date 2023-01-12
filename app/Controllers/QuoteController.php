<?php

namespace App\Controllers;

use App\Models\ActivityLog;
use App\Models\Product;
use App\Models\QuoteItem;
use App\Models\Quotes;
use App\Models\InvoiceItem;
use App\Models\Contact;

use App\Models\Quoteinformation;
use App\Models\Masterpaymentterm;
use App\Models\Staff;
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
        $staff = new Staff();
        $data['staffs'] = $staff->getStaffs();
        $model = new Product();

        $data['products'] = $model->getProducts();
        
        return view('quotes/quote_add', $data);
    }

    public function save_Quote()
    {
    //    var_dump($_POST);
    //    die;
        $model = new Quotes();
        $quoteItem = new QuoteItem();
        $activityLog = new ActivityLog();
        $quote = [
            // 'quote_name'      => $this->request->getPost('quote_name'),
            'subject'       => $this->request->getPost('subject'),
            'pic_name'      => $this->request->getPost('pic_name'),
            'account_name'       => $this->request->getPost('account_name'),
            'contact_name'     => $this->request->getPost('contact_name'),
            'delivery_term'     => $this->request->getPost('delivery_term'),
            'deal_name'          => $this->request->getPost('deal_name'),
            'validity'     => $this->request->getPost('validity'),
            'cutom_quote_date'      => $this->request->getPost('cutom_quote_date'),
            'sum_sub_total'     => $this->request->getPost('sum_sub_total'),
            'sum_discount'     => $this->request->getPost('sum_discount'),
            'sum_tax'     => $this->request->getPost('sum_tax'),
            'sum_adjustment'     => $this->request->getPost('sum_adjustment'),
            'sum_grand_total'     => $this->request->getPost('sum_grand_total'),
        ];

        $quote_id = $model->index($quote);

        $log = [
            'activity' => "quote",
            'action' => "create",
        ];
        $activityLog->index($log);

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
                    'quote_id'      => $quote_id,
                    'product_id'    => $this->request->getPost('productId' . $i),
                ];
            $i ++;
            $quoteItem->index($item);
        }while(true);
      


        return redirect()->to('/staff/quotes');
    }

    public function Quote_delete($id)
    {
        $model = new Quotes();
        $model->deleteQuotes($id);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "quote",
            'action' => "delete",
        ];
        $activityLog->index($log);

        return redirect()->to('/staff/quotes');
    }

    public function Quote_edit($id)
    {
        $model = new Quotes();
        $quoteItem = new QuoteItem();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Edit Quote', 'li_1' => 'Dashboard', 'li_2' => 'Quotes', 'li_3' => 'Edit Quote']);
        $data['record'] = $model->editQuotes($id);
        $data['quote_items'] = $quoteItem->getItemsForQuote($id);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();
        $Masterpaymentterm=new Masterpaymentterm();
        $data['paymentterms'] = $Masterpaymentterm->findAll();
        $staff = new Staff();
        $data['staffs'] = $staff->getStaffs();
        $model = new Product();

        $data['products'] = $model->getProducts();

        return view('quotes/quote_edit', $data);
    }

    public function update_Quote($id)
    {
        $model = new Quotes();
        $quoteItem = new QuoteItem();
        $activityLog = new ActivityLog();
        $quote = [
            // 'quote_name'      => $this->request->getPost('quote_name'),
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

        $log = [
            'activity' => "quote",
            'action' => "update",
        ];
        $activityLog->index($log);

        
        $quoteItem->deleteItemsforQuote($id);
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
                    'product_id'    => $this->request->getPost('productId' . $i),
                ];
            $i ++;
            $quoteItem->index($item);
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

    public function get_state($id){
        $model = new Quotes();
        //$id = $this->request->getGet('id');
        $state = $model->getQuotes($id)['state'];
        // var_dump($state);
        // die();
        return json_encode($state);
    }

    public function change_state(){
        $model = new Quotes();
        $id = $this->request->getPost('id');
        $state = $this->request->getPost('state');
        // var_dump($state);
        // die();
        $result = $model->updateState($id, $state);
        if(!$result) return json_encode(false);
        return json_encode($state);
    }
}