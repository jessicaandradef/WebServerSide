<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceCollection;

class TaskAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : TaskResourceCollection
    {
        return new TaskResourceCollection(resource: Task::paginate());
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //o request é o conj de dados que vem do pedido;

        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'user_id' =>'required',
        ]);

        $task = Task::create($request->all());

        return response()->json('task criada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        return new TaskResource( $task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task = $task->update($request->all());

        return response()->json('task atualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete($task);

        return response()->json('task apagada');
    }
}
