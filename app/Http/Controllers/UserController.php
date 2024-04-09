<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(){

        $cesaeInfo = $this-> getCesaeInfo();
        $allUsers = $this-> getUsers();

       // para fazer debug manual: dd($cesaeInfo);
        return view('users.all_users', compact('cesaeInfo', 'allUsers'));
    }

    public function helloUser($name){
        return '<h2> Olá '. $name. '</h2>';
    }

    protected function getCesaeInfo(){
        $cesaeInfo = [
            'name' => 'cesae',
            'address' => 'exemplo rua'
        ];

        return $cesaeInfo;
    }

    protected function getUsers(){

        $users = [
            ['id' => 1, 'name' => 'Jessica', 'telefone' =>'9154874521'],
            ['id' => 2,  'name' => 'Luis', 'telefone' =>'9154874521'],
            ['id' => 3,  'name' =>'Miguel', 'telefone' =>'9154874521'],
            ['id' => 4,  'name' =>'Ana', 'telefone' =>'9154874521'],
        ];

        return $users;
    }

    

}
