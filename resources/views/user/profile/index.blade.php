@extends('components.modalimage')
@extends('components.modals')

@extends('layouts.root')

@section('title') Perfil @endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/modules/perfil/perfil.css')}}">

@endsection

@section('barra-menu')
  @include('layouts.partials..perfil.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl btn-white">
    <h1 class="title-module"><i class="fas fa-user"></i> Perfil</h1>
  </div>
  
  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
    </ol>
  </nav>

<section class="box-perfil-user">
    <article class="box-foto">
      <strong>Foto de perfil</strong>
      <div>
        <picture class="ac-cambiar-foto" data-toggle="modal" data-target="#modalImage"><i class="fas fa-camera-retro ac-cambiar-foto"></i>
        </picture>
      <img src="@if($user->avatar){{asset($user->avatar)}}@else{{asset('image/perfil/user_man.svg')}}@endif" alt="{{$user->nombres}}" class="" data-toggle="modal" data-target="#modalImage" loaded>
      </div>
        <p class="ac-cambiar-foto">Cambiar foto de perfil</p>
        <i>La imagen que valla subir no debe pesar mas de <b>2MB</b>, extensiones permitidas: <b>JPG, JPEG o PNG</b></i>
    </article>

    <article class="box-info-datos">
      <h3>Tu informaci&oacute;n</h3>
    <form action="{{route('user.profiles.update',$user->id)}}" method="post" id="form-perfil">
      @csrf
      @method('PUT')
        <div>
          <label for="nombres" class="@error('nombres') text-danger @enderror">Nombres</label>
        <input type="text" name="nombres" id="nombres" class="@error('nombres') border-danger @enderror text" autocomplete="off" maxlength="50" value="{{old('nombres',$user->nombres)}}">
          <small class="@error('nombres') text-danger @enderror">@error('nombres') {{$message}} @enderror</small>
        </div>
        <div>
          <label for="apellidos" class="@error('apellidos') text-danger @enderror">Apellidos</label>
          <input type="text" name="apellidos" id="apellidos" class="@error('apellidos') border-danger @enderror text" autocomplete="off" maxlength="50" value="{{old('apellidos',$user->apellidos)}}">
          <small class="@error('apellidos') text-danger @enderror">@error('apellidos') {{$message}} @enderror</small>
        </div>
        <div>
          <label for="nombre de usuario" class="@error('username') text-danger @enderror">Nombre de usuario *</label>
          <input type="text" name="username" id="nombre de usuario" class="@error('username') border-danger @enderror required" autocomplete="off" maxlength="25" required value="{{old('username',$user->username)}}" placeholder="max 15 caracteres">
          <small class="@error('username') text-danger @enderror">@error('username') {{$message}} @enderror</small>
        </div>
        <div>
          <label for="correo" class="@error('email') text-danger @enderror">Correo *</label>
        <input type="email" name="email" id="correo" class="@error('email') border-danger @enderror required" autocomplete="off" maxlength="100" required value="{{old('email',$user->email)}}">
          <small class="@error('email') text-danger @enderror">@error('email') {{$message}} @enderror</small>
        </div>
        <div>
          <label for="cedula" class="@error('cedula') text-danger @enderror">Cedula</label>
          <input type="number" name="cedula" id="cedula" class="@error('cedula') border-danger @enderror num" autocomplete="off" maxlength="10" minlength="10" value="{{old('cedula',$user->cedula)}}">
          <small class="@error('cedula') text-danger @enderror">@error('cedula') {{$message}} @enderror</small>
        </div>
        <div>
          <label for="cargo" class="@error('cargo') text-danger @enderror">Cargo</label>
          <input type="text" name="cargo" id="cargo" class="@error('cargo') border-danger @enderror" autocomplete="off" maxlength="100" value="{{old('cargo',$user->cargo)}}">
          <small class="@error('cargo') text-danger @enderror">@error('cargo') {{$message}} @enderror</small>
        </div>
        <div>
          <button class="btn btn-success"><small>Guardar cambios</small></button>
        </div>
      </form>
    </article>
    {{-- formulario de imagen --}}
    <form action="{{route('user.profiles.updateImage')}}" method="post" enctype="multipart/form-data" id="formImage">
      @csrf
      <input type="file" name="imagen" hidden value="{{old('imagen')}}" accept="image/*" id="inputFile">
    </form>
    {{-- formulario remove image --}}
    <form action="{{route('user.profiles.removeImage')}}" method="post" id="formdeleteImage">
    @csrf
  </form>
  </section>
@endsection

@section('js')
<script src="{{asset('js/config/validations.js')}}"></script>
<script src="{{asset('js/validations/profile/perfilUsuario.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/validations/profile/perfilUsuario.js
  eventSendUpdateDeleteImage();
  removeStyleError();
  sendDataFormUpdatedUser();
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection

