<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function tasks(){     //public porque retorna uma view, essa é a função principal
        $allTasks = $this -> getTasks();

        return view('tasks.all-tasks', compact('allTasks'));
    }

    protected function getTasks(){
        $tasks = DB::table('tasks')
                ->get();

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

}
