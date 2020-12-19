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
    <small class="text-secondary"><span class="text-center d-block">CELID © 2020 | Desarrollado por: <a href="https://ec.linkedin.com/in/heibert-joseph-oca%C3%B1a-rodr%C3%ADguez-1a29871b7" class="text-secondary" target="_blank">Heibert Ocaña <i class="fab fa-linkedin"></i></a></span></small>
  </form>
</section>
@endsection

@section('js')
  <script src="{{asset('js/config/messageAlert.js')}}"></script>
  <script src="{{asset('js/auth/actionInput.js')}}"></script>
  @if ($errors->any())
  <script src="{{asset('js/auth/login.js')}}"></script>

    @if (count($errors->all()) > 1)
      @foreach ($errors->all() as $error)
      <script>
        toastr["error"](`{{$error}}`, 'Invalido');
      </script> 
      @endforeach
    @else
      @error('username')
        <script>
          errorAlert('Invalido',"{{$message}}");
        </script>  
      @enderror
    @endif
    
  @endif  
   
  @if (session('status'))
      <script>
        errorAlert('Invalido',"{{session('status')}}");
      </script>
  @endif
@endsection