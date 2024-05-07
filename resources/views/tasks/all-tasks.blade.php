
@extends('layouts.fe')

@section('content')

    <h2>Tarefas do dia</h2>

    @if (@session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID da tarefa:</th>
            <th scope="col">Tarefa: </th>
            <th scope="col">Descrição: </th>
            <th scope="col">Data: </th>
            <th scope="col">Responsavel pela tarefa: </th>
            <th scope="col">Alterar tarefa: </th>
          </tr>
        </thead>
        <tbody>

          @foreach ($allTasks as $tasks)

            <tr>
                <th scope="row">{{$tasks ->id}}</th>  <!-- é assim que acedo ao objeto -->
                <td>{{$tasks ->name}} </td>
                <td>{{$tasks -> description}} </td>
                <td>{{$tasks -> due_at}}</td>
                <td>{{$tasks -> usname}}</td>
                <td><a href="{{route('task.view', $tasks -> id)}}" class="btn btn-info">Update Task</a></td>
            </tr>

           @endforeach

        </tbody>
      </table>

      <a type="submit" href="{{route('create.task')}}" class="btn btn-warning">Add Task</a>


@endsection
