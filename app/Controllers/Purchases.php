<?php

namespace App\Controllers;

use App\Models\PurchasesModel;
class Purchases extends BaseController
{
    public function index()
    {   
        $data=array('title'=>'Purchases'); 
        $purchasesModel = new PurchasesModel(); 
        $data['data'] = $purchasesModel->findAll();
        return view('ssak/purchases-list',$data);
    }
    public function store() {
        $purchasesModel = new PurchasesModel();
        $id = $this->request->getVar('id');
        $data = [
            'order_date' => $this->request->getVar('order_date'),
            'invoice_date'  => $this->request->getVar('invoice_date'),
            'seller_name'  => $this->request->getVar('seller_name'),
            'invoice_number'  => $this->request->getVar('invoice_number'),
            'order_description'  => $this->request->getVar('order_description'),
            'order_price'  => $this->request->getVar('order_price'),
            'payment_mode'  => $this->request->getVar('payment_mode'),
            'paid_amount'  => $this->request->getVar('paid_amount'),
        ];
        if(empty($id))
        {
            $purchasesModel->insert($data);
            $result['error']=false;
            $result['message']='Added Successfully';
        }else{
            $purchasesModel->update($id, $data);
            $result['error']=false;
            $result['message']='Updated Successfully';
        }
        echo json_encode($result);
    }
    
    // show single user
    public function singleData($id = null){
        $purchasesModel = new PurchasesModel();
        $data = $purchasesModel->where('id', $id)->first();
        $result['error']=false;
        $result['message']=$data;
        echo json_encode($result);
    }
 
    // delete user
    public function delete($id = null){
        $purchasesModel = new PurchasesModel();
        $purchasesModel->where('id', $id)->delete($id);
        $result['error']=false;
        $result['message']='Deleted Successfully';
        echo json_encode($result);
    } 
}
