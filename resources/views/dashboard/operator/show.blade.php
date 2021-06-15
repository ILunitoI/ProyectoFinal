@extends('dashboard.master')
@section('content')
    <form action="{{route('admin.store')}}" method="POST">
        @csrf 
        <div class="form-group">
          <label for="Name">Nombre</label>
          <input readonly type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{ $operator->name }}">
        </div>
        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input readonly type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" value="{{ $operator->last_name }}">
        </div>
        <div class="form-group">
          <label for="Email">Correo</label>
          <input readonly type="text" class="form-control" name="email" id="email" placeholder="Correo" value="{{  $operator->email }}">
        </div>
        <div class="form-group">
          <label for="User">Usuario</label>
          <input readonly type="text" class="form-control" name="user" id="user" placeholder="Usuario" value="{{ $operator->user }}">
        </div>
        <div class="form-group">
          <label for="Password">Contraseña</label>
          <input readonly type="text" class="form-control" name="password" id="password" placeholder="Contraseña" value="{{ $operator->password}}">
        </div>
      </form>
@endsection
