<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller

{
    public function homePage(){

        $sum = $this -> sum(1,2);
        $helloVar = $this -> helloFunction();

        $myArray = [
            'nome' => 'Jessica',
            'idade' => 32,
            'profissão' => 'web developer'
        ];

        $infoCesae = $this -> getCesaeInfo();

        return view('home.index', compact('sum', 'helloVar', 'infoCesae', 'infoCesae'));
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

    protected function sum($num1, $num2){
        return $num1 + $num2;
    }

    protected function helloFunction(){
        $hello = 'Olá mundo, estamos a aprender web!';
        return $hello;
    }

    protected function getCesaeInfo(){
        $CesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciriaco Cardoso, 186',
            'email' => 'cesae@cesae.pt'
        ];
        return $CesaeInfo;
    }
}
