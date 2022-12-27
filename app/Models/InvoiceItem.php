<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceItem extends Model
{
   protected $DBGroup          = 'default';
    protected $table            = 'invoice_items';
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

    public function getInvoiceItems($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function deleteInvoiceItem($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function editInvoiceItems($id)
    {
        $query = $this->find($id);
        return $query;
    }

    public function updateInvoiceItems($id, $postData)
    {
        $query = $this->db->table($this->table)->update($postData, array('id' => $id));
        return $query;
    }

    public function getItemsForInvoice($invoice_id)
    {
    //    return $this->findAll();

        return $this->where('invoice_id',$invoice_id)->findAll();
    }

    public function deleteItemsForInvoice($invoice_id)
    {
        return $this->where('invoice_id',$invoice_id)->delete();
    }
}