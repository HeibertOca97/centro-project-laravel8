@switch($modal)
    @case('emprendedor')
        <div class="modal fade" id="modal-emprendedor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Formularios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">
                    {{-- CARD 1--}}
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de inscripcion</h5>
                        <p class="card-text">Se recopilan datos del emprendedor y su emprendimiento.</p>
                        <a href="{{route('emprendedores.create.register')}}" class="btn btn-primary">Registrar</a>
                      </div>
                    </div>
                  </div>
                  {{-- CARD 2--}}
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Formulario de inscripcion: <span class="badge badge-danger">NEW</span></h5>
                        <p class="card-text">Se recopilan datos del emprendedor y su idea de negocio.</p>
                        <a href="{{route('emprendedores.create.new')}}" class="btn btn-primary">Registrar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        @break
    @case('perfil')
        <div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
            <div class="modal-content" style="max-width: 400px;">
              <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel" style="font-family: Arial, Helvetica, sans-serif;">Cambiar foto de perfil</h5>
              </div>
                <div class="text-center text-primary w-100 p-3 border-bottom font-weight-bold small" role="button" id="cargarfoto" >Cargar una foto</div>
                <div class="text-center text-danger w-100 p-3 border-bottom font-weight-bold small" role="button" id="eliminarfoto" >Eliminar foto actual</div>
                <div class="text-center w-100 p-3 font-weight-bold small" data-dismiss="modal" role="button" >Cancelar</div>
            </div>
          </div>
        </div>
        @break
    @default
        
@endswitch
<!-- Modal -->
<div class="modal fade" id="modalCerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cerrar sesion</h5>
      </div>
      <div class="modal-body">
        <i class="fas fa-question-circle icon-info text-danger"></i>
        <p class="text-aviso">¿Usted esta seguro/a de salir del sistema?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Si, salir</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      </div>
    </div>
  </div>
</div>