@extends('layouts.fe')

@section('title')
<title>Users</title>
@endsection

@section('content')
    <h2>Olá, eu sou o utilizador!</h2>

    <h3>{{$cesaeInfo['name']}}, {{$cesaeInfo['address']}}</h3>

    <h3>Clique <a href="{{route('home.index')}}">aqui</a> para voltar para a pagina inicial.</h3>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
          </tr>
        </thead>
        <tbody>


          @foreach ($allUsers as $user)
            <tr>
                <th scope="row">{{$user['id']}}</th>
                <td>{{$user['name']}} </td>
                <td>{{$user['telefone']}} </td>
            </tr>
           @endforeach
        </tbody>
      </table>

@endsection
