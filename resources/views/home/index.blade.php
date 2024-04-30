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
            <li>All Users</li>
        </a>
        <a href="{{route('tasks.all')}}">
            <li>Tasks</li>
        </a>
        <a href="{{ route('gifts.all') }}">
            <li>Gifts</li>
        </a>
    </ul>

    <img class="test-img" src="{{asset('img/img1.webp')}}" alt="foto da mesa">

    <hr>

    <h5>A soma é {{$sum}}</h5>
    <h5>{{$helloVar}}</h5>

    <hr>

    <h5>{{$infoCesae['name']}}, </h5>
    <h5>{{$infoCesae['address']}}, </h5>
    <h5>{{$infoCesae['email']}} </h5>

@endsection
