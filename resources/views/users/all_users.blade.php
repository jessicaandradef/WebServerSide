@extends('layouts.fe')

@section('title')
<title>Users</title>
@endsection

@section('content')
    <h2>Olá, eu sou o utilizador!</h2>

    <h3>{{$cesaeInfo['name']}}, {{$cesaeInfo['address']}}</h3>

    <h3>Clique <a href="{{route('home.index')}}">aqui</a> para voltar para a pagina inicial.</h3>

    <h2>Meu super user: {{$superUser -> name}}, {{$superUser -> email}}</h2> <!--só vai retornar 01 linha , por isso que não preciso fazer foreach-->
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
                <th scope="row">{{$user ->id}}</th>  <!-- é assim que acedo ao objeto -->
                <td>{{$user ->name}} </td>
                <td>{{$user -> email}} </td>
            </tr>
           @endforeach

        </tbody>
      </table>

@endsection
