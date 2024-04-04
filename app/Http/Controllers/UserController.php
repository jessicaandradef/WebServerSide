<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(){
        return view('users.all_users');
    }

    public function helloUser($name){
        return '<h2> Olá '. $name. '</h2>';
    }
}
