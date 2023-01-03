<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Session\Session;

class ActivityLog extends Model
{
     protected $DBGroup          = 'default';
    protected $table            = 'activitylog';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    // protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    // protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function index($log)
    {
        $data = [
            'staff_name' => session('username'),
            'activity' => $log['activity'],
            'action' => $log['action'],
            'time' => date("Y-m-d h:i:sa"),
        ];

        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getActivityLogs($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

}