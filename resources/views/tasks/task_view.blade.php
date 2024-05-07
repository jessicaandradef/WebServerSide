@extends('layouts.fe')

@section('content')

<form method="POST" action="{{route('store.task')}}">    <!-- rota para onde será enviada os dados -->
    @csrf   <!-- helper de validação do Laravel-->

    <input type="hidden" name="id" value="{{$task->id}}">

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control"  name="name" value="{{$task->name}}" id="name"  placeholder="{{$task->name}}">
            @error('description')
                Nome inválida
            @enderror
    </div>

    <div class="form-group">
        <label for="nome">Description:</label>
        <input type="text" class="form-control"  name="description" value="{{$task->description}}" id="description"  placeholder="{{$task->description}}">
            @error('description')
                Descrição inválida
            @enderror
    </div>

    <div class="form-group">
        <div class=" d-flex column mt-3">
            <label >
            Nome Usuário: </label>
                <select name="user_id" class="dropdown rounded-2 mx-2">
                            @foreach ($allUsers as $user)
                                <option value="{{$user->id}}" @if ($userInfo->id == $user->id) selected @endif> {{$user->name}}</option>
                            @endforeach
                </select>
        </div>


    <button type="submit" class="btn btn-info my-3">Update Task</button>


</form>

<a href="{{route('home.index')}}">Volte para a pagina HOME</a>

@endsection
