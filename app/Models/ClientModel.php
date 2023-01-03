<?php

namespace App\Models;

use CodeIgniter\Model;


class ClientModel extends Model 
{
    protected $table = 'clients';
    protected $returnType = 'array';

    protected $allowedFields = ['first_name', 'last_name', 'email','date_of_birth', 'gender', 'position'];

    public function getClients(){

        $builder = $this->db->table($this->table);
        $builder->select('clients.id, clients.first_name, clients.last_name, clients.email, clients.gender, clients.date_of_birth, clients.position, JSON_ARRAYAGG(phone_numbers.phone_number) as phone, JSON_ARRAYAGG(addresses.address) as address');
        $builder->from('clients c');
        $builder->join('phone_numbers', 'clients.id = phone_numbers.client_id');
        $builder->join('addresses', 'phone_numbers.client_id = addresses.client_id');
        $builder->groupBy('clients.id');
        
        $query = $builder->get();
        return $query->getResult();
    }

    public function findClientById($id){

        return $this->where(['id' => $id])->first();
    }

    public function getPhoneAddress($id){

        $builder = $this->db->table($this->table);
        $builder->select('JSON_ARRAYAGG(phone_numbers.phone_number) as phone, JSON_ARRAYAGG(addresses.address) as address');
        $builder->from('clients c');
        $builder->where(['clients.id' => $id]);
        $builder->join('phone_numbers', 'clients.id = phone_numbers.client_id');
        $builder->join('addresses', 'phone_numbers.client_id = addresses.client_id');
        $builder->groupBy('clients.id');

        $query = $builder->get();
        return $query->getResult();
    }
}