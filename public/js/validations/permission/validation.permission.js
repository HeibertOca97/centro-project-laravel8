//confirmacion para eliminar
function actionDelete() {
  $('.formDelete').submit(function(e){
      e.preventDefault();
      confirmDeleteAlert(e.target);    
   });
}

//funcion encargada de remove los estilos de error de la vista
//crear, editar permisos
function removeStyleError() {
  let inputs = document.querySelectorAll('input');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].onfocus = ()=>{
      inputs[i].classList.remove('border-danger');
      inputs[i].parentElement.children[0].classList.remove('text-danger');
      inputs[i].parentElement.children[2].classList.remove('text-danger');
      inputs[i].parentElement.children[2].textContent = "";
    }
  }
}

function sendDataFormPermission() {
  let form = document.querySelector('#formPermission');
form.addEventListener('submit',(e)=>{
  e.preventDefault();
  if(validatedInputTypeText()){
    e.target.submit();
  }
});
}