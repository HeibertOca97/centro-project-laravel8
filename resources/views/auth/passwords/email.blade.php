@extends('layouts.auth')

@section('title')Recuperacion de contraseña @endsection

@section('css')
  <link rel="stylesheet" href="{{asset("css/auth/glob.css")}}">
  <link rel="stylesheet" href="{{asset("css/auth/login.css")}}">
@endsection

@section('content')
<section class="box-login">
  <form action="{{ route('password.email') }}" method="post" class="box-fr">
    @csrf
    <aside class="box-progress"><p></p></aside>
    <picture><img src="{{asset('image/logo/logo.png')}}" alt="Centro de Emprendimiento" class="box-logo"></picture>
    <div>
      <h3>Recuperaci&oacute;n de contraseña</h3>
    </div>
    <div class="box-icon">
    <img src="{{asset('image/imageFondos/carta.svg')}}" alt="">
    </div>

    <div class="box-ac">
      <i class="fas fa-envelope style-icon @if ($errors->any()) cl-icon-invalid @else cl-icon-default @endif"></i>
      <input type="email" name="email" id="email" autocomplete="off" maxlength="100" required value="{{old('email')}}"><span class="barra @if ($errors->any()) cl-barra-invalid @else cl-barra-default @endif"></span>
      <label for="email" class="info-label @if ($errors->any()) cl-label-invalid @else cl-label-default @endif">Correo electronico</label>
    </div>

    <div class="box-btn">
      <button id="btn-enviar">Enviar enlace</button>
    </div>

    <div class="box-redirect">
      <p class="link-ini"><a href="{{ route('login') }}"> Volver a Iniciar sesion</a></p>
    </div>
    <small class="text-secondary"><span class="text-center d-block">CELID © 2020 | Desarrollado por: <a href="https://ec.linkedin.com/in/heibert-joseph-oca%C3%B1a-rodr%C3%ADguez-1a29871b7" class="text-secondary" target="_blank">Heibert Ocaña <i class="fab fa-linkedin"></i></a></span></small>
  </form>
  </section>
@endsection

@section('js')
@if ($errors->any())
<script src="{{asset('js/auth/login.js')}}"></script>
  @foreach ($errors->all() as $error)
    <script>
      toastr["error"](`{{$error}}`, 'Invalido');
    </script> 
  @endforeach
@endif  
@if (session('status'))
  <script>
    toastr["info"](`{{ session('status') }}`, 'Exitoso');
  </script>
@endif 

@endsection