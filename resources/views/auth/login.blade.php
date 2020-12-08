@extends('layouts.auth')

@section('title')Login @endsection

@section('css')
  <link rel="stylesheet" href="{{asset("css/auth/glob.css")}}">
  <link rel="stylesheet" href="{{asset("css/auth/login.css")}}">
@endsection

@section('content')
<section class="box-login">
  <form action="{{ route('login') }}" method="post" class="box-fr">
    @csrf
    <picture><img src="{{asset('image/logo/logo.png')}}" alt="Centro de Emprendimiento" class="box-logo"></picture>
    <div>
      <h3>Iniciar Sesion</h3>
    </div>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="box-message-nav"><div class="alert alert-danger" role="alert">{{$error}}</div></div> 
      @endforeach
    @endif
    
    @if (session('status'))
        <div class="box-message-nav"><div class="alert alert-danger" role="alert">{{session('status')}}</div></div> 
    @endif
    
    <div class="box-ac">
      <i class="fas fa-user style-icon @if ($errors->any()) cl-icon-invalid @else cl-icon-default @endif"></i>
      <input type="text" name="login" id="login" autocomplete="off" maxlength="100" required value="{{old('username') ?: old('email')}}"><span class="barra @if ($errors->any()) cl-barra-invalid @else cl-barra-default @endif"></span>
      <label for="login" class="info-label @if ($errors->any()) cl-label-invalid @else cl-label-default @endif">Usuario</label>
    </div>

    <div class="box-ac">
      <i class="fas fa-lock style-icon @if ($errors->any()) cl-icon-invalid @else cl-icon-default @endif" id="ico-lock"></i>
      <input type="password" name="password" id="pass" autocomplete="off" maxlength="30" required value="{{old('password')}}"><span class="barra @if ($errors->any()) cl-barra-invalid @else cl-barra-default @endif"></span>
      <label for="pass" class="info-label @if ($errors->any()) cl-label-invalid @else cl-label-default @endif">Contraseña</label>
    </div>

    <div class="box-btn">
      <button id="btn-ingresar">Ingresar</button>
    </div>
    <div class="box-redirect">
      <p class="link-re"><a href="{{ route('password.request') }}">¿Perdiste tu contraseña, entra aqui?</a> </p>
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