<?php 
namespace App\Models;
use CodeIgniter\Model;
class LeaveModel extends Model
{
    protected $table = 'tbl_leave';
    protected $primaryKey = 'id';
    protected $allowedFields = ['leave_type', 'reason','from_date','till_date','employee_name','state'];

    protected $useTimestamps = false;
}