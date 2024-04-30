@extends('layouts.fe')

@section('content')

<h2>Prendas: </h2>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Nome da prenda:</th>
            <th scope="col">Nome do user: </th>
            <th scope="col">Ver detalhes: </th>
            <th scope="col">Apagar Prenda: </th>


          </tr>
        </thead>
        <tbody>

            @foreach ($allGifts as $gifts)
            <tr>
                <th scope="row">{{$gifts ->name}}</th>  <!-- é assim que acedo ao objeto -->
                <td>{{$gifts ->usname}} </td>

                <td><a href="{{route('gifts.view', $gifts -> id)}}" class="btn btn-info">Ver</a></td>
                <td><a href="{{route('gifts.delete', $gifts -> id)}}" class="btn btn-info">Apagar</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
