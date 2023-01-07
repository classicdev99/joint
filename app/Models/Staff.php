<?php

namespace App\Models;

use CodeIgniter\Model;

class Staff extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'staffs';
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

    public function index($postData)
    {
        $query = $this->db->table($this->table)->insert($postData);
        $insert_id = $this->db->insertID();

        return  $insert_id;
    }

    public function getStaffs($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();;
        }
    }

    public function getStaffByEmail($email)
    {
        return $this->where("email", $email)->first();
    }

    public function deleteStaff($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function editStaff($id)
    {
        $query = $this->find($id);
        return $query;
    }

    public function updateStaff($id, $postData)
    {
        $query = $this->db->table($this->table)->update($postData, array('id' => $id));
        return $query;
    }

    public function addSales($id)
    {

        $staff = $this->where('id', $id)->first();
        $data = [
            'sales' => $staff['sales'] + 1,
        ];
        $this->updateStaff($id, $data);
    
    }
}