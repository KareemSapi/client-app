<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model 
{
    protected $table = 'addresses';
    protected $returnType = 'array';

    protected $allowedFields = ['address', 'client_id'];

    public function getAddress(){

        return $this->findAll();
    }

    public function findAddressById($id){

        return $this->select('a.*, c.first_name as first_name, c.last_name as last_name')
                    ->from('addresses a')
                    ->where(['a.id' => $id])
                    ->join('clients c', 'c.id = a.client_id', 'left')
                    ->asArray()->first();
    }

}