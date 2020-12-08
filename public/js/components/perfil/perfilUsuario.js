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

function eventSendUpdateDeleteImage(){
  document.addEventListener('click',(e)=>{
    if(e.target.matches('#cargarfoto')){
      $("input[name='imagen']").trigger("click");
      document.querySelector("#inputFile").addEventListener("change",()=>{
        document.querySelector("#formImage").submit();
      })
    }
    if(e.target.matches('#eliminarfoto')){
      document.querySelector("#formdeleteImage").submit();
    }
  });
}
// fas fa-eye
// fas fa-eye-slash
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
