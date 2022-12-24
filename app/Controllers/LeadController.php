<?php
namespace App\Controllers;

use App\Models\Lead;
use App\Models\Masterleadstatus;
use App\Models\Masterleadsource;
use App\Models\Masterprefix;
use App\Models\Masterindustry;
use App\Models\Mastercustomertype;
use App\Models\Masteractionrequired;
use App\Models\Masterbrand;
class leadController extends BaseController {
    public function __construct() {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        $this->leadModel = new Lead();
        // $this->db = \Config\Database::connect();
    }

    public function index() {
        $leaddata = $this->leadModel->findAll();

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Leads', 'li_1'=>'Dashboard', 'li_2'=>'Leads']);
        $data['leads'] = $leaddata;

        return view('lead/lead_list', $data);
    }
    
    public function lead_add() {
        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Create Lead', 'li_1'=>'Dashboard', 'li_2'=>'Leads', 'li_3'=>'Create Lead']);
        $data['createdby'] = $this->session->get('name');
        $Masterleadstatus=new Masterleadstatus();
        $data['leadstatus'] = $Masterleadstatus->findAll();
        $Masterleadsource=new Masterleadsource();
        $data['leadsources'] = $Masterleadsource->findAll();
        $Masterprefix=new Masterprefix();
        $data['prefixes'] = $Masterprefix->findAll();
        $Masterindustry=new Masterindustry();
        $data['industries'] = $Masterindustry->findAll();

        $Mastercustomertype=new Mastercustomertype();
        $data['customertypes'] = $Mastercustomertype->findAll();
        $Masteractionrequired=new Masteractionrequired();
        $data['actionrequireds'] = $Masteractionrequired->findAll();
        $Masterbrand=new Masterbrand();
        $data['brands'] = $Masterbrand->findAll();
        return view('lead/lead_add', $data);
    }
    
    public function create_lead()
    {
		$this->leadModel->save($this->request->getPost());

		return redirect(''.session('role').'/lead')->with('status', 'Leads inserted Successfully');
    }

    public function lead_edit($id = null)
    {
        $leaddata = $this->leadModel->find($id);

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Update Leads', 'li_1'=>'Dashboard', 'li_2'=>'Leads', 'li_3'=>'Update Lead']);
        $data['lead'] = $leaddata;
        $data['updatedby'] = $this->session->get('user_id');
        $Masterleadstatus=new Masterleadstatus();
        $data['leadstatus'] = $Masterleadstatus->findAll();
        $Masterleadsource=new Masterleadsource();
        $data['leadsources'] = $Masterleadsource->findAll();
        $Masterprefix=new Masterprefix();
        $data['prefixes'] = $Masterprefix->findAll();
        $Masterindustry=new Masterindustry();
        $data['industries'] = $Masterindustry->findAll();

        $Mastercustomertype=new Mastercustomertype();
        $data['customertypes'] = $Mastercustomertype->findAll();
        $Masteractionrequired=new Masteractionrequired();
        $data['actionrequireds'] = $Masteractionrequired->findAll();
        $Masterbrand=new Masterbrand();
        $data['brands'] = $Masterbrand->findAll();
        return view('lead/lead_edit', $data);
    }

    public function save_update($id = null)
    {
		$this->leadModel->update($id, $this->request->getPost());

		return redirect(''.session('role').'/lead')->with('status', 'Lead updated Successfully');
    }

    public function lead_view($id = null)
    {
        $leaddata = $this->leadModel->find($id);

        $data['title_meta'] = view('layouts/title-meta', ['title'=>'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title'=>'Accounts', 'li_1'=>'Dashboard', 'li_2'=>'Accounts']);
        $data['lead'] = $leaddata;
        
        return view('lead/lead_view', $data);
    }

    public function lead_delete($id = null)
    {
        $this->leadModel->delete($id);

		return redirect(''.session('role').'/lead')->with('status', 'Lead Successfully Deleted');
    }
}