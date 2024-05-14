@extends('layouts.fe')

@section('content')

<p>Olá, {{Auth::user() -> name}}</p>

@if (Auth::user()->role == \App\Models\User::TYPE_ADMIN)

<div class="alert alert-success">
    <p>és admin, tens super poderes</p>
</div>


@endif

@endsection
