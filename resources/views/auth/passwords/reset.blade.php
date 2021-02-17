@extends('layouts.auth')

@section('title')Restablecer contraseña @endsection

@section('css')
  <link rel="stylesheet" href="{{asset("css/auth/login.css")}}">
@endsection

@section('content')
<section class="box-login scroll-default">
  <form action="{{ route('password.update') }}" method="post" class="box-fr" id="fr-reset-pass">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    
    <aside class="box-progress"><p></p></aside>
    <picture><div class="box-logo"></div></picture>
    <div>
      <h3>Restablecer Contraseña</h3>
    </div>
    <div class="box-icon">
      <img src="{{asset('/image/imageFondos/new-secure.svg')}}" alt="new secure" style="max-width: 200px;">
    </div>

      <input type="hidden" name="email" id="email" autocomplete="off" maxlength="100" required value="{{ $email ?? old('email') }}">

    <div class="box-ac">
      <i class="fas fa-lock style-icon @if ($errors->has('password')) cl-icon-invalid @else cl-icon-default @endif" id="ico-lock"></i>
      <input type="password" name="password" id="Nueva contraseña" autocomplete="off" maxlength="15" value="{{old('password')}}" class="required" required><span class="barra @if ($errors->has('password')) cl-barra-invalid @else cl-barra-default @endif"></span>
      <label for="Nueva contraseña" class="info-label @if ($errors->has('password')) cl-label-invalid @else cl-label-default @endif">Nueva contraseña *</label>
    </div>

    <div class="box-ac">
      <i class="fas fa-lock style-icon @if ($errors->has('password')) cl-icon-invalid @else cl-icon-default @endif" id="ico-lock"></i>
      <input type="password" name="password_confirmation" id="Confirmar contraseña" autocomplete="off" maxlength="15" value="{{old('password_confirmation')}}" class="required" required><span class="barra @if ($errors->has('password')) cl-barra-invalid @else cl-barra-default @endif"></span>
      <label for="Confirmar contraseña" class="info-label @if ($errors->has('password')) cl-label-invalid @else cl-label-default @endif">Confirmar contraseña *</label>
    </div>

    <div class="box-btn">
      <button id="btn-cambiar">Restablecer</button>
    </div>
    <small class="text-secondary"><span class="text-center d-block">CELID © 2020 | Desarrollado por: <a href="https://ec.linkedin.com/in/heibert-joseph-oca%C3%B1a-rodr%C3%ADguez-1a29871b7" class="text-secondary" target="_blank">Heibert Ocaña <i class="fab fa-linkedin"></i></a></span></small>
  </form>
</section>
@endsection

@section('js')
  <script src="{{asset('js/config/validations.js')}}"></script>
  <script src="{{asset('js/config/messageAlert.js')}}"></script>
  <script src="{{asset('js/auth/actionInput.js')}}"></script>
  <script>
    sendDataFormUserResetPassword();
  </script>
  @if ($errors->any())
    <script src="{{asset('js/auth/login.js')}}"></script>
    @foreach ($errors->all() as $error)  
    <script>
      toastr["error"](`{{$error}}`, 'Invalido');
      </script>
    @endforeach
  @endif  
@endsection