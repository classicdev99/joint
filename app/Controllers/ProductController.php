<?php

namespace App\Controllers;

use App\Models\ActivityLog;
use App\Models\Product;

use App\Controllers\BaseController;

class ProductController extends BaseController
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
        $data['page_title'] = view('layouts/page-title', ['title' => 'Products', 'li_1' => 'Dashboard', 'li_2' => 'Products']);

        $model = new Product();

        $data['products'] = $model->getProducts();
        return view('product/product_list', $data);
    }

    public function Product_add()
    {
        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Create Product', 'li_1' => 'Dashboard', 'li_2' => 'Products', 'li_3' => 'Create Product']);

        return view('product/product_add', $data);
    }

    public function save_Product()
    {
        $model = new Product();
        $model->index($_POST);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "product",
            'action' => "create",
        ];
        $activityLog->index($log);
        
        return redirect()->to('/staff/product');
    }

    public function Product_delete($id)
    {
        $model = new Product();
        $model->deleteProduct($id);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "product",
            'action' => "delete",
        ];
        $activityLog->index($log);
        
        return redirect()->to('/staff/product');
    }

    public function Product_edit($id)
    {
        $model = new Product();

        $data['title_meta'] = view('layouts/title-meta', ['title' => 'Dashboard']);
        $data['page_title'] = view('layouts/page-title', ['title' => 'Update Product', 'li_1' => 'Dashboard', 'li_2' => 'Products', 'li_3' => 'Update Product']);
        $data['record'] = $model->editProduct($id);

        return view('product/product_edit', $data);
    }

    public function update_Product($id)
    {
        $model = new Product();
        $model->upadteProduct($id, $_POST);

        $activityLog = new ActivityLog();
        $log = [
            'activity' => "product",
            'action' => "update",
        ];
        $activityLog->index($log);
        
        return redirect()->to('/staff/product');
    }
}