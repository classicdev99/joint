<?php 
namespace App\Models;
use CodeIgniter\Model;
class ExpensesModel extends Model
{
    protected $table = 'tbl_expenses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['expense_type', 'expense_date','expense_amount','remark','expense_voucher_number','attachment'];

    protected $useTimestamps = false;
}