@extends('components.modals',['modal'=>'emprendedor'])

@extends('layouts.app')

@section('title') Gestion de emprendedores @endsection

@section('css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="{{asset('css/modules/enterprising/createEnterprising.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-user-tag"></i> Gestion de emprendedores</h1>
  </div>

  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Emprendedores</li>
    </ol>
  </nav>

  @can('emprendedor.create')
  <div class="container-xl bg-white my-3">
    <bottom type="bottom" class="btn btn-primary btn-route-crear" id="" data-toggle="modal" data-target="#modal-emprendedor"><i class="fas fa-plus"></i> Crear nuevo</bottom>
  </div>
  @endcan
  
<div class="container-xl">
  <div class="card">
    <div class="card-body">
      <table id="tb-enterprising-data" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre completo</th>
                    <th>Correo</th>
                    <th>Contacto</th>
                    <th>Tiene Whatsapp</th>
                    <th>Creador por</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
      </table>
    </div>
  </div>
</div>

@endsection
@section('js')
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('js/config/dataTable.js')}}"></script>
<script src="{{asset("js/config/validations.js")}}"></script>
<script src="{{asset("js/validations/enterprising/validation.enterprising.js")}}"></script>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    tableCreateEnterprising('{{route("emprendedores.listAll")}}');

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