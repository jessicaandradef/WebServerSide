<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function tasks(){     //public porque retorna uma view, essa é a função principal
        $allTasks = $this -> getTasks();

        return view('tasks.all-tasks', compact('allTasks')); //carrega a view com allTasks lá dentro
    }

    protected function getTasks(){
        $tasks = DB::table('tasks')
                ->select('tasks.*', 'users.name as usname')
                ->join('users', 'users.id', '=', 'tasks.user_id')    //como fazer a junção de duas tabelas (tasks + user). pegamos a tabela de tasks e fazer innerJoin
                                //coluna do ID!
                ->get();

              // dd($tasks);

                return $tasks;
    }

    public function addTasks() {

        DB::table('tasks')
        ->insert([
            'id' => 6,
            'name' => "fazer compras",
            'description' => 'fazer as compras da semana',
            'user_id' => 9
        ]);
    }

    public function createTask(){

        return view('tasks.create_tasks');
    }

    public function storeTask(Request $request){

        //dd($request->all());

        $request->validate([
            'name' => 'string|max:50',
            'description' => 'required|string', //ou seja, tem que ser unico na tabela do users
            'user_id' => 'required|unique:users'
        ]);

        DB::table('tasks')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect() -> route('tasks.all') ->with('message', 'Tarefa adicionada com sucesso');

    }

}
