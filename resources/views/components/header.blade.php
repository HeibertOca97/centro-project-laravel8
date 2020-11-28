<header class="header">
  <div id="box-op1">
    <a href="">
      <img src="{{asset('image/logo/logo.png')}}" alt="CELID" title="CELID">
    </a>
    <i class="fas fa-bars" id="icon-mas" title="Mas"></i>
  </div>
    <div id="box-op2">
      <i class="fas fa-caret-down" id="icon-cuenta" title="Cuenta"></i>
    </div>
</header>
<!-- VENTANA BARRA DE CUENTA -->
<main id="box-barra-cuenta" state="false">
  <a href="" class="opt-link-br-c">
    <div>
      <img src="" alt="Mi foto de Perfil" class="data-foto-perfil">
    </div>
    <div>
      <h3 class="data-user-names">Heibert</h3>
      {{-- <p>Configuraci&oacute;n</p> --}}
      <p>Perfil (Admin)</p>
    </div>
  </a>
  <hr>
  <div id="ac-modo" state="false" class="opt-link-br-c">
    <i class="fas fa-moon"></i><p>Modo nocturno</p><strong id="box-interruptor"><span></span></strong>
  </div>
  <div class="opt-link-br-c" id="btn-cerrar-secion" data-toggle="modal" data-target="#modalCerrarSesion"><i class="fas fa-sign-in-alt"></i><p>Cerrar sesion</p>
  </div>
</main>