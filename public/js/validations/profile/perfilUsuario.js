//envia y valida la informacion del perfil del usuario
function sendDataFormUpdatedUser() {
  const $form = document.querySelector('#form-perfil'),
    ci = document.querySelector("input[name='cedula']"),
    email = document.querySelector("input[name='email']"),
    username = document.querySelector("input[name='username']");
  $form.addEventListener('submit',e =>{
    e.preventDefault();
    // js/config/validations.js
      if(validatedInputRequired() && validatedInputTypeText() && validatedInputEmail() && validatedInputTypeNumber() && ci.getAttribute('state') == "true" && email.getAttribute('state') == "true" && username.getAttribute('state') == "true"){
        e.target.submit();
      }
  });
}
let inputUnique = document.querySelectorAll('.unique');
for (let i = 0; i < inputUnique.length; i++) {
  if(inputUnique[i].value){
    inputUnique[i].setAttribute('state',true);    
  }else{
    inputUnique[i].setAttribute('state',false);    
  }
}
function actionValidationInput(action){
  for (let i = 0; i < inputUnique.length; i++) {
    inputUnique[i].addEventListener('change',e=>validatedIdentityData(e,action));    
  }
}
//validacion de cedula
function validatedIdentityData(e,action) {
  const nameElement = e.target.getAttribute('name'),
  elementInput = e.target;

  validatedRequestInput(nameElement,elementInput,action);
}

let validatedRequestInput = (nameElement,elementInput,action)=>{
  switch (nameElement) {
    case 'cedula':
      sendRequestData(nameElement,elementInput,action);
      break;
    case 'username':
      sendRequestData(nameElement,elementInput,action);
      break;
    case 'email':
      sendRequestData(nameElement,elementInput,action);
      break;
  
    default:
      break;
  }
}
let sendRequestData = async (name, input, action)=>{
  const url = "users/profiles/validated-data-user-authentique",
  fr = new FormData(); 
  fr.append('action',action);
  fr.append('column',name);
  fr.append(`${name}`,input.value);
  
  let data = await sendPostDataDB(url,fr);
  let response = await data.json();
  const {res} = response;
  validatedAction(input,name,res);
}
function validatedAction(input,name,state){
  if(state === true && typeof state == "boolean"){
    input.setAttribute('state',state); 
  }else{
    input.setAttribute('state',state); 
    addStyleErrorInput(`input[name="${name}"]`,'Este dato ya existe');
  }
}
//envia y valida la contraseña de la cuenta del usuario
function sendDataFormUpdatedUserPassword() {
  const $form = document.querySelector('#fr-Password');
  $form.addEventListener('submit',e =>{
    e.preventDefault();
    // js/config/validations.js
      if(validatedInputRequired() && verifySamePassword()){
        e.target.submit();
      }
  });
}
//valida la foto del usuario
async function sendUpdatedFilePhotoUser(formFoto) {
  const extImg = /\.(png|jpg|jpeg)$/i;
  const formData = new FormData(formFoto);
  const imagenFile = formData.get("imagen");
  const { sizeFile, extencion } = getSizeFile(imagenFile.size);
  let validation = imagenFile.size <= 2000000 ? true : false;
  if (extImg.test(imagenFile.name)) {
    if (validation) {
      formFoto.submit();
    } else {
      formFoto.reset();
      const sms =
        "La imagen a superado el peso permitido con unos " +
        sizeFile.toFixed(1) +
        extencion;

        toastr["warning"](`${sms}`, 'Verificar');
    }
  } else {
    formFoto.reset();
    const sms =
      "El formato del archivo que esta tratando de subir no es permitido";
      toastr["warning"](`${sms}`, 'Verificar');
  }
}

//validacion de constrasña
function verifySamePassword(){
  const newPassword = document.querySelector('input[name="contraseñaNueva"]'),
  confirmedPassword = document.querySelector('input[name="contraseñaConfirmacion"]');
  if(newPassword.value === confirmedPassword.value){
    return true;
  }
  toastr["warning"](`Los campos ${newPassword.getAttribute('id')} y ${confirmedPassword.getAttribute('id')} no coinciden`, 'Verificar');
  return false;
}

//funcion encargada de remove los estilos de error de la vista
//crear, editar usuario
function removeStyleError() {
  let inputs = document.querySelectorAll('input');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].onfocus = ()=>{
      inputs[i].classList.remove('border-danger');
      inputs[i].parentElement.children[0].classList.remove('text-danger');
      if(document.querySelectorAll('#fr-Password').length){
        inputs[i].parentElement.children[0].children[0].classList.remove('text-danger');
      }
      inputs[i].parentElement.children[2].classList.remove('text-danger');
      inputs[i].parentElement.children[2].textContent = "";
    }
  }
}
//envia y verifica la imagen del usuario
function eventSendUpdateDeleteImage(){
  document.addEventListener('click',(e)=>{
    if(e.target.matches('#cargarfoto')){
      $("input[name='imagen']").trigger("click");

      document.querySelector("#inputFile").addEventListener("change",(e)=>{
        sendUpdatedFilePhotoUser(e.target.parentElement);
      })
    }

    if(e.target.matches('#eliminarfoto')){
      document.querySelector("#formdeleteImage").submit();
    }
  });
}

function showHidePassword(){
  let $icon_eye = document.querySelectorAll('.ico-eyes');
  for (let i = 0; i < $icon_eye.length; i++) {
    $icon_eye[i].addEventListener('click',()=>{
      if($icon_eye[i].classList.contains('fa-eye')){
        $icon_eye[i].classList.replace('fa-eye','fa-eye-slash');
        $icon_eye[i].parentElement.parentElement.children[1].setAttribute('type','text');
      }else{
        $icon_eye[i].classList.replace('fa-eye-slash','fa-eye');
        $icon_eye[i].parentElement.parentElement.children[1].setAttribute('type','password');
      }
    });
  }
}
