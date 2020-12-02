@extends('components.modals')

@extends('layouts.root')

@section('title') Gestion de usuarios @endsection

@section('css')
  {{-- @include('layouts.plugins.CSSdatatable') --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  <h1>Gestion de usuarios</h1>
  {{Auth::user()->created_at->diffForHumans()}}
<div class="container-xl">
  <div class="card">
    <div class="card-body">
      <table id="tb-users-data" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>name</th>
                    <th>userName</th>
                    <th>email</th>
                    <th>created at</th>
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
    <script>
      const configLanguageTable = {
            "sProcessing":     "Procesando...",
		    "sLengthMenu": '<p>Mostrar </p>&nbsp; _MENU_ &nbsp;<p> registros</p>',    
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtrar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Por favor espere - cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
      };
      $(document).ready(function() {
          $('#tb-users-data').DataTable({
            // "serverSide":true,
            "ajax":'{{route("users.create")}}',
            "columns":[
              {data:'name'},
              {data:'username'},
              {data:'email'},
              {data:'created_at'}
            ],
            responsive:true,
            // autoWidth:false
            "lengthMenu": [ [25,50, 100, 200, -1], [25,50, 100, 200, "Mostrar Todo"] ],
            "oLanguage": configLanguageTable
          });
      } );
    </script>
@endsection