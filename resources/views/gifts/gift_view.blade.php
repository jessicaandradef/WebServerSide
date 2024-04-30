@extends('layouts.fe')

@section('content')


<h3>Nome do presente: {{$gift -> name}}</h3>
<h3>Descrição do presente: {{$gift -> description}} 😍</h3>
<h3>Valor gasto no presente: {{$gift -> valor_gasto}} euros</h3>

<a href="{{route('home.index')}}">Volte para a pagina HOME</a>


@endsection
