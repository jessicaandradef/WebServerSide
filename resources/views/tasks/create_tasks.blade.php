
@extends('layouts.fe')

@section('content')

<form method="POST" action="{{route('store.task')}}">    <!-- rota para onde será enviada os dados -->
    @csrf   <!-- helper de validação do Laravel-->

    <div class="form-group">
        <label for="nome">Nome da tarefa:</label>
        <input type="text" class="form-control" name="name" value="" id="nome"  placeholder="Enter task">
      </div>

    <div class="form-group">
      <label for="description">Descrição da tarefa:</label>
      <input type="text" class="form-control" name="description" value="" id="description"  placeholder="Enter description">
    </div>

    <div class="form-group">
        <label for="user_id">User ID:</label>
        <input type="text" class="form-control" name="user_id" value="" id="email"  placeholder="Enter description">
      </div>


    <button type="submit" class="btn btn-info my-3">Add Task</button>

</form>

@endsection

