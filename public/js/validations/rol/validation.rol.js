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