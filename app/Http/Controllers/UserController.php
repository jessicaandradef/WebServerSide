<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users(){

        $cesaeInfo = $this-> getCesaeInfo();
        $allUsers = $this-> getUsers();

        $superUser = DB::table('users') ->where('name', 'luis') -> first();

       // dd($superUsers);

       // para fazer debug manual: dd($cesaeInfo);
        return view('users.all_users', compact('cesaeInfo', 'allUsers', 'superUser'));
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
        //para ir buscar os users da base de dados;
        //fazendo com DC query builder:

        $users = DB::table('users')
                //->where('name', 'luis') para selecionar um usuario especifico
                ->get();

                //faz o debug para confirmar:
                //dd($users); consigo ver o array de objetos

                //inserir dados manualmente
     /*   $users = [
            ['id' => 1, 'name' => 'Jessica', 'telefone' =>'9154874521'],
            ['id' => 2,  'name' => 'Luis', 'telefone' =>'9154874521'],
            ['id' => 3,  'name' =>'Miguel', 'telefone' =>'9154874521'],
            ['id' => 4,  'name' =>'Ana', 'telefone' =>'9154874521'],
        ];*/

     //  $users = User::all(); //usando MODELS

        return $users;
    }

    public function viewUser($id){

        $user = DB::table('users') -> where('id', $id) -> first();

        return view('users.user_view', compact('user'));

    }

    public function deleteUser($id){
        DB::table('tasks') -> where('user_id', $id) -> delete();
       DB::table('users') -> where('id', $id) -> delete();

       return redirect() -> back();
        //começa a dar erro para apagar porque tem usuario com tasks associadas; então tenho que primeiro apagar uma tarefa e só depois o usuário
        //SE tiver delete on cascade apaga os 2;
    }
    public function addUser(){

        //do lado esquero a coluna, e do lado direito os dados que vamos enviar

        DB::table('users')
        ->updateOrInsert( //primeiro faz a validação, se existir aquele parametro, faz o update, se nao existir faz um novo registo
            [
                'email' => 'jessicaaaa@gmail',
            ],
            [
            'name' => 'jessicaTeste',
            'password' => 123654
            ]);

        //para inserir vários dados na base de dados!

         /* [ ['name' =>  'marioles', 'email' => 'mariole4s@gmail','password' => 65478],
          ['name' =>  'jessica', 'email' => 'mariole4s@gmail','password' => 65478],
          ['name' =>  'sarinha', 'email' => 'mariole4s@gmail','password' => 65478],
          ['name' =>  'mainha', 'email' => 'mariole4s@gmail','password' => 65478],
        ['name' =>  'caio', 'email' => 'mariole4s@gmail','password' => 65478]] */
    }

    public function createUser(){

        return view('users.create_users'); //vai retornar a view com a pagina e com o formulario
    }

   public function storeUser(Request $request){

   //dd($request-> all()); //Acede a tudo que vem do request!


        $request->validate([
            'name' => 'string|max:50',
            'email' => 'required|email|unique:users', //ou seja, tem que ser unico na tabela do users
            'password' => 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request -> password),
        ]);

        return redirect() -> route('users.all') ->with('message', 'Contacto adicionado com sucesso');

    }

}
