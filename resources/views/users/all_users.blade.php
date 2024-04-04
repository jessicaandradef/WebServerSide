@extends('layouts.fe')

@section('title')
<title>Users</title>
@endsection

@section('content')
    <h2>Olá, eu sou o utilizador!</h2>
    <h3>Clique <a href="{{route('home.index')}}">aqui</a> para voltar para a pagina inicial.</h3>
@endsection
