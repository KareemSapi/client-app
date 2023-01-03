<?php

namespace App\Models;

use CodeIgniter\Model;

class PhoneModel extends Model 
{
    protected $table = 'phone_numbers';
    protected $returnType = 'array';

    protected $allowedFields = ['phone_number', 'client_id'];

    public function getPhoneNumbers(){

        return $this->findAll();
    }

    // public function findPhoneById($id){

    // }
}