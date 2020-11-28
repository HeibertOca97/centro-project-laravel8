// agregarElementoBarraMenu();
  // agregarElementoSectionId();
/*************
FUNCIONALIDADES DEL DOM DISEÑO
*************/

$(document).ready(() => {
  // getUserSessionData();
  console.log("Carga jquery");
});

/*************
FUNCIONALIDADES DE ORDENAMIENTOS DE LOS ELEMENTOS - BARRA DE NAVEGACION Y SECCION DEL CONTENIDO
*************/
function agregarElementoBarraMenu() {
  if ($barra_menu.children.length == 0) {
    $barra_menu.append($list_menu);
  }
}

function agregarElementoSectionId() {
  const contenido = document.querySelector("#box-main-content");
  if (contenido !== null) {
    if ($seccion_contenido.children.length == 0) {
      $seccion_contenido.append(contenido);
    }
  }
}

/****************
FUNCION GENERAL ENCARGADA DE OBTENER LOS DATOS DEL USUARIO LOGEADO
*****************/
async function getUserSessionData() {
  const data = await getUserData('users/list');
  console.log(data);
  // const { imgValidation, userData } = data;
  // const { nombres, apellidos, sexo, foto } = userData;
  // loadPhotoToInterface(foto, sexo, imgValidation);
  // loadUsernameToInterface(nombres, apellidos);
}
//CARGA LA NOMBRE DEL USUARIO EN LA INTERFAZ
function loadUsernameToInterface(nombre, apellido) {
  $(".data-user-names").text(`${nombre} ${apellido}`);
}

//CARGA LA FOTO DEL USUARIO EN  LA INTERFAZ
function loadPhotoToInterface(foto, sexo, validacion) {
  if (!foto || !validacion) {
    if (sexo == "masculino") {
      $(".data-foto-perfil").attr("src", "src/image/perfil/user_man.svg");
    } else {
      $(".data-foto-perfil").attr("src", "src/image/perfil/user_woman.svg");
    }
  } else {
    $(".data-foto-perfil").attr("src", `folder/usuario/${foto}`);
  }
}