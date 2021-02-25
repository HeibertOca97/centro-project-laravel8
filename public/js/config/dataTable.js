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

        let el = `
          <div class="d-flex justify-content-center">
          <p><b>Cant:</b> ${$res.length}</p>
          <div class="dropdown ml-2">
          <a class="far fa-eye text-dark d-block" style="text-decoration:none;background:#fff;box-shadow:0px 0px 5px #000;padding:5px;border-radius:50%;" href="#" role="button" id="dropdownPermission" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
          <div class="dropdown-menu" aria-labelledby="dropdownPermission">
        `;
        $res.forEach(obj => {
          el +=`
          <span class="badge badge-dark">${obj.name}</span>
          `;
        });
        el += `</div>
        </div></div>`;
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

function tableCreatePermissions($url){
  $('#tb-permissions-data').DataTable({
    // "serverSide":true,
    "ajax":$url,
    "columns":[
      {data:'name'},
      {data:'description'},
      {data:'created_at'},
      {data:'btn'},
    ],
    responsive:true,
    // autoWidth:false
    "lengthMenu": [ [25,50, 100, 200, -1], [25,50, 100, 200, "Mostrar Todo"] ],
    "oLanguage": configLanguageTable
  });
}

function tableCreateRoles($url){
  $('#tb-roles-data').DataTable({
    // "serverSide":true,
    "ajax":$url,
    "columns":[
      {data:'name'},
      {data:'permissions',render:(data)=>{
        $res = JSON.parse(data);
        if($res){
          let el = `
          <div class="d-flex justify-content-center">
          <p><b>Cant:</b> ${$res.length}</p>
          <div class="dropdown ml-2">
          <a class="far fa-eye text-dark d-block" style="text-decoration:none;background:#fff;box-shadow:0px 0px 5px #000;padding:5px;border-radius:50%;" href="#" role="button" id="dropdownPermission" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
          <div class="dropdown-menu" aria-labelledby="dropdownPermission">
          `;
          $res.forEach(nombre => {
            el +=`
            <span class="badge badge-dark">${nombre}</span>
            `;
          });
          el += `</div>
        </div></div>`;
          return el;
        }

        return "Sin permisos";
      }},
      {data:'created_at'},
      {data:'btn'},
    ],
    responsive:true,
    // autoWidth:false
    "lengthMenu": [ [25,50, 100, 200, -1], [25,50, 100, 200, "Mostrar Todo"] ],
    "oLanguage": configLanguageTable
  });
}

function tableCreatePlanTrabajo($url){
  $('#tb-planesTrabajo-data').DataTable({
    // "serverSide":true,
    "ajax":$url,
    "columns":[
      {data:'evento'},
      {data:'responsables'},
      {data:'lugar'},
      {data:'hora'},
      {data:'fecha'},
      {data:'created_at'},
      {data:'updated_at'},
      {data:'btn'},
    ],
    responsive:true,
    // autoWidth:false
    "lengthMenu": [ [25,50, 100, 200, -1], [25,50, 100, 200, "Mostrar Todo"] ],
    "oLanguage": configLanguageTable
  });
}

function tableCreateMatrizActividades($url){
  $('#tb-matrizActividad-data').DataTable({
    // "serverSide":true,
    "ajax":$url,
    "columns":[
      {data:'miembro'},
      {data:'puesto'},
      {data:'fecha'},
      {data:'horario'},
      {data:'modalidad'},
      {data:'actividades',render:(data)=>{
        let el = ``;
        el+=`<ol class="d-block ml-2">`;
        for (let i = 0; i < data.length; i++) {
          if(data[i] != null){
            el += `
            <li>${data[i]}</li>
            `;
          }
        }
        el+=`</ol>`;
        return el;
      }},
      {data:'observaciones'},
      {data:'created_at'},
      {data:'updated_at'},
      {data:'btn'},
    ],
    responsive:true,
    // autoWidth:false
    "lengthMenu": [ [25,50, 100, 200, -1], [25,50, 100, 200, "Mostrar Todo"] ],
    "oLanguage": configLanguageTable
  });
}

function tableCreateEnterprising($url){
  $('#tb-enterprising-data').DataTable({
    // "serverSide":true,
    "ajax":$url,
    "columns":[
      {data:'cedula'},
      {data:'nombres'},
      {data:'email'},
      {data:'telefonos'},
      {data:'red_wa'},
      {data:'tipo'},
      {data:'creador'},
      {data:'created_at'},
      {data:'updated_at'},
      {data:'btn'},
    ],
    responsive:true,
    // autoWidth:false
    "lengthMenu": [ [25,50, 100, 200, -1], [25,50, 100, 200, "Mostrar Todo"] ],
    "oLanguage": configLanguageTable
  });
}