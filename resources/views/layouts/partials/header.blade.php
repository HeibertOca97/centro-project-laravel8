<header class="header">
  <div id="box-op1">
    <a href="{{route('dashboard')}}">
      <img src="{{asset('image/logo/logo-mini.png')}}" alt="{{ config('app.name', 'Laravel') }}" title="{{ config('app.name', 'Laravel') }}" loaded>
    </a>
    <i class="fas fa-bars icon-headers" id="icon-mas" title="Mas"></i>
  </div>
    <div id="box-op2" >
      <i class="fas fa-bell icon-headers" id="icon-notify" title="Notificaciones"><small class="badge badge-danger">4</small></i>
      <i class="fas fa-caret-down icon-headers" id="icon-cuenta" title="Cuenta"></i>
    </div>
</header>

<!-- VENTANA - BARRA DE CUENTA -->
<main id="box-barra-cuenta" state="false" class="box-barra-opciones scroll-default">
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
  <p class="text-secondary developer-author"><span class="ml-2">CELID © 2021 | Desarrollado por: <a href="https://ec.linkedin.com/in/heibert-joseph-oca%C3%B1a-rodr%C3%ADguez-1a29871b7" class="text-secondary" target="_blank">Heibert Ocaña <i class="fab fa-linkedin"></i></a></span></p>
  <!--Importante-->
  <div></div>
  <!--Importante-->
</main>

<!--VENTANA - BARRA NOTIFICACIONES-->
<main id="box-barra-notify" state="false" class="box-barra-opciones scroll-default">
  <dir class="title-barra">
    <h4 class="ml-3 mt-2">Notificaciones</h4><span class="fas fa-ellipsis-h mr-3 d-block" role="button" id="barra-opciones-notify" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
    <div class="dropdown-menu box-option-notifique" aria-labelledby="barra-opciones-notify">
      <div class="dropdown-item mb-1" role="button"><i class="fas fa-check ml-2"></i> Marcar todas como leidas</div>
      <div class="dropdown-item" role="button"><i class="fas fa-trash-alt ml-2"></i> Eliminar toda las notificaciones</div>
  </div>
  </dir>
  <small class="mb-2">Nuevas</small><hr>
  <!--nueva-->
  <dir class="mt-1">
    <a href="{{route('user.profiles.index')}}" class="opt-link-br-c">
      <dir>
        <span class="far fa-flag text-dark d-block"></span><p class="text-dark">Titulo</p>&nbsp; <p class="text-secondary">Descripcion</p>
      </dir>
      <small class="ml-4">hace 2 minutos</small>
      <span class="fas fa-ellipsis-h mr-3 d-block text-dark" role="button" id="notify-uno" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
      <div class="dropdown-menu box-option-notifique" aria-labelledby="notify-uno">
          <div class="dropdown-item" role="button"><i class="fas fa-check ml-2"></i> Marcar como leida</div>
          <div class="dropdown-item" role="button"><i class="fas fa-trash-alt ml-2"></i> Eliminar esta notificacion</div>
      </div>
    </a>
  </dir>
  <small class="mb-2">Anteriores</small><hr>
  <dir class="mt-1">
    <a href="{{route('user.profiles.index')}}" class="opt-link-br-c">
      <dir>
        <span class="fas fa-flag text-dark d-block"></span><p class="text-dark">Titulo</p>&nbsp; <p class="text-secondary">Descripcion</p>
      </dir>
      <small class="ml-4">hace 2 minutos</small>
      <span class="fas fa-ellipsis-h mr-3 d-block text-dark" role="button" id="notify-uno" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
      <div class="dropdown-menu box-option-notifique" aria-labelledby="notify-uno">
          <div class="dropdown-item" role="button"><i class="fas fa-check ml-2"></i> Marcar como leida</div>
          <div class="dropdown-item" role="button"><i class="fas fa-trash-alt ml-2"></i> Eliminar esta notificacion</div>
      </div>
    </a>
  </dir>
  <hr class="mt-2">
  <p class="text-secondary 
developer-author"><span class="ml-2">CELID © 2021 | Desarrollado por: <a href="https://ec.linkedin.com/in/heibert-joseph-oca%C3%B1a-rodr%C3%ADguez-1a29871b7" class="text-secondary" target="_blank">Heibert Ocaña <i class="fab fa-linkedin"></i></a></span></p>
  <!--Importante-->
  <div></div>
  <!--Importante-->
</main>