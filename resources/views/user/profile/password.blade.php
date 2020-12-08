@extends('components.modals')

@extends('layouts.root')

@section('title') Perfil @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/components/perfil/cambioContraseña.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials..perfil.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')

  <div class="container-xl btn-white">
    <h1 class="title-module">Perfil</h1>
  </div>
  
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cambio contraseña</li>
    </ol>
  </nav>

    <section class="box-perfil-clave">  
    <form action="{{route('user.profiles.update.password',Auth::user()->id)}}" method="post">
        @csrf
        @method('PUT')
        <div>
          <div class="title-input-pass">
          <label for="contraseñaActual" class="@error('contraseñaActual') text-danger @enderror">Contraseña actual</label> <i class="fas fa-eye ico-eyes"></i>
          </div>
        <input type="password" name="contraseñaActual"  id="contraseñaActual" autocomplete="off" maxLength="30" @if (session('password')) value="{{old('contraseñaActual',session('password'))}}" @else value="{{old('contraseñaActual')}}" @endif class="@error('contraseñaActual') border-danger @enderror inputpass">
          <small class="@error('contraseñaActual') text-danger @enderror">@error('contraseñaActual') {{$message}} @enderror</small>
          <small class="@if (session('status_error')) text-danger @endif">@if (session('status_error')) {{session('status_error')}} @endif</small>
        </div>
        <div>
          <div class="title-input-pass">
            <label for="contraseñaNueva" class="@error('contraseñaNueva') text-danger @enderror">Contraseña nueva</label><i class="fas fa-eye ico-eyes"></i>
          </div>
          <input type="password" name="contraseñaNueva" class="@error('contraseñaNueva') border-danger @enderror inputpass" id="contraseñaNueva"autocomplete="off" maxLength="30" value="{{old('contraseñaNueva')}}">
          <small class="@error('contraseñaNueva') text-danger @enderror">@error('contraseñaNueva') {{$message}} @enderror</small>
        </div>
        <div>
          <div class="title-input-pass">
            <label for="contraseñaConfirmacion" class="@error('contraseñaConfirmacion') text-danger @enderror">Confirmar nueva Contraseña</label><i class="fas fa-eye ico-eyes"></i>
          </div>
          <input type="password" name="contraseñaConfirmacion" class="@error('contraseñaConfirmacion') border-danger @enderror inputpass" id="contraseñaConfirmacion" autocomplete="off" maxLength="30" value="{{old('contraseñaConfirmacion')}}">
        <small class="@error('contraseñaConfirmacion') text-danger @enderror">@error('contraseñaConfirmacion') {{$message}} @enderror</small>
        </div>
        <main>
          <button class="btn btn-success"><small>Cambiar contraseña</small></button>
        </main>
      </form>
  </section>

@endsection

@section('js')
<script src="{{asset('js/components/perfil/perfilUsuario.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/components/perfil/perfilUsuario.js
  showHidePassword();
  removeStyleError();
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection

