@extends('components.modals',['modal'=>''])

@extends('layouts.app')

@section('title') Plan de trabajos @endsection

@section('css')
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="{{asset('css/modules/planes/createPlanes.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-book"></i> Plan de Trabajo</h1>
  </div>

  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Plan de Trabajo</li>
    </ol>
  </nav>
  
@can('plantrabajo.create')
<div class="container-xl bg-white my-3">
  <a href="{{route('planes.create')}}" class="btn btn-primary btn-route-crear"><i class="fas fa-plus"></i> Crear nuevo</a>
</div>
@endcan

<div class="container-xl">
  <div class="card">
    <div class="card-body">
      <table id="tb-planesTrabajo-data" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Evento</th>
                    <th>Responsables</th>
                    <th>Lugar</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
      </table>
    </div>
  </div>
</div>

@can('plantrabajo.download')
<div class="container-xl mt-4">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title d-flex justify-content-between flex-wrap">
        <h5 class="mt-2 mr-1">Mis descargas<h5>
        <a class="btn btn-success btn-download" data-toggle="collapse" href="#descargas-trabajos" role="button" aria-expanded="false" aria-controls="descargas-trabajos">
          <i class="fas fa-cloud-download-alt"></i>
          <small>
            <span class="d-block">Descargar</span>
            <span class="d-block">Trabajo</span>
          </small>
        </a>
      </div>
      <div class="container overflow-auto">
        <table class="table table-borderless collapse multi-collapse text-center text-secondary" id="descargas-trabajos">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Formato</th>
              <th scope="col">Descargar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td><form action="{{route('planes.export.foryear')}}" method="post">
                @csrf
                <label for="porAño" class="d-block">Exportacion mensual.</label>
                <label for="month_ini">De:</label>
                <select name="month_ini" class="months pt-1 pb-1" id="month_ini"></select><br>
                <label for="month_end">Hasta:</label>
                <select name="month_end" class="months pt-1 pb-1" id="month_end"></select>
                <input type="number" name="year" placeholder="Digite el año" id="porAño" class="pt-1 pb-1 pl-1 required">
                </form>
              </td>
              <td>Excel/.xlsx</td>
              <td><a id="down-forYear" role="button"><i class="fas fa-download"></i> DESCARGAR</a></td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
@endcan

@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('js/config/dataTable.js')}}"></script>
<script src="{{asset("js/config/validations.js")}}"></script>
<script src="{{asset('js/validations/planes/validation.planes.js')}}"></script>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    @can('plantrabajo.download')
    addMonthsYearSelect('.months');
    exportWorksForYear();
    @endcan
    //js/config/dataTable.js
    tableCreatePlanTrabajo('{{route("planes.listAll")}}');

    @if (session('status_success'))
     //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
    @endif
    
    @if (session('status_success_info'))
     //js/config/messageAlert.js
      infoAlert('Info','{{session("status_success_info")}}');
    @endif

    @if (session('status_success_delete'))
     //js/config/messageAlert.js
      deleteAlert('{{session("status_success_delete")}}');
    @endif
  });
</script>
  
@endsection