<?php
namespace App\Controllers;

use App\Models\Lead;
use App\Models\Masteractionrequired;
use App\Models\Masterbrand;
use App\Models\Mastercustomertype;
use App\Models\Masterindustry;
use App\Models\Masterleadsource;
use App\Models\Masterleadstatus;
use App\Models\Masterpaymentterm;
use App\Models\Masterprefix;
use App\Models\Masterproductcategory;
use App\Models\Masterrating;

class MasterController extends BaseController {
    public function __construct() {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
    }

    public function index() {
        
    }

    public function add($master = null)
    {
        d($this->request->getPost());
        dd($master);
    }

    public function prefix()
    {
        $masterprefix = new Masterprefix();

        $prefix = $masterprefix->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Prefix', 'li_1'=>'Master', 'li_2'=>'Prefix']);
        $data['prefixes'] = $prefix;

        return view('master/prefix', $data);
    }

    public function leadsource()
    {
        $masterleadsource = new Masterleadsource();

        $leadsource = $masterleadsource->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Lead Source', 'li_1'=>'Master', 'li_2'=>'Lead Source']);
        $data['leadsources'] = $leadsource;

        return view('master/leadsource', $data);
    }

    public function leadstatus()
    {
        $masterleadstatus = new Masterleadstatus();

        $leadstatus = $masterleadstatus->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Lead Status', 'li_1'=>'Master', 'li_2'=>'Lead Status']);
        $data['leadsstatus'] = $leadstatus;

        return view('master/leadstatus', $data);
    }

    public function industry()
    {
        $masterindustry = new Masterindustry();

        $industry = $masterindustry->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Industry', 'li_1'=>'Master', 'li_2'=>'Industry']);
        $data['industries'] = $industry;

        return view('master/industry', $data);
    }

    public function customertype()
    {
        $mastercustomertype = new Mastercustomertype();

        $customertype = $mastercustomertype->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Customer Type', 'li_1'=>'Master', 'li_2'=>'Customer Type']);
        $data['customertype'] = $customertype;

        return view('master/customertype', $data);
    }

    public function actionrequired()
    {
        $masteractionrequired = new Masteractionrequired();

        $actionrequired = $masteractionrequired->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Action Required', 'li_1'=>'Master', 'li_2'=>'Action Required']);
        $data['actionrequired'] = $actionrequired;

        return view('master/actionrequired', $data);
    }

    public function productcategory()
    {
        $masterproductcategory = new Masterproductcategory();

        $productcategory = $masterproductcategory->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Product Category', 'li_1'=>'Master', 'li_2'=>'Product Category']);
        $data['productcategories'] = $productcategory;

        return view('master/productcategory', $data);
    }

    public function brand()
    {
        $masterbrand = new Masterbrand();

        $brand = $masterbrand->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Brand', 'li_1'=>'Master', 'li_2'=>'Brand']);
        $data['brands'] = $brand;

        return view('master/brand', $data);
    }

    public function rating()
    {
        $masterrating = new Masterrating();

        $rating = $masterrating->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Rating', 'li_1'=>'Master', 'li_2'=>'Rating']);
        $data['ratings'] = $rating;

        return view('master/rating', $data);
    }

    public function paymentterm()
    {
        $masterpaymentterm = new Masterpaymentterm();

        $paymentterm = $masterpaymentterm->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Master']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Payment Term', 'li_1'=>'Master', 'li_2'=>'Payment Term']);
        $data['paymentterms'] = $paymentterm;

        return view('master/paymentterm', $data);
    }
        
    
}