@extends('layouts.fe')

@section('content')

<form method="POST" action="{{route('store.user')}}">    <!-- rota para onde será enviada os dados -->
    @csrf   <!-- helper de validação do Laravel-->

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="name" value="" id="nome"  placeholder="Enter email">
      </div>

    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" value="" id="email"  placeholder="Enter email" @error('email')
      is-invalid @enderror >

      @error('email')
        <div class="invalid-feedback">
            Pf, coloque um email válido
        </div>
      @enderror

    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" value="" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-info my-3">Add User</button>


</form>

@endsection
