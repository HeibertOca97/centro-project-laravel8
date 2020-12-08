//funcion encargada de remove los estilos de error de la vista
//crear, editar usuario
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

function sendDataFormUser() {
  let $inputRequired = document.querySelectorAll('input.required'),
  $form = document.querySelector('#formUser');

  $form.addEventListener('submit',(e)=>{
      e.preventDefault();
      let verificador = true;
      for (let i = 0; i < $inputRequired.length; i++) {
        if($inputRequired[i].classList.contains('required') && !$inputRequired[i].value){
          //js/config/messageAlert.js
          campoObligatorio();
          verificador = false;
        }
      }
      if(!document.querySelector('input[name="status"]:checked')){
        //js/config/messageAlert.js
        campoObligatorio();
        verificador = false;
      }
  
      if(verificador== true){
        e.target.submit();
      }
    });
}