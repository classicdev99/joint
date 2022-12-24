<?php 
namespace App\Models;
use CodeIgniter\Model;
class PurchasesModel extends Model
{
    protected $table = 'tbl_purchases';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_date', 'invoice_date','seller_name','invoice_number','order_description','order_price','payment_mode','paid_amount'];

    protected $useTimestamps = false;
}