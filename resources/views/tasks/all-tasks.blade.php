
@extends('layouts.fe')

@section('content')
    <h2>Tarefas do dia</h2>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID da tarefa:</th>
            <th scope="col">Tarefa: </th>
            <th scope="col">Descrição: </th>
            <th scope="col">Responsavel pela tarefa: </th>

          </tr>
        </thead>
        <tbody>

          @foreach ($allTasks as $tasks)
            <tr>
                <th scope="row">{{$tasks ->id}}</th>  <!-- é assim que acedo ao objeto -->
                <td>{{$tasks ->name}} </td>
                <td>{{$tasks -> description}} </td>
                <td>{{$tasks -> usname}}</td>
            </tr>
           @endforeach

        </tbody>
      </table>

@endsection
