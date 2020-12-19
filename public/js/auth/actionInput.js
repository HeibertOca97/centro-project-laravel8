const $inputPass = document.querySelectorAll('input[type="password"]'),
$lock = document.querySelectorAll("#ico-lock");

//action show input password or text
for (let i = 0; i < $lock.length; i++) {
  $lock[i].addEventListener("click", ()=>showInputPassword(i));
}

function showInputPassword(i) {
  if ($inputPass[i].getAttribute("type") == 'password') {
    $lock[i].classList.replace("fa-lock", "fa-lock-open");
    $inputPass[i].setAttribute("type", "text");
  } else {
    $lock[i].classList.replace("fa-lock-open", "fa-lock");
    $inputPass[i].setAttribute("type", "password");
  }
}

//envia y valida la contraseña de la cuenta del usuario
function sendDataFormUserResetPassword() {
  const $form = document.querySelector('#fr-reset-pass');
  $form.addEventListener('submit',e =>{
    e.preventDefault();
    // js/config/validations.js
      if(validatedInputRequired() && verifySamePassword()){
        e.target.submit();
      }
  });
}

function verifySamePassword(){
  const newPassword = document.querySelector('input[name="password"]'),
  confirmedPassword = document.querySelector('input[name="password_confirmation"]');
  if(newPassword.value === confirmedPassword.value){
    return true;
  }
  toastr["warning"](`Los campos ${newPassword.getAttribute('id')} y ${confirmedPassword.getAttribute('id')} no coinciden`, 'Verificar');
  return false;
}