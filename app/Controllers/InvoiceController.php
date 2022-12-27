<?php

namespace App\Controllers;

use App\Models\InvoiceItem;
use App\Models\Invoices;
use App\Models\Contact;
use App\Models\Product;

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

        $model = new Product();
        $data['products'] = $model->getProducts();
        
        return view('invoice/invoice_add', $data);
    }

    public function save_invoices()
    {
        $model = new Invoices();
        $invoiceItem = new InvoiceItem();
        $invoice = [
            'invoiceOwner'      => $this->request->getPost('invoiceOwner'),
            'productOrder'       => $this->request->getPost('productOrder'),
            'subject'      => $this->request->getPost('subject'),
            'purchaseOrder'       => $this->request->getPost('purchaseOrder'),
            'invoiceDate'     => $this->request->getPost('invoiceDate'),
            'exciseDuty'     => $this->request->getPost('exciseDuty'),
            'dueDate'          => $this->request->getPost('dueDate'),
            'status'     => $this->request->getPost('status'),
            'salesCommision'      => $this->request->getPost('salesCommision'),
            'quoteNo'      => $this->request->getPost('quoteNo'),
            'accountName'      => $this->request->getPost('accountName'),
            'contactName'      => $this->request->getPost('contactName'),
            'paymentTerm'      => $this->request->getPost('paymentTerm'),
            'deliveryTerms'      => $this->request->getPost('deliveryTerms'),
            'currentPicName'      => $this->request->getPost('currentPicName'),
            'billingStreet'      => $this->request->getPost('billingStreet'),
            'shippingSite'      => $this->request->getPost('shippingSite'),
            'billingCity'      => $this->request->getPost('billingCity'),
            'shippingStreet'      => $this->request->getPost('shippingStreet'),
            'billingState'      => $this->request->getPost('billingState'),
            'shippingCity'      => $this->request->getPost('shippingCity'),
            'billingCode'      => $this->request->getPost('billingCode'),
            'billingCountry'      => $this->request->getPost('billingCountry'),
            'shippingCode'      => $this->request->getPost('shippingCode'),
            'shippingCountry'      => $this->request->getPost('shippingCountry'),
            // 'TermsAndCondition'      => $this->request->getPost('TermsAndCondition'),
            // 'description'      => $this->request->getPost('description'),
            // 'listPrice'      => $this->request->getPost('listPrice'),
            // 'quantity'      => $this->request->getPost('quantity'),
            // 'amount'      => $this->request->getPost('amount'),
            // 'discount'      => $this->request->getPost('discount'),
            // 'tax'      => $this->request->getPost('tax'),
            // 'total'      => $this->request->getPost('total'),
        ];
        $invoice_id = $model->index($invoice);

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
                    'invoice_id'      => $invoice_id,
                ];
            $i ++;
            $invoiceItem->index($item);
        }while(true);
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
        $invoiceItem = new InvoiceItem();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'update Invoice', 'li_1' => 'Dashboard', 'li_2' => 'Invoices', 'li_3' => 'Upadate Invoice']);

        $data['record'] = $model->editInvoice($id);
        $data['invoice_items'] = $invoiceItem->getItemsForInvoice($id);
        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();

        $model = new Product();
        $data['products'] = $model->getProducts();
        
        return view('invoice/invoice_edit', $data);
    }

    public function update_invoice($id)
    {
        $model = new Invoices();
        $invoiceItem = new InvoiceItem();
        $invoice = [
            'invoiceOwner'      => $this->request->getPost('invoiceOwner'),
            'productOrder'       => $this->request->getPost('productOrder'),
            'subject'      => $this->request->getPost('subject'),
            'purchaseOrder'       => $this->request->getPost('purchaseOrder'),
            'invoiceDate'     => $this->request->getPost('invoiceDate'),
            'exciseDuty'     => $this->request->getPost('exciseDuty'),
            'dueDate'          => $this->request->getPost('dueDate'),
            'status'     => $this->request->getPost('status'),
            'salesCommision'      => $this->request->getPost('salesCommision'),
            'quoteNo'      => $this->request->getPost('quoteNo'),
            'accountName'      => $this->request->getPost('accountName'),
            'contactName'      => $this->request->getPost('contactName'),
            'paymentTerm'      => $this->request->getPost('paymentTerm'),
            'deliveryTerms'      => $this->request->getPost('deliveryTerms'),
            'currentPicName'      => $this->request->getPost('currentPicName'),
            'billingStreet'      => $this->request->getPost('billingStreet'),
            'shippingSite'      => $this->request->getPost('shippingSite'),
            'billingCity'      => $this->request->getPost('billingCity'),
            'shippingStreet'      => $this->request->getPost('shippingStreet'),
            'billingState'      => $this->request->getPost('billingState'),
            'shippingCity'      => $this->request->getPost('shippingCity'),
            'billingCode'      => $this->request->getPost('billingCode'),
            'billingCountry'      => $this->request->getPost('billingCountry'),
            'shippingCode'      => $this->request->getPost('shippingCode'),
            'shippingCountry'      => $this->request->getPost('shippingCountry'),
            // 'TermsAndCondition'      => $this->request->getPost('TermsAndCondition'),
            // 'description'      => $this->request->getPost('description'),
            // 'listPrice'      => $this->request->getPost('listPrice'),
            // 'quantity'      => $this->request->getPost('quantity'),
            // 'amount'      => $this->request->getPost('amount'),
            // 'discount'      => $this->request->getPost('discount'),
            // 'tax'      => $this->request->getPost('tax'),
            // 'total'      => $this->request->getPost('total'),
        ];
        $model->updateInvoice($id, $invoice);
        $invoiceItem->deleteItemsForInvoice($id);

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
                    'invoice_id'      => $id,
                ];
            $i ++;
            $invoiceItem->index($item);
        }while(true);

        return redirect()->to('/staff/invoice');
    }
}