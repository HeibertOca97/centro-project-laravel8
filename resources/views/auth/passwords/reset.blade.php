@extends('layouts.auth')

@section('title')Restablecer contraseña @endsection

@section('css')
  <link rel="stylesheet" href="{{asset("css/auth/glob.css")}}">
  <link rel="stylesheet" href="{{asset("css/auth/login.css")}}">
@endsection

@section('content')
<section class="box-login">
  <form action="{{ route('password.update') }}" method="post" class="box-fr">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    
    <aside class="box-progress"><p></p></aside>
    <picture><div class="box-logo"></div></picture>
    <div>
      <h3>Restablecer Contraseña</h3>
    </div>
    <div class="box-icon">
      <img src="{{asset('/image/imageFondos/new-secure.svg')}}" alt="">
    </div>

      <input type="hidden" name="email" id="email" autocomplete="off" maxlength="100" required value="{{ $email ?? old('email') }}">

    @error('email')
        <div class="box-message-nav"><div class="alert alert-danger" role="alert">{{$message}}</div></div>
    @enderror

    <div class="box-ac">
      <i class="fas fa-lock style-icon @if ($errors->has('password')) cl-icon-invalid @else cl-icon-default @endif" id="ico-lock"></i>
      <input type="password" name="password" id="pass" autocomplete="off" maxlength="30" required value="{{old('password')}}"><span class="barra @if ($errors->has('password')) cl-barra-invalid @else cl-barra-default @endif"></span>
      <label for="pass" class="info-label @if ($errors->has('password')) cl-label-invalid @else cl-label-default @endif">Nueva contraseña</label>
    </div>

    @error('password')
        <div class="box-message-nav"><div class="alert alert-danger" role="alert">{{$message}}</div></div>
    @enderror

    <div class="box-ac">
      <i class="fas fa-lock style-icon @if ($errors->has('password')) cl-icon-invalid @else cl-icon-default @endif" id="ico-lock"></i>
      <input type="password" name="password_confirmation" id="password-confirm" autocomplete="off" maxlength="30" required value="{{old('password_confirmation')}}"><span class="barra @if ($errors->has('password')) cl-barra-invalid @else cl-barra-default @endif"></span>
      <label for="password-confirm" class="info-label @if ($errors->has('password')) cl-label-invalid @else cl-label-default @endif">Confirmar contraseña</label>
    </div>

    <div class="box-btn">
      <button id="btn-cambiar">Restablecer</button>
    </div>
  </form>
</section>
@endsection

@section('js')
  <script src="{{asset('js/auth/actionInput.js')}}"></script>
  @if ($errors->any())
    <script src="{{asset('js/auth/login.js')}}"></script>
  @endif  
@endsection