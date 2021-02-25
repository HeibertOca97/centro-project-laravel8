function sendDataFormPermission() {
  let form = document.querySelector('#formPermission');
form.addEventListener('submit',(e)=>{
  e.preventDefault();
  if(validatedInputTypeText() && validatedInputRequired()){
    e.target.submit();
  }
});
}