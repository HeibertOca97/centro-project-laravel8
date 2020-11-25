@extends('layouts.auth')

@section('css')
  <link rel="stylesheet" href="{{asset("css/auth/glob.css")}}">
  <link rel="stylesheet" href="{{asset("css/auth/login.css")}}">
@endsection

@section('title')Login @endsection

@section('content')
<section class="box-login">
  <form action="{{ route('login') }}" method="post" class="box-fr">
    @csrf
    <picture><img src="{{asset('image/logo/logo.png')}}" alt="Logo" class="box-logo"></picture>
    <div>
      <h3>Iniciar Sesion</h3>
    </div>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="box-message-nav">
        <div class="alert alert-danger" role="alert">
          {{$error}}
        </div> 
      </div> 
      @endforeach
    @endif
    <div class="box-ac">
      <i class="fas fa-user style-icon cl-icon-default"></i>
      <input type="email" name="email" id="user" autocomplete="off" maxlength="30" required value="{{old('email')}}"><span class="barra cl-barra-default"></span>
      <label for="user" class="cl-label-default ">Usuario</label>
      {{-- <span class="msg-valid"></span> --}}
      {{-- @error('email') --}}
      {{-- <span class="msg-fr-login">{{ $message }}</span> --}}
      {{-- <span class="msg-valid">{{ $message }}</span> --}}
        {{-- <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span> --}}
      {{-- @enderror --}}
    </div>
    <div class="box-ac">
      <i class="fas fa-lock 
      style-icon 
      @if ($errors->any()) 
        cl-icon-invalid
      @else 
        cl-icon-default
      @endif
      " id="ico-lock"></i>
      <input type="password" name="password" id="pass" autocomplete="off" maxlength="30" required value="{{old('password')}}"><span class="barra 
      @if ($errors->any()) 
        cl-barra-invalid
      @else 
        cl-barra-default
      @endif
      "></span>
      <label for="pass" class="
      @if ($errors->any())
        cl-label-invalid
      @else 
        cl-label-default
      @endif
      ">Contraseña</label>
      {{-- <span class="msg-valid"></span>
      <span class="msg-fr-login"></span> --}}
      @error('password')
        <span class="msg-valid">{{ $message }}</span>
        {{-- <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span> --}}
      @enderror
    </div>

    <div class="box-btn">
      <button id="btn-ingresar">Ingresar</button>
    </div>
    <div class="box-redirect">
      <p class="link-re">¿Perdiste tu contraseña, entra aqui?</p>
    </div>
  </form>
</section>
@endsection

@section('js')
<script src="{{asset('js/glob.js')}}"></script>
<script>
  @if ($errors->any())
      document.querySelector(".box-message-nav").addEventListener('click',()=>{
        document.querySelector(".box-message-nav").style.display="none";
      });
    
for (let i = 0; i < document.querySelectorAll('input').length; i++) {
  document.querySelectorAll('input')[i].addEventListener('focus',()=>{
    document.querySelector(".box-message-nav").style.display="none";
    //remover y agregar clases
    document.querySelectorAll('input')[i].classList.remove("cl-barra-invalid");
    document.querySelectorAll('input')[i].classList.add("cl-barra-default");
  })
  
}
    
@endif  
</script>
@endsection