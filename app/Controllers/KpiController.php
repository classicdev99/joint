<?php
namespace App\Controllers;
use App\Models\Staff;

class KpiController extends BaseController {
    public function __construct() {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        $this->db = \Config\Database::connect();
        
        if(empty($this->session->get("isLoggedIn"))) {
            return redirect()->to('staff/login'); 
        }
    }
    
    public function index()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Staff KPI', 'li_1' => 'Dashboard', 'li_2' => 'Staff KPI']);

        $model = new Staff();

        $data['staffs'] = $model->getStaffs();
        return view('kpi/kpi_list', $data);
    }

    public function update_kpi($id)
    {
        $model = new Staff();
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Staff KPI', 'li_1' => 'Dashboard', 'li_2' => 'Staff KPI']);

        $data = [
            'kpi' => $this->request->getPost('kpi'),
        ];
       // $model->where('id', $id)->first();
        $model->updateStaff($id, $data);
        $result['error']=false;
        $result['message']=$data;
        //$result['kpi'] = $this->request->getPost('kpi');
        echo json_encode($result);
	
    }
}