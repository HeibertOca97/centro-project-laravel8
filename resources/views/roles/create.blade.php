@extends('components.modals',['modal'=>''])

@extends('layouts.app')

@section('title') Gestion de roles @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/modules/rol/createRol.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-user-shield"></i> Gestion de roles</h1>
  </div>
  
  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    @can('role.index')
    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
    @endcan
      <li class="breadcrumb-item active" aria-current="page">Crear</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Registro de roles</div>
    <div class="card-body">
    <form action="{{route('roles.store')}}" method="post" class="" style="width: 100%;" id="formRol">
        @csrf

        <div class="m-auto" style="max-width: 650px;">
          <label for="nombre" class="form-label label-description @if($errors->has('nombre')) text-danger @else text-secondary @endif">Nombre *</label>
          <input type="text" class="form-control text required @if ($errors->has('nombre')) border-danger @endif" id="nombre" value="{{old('nombre')}}" maxlength="191" autocomplete="off" name="nombre" data-name="nombre">
          <small class="form-text @error('nombre')text-danger @enderror">@error('nombre') {{$message}} @enderror</small>
        </div>

        <div class="mb-4 mt-4 ml-auto mr-auto box-permission-modules">
          <label class="form-label label-description text-secondary mb-4 ">Listas de permisos:</label>

          <div class="content-permission mb-3">
            <div class="btn-group d-flex flex-wrap" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-dark text-warning" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers"><i class="fas fa-th-list"></i> Usuarios</button>
              <button type="button" class="btn btn-dark text-warning" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="false" aria-controls="collapseRoles"><i class="fas fa-th-list"></i> Roles</button>
              <button type="button" class="btn btn-dark text-warning" data-toggle="collapse" data-target="#collapsePermisos" aria-expanded="false" aria-controls="collapsePermisos"><i class="fas fa-th-list"></i> Permisos</button>
              <button type="button" class="btn btn-dark text-warning" data-toggle="collapse" data-target="#collapsePlanTrabajo" aria-expanded="false" aria-controls="collapsePlanTrabajo"><i class="fas fa-th-list"></i> Plan de trabajo</button>
              <button type="button" class="btn btn-dark text-warning" data-toggle="collapse" data-target="#collapseActivities" aria-expanded="false" aria-controls="collapseActivities"><i class="fas fa-th-list"></i> Gestion de Actividades</button>
              <button type="button" class="btn btn-dark text-warning" data-toggle="collapse" data-target="#collapseMyActivitie" aria-expanded="false" aria-controls="collapseMyActivitie"><i class="fas fa-th-list"></i> Actividades (Personal)</button>
            </div>
          </div>

          <label class="form-label label-description text-secondary mb-4 ">Total: <b>{{count($permissions)}}</b>  |  Seleccionados: <b id="select_permission"></b></label>

          <table class="table table-dark mx-auto">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripcion</th>
                </tr>
              </thead>
              <tbody class="content-permission">

                @include('components.listCollapse',[
                    'accion'=>'crear',
                    'permission'=>'',
                    'modulo'=>'user',
                    'permissions'=>$permissions,
                    'collapseName'=>'collapseUsers',
                  ])

                  @include('components.listCollapse',[
                    'accion'=>'crear',
                    'permission'=>'',
                    'modulo'=>'role',
                    'permissions'=>$permissions,
                    'collapseName'=>'collapseRoles',
                  ])
                  
                  @include('components.listCollapse',[
                    'accion'=>'crear',
                    'permission'=>'',
                    'modulo'=>'permission',
                    'permissions'=>$permissions,
                    'collapseName'=>'collapsePermisos',
                  ])

                  @include('components.listCollapse',[
                    'accion'=>'crear',
                    'permission'=>'',
                    'modulo'=>'plantrabajo',
                    'permissions'=>$permissions,
                    'collapseName'=>'collapsePlanTrabajo',
                  ])

                  @include('components.listCollapse',[
                    'accion'=>'crear',
                    'permission'=>'',
                    'modulo'=>'Activities',
                    'permissions'=>$permissions,
                    'collapseName'=>'collapseActivities',
                  ])

                  @include('components.listCollapse',[
                    'accion'=>'crear',
                    'permission'=>'',
                    'modulo'=>'MyActivitie',
                    'permissions'=>$permissions,
                    'collapseName'=>'collapseMyActivitie',
                  ])

              </tbody>
            </table>

        <br><hr>
          <button type="submit" class="btn btn-success  mr-3 mb-3">Crear</button>
          <a href="{{route('roles.index')}}" class="btn btn-light mb-3">Volver</a>
        
      </form>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset("js/validations/rol/validation.rol.js")}}"></script>
<script src="{{asset("js/config/validations.js")}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/config/validations.js
  removeStyleErrorFormatOne('input');
  // js/components/permiso/validation.permission.js
  sendDataFormRol();
  numberInputChecked();
  listInputChecked();
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
  @if (session('status_error'))
  //js/config/messageAlert.js
    errorAlert('Oops...','{{session("status_error")}}');
  @endif
});
</script>
@endsection

