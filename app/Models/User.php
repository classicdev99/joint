<?php namespace App\Models;

use CodeIgniter\Model;

class User extends Model{
    protected $table = 'users';
    protected $allowedFields = ['username','email','password'];

    public function index($postData)
    {
        $this->db->table($this->table)->insert($postData);
        $insert_id = $this->db->insertID();

        return  $insert_id;
    }

    public function getUsers($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->where("email", $email)->first();
        }
    }

    
}