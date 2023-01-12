<?php

namespace App\Controllers;

use App\Models\Account;
use App\Models\ActivityLog;
use App\Models\Contact;
use App\Models\Mastercustomertype;
use App\Models\Masteractionrequired;
use App\Models\Masterpaymentterm;
use App\Models\Masterrating;
use App\Models\Masterindustry;


class accountController extends BaseController
{
    protected $accountModel;
    public function __construct()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        $this->accountModel = new Account();
        // $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $accountdata = $this->accountModel->db->query("select a.*, (
        SELECT CONCAT('[',GROUP_CONCAT(JSON_OBJECT('id',id,'name',lastName,'email',email,'phone',phone)),']')
        as contact from contacts c where c.AccountName = a.accountname) as contact from accounts a")->getResultArray();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Accounts', 'li_1' => 'Dashboard', 'li_2' => 'Accounts']);
        $data['accounts'] = $accountdata;

        return view('account/account_list', $data);
    }

    public function account_add()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Account', 'li_1' => 'Dashboard', 'li_2' => 'Accounts', 'li_3' => 'Create Account']);
        $data['createdby'] = $this->session->get('user_id');
        $contact = new Contact();
        $data["contacts"] = $contact->getContacts();
        // $data["accounts"] = $contact->getContacts();
        $data['accounts'] = $contact->getAllAccounts();
        $customerType=new Mastercustomertype();
        $actionRequired=new Masteractionrequired();
        $paymentTerm=new Masterpaymentterm();
        $ratings=new Masterrating();
        $industres=new Masterindustry();
        $data['customertypes'] = $customerType->where('active','1')->findAll();
        $data['actionRequireds'] = $actionRequired->findAll();
        $data['paymentterms'] = $paymentTerm->findAll();
        $data['ratings'] = $ratings->findAll();
        // $data['ratings'] = $paymentTerm->getLastQuery();
        // print_r( $data['ratings']);die;
        $data['industres'] = $industres->findAll();
        
        return view('account/account_add', $data);
    }

    public function create_account()
    {
        // $file = $this->request->getFile('image');

        // if ($file->getName()) {
        //     $file->move(ROOTPATH . 'public/uploads/accounts');

        //     $image = 'uploads/accounts/' . $file->getName();
        // }

        $data = [
        //    'image'    => $image ? $image : '',
            'accountowner'      => $this->request->getPost('accountowner'),
            'accountname'       => $this->request->getPost('accountname'),
            'accountemail'      => $this->request->getPost('accountemail'),
            'accountsite'       => $this->request->getPost('accountsite'),
            'parentaccount'     => $this->request->getPost('parentaccount'),
            'accountnumber'     => $this->request->getPost('accountnumber'),
            'industry'          => $this->request->getPost('industry'),
            'annualrevenue'     => $this->request->getPost('annualrevenue'),
            'sourceremark'      => $this->request->getPost('sourceremark'),
            'territory'         => $this->request->getPost('territory'),
            'currentpic'        => $this->request->getPost('currentpic'),
            'rating'            => $this->request->getPost('rating'),
            'phonenumber'       => $this->request->getPost('phonenumber'),
            'fax'               => $this->request->getPost('fax'),
            'website'           => $this->request->getPost('website'),
            'ownership'         => $this->request->getPost('ownership'),
            'employees'         => $this->request->getPost('employees'),
            'sicccode'          => $this->request->getPost('sicccode'),
            'customertype'      => $this->request->getPost('customertype'),
            'paymentterm'       => $this->request->getPost('paymentterm'),
            'actionrequired'    => $this->request->getPost('actionrequired'),
            'billstreet'        => $this->request->getPost('billstreet'),
            'billcity'          => $this->request->getPost('billcity'),
            'billstate'         => $this->request->getPost('billstate'),
            'billcode'          => $this->request->getPost('billcode'),
            'billcountry'       => $this->request->getPost('billcountry'),
            'shipstreet'        => $this->request->getPost('shipstreet'),
            'shipcity'          => $this->request->getPost('shipcity'),
            'shipstate'         => $this->request->getPost('shipstate'),
            'shipcode'          => $this->request->getPost('shipcode'),
            'shipcountry'       => $this->request->getPost('shipcountry'),
            'descinformation'   => $this->request->getPost('descinformation'),
            'systeminfo'        => $this->request->getPost('systeminfo'),
            'createdby'         => $this->request->getPost('createdby'),
            'secondaryphone'    => $this->request->getPost('secondaryphone'),
            'country'           => $this->request->getPost('country'),
            'region'            => $this->request->getPost('region'),
            'address1'          => $this->request->getPost('address1'),
            'address2'          => $this->request->getPost('address2'),
            'address3'          => $this->request->getPost('address3'),
            'city'              => $this->request->getPost('city'),
        ];

        $this->accountModel->save($data);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "account",
            'action' => "create",
        ];
        $activityLog->index($log);
        
        return redirect('' . session('role') . '/account')->with('status', 'Account inserted Successfully');
    }

    public function account_edit($id = null)
    {
        $lora = new Account();
        $accountdata = $lora->db->query("select a.*, (
            SELECT CONCAT('[',GROUP_CONCAT(JSON_OBJECT('id',id,'name',lastName)),']')
            as contact from contacts c where c.AccountName = a.accountname) as contact from accounts a where a.id =" . $id)->getResult();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Update Account', 'li_1' => 'Dashboard', 'li_2' => 'Update Account']);
        $data['account'] = $accountdata;
        $data['updatedby'] = $this->session->get('user_id');
        $contact = new Contact();
        $data['accounts'] = $contact->getAllAccounts();
        $customerType=new Mastercustomertype();
        $actionRequired=new Masteractionrequired();
        $paymentTerm=new Masterpaymentterm();
        $ratings=new Masterrating();
        $industres=new Masterindustry();
        $data['customertypes'] = $customerType->where('active','1')->findAll();
        $data['actionRequireds'] = $actionRequired->findAll();
        $data['paymentterms'] = $paymentTerm->findAll();
        $data['ratings'] = $ratings->findAll();
        $data['industres'] = $industres->findAll();

        return view('account/account_edit', $data);
    }

    public function save_update($id = null)
    {
        $data = [
            'accountowner'      => $this->request->getPost('accountowner'),
            'accountname'       => $this->request->getPost('accountname'),
            'accountemail'      => $this->request->getPost('accountemail'),
            'accountsite'       => $this->request->getPost('accountsite'),
            'parentaccount'     => $this->request->getPost('parentaccount'),
            'accountnumber'     => $this->request->getPost('accountnumber'),
            'industry'          => $this->request->getPost('industry'),
            'annualrevenue'     => $this->request->getPost('annualrevenue'),
            'sourceremark'      => $this->request->getPost('sourceremark'),
            'territory'         => $this->request->getPost('territory'),
            'currentpic'        => $this->request->getPost('currentpic'),
            'rating'            => $this->request->getPost('rating'),
            'phonenumber'       => $this->request->getPost('phonenumber'),
            'fax'               => $this->request->getPost('fax'),
            'website'           => $this->request->getPost('website'),
            'ownership'         => $this->request->getPost('ownership'),
            'employees'         => $this->request->getPost('employees'),
            'sicccode'          => $this->request->getPost('sicccode'),
            'customertype'      => $this->request->getPost('customertype'),
            'paymentterm'       => $this->request->getPost('paymentterm'),
            'actionrequired'    => $this->request->getPost('actionrequired'),
            'billstreet'        => $this->request->getPost('billstreet'),
            'billcity'          => $this->request->getPost('billcity'),
            'billstate'         => $this->request->getPost('billstate'),
            'billcode'          => $this->request->getPost('billcode'),
            'billcountry'       => $this->request->getPost('billcountry'),
            'shipstreet'        => $this->request->getPost('shipstreet'),
            'shipcity'          => $this->request->getPost('shipcity'),
            'shipstate'         => $this->request->getPost('shipstate'),
            'shipcode'          => $this->request->getPost('shipcode'),
            'shipcountry'       => $this->request->getPost('shipcountry'),
            'descinformation'   => $this->request->getPost('descinformation'),
            'systeminfo'        => $this->request->getPost('systeminfo'),
            'updatedby'         => $this->request->getPost('updatedby'),
        ];

        $this->accountModel->update($id, $data);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "invoice",
            'action' => "update",
        ];
        $activityLog->index($log);

        return redirect('' . session('role') . '/account')->with('status', 'Account updated Successfully');
    }

    public function account_view($id = null)
    {
        $accountdata = $this->accountModel->find($id);

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Accounts', 'li_1' => 'Dashboard', 'li_2' => 'Accounts']);
        $data['account'] = $accountdata;

        return view('account/account_view', $data);
    }

    public function account_delete($id = null)
    {
        $lora = new Account();
        $lora->delete($id);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "invoice",
            'action' => "delete",
        ];
        $activityLog->index($log);
        
        return redirect('' . session('role') . '/account')->with('status', 'Account Successfully Deleted');
    }
}