@extends('layouts.fe')

@section('title')
<title>Login</title>
@endsection

@section('content')

<form method="POST" action="{{route('login')}}">
    @csrf

    <div class="form-group mb-2">
      <label for="exampleInputEmail1">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Fazer login</button>

    <a href="{{route('password.request')}}">Esqueceu-se da password?</a>

  </form>

@endsection
