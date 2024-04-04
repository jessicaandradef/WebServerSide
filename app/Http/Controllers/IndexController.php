<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller

{
    public function homePage(){
        return view('home.index');
    }

    public function welcome(){
        return view('welcome');
    }

    public function tasks(){
        return view('tasks.all-tasks');
    }

    public function hello(){
        return view('hello');
    }

    public function fe() {
        return view('errors.fallback');
    }
}
