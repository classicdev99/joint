<?php 
namespace App\Controllers;
use App\Models\Contact;
use App\Models\InvoiceItem;
use App\Models\Invoices;
use App\Models\Masterpaymentterm;
use App\Models\Product;
use App\Models\QuoteItem;
use App\Models\Quotes;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function index() 
	{
        $model = new Invoices();
        $invoiceItem = new InvoiceItem();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Edit Quote', 'li_1' => 'Dashboard', 'li_2' => 'Quotes', 'li_3' => 'Edit Quote']);
        $data['record'] = $model->editInvoice(11);
        $data['invoice_items'] = $invoiceItem->getItemsForInvoice(11);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();
        $Masterpaymentterm=new Masterpaymentterm();
        $data['paymentterms'] = $Masterpaymentterm->findAll();

        $model = new Product();

        $data['products'] = $model->getProducts();
        return view('invoice/invoice_pdf', $data);
    }
    function makeQuotePdf($id){

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

        $model = new Product();

        $data['products'] = $model->getProducts();

        $dompdf = new Dompdf();
        $html = view('quotes/quote_pdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("quote_".$id.".pdf");
    }

    function makeInvoicePdf($id){

        $model = new Invoices();
        $invoiceItem = new InvoiceItem();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Edit Quote', 'li_1' => 'Dashboard', 'li_2' => 'Quotes', 'li_3' => 'Edit Quote']);
        $data['record'] = $model->editInvoice($id);
        $data['invoice_items'] = $invoiceItem->getItemsForInvoice($id);

        $contact = new Contact();
        $data['contacts'] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();
        $Masterpaymentterm=new Masterpaymentterm();
        $data['paymentterms'] = $Masterpaymentterm->findAll();

        $model = new Product();

        $data['products'] = $model->getProducts();

        $dompdf = new Dompdf();
        $html = view('invoice/invoice_pdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("invoice_".$id.".pdf");
    }
}