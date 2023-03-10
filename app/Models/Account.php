<?php

namespace App\Models;

use CodeIgniter\Model;

class Account extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'accounts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'image',
        'accountowner',
        'accountname',
        'accountemail',
        'accountsite',
        'parentaccount',
        'accountnumber',
        'industry',
        'annualrevenue',
        'sourceremark',
        'territory',
        'currentpic',
        'rating',
        'phonenumber',
        'fax',
        'website',
        'ownership',
        'employees',
        'sicccode',
        'customertype',
        'paymentterm',
        'actionrequired',
        'billstreet',
        'billcity',
        'billstate',
        'billcode',
        'billcountry',
        'shipstreet',
        'shipcity',
        'shipstate',
        'shipcode',
        'shipcountry',
        'descinformation',
        'systeminfo',
        'createdby',
        'updatedby',
        'created_at',
        'updated_at',
        'deleted_at',
        'secondaryphone',
        'country',
        'region',
        'address1',
        'address2',
        'address3',
        'city'
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