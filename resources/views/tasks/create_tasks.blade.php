
@extends('layouts.fe')

@section('content')

<form method="POST" action="{{route('store.task')}}">    <!-- rota para onde será enviada os dados -->
    @csrf   <!-- helper de validação do Laravel-->

    <div class="form-group">
        <label for="nome">Nome da tarefa:</label>
        <input type="text" class="form-control" name="name" value="" id="nome"  placeholder="Enter task">
      </div>
      @error('user_id')
      Nome invalido!
    @enderror

    <div class="form-group">
      <label for="description">Descrição da tarefa:</label>
      <input type="text" class="form-control" name="description" value="" id="description"  placeholder="Enter description">
    </div>
    @error('user_id')
    Descrição invalida!
@enderror

    <div class="form-group">

    <div class=" d-flex column mt-3">
        <label >
        Nome Usuário: </label>
            <select name="user_id" class="dropdown rounded-2 mx-2">
                        @foreach ($allUsers as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
            </select>
    </div>

    </div>
    @error('user_id')
        User_id invalido!
    @enderror

    <button type="submit" class="btn btn-info my-3">Add Task</button>

</form>

@endsection

