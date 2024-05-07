<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
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

    public function viewTask($id){

        $allUsers = User::get()->all();
        $task = DB::table('tasks') -> where('id', $id) -> first();
        $userInfo = DB::table('users') -> where('id', $task->user_id) -> first();

      //  dd($userInfo);

        return view('tasks.task_view', compact('task', 'allUsers', 'userInfo'));

    }

    public function createTask(){
        $allUsers = User::get()->all(); //posso fazer só User::all();
        // dd($allUsers);
         return view('tasks.create_tasks', compact('allUsers'));
    }


    public function storeTask(Request $request){ //o request é a classe que está definida para receber os dados;

        //dd($request->all());

        if(isset($request->id)){

            $request->validate([
                'name' => 'string|max:50',
                'description' => 'string|max:50',
                'user_id' => 'required|exists:users,id'

            ]);

            Task::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,   //lado esquerdo da base de dados, direito do código
                'user_id' => $request->user_id,
            ]);

            return redirect() -> route('tasks.all') ->with('message', 'Task ' .$request->name .' atualizado com sucesso');

        } else {
             $request->validate([
            'name' => 'string|max:50',
            'description' => 'required|string', //ou seja, tem que ser unico na tabela do users
            'user_id' => 'required|exists:users,id' //'user_id' é como está na tabela de TASKS,  exists:users,id -> tabela de USERS, ID é como está na tabela de users, e tenho que verificar SE EXISTS na tabela de usuario;
            //'mission_id' => 'required|exists:missions,id', missions is the table name and id is the referenced column name on mission table ''mission_id' => 'required|exists:table_name,referenced_column'
        ]);

       //dd($request-> all());

        DB::table('tasks')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect() -> route('tasks.all') ->with('message', 'Tarefa adicionada com sucesso');
        }

    }

}
