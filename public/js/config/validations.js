function validatedInputTypeText(){
 let inputString = document.querySelectorAll("input.text");
 let areaString = document.querySelectorAll("textarea.text");
 const expNum = /[0-9]/;
let validacion = true;
  for (let i = 0; i < inputString.length; i++) {
    //VALIDAR CAMPOS SOLO TIPO STRING
    if (expNum.test(inputString[i].value)) {
      let inputName = inputString[i].getAttribute('id');
      toastr["info"](`El formato de caracteres del campo ${inputName} no es valido`, 'Solo texto');
      
      validacion = false;
      return validacion;
    }
  }
  for (let i = 0; i < areaString.length; i++) {
    //VALIDAR CAMPOS SOLO TIPO STRING
    if (expNum.test(areaString[i].value)) {
      let inputName = areaString[i].getAttribute('id');
      toastr["info"](`El formato de caracteres del campo ${inputName} no es valido`, 'Solo texto');
      
      validacion = false;
      return validacion;
    }
  }

  if(validacion == true){
    return validacion;
  }
}

function validatedInputRequired(){
 let inputRequired = document.querySelectorAll("input.required");
 let validacion = true;
  for (let i = 0; i < inputRequired.length; i++) {
    //VALIDAR CAMPOS OBLIGATORIOS
    if (!inputRequired[i].value) {
      // campoObligatorio();
      toastr["warning"](`El campo ${inputRequired[i].getAttribute('id')} es obligatorio, por favor verifique todos aquellos que esten señalados con un (*)`, 'Verificar');
      validacion = false;
      return validacion;
    }
  }
  if(validacion == true){
    return validacion;
  }
}

function validatedInputEmail(){
  const inputMail = document.querySelectorAll("input[type=email]"),
  $expCorreo = /^\w+([\.-]?\w+)*@(?:|hotmail|outlook|yahoo|live|gmail)\.(?:|com|ec)+$/,
    $expCorreoUnesum = /^\w+([\.-]?\w+)*@(?:|unesum)\.(?:|edu)\.(?:|ec)+$/;
  let validacion = true;
  for (let i = 0; i < inputMail.length; i++) {
    if (
      !$expCorreo.test(inputMail[i].value) &&
      !$expCorreoUnesum.test(inputMail[i].value)
    ) {
      toastr["info"](`Introduzca una dirección de correo electrónico válida (hotmail, outlook  yahoo, live, gmail)`, 'Invalido');
      
      validacion = false;
      return validacion;
    }
  }

  if(validacion == true){
    return validacion;
  }
}

function validatedInputTypeNumber(){
  const inputNumber = document.querySelectorAll("input.num");
  
  let validacion = true;
  for (let i = 0; i < inputNumber.length; i++) {
    //VALIDAR CAMPOS SOLO TIPO NUMBER
    if (isNaN(inputNumber[i].value) == true) {
      toastr["info"](`El formato de caracteres del campo ${inputNumber[i].getAttribute('id')} no es valido`, 'Solo numeros');
      
      validacion = false;
      return validacion;
    }
    
  }
  if(validacion == true){
    return validacion;
  }
}

//confirmacion para eliminar
function actionDelete() {
  $('.formDelete').submit(function(e){
      e.preventDefault();
      confirmDeleteAlert(e.target);    
   });
}

//remover estilos de error
function removeStyleErrorFormatOne(typeElement) {
  let el = document.querySelectorAll(typeElement);
  for (let i = 0; i < el.length; i++) {
    if(!el[i].classList.contains('ignore')){
      el[i].onfocus = ()=>{
        el[i].classList.remove('border-danger');
        el[i].parentElement.children[0].classList.remove('text-danger');
        el[i].parentElement.children[0].classList.add('text-secondary');
        el[i].parentElement.children[2].classList.remove('text-danger');
        el[i].parentElement.children[2].textContent = "";
      }
    }
  }
}