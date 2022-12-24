<?php 
namespace App\Models;
use CodeIgniter\Model;
class ProjectModel extends Model
{
    protected $table = 'tbl_project';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_name', 'project_owner','start_date','end_date','project_overview','status','project_proup'];

    protected $useTimestamps = false;
}