<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(){

        $cesaeInfo = $this-> getCesaeInfo();
        return view('users.all_users', compact('cesaeInfo'));
    }

    public function helloUser($name){
        return '<h2> Olá '. $name. '</h2>';
    }

    protected function getCesaeInfo(){
        $cesaeInfo = [
            'name' => 'cesae',
            'address' => 'exemplo rua '
        ];

        return $cesaeInfo;
    }
}
