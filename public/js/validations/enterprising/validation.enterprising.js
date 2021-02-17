const inputLevelEdu = document.querySelectorAll('input[name="nivel"]'),
inputNameInstitute = document.querySelector('#nom_instituto'),
findIdElement = "n_3";

for (let i = 0; i < inputLevelEdu.length; i++) {
  let runFunctionForDefault = ()=>inputLevelEdu[i].addEventListener('change',e=>toggleElementInput(e));

  document.addEventListener("DOMContentLoaded",runFunctionForDefault);

  toggleElementAnswerEnterprising(inputLevelEdu[i]);
}

function toggleElementAnswerEnterprising(el){
  if(el.getAttribute('id') != findIdElement){
    inputNameInstitute.classList.remove('required');
    $(inputNameInstitute).fadeOut('slow');
  }
}

function toggleElementAnswerEnterprisingError(){
  for (let i = 0; i < inputLevelEdu.length; i++) {
    if(inputLevelEdu[i].checked && inputLevelEdu[i].getAttribute("id") == findIdElement){
      $(inputNameInstitute).fadeIn('slow'); 
      inputNameInstitute.classList.add('required');
    }
  }
}

function toggleElementInput(e){
  if(e.target.getAttribute('id') == findIdElement){
    $(inputNameInstitute).fadeIn('slow');
    inputNameInstitute.classList.add('required');
  }else{
    inputNameInstitute.children[1].value = '';
    $(inputNameInstitute).fadeOut('slow');
    inputNameInstitute.classList.remove('required');
  }
}

function sendDataFormEnterprising(){
  const fr = document.querySelector("#formEmp");
  
  fr.addEventListener('submit',e=>{
    e.preventDefault();
    if(validatedInputTypeText() && validatedInputRequired() && validatedInputEmail() && validatedInputTypeNumber()){
      e.target.submit();
    }
    e.stopPropagation();
  });
}