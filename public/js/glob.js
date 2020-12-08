//VARIABLES GLOBALES
//ICONOS
// const $icon_success = "fas fa-check-circle",
//   $icon_error = "fas fa-exclamation-triangle",
//   $icon_invalid = "fas fa-times-circle";

//FUNCION QUE CARGA EL MODAL LOADER
window.addEventListener("load", loadedDOM);

function loadedDOM() {
  let boxLoaded = document.querySelector(".box-loaded ");
  boxLoaded.style.visibility = "hidden";
  boxLoaded.style.opacity = "0";
  setTimeout(() => {
    boxLoaded.style.display = "none";
  }, 1200);
}

//FUNCION QUE MUESTRA EL MENSAJE DE ALERTA
// function toggleMensajeAlerta(estado, icono, sms, delay) {
//   if ($("#box-message").children().length < 2) {
//     $("#box-message").html(mensajeAlerta(icono, sms));
//     $("#box-message").addClass(`box-${estado}`);
//     $("#box-message").css("transform", "translateY(0%)");
//     setTimeout(() => {
//       $("#box-message main#msg-alert:last").remove("main:last");
//       $("#box-message").removeClass(`box-${estado}`);
//       $("#box-message").css("transform", "");
//     }, delay);
//   } else {
//     $("#box-message main#msg-alert:last").remove("main:last");
//   }
// }

// //FUNCION ENCARGADA DE VALIDAR EL TIPO DE DATO PERMITIDOS EN LOS INPUTS
// function validateInputData() {
//   const inputs = document.querySelectorAll("input");
//   const inputMail = document.querySelectorAll("input[type=email]"),
//     inputString = document.querySelectorAll("input.text"),
//     inputNumber = document.querySelectorAll("input.num");
//   let validacion = true;
//   const $expCorreo = /^\w+([\.-]?\w+)*@(?:|hotmail|outlook|yahoo|live|gmail)\.(?:|com|ec)+$/,
//     $expCorreoUnesum = /^\w+([\.-]?\w+)*@(?:|unesum)\.(?:|edu)\.(?:|ec)+$/,
//     expText = /[ a-zA-ZÑñÀàÈèÌì]/,
//     expNum = /[0-9]/;

//   for (let i = 0; i < inputs.length; i++) {
//     //VALIDAR CAMPOS OBLIGATORIOS
//     if (!inputs[i].value) {
//       validacion = false;
//       addStyleErrorInput(
//         "input.require",
//         `Campo ${inputs[i].name} es requerido`,
//         i
//       );
//       inputs[i].addEventListener("focus", () =>
//         removeStyleErrorInput("input.require", i)
//       );
//       return { validacion: validacion };
//     }
//   }
//   for (let i = 0; i < inputString.length; i++) {
//     //VALIDAR CAMPOS SOLO TIPO STRING
//     if (expNum.test(inputString[i].value)) {
//       validacion = false;
//       addStyleErrorInput(
//         "input.text",
//         `Solo se permiten caracteres alfabeticos`,
//         i
//       );
//       inputString[i].addEventListener("focus", () =>
//         removeStyleErrorInput("input.text", i)
//       );
//       return { validacion: validacion };
//     }
//   }
  
//   for (let i = 0; i < inputNumber.length; i++) {
//     //VALIDAR CAMPOS SOLO TIPO NUMBER
//     if (isNaN(inputNumber[i].value)) {
//       validacion = false;
//       addStyleErrorInput("input.num", `Solo se permiten caracteres numeros`, i);
//       inputNumber[i].addEventListener("focus", () =>
//         removeStyleErrorInput("input.num", i)
//       );
//       return { validacion: validacion };
//     }
//   }

//   for (let i = 0; i < inputMail.length; i++) {
//     if (
//       !$expCorreo.test(inputMail[i].value) &&
//       !$expCorreoUnesum.test(inputMail[i].value)
//     ) {
//       validacion = false;
//       addStyleErrorInput(
//         "input[type=email]",
//         `Introduzca una dirección de correo electrónico válida`,
//         i
//       );
//       inputMail[i].addEventListener("focus", () =>
//         removeStyleErrorInput("input[type=email]", i)
//       );
//       return { validacion: validacion };
//     }
//   }

//   if (validacion == true) {
//     removeAllStyleErrorInput();
//     return { validacion: validacion };
//   }
// }

// //AGREGAR ESTILO ERROR POR ORDEN
// function addStyleErrorInput(el, sms, i) {
//   const inputs = document.querySelectorAll(el);
//   inputs[i].style.border = "2px solid red";
//   inputs[i].parentElement.children[1].style.color="red";
//   inputs[i].parentElement.children[2].innerHTML = sms;
// }
// //REMOVER ESTILO ERROR POR ORDEN
// function removeStyleErrorInput(el, i) {
//   const inputs = document.querySelectorAll(el);
//   inputs[i].style.border = "";
//   inputs[i].parentElement.children[1].style.color="";
//   inputs[i].parentElement.children[2].innerHTML = "";
// }
// //REMOVER TODO  LOS ESTILOS
// function removeAllStyleErrorInput() {
//   const inputs = document.querySelectorAll("input");
//   for (let i = 0; i < inputs.length; i++) {
//     inputs[i].style.border = "";
//     inputs[i].parentElement.children[2].innerHTML = "";
//   }
// }
// //OPERACIONES - CONVERSION DE TAMAÑO DE ARCHIVOS
// function getSizeFile(fileZiseBytes) {
//   const sizeLong = fileZiseBytes.toString().length;
//   let result = 0,
//     sizeType = null;
//   //KB
//   if (sizeLong > 3 && sizeLong < 7) {
//     result = fileZiseBytes / 1024;
//     sizeType = "KB";
//   }
//   //MB
//   else if (sizeLong > 6 && sizeLong < 10) {
//     result = fileZiseBytes / 1024;
//     result = result / 1024;
//     sizeType = "MB";
//   }
//   //GB
//   else if (sizeLong > 9) {
//     result = fileZiseBytes / 1024;
//     result = result / 1024;
//     result = result / 1024;
//     sizeType = "GB";
//   }
//   return { sizeFile: result, extencion: sizeType };
// }

// //LIMPIAR INPUTS SIN FORM
// function resetInputs(){
//   $inputs=document.querySelectorAll("input");
//   for (let i = 0; i < $inputs.length; i++) {
//     $inputs[i].setAttribute("value","");    
//   }
// }
// function resetInputsTwo(){
//   $inputs=document.querySelectorAll("input");
//   for (let i = 0; i < $inputs.length; i++) {
//     $inputs[i].value = "";    
//   }
// }

// //FUNCION TRANSFORMA LA PRIMERA LETRA EN MAYUSCULA
// function mayusFirstText(string){
//   return string.charAt(0).toUpperCase() + string.slice(1);
// }

//PUSH JS
// Push.create("Hello world!", {
//     body: "Tienes un nuevo mensaje",
//     icon: '{{asset('image/logo/logo.png')}}',
//     timeout: 4000,
//     onClick: function () {
//         window.open("https://www.youtube.com/results?search_query=plugin+de+notificaciones+html","_bland");
//         this.close();
//     }
// });

// const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 
// headers:{
    //   'X-CSRF-TOKEN': token,
    //   // 'Content-Type':'application/json'
    // },

    function testCheck(el){
      if(el.checked == false){
         check(el.getAttribute('id'));
      }else{
         uncheck(el.getAttribute('id'));
      }
   }

function check(element){
   document.getElementById(element).checked = true;
}
  
function uncheck(element){
   document.getElementById(element).checked = false;
}