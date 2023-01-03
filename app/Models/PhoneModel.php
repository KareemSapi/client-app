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

    public function findPhoneById($id){

        return $this->select('p.*, c.first_name as first_name, c.last_name as last_name')
                    ->from('phone_numbers p')
                    ->where(['p.id' => $id])
                    ->join('clients c', 'c.id = p.client_id', 'left')
                    ->asArray()->first();
    }
}