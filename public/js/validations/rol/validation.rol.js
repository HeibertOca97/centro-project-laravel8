//confirmacion para eliminar
function actionDelete() {
  $('.formDelete').submit(function(e){
      e.preventDefault();
      confirmDeleteAlert(e.target);    
   });
}

//funcion encargada de remove los estilos de error de la vista
//crear, editar roles
function removeStyleError() {
  let inputs = document.querySelectorAll('input');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].onfocus = ()=>{
      inputs[i].classList.remove('border-danger');
      inputs[i].parentElement.children[0].classList.remove('text-danger');
      inputs[i].parentElement.children[0].classList.add('text-secondary');
      inputs[i].parentElement.children[2].classList.remove('text-danger');
      inputs[i].parentElement.children[2].textContent = "";
    }
  }
}

//Funcion encargada de enviar los datos
function sendDataFormRol() {
  let form = document.querySelector('#formRol');
form.addEventListener('submit',(e)=>{
  e.preventDefault();
  // if(validatedInputTypeText()){
    e.target.submit();
  // }
});
}

//Funcion encargada de contar el numero de elementos chequeados o seleccionados
function listInputChecked(){
  let $inputCheck = document.querySelectorAll('input[type="checkbox"]');
  let num = getSelectTotal();
  for (let i = 0; i < $inputCheck.length; i++) {
    $inputCheck[i].addEventListener('change',()=>{
      if($inputCheck[i].checked === true){
        num++;
        document.querySelector("#select_permission").innerHTML = num;;
      }
      else{
        num--;
        document.querySelector("#select_permission").innerHTML = num;
      }
    });
  }
}
//funcion encargada de mostrar el numero de elementos seleccionados
function numberInputChecked(){
  let $inputCheck = document.querySelectorAll('input[type="checkbox"]:checked');
  setSelectTotal($inputCheck.length)
  document.querySelector("#select_permission").innerHTML = $inputCheck.length;
}

let total = 0;
function setSelectTotal(num){
  total = num;
}

function getSelectTotal(){
  console.log(total);
  return total;
}