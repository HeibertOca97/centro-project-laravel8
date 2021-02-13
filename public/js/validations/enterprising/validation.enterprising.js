const inputLevelEdu = document.querySelectorAll('input[name="nivel"]'),
inputNameInstitute = document.querySelector('#nom_instituto'),
findIdElement = 'n_3';

for (let i = 0; i < inputLevelEdu.length; i++) {
  let runFunctionForDefault = ()=>inputLevelEdu[i].addEventListener('change',e=>toggleElementInput(e));

  document.addEventListener("DOMContentLoaded",runFunctionForDefault);

  document.addEventListener("DOMContentLoaded",()=>toggleElementAnswerEnterprising(inputLevelEdu[i]));
}

function toggleElementAnswerEnterprising(el){
  if(el.getAttribute('id') == findIdElement && el.checked){
    $(inputNameInstitute).fadeIn('slow');
  }else{
    $(inputNameInstitute).fadeOut('slow');
  }
}

function toggleElementInput(e){
  if(e.target.getAttribute('id') == findIdElement){
    $(inputNameInstitute).fadeIn('slow');
  }else{
    inputNameInstitute.children[1].value = '';
    $(inputNameInstitute).fadeOut('slow');
  }
}
