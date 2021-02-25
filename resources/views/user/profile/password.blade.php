@extends('components.modals',['modal'=>''])

@extends('layouts.app')

@section('title') Perfil @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/modules/perfil/cambioContraseña.css')}}">
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
      <li class="breadcrumb-item active" aria-current="page">Cambio contraseña</li>
    </ol>
  </nav>

    <section class="box-perfil-clave container">  
      <img src="{{asset('image/imageFondos/undraw/add_security.svg')}}" alt="CELID - add_security">
    <form action="{{route('user.profiles.update.password',Auth::user()->id)}}" method="post" id="fr-Password">
        @csrf
        @method('PUT')
        <div>
          <div class="title-input-pass">
            <label for="contraseñaActual" class="@if (session('status_error')) text-danger @endif">Contraseña actual *</label> <i class="fas fa-eye ico-eyes"></i>
          </div>
          <input type="password" name="contraseñaActual"  id="contraseñaActual" autocomplete="off" maxLength="15" @if (session('password')) value="{{old('contraseñaActual',session('password'))}}" @else value="{{old('contraseñaActual')}}" @endif class="@if (session('status_error')) border-danger @endif inputpass required" placeholder="min 8 | max 15 caracteres" data-name="contraseña actual">
          <small class="@if (session('status_error')) text-danger @endif">@if (session('status_error')) {{session('status_error')}} @endif</small>
        </div>
        <div>
          <div class="title-input-pass">
            <label for="contraseñaNueva" class="@error('contraseñaNueva') text-danger @enderror">Contraseña nueva *</label><i class="fas fa-eye ico-eyes"></i>
          </div>
          <input type="password" name="contraseñaNueva" class="@error('contraseñaNueva') border-danger @enderror inputpass required" id="contraseñaNueva"autocomplete="off" maxLength="15" value="{{old('contraseñaNueva')}}" placeholder="min 8 | max 15 caracteres" data-name="contraseña nueva">
          <small class="@error('contraseñaNueva') text-danger @enderror">@error('contraseñaNueva') {{$message}} @enderror</small>
        </div>
        <div>
          <div class="title-input-pass">
            <label for="contraseñaConfirmacion" class="@error('contraseñaConfirmacion') text-danger @enderror">Confirmar nueva contraseña *</label><i class="fas fa-eye ico-eyes"></i>
          </div>
          <input type="password" name="contraseñaConfirmacion" class="@error('contraseñaConfirmacion') border-danger @enderror inputpass required" id="contraseñaConfirmacion" autocomplete="off" maxLength="15" value="{{old('contraseñaConfirmacion')}}" placeholder="min 8 | max 15 caracteres" data-name="contraseña de confirmacion">
        <small class="@error('contraseñaConfirmacion') text-danger @enderror">@error('contraseñaConfirmacion') {{$message}} @enderror</small>
        </div>
        <main>
          <button class="btn btn-success"><small>Cambiar contraseña</small></button>
        </main>
      </form>
  </section>

@endsection

@section('js')
<script src="{{asset('js/config/validations.js')}}"></script>
<script src="{{asset('js/validations/profile/perfilUsuario.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/validations/profile/perfilUsuario.js
  showHidePassword();
  removeStyleError();
  sendDataFormUpdatedUserPassword();
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection

