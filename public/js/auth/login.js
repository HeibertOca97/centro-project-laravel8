let $inputs = document.querySelectorAll('input'); 

const $box_message = document.querySelector(".box-message-nav"),
$barraInput =document.querySelectorAll('.barra'),
$label = document.querySelectorAll('.info-label'),
$icon = document.querySelectorAll('.style-icon');

//hidden message error
$box_message.addEventListener('click',()=>{
    $box_message.style.display="none";
});
// hidden style error input
for (let i = 0; i < $inputs.length; i++) {
  $inputs[i].addEventListener('focus',()=>{
    $box_message.style.display="none";
    //remover y agregar clases
    removeStyleBarra();
    removeStyleLabelInfo();
    removeStyleIcon();
  });
}
    
// style borde input
function removeStyleBarra(){
  for (let i = 0; i < $barraInput.length; i++) {
    $barraInput[i].classList.remove("cl-barra-invalid");
    $barraInput[i].classList.add("cl-barra-default");   
  }
}

//style color input
function removeStyleLabelInfo(){
  for (let i = 0; i < $label.length; i++) {
    $label[i].classList.remove("cl-label-invalid");
    $label[i].classList.add("cl-label-default");   
  }
}

//style color icon
function removeStyleIcon(){
  for (let i = 0; i < $icon.length; i++) {
    $icon[i].classList.remove("cl-icon-invalid");
    $icon[i].classList.add("cl-icon-default");   
  }
}