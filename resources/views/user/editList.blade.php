@extends('components.modals')

@extends('layouts.root')

@section('title') Gestion de usuarios @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/modules/user/createUser.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-users"></i> Gestion de usuarios</h1>
  </div>
  
  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.show',$user)}}">Ver</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar informacion</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Actualizacion de informacion del usuario</div>
    <div class="card-body box-form">
    <img src="{{asset('image/imageFondos/undraw/add_dataprivate.svg')}}" alt="fondo add user">
    <form action="{{route('users.updateAll',$user)}}" method="post" id="formUser">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="cedula"class="@if ($errors->has('cedula')) text-danger @else text-secondary @endif label-description">Cedula</label>
          <input type="number" name="cedula" class="form-control @if ($errors->has('cedula')) border-danger @endif num" id="cedula" aria-describedby="cedula-description" autocomplete="off" value="{{old('cedula',$user->cedula)}}" maxlength="10">
          <small id="cedula-description" class="form-text @error('cedula')text-danger @enderror">@error('cedula') {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="nombres"class="@if ($errors->has('nombres')) text-danger @else text-secondary @endif label-description">Nombres</label>
          <input type="text" name="nombres" class="form-control @if ($errors->has('nombres')) border-danger @endif text" id="nombres" aria-describedby="nombres-description" autocomplete="off" value="{{old('nombres',$user->nombres)}}" maxlength="50">
          <small id="nombres-description" class="form-text @error('nombres')text-danger @enderror">@error('nombres') {{$message}} @enderror</small>
        </div>
        
        <div class="form-group">
          <label for="apellidos"class="@if ($errors->has('apellidos')) text-danger @else text-secondary @endif label-description">Apellidos</label>
          <input type="text" name="apellidos" class="form-control @if ($errors->has('apellidos')) border-danger @endif text" id="apellidos" aria-describedby="apellidos-description" autocomplete="off" value="{{old('apellidos',$user->apellidos)}}" maxlength="50">
          <small id="apellidos-description" class="form-text @error('apellidos')text-danger @enderror">@error('apellidos') {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="cargo"class="@if ($errors->has('cargo')) text-danger @else text-secondary @endif label-description">Cargo</label>
          <input type="text" name="cargo" class="form-control @if ($errors->has('cargo')) border-danger @endif text" id="cargo" aria-describedby="cargo-description" autocomplete="off" value="{{old('cargo',$user->cargo)}}" maxlength="191">
          <small id="cargo-description" class="form-text @error('cargo')text-danger @enderror">@error('cargo') {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="nombre de usuario"class="@if ($errors->has('username')) text-danger @else text-secondary @endif label-description">Nombre de usuario *</label>
          <input type="text" name="username" class="form-control required @if ($errors->has('username')) border-danger @endif" id="nombre de usuario" aria-describedby="username-description" autocomplete="off" value="{{old('username',$user->username)}}" maxlength="25">
          <small id="username-description" class="form-text @error('username')text-danger @enderror">@error('username') {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="email" class="@if ($errors->has('email')) text-danger @else text-secondary @endif label-description">Correo *</label>
          <input type="email" name="email" class="form-control required @if ($errors->has('email')) border-danger @endif" id="email" aria-describedby="email-description" autocomplete="off" value="{{old('email',$user->email)}}" maxlength="100">
          <small id="email-description" class="form-text @error('email') text-danger @enderror">@error('email'){{$message}}@enderror</small>
        </div>

        <div class="form-group">
          <label for="password" class="@if ($errors->has('password')) text-danger @else text-secondary @endif label-description">Contraseña</label>
          <input type="password" name="password" class="form-control @if ($errors->has('password')) border-danger @endif" id="password" value="{{old('password')}}" placeholder="min 8 | max 15 caracteres" maxlength="15">
          <small id="password-description" class="form-text @error('password') text-danger @enderror">@error('password'){{$message}}@enderror</small>
        </div>

        <div class="form-group">
          <label class="@if ($errors->has('estado')) text-danger @else text-secondary @endif label-description">Estado *</label>
          <div>
            <div class="form-check form-check-inline" id="estado-check">
              <input class="form-check-input" type="radio" name="estado" id="status_active" value="1" @if(old('estado') == "1") checked @elseif("$user->status" == old('estado','1')) checked @endif>
              <label class="form-check-label check-default" for="status_active">Activo</label>
            </div>
            <div class="form-check form-check-inline" id="estado-check">
              <input class="form-check-input" type="radio" name="estado" id="status_inactive" value="0" @if(old('estado') == "0") checked @elseif("$user->status" == old('estado','0')) checked @endif>
              <label class="form-check-label check-default" for="status_inactive">Inactivo</label>
            </div>
          </div>
          <div class="mt-2 text-secondary label-description" id="uncheckEstado" role="button"><i class="far fa-check-square" ></i> Desmarcar</div>
          @error('estado')
          <small id="estado-description" class="form-text text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
          <label class="text-secondary label-description">Roles</label>
          <div>
            @foreach ($roles as $key => $rol)
            <div class="form-check form-check-inline" id="rol-check">
              <input class="form-check-input" type="radio" name="rol" id="id-{{$rol}}" value="{{$rol}}" @if ($user->hasRole($rol)) checked @endif>
              <label class="form-check-label check-default" for="id-{{$rol}}">{{$rol}}</label>
          </div>
          @endforeach
          </div>
          <div class="mt-2 text-secondary label-description" id="uncheckRol" role="button"><i class="far fa-check-square" ></i> Desmarcar</div>
        </div>

        <br><hr>
        <button type="submit" class="btn btn-success mx-3">Actualizar</button>
      <a href="{{route('users.show',$user)}}" class="btn btn-light">Volver</a>
      </form>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset('js/config/validations.js')}}"></script>
<script src="{{asset('js/validations/user/validation.user.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/validations/user/validation.user.js
  sendDataFormUser();
  removeStyleError();
  eventClickUnCheck('uncheckEstado','estado');
  eventClickUnCheck('uncheckRol','rol');
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection