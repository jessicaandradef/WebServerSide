@extends('layouts.fe')

@section('content')

<form method="POST" action="{{route('store.user')}}" enctype="multipart/form-data">    <!-- rota para onde será enviada os dados -->
    @csrf   <!-- helper de validação do Laravel-->

    <input type="hidden" name="id" value="{{$user->id}}">

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control"  name="name" value="{{$user->name}}" id="nome"  placeholder="{{$user->name}}">

    </div>

    <div class="form-group">
      <label for="email">Email address:</label>
      <input readonly type="email" class="form-control"  name="email" value="{{$user->email}}" id="email"  placeholder="{{$user->email}}">

      @error('email')
      is-invalid @enderror

      @error('email')
        <div class="invalid-feedback">
            Pf, coloque um email válido
        </div>
      @enderror

    </div>

    <div class="form-group">
        <label for="nome">Morada:</label>
        <input type="text" class="form-control"  name="address" value="{{$user->address}}" id="nome"  placeholder="Enter morada">
        @error('cpostal')
            erro de morada
        @enderror
    </div>

    <div class="form-group">
        <label for="nome">Código Postal:</label>
        <input type="text" class="form-control"  name="cpostal" value="{{$user->cpostal}}" id="nome"  placeholder="Enter C. POSTAL">
        @error('cpostal')
            erro de codigo postal
        @enderror
    </div>

    <div class="mt-2">
        <input type="file" name="photo" accept="image/*" id="">
    </div>

    <button type="submit" class="btn btn-info my-3">Update User</button>

</form>

<a href="{{route('home.index')}}">Volte para a pagina HOME</a>

@endsection
