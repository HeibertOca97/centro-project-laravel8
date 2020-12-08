<header class="header">
  <div id="box-op1">
    <a href="{{route('dashboard')}}">
      <img src="{{asset('image/logo/logo.png')}}" alt="{{ config('app.name', 'Laravel') }}" title="{{ config('app.name', 'Laravel') }}" loaded>
    </a>
    <i class="fas fa-bars" id="icon-mas" title="Mas"></i>
  </div>
    <div id="box-op2">
      <i class="fas fa-caret-down" id="icon-cuenta" title="Cuenta"></i>
    </div>
</header>
<!-- VENTANA BARRA DE CUENTA -->
<main id="box-barra-cuenta" state="false">
<a href="{{route('user.profiles.index')}}" class="opt-link-br-c">
    <div>
    <img src="@if(Auth::user()->avatar){{asset(Auth::user()->avatar)}}@else{{asset('image/perfil/user_man.svg')}}@endif" alt="{{Auth::user()->nombres}}" class="" loaded>
    </div>
    <div>
      <h3 class="">@if (Auth::user()->nombres && Auth::user()->apellidos) {{Auth::user()->nombres}} {{Auth::user()->apellidos}} @else nombre sin especificar @endif</h3>
      {{-- <p>Configuraci&oacute;n</p> --}}
    <p class="text-secondary">Perfil @if (Auth::user()->getRoleNames()) (@foreach (Auth::user()->getRoleNames() as $key => $role) {{$role}} @endforeach) @else {{'(ningun rol asignado)'}}@endif </p>
    </div>
  </a>
  <hr>
  <div id="ac-modo" state="false" class="opt-link-br-c">
    <i class="fas fa-moon"></i><p>Modo nocturno</p><strong id="box-interruptor"><span></span></strong>
  </div>
  <div class="opt-link-br-c" id="btn-cerrar-secion" data-toggle="modal" data-target="#modalCerrarSesion"><i class="fas fa-sign-in-alt"></i><p>Cerrar sesion</p>
  </div>
</main>