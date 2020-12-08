const configLanguageTable = {
            "sProcessing":     "Procesando...",
		    "sLengthMenu": '<p>Mostrar </p>&nbsp; _MENU_ &nbsp;<p> registros</p>',    
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "<span>Filtrar:</span>",
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

function tableCreateUsers($url){
  $('#tb-users-data').DataTable({
    // "serverSide":true,
    "ajax":$url,
    "columns":[
      {data:'email'},
      {data:'rol'},
      {data:'permisos', render:(data)=>{
        $res = JSON.parse(data);
        let el = ``;
        $res.forEach(obj => {
          el +=`
          <span class="badge badge-secondary">${obj.name}</span>
          `;
        });
        return el;
      }},
      {data:'status'},
      {data:'created_at'},
      {data:'btn'},
    ],
    responsive:true,
    // autoWidth:false
    "lengthMenu": [ [25,50, 100, 200, -1], [25,50, 100, 200, "Mostrar Todo"] ],
    "oLanguage": configLanguageTable
  });
}