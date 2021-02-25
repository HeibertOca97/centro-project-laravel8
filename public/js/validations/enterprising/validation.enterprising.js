function sendDataFormEnterprising(){
  const fr = document.querySelector("#formEmp");
  
  fr.addEventListener('submit',e=>{
    e.preventDefault();
    e.target.submit();
    // if(validatedInputTypeText() && validatedInputRequired() && validatedInputEmail() && validatedInputTypeNumber()){
    //   e.target.submit();
    // }
    e.stopPropagation();
  });
}
//FUNCIONALIDAD DEL FORMULARIO PARA EMPRENDEDORES CON EMPRENDIMIENTOS
//FUNCIONALIDAD PARA: ¿Trabajas actualmente?
// tb_actual = trabajas actualmente
let tb_actual = document.querySelectorAll("input[name=tipotrabajo]");
const var_si = document.querySelector("#tb_1"),
var_no = document.querySelector("#tb_0");

document.addEventListener("DOMContentLoaded",()=>{
  if(var_si && var_no && tb_actual){
    validationQuestionsYesOrNot();
    selectQuestionForYes();
  }
});
function validationQuestionsYesOrNot(){
  var_si.addEventListener('change',(e)=>{
    if(e.target.checked){
      for(let i=0;i<tb_actual.length;i++){
        toggleStyleInputRadioOption(tb_actual[i].parentElement.children[1],true);
      }
    }
  });
  var_no.addEventListener('change',(e)=>{
    //Si la opcion "no" esta chequeada, desmarcar todo los tipos de trabajo actual
    if(e.target.checked){
      for(let i=0;i<tb_actual.length;i++){
        tb_actual[i].checked = false;
        toggleStyleInputRadioOption(tb_actual[i].parentElement.children[1],false);
      }
    }
  });
}

function toggleStyleInputRadioOption(inputElement,bool){
  if(bool == true){
    inputElement.classList.replace('input-check-disabled','input-check-enabled');
  }else{
    inputElement.classList.replace('input-check-enabled','input-check-disabled');
  }
}
function selectQuestionForYes() {
  
  for(let i=0;i<tb_actual.length;i++){
    tb_actual[i].addEventListener('change',e=>{
      const mensaje = `Para desbloquear y escoger una de estas opciones debe responder que "SI", si esta trabajando actualmente.`;
      //Si la opcion "no" esta chequeada no permitir escoger una opcion por eso todo en estado FALSE
      if(var_no.checked){
        toastr["info"](mensaje, 'Info');
        e.target.checked=false;
      }else{
        if(!var_si.checked && !var_no.checked){
          toastr["info"](mensaje, 'Info');
          e.target.checked=false;
        }
      }
    });
  }
}

//FUNCIONALIDAD PARA: En caso de que trabajas en relacion de dependencia ¿ En que sector trabajas?
let inputSector = document.querySelectorAll("input[name=sector_tb]");
const inputOtroSector = document.querySelector("#sector_tb"),
inputTextSector = document.querySelector("#otro");

document.addEventListener("DOMContentLoaded",()=>{
  if (inputSector && inputOtroSector && inputTextSector) {
    //oculta el campo otro
    applyStyleForDefaultInputSector();
    //muestra el campo "otro" para ingresar el dato
    removeStyleDefaultInputSector();
    //recorre toda las opciones y oculta el campo sector si no esta chequeado la opcion "otro"
    validatedRemoveStyleInputSector();
  }
});
//Por defecto
function applyStyleForDefaultInputSector(){
  if(inputOtroSector.checked != true){
    inputTextSector.setAttribute('disabled','');
    inputTextSector.setAttribute("placeholder","Ingrese el sector" );
    $(inputTextSector).parent().fadeOut();
  }else{
    inputTextSector.removeAttribute('disabled');
    inputTextSector.setAttribute("placeholder","Ingrese el sector" );
    $(inputTextSector).parent().fadeIn();
  }
}

//Si esta chequedo el input "otro" habilidar y mostrar el campo "otro" para llenar.
function removeStyleDefaultInputSector(){
  inputOtroSector.addEventListener('change',e=>{
    if(e.target.checked){
      inputTextSector.removeAttribute('disabled');
      inputTextSector.setAttribute("placeholder","Ingrese el sector" );
      $(inputTextSector).parent().fadeIn();
    }
  });
}

//Recorrer toda las opciones
function validatedRemoveStyleInputSector(){
  for (let i = 0; i < inputSector.length; i++) {
    inputSector[i].addEventListener('change',(e)=>{
      //Si se esta chequeado otro input que no sea el input "otro" desabilitar y ocultar campo "otro" .
      if(e.target != inputOtroSector){
        inputTextSector.setAttribute('disabled','');
        inputTextSector.setAttribute("placeholder","Ingrese el sector" );
        $(inputTextSector).parent().fadeOut();
        inputTextSector.value = '';
      }
    });
  }
}

//FUNCIONALIDAD DEL FORMULARIO PARA LOS NUEVOS EMPRENDEDORES
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
  if(e.target.getAttribute('id') == findIdElement && document.querySelector(`input[name=nivel]:checked`)){
    $(inputNameInstitute).fadeIn('slow');
    inputNameInstitute.classList.add('required');
  }else{
    inputNameInstitute.children[1].value = '';
    $(inputNameInstitute).fadeOut('slow');
    inputNameInstitute.classList.remove('required');
    inputNameInstitute.setAttribute('disabled','');
  }
}

