<?php

namespace App\Models;

use CodeIgniter\Model;

class Lead extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'leads';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'leadowner',
        'leadstatus',
        'prefix',
        'leadsource',
        'lastname',
        'sourceremark',
        'title',
        'industry',
        'company',
        'phone',
        'mobile',
        'fax',
        'email',
        'website',
        'secondaryemail',
        'customertype',
        'enquiryby',
        'actionrequired',
        'currentpicname',
        'currentpic',
        'categorizedproduct',
        'brands',
        'street',
        'city',
        'state',
        'code',
        'country',
        'descinformation',
        'systeminfo',
        'createdby',
        'updatedby',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

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
}
