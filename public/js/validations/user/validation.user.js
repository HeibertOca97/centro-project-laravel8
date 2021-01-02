function sendDataFormUser() {
  let $form = document.querySelector('#formUser');

  $form.addEventListener('submit',(e)=>{
      e.preventDefault();
      // js/config/validations.js
      if(validatedInputRequired() && validatedInputTypeText() && inputCheckedRequired('estado') && validatedInputEmail() && validatedInputTypeNumber()){
        e.target.submit();
      }
    });
}

function inputCheckedRequired(name) {
  let verificador = true;
      if(!document.querySelector('input[name="'+name+'"]:checked')){
        //js/config/messageAlert.js
        campoObligatorio();
        verificador = false;
      }
  
      if(verificador== true){
        return verificador;
      }
}

//funcion encargada de accionar el desmarcador de radio checked
function eventClickUnCheck(idElement, nameInput) {
  document.querySelector(`#${idElement}`).addEventListener("click",()=>{
    desmarcar(`${nameInput}`);
  });
}
//funcion encargada de desmarcar (desactivar)
function desmarcar(name){
  $checked = document.querySelectorAll('input[name='+name+']:checked');
  for (let i = 0; i < $checked.length; i++) {
    if($checked[i].checked==true){
      $checked[i].checked = false;
    }
  }
}