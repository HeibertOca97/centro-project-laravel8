<header class="header">
  <div id="box-op1">
    <a href="{{route('dashboard')}}">
      <img src="{{asset('image/logo/logo-mini.png')}}" alt="{{ config('app.name', 'Laravel') }}" title="{{ config('app.name', 'Laravel') }}" loaded>
    </a>
    <i class="fas fa-bars icon-headers" id="icon-mas" title="Mas"></i>
  </div>
    <div id="box-op2">
      <i class="fas fa-bell icon-headers" title="Notificaciones"><small class="badge badge-danger">4</small></i>
      <i class="fas fa-caret-down icon-headers" id="icon-cuenta" title="Cuenta"></i>
    </div>
</header>
<!-- VENTANA BARRA DE CUENTA -->
<main id="box-barra-cuenta" state="false">
<a href="{{route('user.profiles.index')}}" class="opt-link-br-c">
    <div>
    <img src="@if(Auth::user()->avatar){{asset(Auth::user()->avatar)}}@else{{asset('image/perfil/user_man.svg')}}@endif" alt="{{Auth::user()->nombres}}" class="" loaded>
    </div>
    <div>
      <h3 class="">@if (Auth::user()->nombres && Auth::user()->apellidos) {{Auth::user()->nombres}} {{Auth::user()->apellidos}} @else <span class="text-secondary">Sin especificar</span> @endif</h3>
      {{-- <p>Configuraci&oacute;n</p> --}}
    <p class="text-secondary">Ver tu perfil</p>
    </div>
  </a>
  <hr>
  {{-- <div id="ac-modo" state="false" class="opt-link-br-c">
    <i class="fas fa-moon"></i><p>Modo nocturno</p><strong id="box-interruptor"><span></span></strong>
  </div> --}}
  <div class="opt-link-br-c" id="btn-cerrar-secion" data-toggle="modal" data-target="#modalCerrarSesion"><i class="fas fa-sign-in-alt"></i><p>Cerrar sesion</p>
  </div>
  <hr>
  <small class="text-secondary"><span class="ml-2">CELID © 2020 | Desarrollado por: <a href="https://ec.linkedin.com/in/heibert-joseph-oca%C3%B1a-rodr%C3%ADguez-1a29871b7" class="text-secondary" target="_blank">Heibert Ocaña <i class="fab fa-linkedin"></i></a></span></small>
</main>