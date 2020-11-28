const $inputPass = document.querySelectorAll('input[type="password"]'),$lock = document.querySelectorAll("#ico-lock");

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