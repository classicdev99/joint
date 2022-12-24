<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ExpensesModel;
class Expenses extends BaseController
{
    public function index()
    {   
        ini_set('display_errors', '1');
        $data=array('title'=>'Expenses');
        $expensesModel = new ExpensesModel(); 
        $data['data'] = $expensesModel->findAll();
        return view('ssak/expenses-list',$data);
    }

    // insert data
    public function store() {
        $expensesModel = new ExpensesModel();
        $id = $this->request->getVar('id');
        $data = [
            'expense_type' => $this->request->getVar('expense_type'),
            'expense_date'  => $this->request->getVar('expense_date'),
            'expense_amount'  => $this->request->getVar('expense_amount'),
            'remark'  => $this->request->getVar('remark'),
            'expense_voucher_number'  => $this->request->getVar('expense_voucher_number'),
        ];
        if(empty($id))
        {
            $expensesModel->insert($data);
            $result['error']=false;
            $result['message']='Added Successfully';
        }else{
            $expensesModel->update($id, $data);
            $result['error']=false;
            $result['message']='Updated Successfully';
        }
        echo json_encode($result);
    }
    
    // show single user
    public function singleData($id = null){
        $expensesModel = new ExpensesModel();
        $data = $expensesModel->where('id', $id)->first();
        $result['error']=false;
        $result['message']=$data;
        echo json_encode($result);
    }
 
    // delete user
    public function delete($id = null){
        $expensesModel = new ExpensesModel();
        $expensesModel->where('id', $id)->delete($id);
        $result['error']=false;
        $result['message']='Deleted Successfully';
        echo json_encode($result);
    }  
}
