@extends('components.modals')

@extends('layouts.root')

@section('title') Gestion de usuarios @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/components/user/createUser.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl btn-white">
    <h1 class="title-module">Editar usuario</h1>
  </div>
  
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuario</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Actualizacion de usuario</div>
    <div class="card-body box-form">
    <img src="{{asset('image/imageFondos/undraw/add_user.svg')}}" alt="fondo add user">
    <form action="{{route('users.update',$user)}}" method="post" id="formUser">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="username"class="@if ($errors->has('username')) text-danger @else text-secondary @endif label-description">Nombre de usuario *</label>
          <input type="text" name="username" class="form-control required @if ($errors->has('username')) border-danger @endif" id="username" aria-describedby="username-description" autocomplete="off" value="{{old('username',$user->username)}}">
          <small id="username-description" class="form-text @error('username')text-danger @enderror">@error('username') {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="email" class="@if ($errors->has('email')) text-danger @else text-secondary @endif label-description">Correo *</label>
          <input type="email" name="email" class="form-control required @if ($errors->has('email')) border-danger @endif" id="email" aria-describedby="email-description" autocomplete="off" value="{{old('email',$user->email)}}">
          <small id="email-description" class="form-text @error('email') text-danger @enderror">@error('email'){{$message}}@enderror</small>
        </div>

        <div class="form-group">
          <label for="password" class="@if ($errors->has('password')) text-danger @else text-secondary @endif label-description">Contraseña</label>
          <input type="password" name="password" class="form-control @if ($errors->has('password')) border-danger @endif" id="password" value="{{old('password')}}">
          <small id="password-description" class="form-text @error('password') text-danger @enderror">@error('password'){{$message}}@enderror</small>
        </div>

        <div class="form-group">
          <label class="@if ($errors->has('estado')) text-danger @else text-secondary @endif label-description">Estado *</label>
          <div>
            <div class="form-check form-check-inline" id="estado-check">
              <input class="form-check-input" type="radio" name="status" id="status_active" value="{{old('estado','1')}}" @if($user->status == 1) checked @endif>
              <label class="form-check-label check-default" for="status_active">Activo</label>
            </div>
            <div class="form-check form-check-inline" id="estado-check">
              <input class="form-check-input" type="radio" name="status" id="status_inactive" value="{{old('estado','0')}}" @if($user->status == 0) checked @endif>
              <label class="form-check-label check-default" for="status_inactive">Inactivo</label>
            </div>
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
              <input class="form-check-input" type="radio" name="rol" id="id-{{$rol}}" value="{{old('rol',$rol)}}" @if ($user->hasRole($rol)) checked @endif>
              <label class="form-check-label check-default" for="id-{{$rol}}">{{$rol}}</label>
          </div>
          @endforeach
          </div>
        </div>

        <br><hr>
        <button type="submit" class="btn btn-success">Actualizar</button>
      <a href="{{route('users.index')}}" class="btn btn-light">Volver</a>
      </form>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset('js/components/user/validation.user.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/user/validation.user.js
  removeStyleError();
  sendDataFormUser();
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection