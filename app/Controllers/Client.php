<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\AddressModel;
use App\Models\PhoneModel;

class Client extends BaseController
{
    public function index(){

        $model = new ClientModel();
        $data = $model->findAll();

        return view('dashboard', $data);
        
    }

    public function getData(){

        $model = new ClientModel();
        $data = $model->getClients();

        return $this->getResponse(
            [
                'message' => 'Data retrieved sucessfully',
                'data' => $data
            ]
        );
    }

    //returns the view used to create client
    public function create(){
        return view('client/create');
    }

    //saves the data of the client into the db/
    public function addClient(){

        $model = new ClientModel();
        $client_id = $model->insert([
            'first_name' => $this->request->getPost('fname'),
            'last_name' => $this->request->getPost('lname'),
            'email' => $this->request->getPost('email'),
            'date_of_birth' => $this->request->getPost('dob'),
            'gender' => $this->request->getPost('gender'),
            'position' => $this->request->getPost('position'),
        ]);

        $phoneModel = new PhoneModel();
        if(is_array($this->request->getPost('phone'))){
            $arr = array();
            $arr = $this->request->getPost('phone');

            for($i = 0; $i < sizeof($arr); $i++){
                $phoneModel->insert([
                    'phone_number' => $arr[$i],
                    'client_id' => $client_id,
                ]);
            }
        }
        else{
            $phoneModel->insert([
                'phone_number' => $this->request->getPost('phone'),
                'client_id' => $client_id,
            ]); 
        }

        $addressModel = new AddressModel();
        if(is_array($this->request->getPost('address'))){
            $arr2 = array();
            $arr2 = $this->request->getPost('address');

            for($i = 0; $i < 2; $i++){
                $addressModel->insert([
                    'address' => $arr2[$i],
                    'client_id' => $client_id,
                ]);
            }
        }
        else{
            $addressModel->insert([
                'address' => $this->request->getPost('address'),
                'client_id' => $client_id,
            ]); 
        }

        return "Client succesfully created.";
    }

    public function get_phone_address($id){

        $model = new ClientModel();

        return $this->getResponse([
            'data' => $model->getPhoneAddress($id)
        ]);
    }
}