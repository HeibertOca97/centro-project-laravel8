@extends('components.modals')

@extends('layouts.root')

@section('title') Gestion de roles @endsection

@section('css')
  {{-- @include('layouts.plugins.CSSdatatable') --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="{{asset('css/modules/permission/createPermission.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-user-tag"></i> Gestion de permisos</h1>
  </div>

  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Roles</li>
    </ol>
  </nav>

  @can('permission.create')
  <div class="container-xl bg-white my-3">
    <a href="{{route('roles.create')}}" class="btn btn-primary btn-route-crear">Nuevo rol</a>
  </div>
  @endcan
  
<div class="container-xl">
  <div class="card">
    <div class="card-body">
      <table id="tb-roles-data" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th>Creado</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
      </table>
    </div>
  </div>
</div>

@endsection
@section('js')
  {{-- @include('layouts.plugins.JSdatatable') --}}
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('js/config/dataTable.js')}}"></script>
<script src="{{asset("js/validations/permission/validation.permission.js")}}"></script>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    tableCreateRoles('{{route("roles.listAll")}}');

    @if (session('status_success'))
     //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
    @endif

    @if (session('status_success_delete'))
     //js/config/messageAlert.js
      deleteAlert('{{session("status_success_delete")}}');
    @endif
  });
</script>
@endsection

{{-- <i class="fas fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" title="Gestion de permisos" data-content="Este modulo se crear los roles y se le asigna su correspondiente permiso" data-placement="top"></i> --}}