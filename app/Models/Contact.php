<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'contacts';
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
        return $query;
    }
    public function getAllAccounts($id = false)
    {
        $acc = new Account();
        if ($id === false) {
            return $acc->findAll();
        } else {
            return $acc->getWhere(['id' => $id]);
        }
    }
    public function getContacts($id = false)
    {
        if ($id === false) {
            $m = $this->findAll();
            //           $m["accounts"] = $this->db->query()
            return $m;
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function deleteContact($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function editContact($id)
    {
        $query = $this->find($id);
        return $query;
    }

    public function upadteContact($id, $postData)
    {
        $query = $this->db->table($this->table)->update($postData, array('id' => $id));
        return $query;
    }
}
