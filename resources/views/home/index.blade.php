@extends('layouts.fe')
@section('title')
<title>Eu sou o titulo</title>
@endsection

@section('content')
 <h4>hello devvvvv!</h4>
    <ul>
        <a href="{{ route('home.welcome') }}">
            <li>Welcome</li>
        </a>
        <a href="{{ route('home.hello')}}">
            <li>Hello</li>
        </a>
        <a href="{{ route('users.all')}}">
            <li>User</li>
        </a>
        <a href="{{route('tasks.all')}}"><li>Tasks</li></a>
    </ul>
    <img class="test-img" src="{{asset('img/img1.webp')}}" alt="foto da mesa">
@endsection
