/*************
FUNCIONALIDADES DEL DOM DISEÑO
*************/

$(document).ready(() => {
  // getUserSessionData();
  console.log("Carga jquery");
});

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