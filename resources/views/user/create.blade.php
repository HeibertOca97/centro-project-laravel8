@extends('components.modals',['modal'=>''])

@extends('layouts.app')

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
    @can('user.index')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
    @endcan
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Registro de usuario</div>
    <div class="card-body box-style-default">

    <form action="{{route('users.store')}}" method="post" id="formUser">
        @csrf

        <div class="form-group">
          <label for="usuario"class="@if ($errors->has('username')) text-danger @else text-secondary @endif label-description">Nombre de usuario *</label>
          <input type="text" name="username" class="form-control required @if ($errors->has('username')) border-danger @endif" id="usuario" aria-describedby="username-description" autocomplete="off" value="{{old('username')}}" maxlength="25" data-name="nombre de usuario">
          <small id="username-description" class="form-text @error('username') text-danger @enderror">@error('username') {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="email" class="@if ($errors->has('email')) text-danger @else text-secondary @endif label-description">Correo *</label>
          <input type="email" name="email" class="form-control required @if ($errors->has('email')) border-danger @endif" id="email" aria-describedby="email-description" autocomplete="off" value="{{old('email')}}" maxlength="100" data-name="email">
          <small id="email-description" class="form-text @error('email') text-danger @enderror">@error('email'){{$message}}@enderror</small>
        </div>

        <div class="form-group">
          <label for="password" class="@if ($errors->has('password')) text-danger @else text-secondary @endif label-description">Contraseña *</label>
          <input type="password" name="password" class="form-control required @if ($errors->has('password')) border-danger @endif" id="password" value="{{old('password')}}" placeholder="min 8 | max 15 caracteres" maxlength="15" data-name="contraseña">
          <small id="password-description" class="form-text @error('password') text-danger @enderror">@error('password'){{$message}}@enderror</small>
        </div>

        <div class="form-group">
          <label class="@if ($errors->has('estado')) text-danger @else text-secondary @endif label-description">Estado *</label>
          <div>
            <div class="form-check form-check-inline" id="estado-check">
              <input class="form-check-input" type="radio" name="estado" id="status_active" value="1" @if (old('estado') == "1") checked @endif>
              <label class="form-check-label check-default" for="status_active">Activo</label>
            </div>
            <div class="form-check form-check-inline" id="estado-check">
              <input class="form-check-input" type="radio" name="estado" id="status_inactive" value="0" @if (old('estado') == "0") checked @endif>
              <label class="form-check-label check-default" for="status_inactive">Inactivo</label>
            </div>
            <div class="mt-2 text-secondary label-description" id="uncheckEstado" role="button"><i class="far fa-check-square" ></i> Desmarcar</div>
          </div>
          @error('estado')
          <small id="estado-description" class="form-text text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
          <label class="text-secondary label-description">Roles</label>
          <div>
            @foreach ($roles as $key => $rol)
            <div class="form-check form-check-inline" id="rol-check">
              <input class="form-check-input" type="radio" name="rol" id="id-{{$rol}}" value="{{$rol}}" @if (old('rol') == $rol) checked @endif>
              <label class="form-check-label check-default" for="id-{{$rol}}">{{$rol}}</label>
          </div>
          @endforeach
          </div>
          <div class="mt-2 text-secondary label-description" id="uncheckRol" role="button"><i class="far fa-check-square" ></i> Desmarcar</div>
        </div>

        <br><hr>
        <button type="submit" class="btn btn-success mx-3">Crear</button>
        <a href="{{route('users.index')}}" class="btn btn-light">Volver</a>
      </form>

      <img src="{{asset('image/imageFondos/undraw/add_user.svg')}}" alt="CELID - add user">
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset('js/validations/user/validation.user.js')}}"></script>
<script src="{{asset('js/config/validations.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/config/validations.js
  removeStyleErrorFormatOne('input');
  //js/validations/user/validation.user.js
  sendDataFormUser();
  eventClickUnCheck('uncheckEstado','estado');
  eventClickUnCheck('uncheckRol','rol');
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection

