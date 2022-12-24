<?php 
namespace App\Models;
use CodeIgniter\Model;
class ProjectTaskModel extends Model
{
    protected $table = 'tbl_project_task';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description','start_date','end_date','project_id','status'];

    protected $useTimestamps = false;
}