function sendDataFormMatrizActividad() {
  let form = document.querySelector('#mActividad');
  form.addEventListener('submit',(e)=>{
    e.preventDefault();
    if(validatedInputTypeText() && validatedInputRequired() && $fecha.getAttribute('state') == "true"){
      e.target.submit();
    }
  });
}
//para validar la fecha del registro de actividades
const $Miembro = document.getElementById('miembro');
let $fecha = document.querySelector('#fecha');
if($fecha){
  $fecha.setAttribute('state',true);
  //funcionalidad encargada de verificar si ya existe un registro con esa fecha
  function setMode(modo,accion,fechaActual){
    switch (modo) {
      case 'personal':
        $fecha.addEventListener('change',(e)=>existingDateActivitiesPersonal(e,accion,fechaActual));
      break;
      case 'general':
        $fecha.addEventListener('change',()=>existingDateActivitiesGeneral(accion,fechaActual));  
        $Miembro.addEventListener('change',()=>{
          if($fecha.value){
            existingDateActivitiesGeneral(accion,fechaActual);
          } 
        }); 
      break;
      // default:
      //   break;
    }
  }
}
//create activitie - interfaz personal
async function existingDateActivitiesPersonal(e,action,fechaActual){
  const url = "works/mis-actividades/fecha-existente";
  let form, data, response; 
  form = new FormData();
  form.append('fecha',e.target.value);
  form.append('action',action);
  if(action == 'created'){
    data = await sendPostDataDB(url,form);
    response = await data.json();
    const {res} = response;
    //respuesta: true/false, elemento, tipo de modo
    validatedRequest(res,e.target,'personal');
  }else{
    form.append('fechaActual',fechaActual);
    data = await sendPostDataDB(url,form);
    response = await data.json();
    const {res} = response;
    //respuesta: true/false, elemento, tipo de modo
    validatedRequest(res,e.target,'personal');
  }
}

async function existingDateActivitiesGeneral(action,fechaActual){
  const url = "works/actividades/fecha-existente";
  let form, data, response; 
  form = new FormData();
  form.append('miembro',$Miembro.value);
  form.append('fecha',$fecha.value);
  form.append('action',action);
  if(action == 'created'){
    data = await sendPostDataDB(url,form);
    response = await data.json();
    const {res} = response;
    //respuesta: true/false, elemento, tipo de modo
    validatedRequest(res,$fecha,'general');
  }else{
    form.append('fechaActual',fechaActual);
    data = await sendPostDataDB(url,form);
    response = await data.json();
    const {res} = response;
    //respuesta: true/false, elemento, tipo de modo
    validatedRequest(res,$fecha,'general');
  }
}

let validatedRequest = (res,el,typeMode)=>{
  switch (res) {
    case true:
      el.setAttribute('state',false);
      addStyleErrorInput('input[type="date"]','Ya existe un registro con esta fecha');
    break;
  
    default:
      if(typeMode=='personal'){
        el.setAttribute('state',true);
        removeStyleErrorInput('input[type="date"]');
      }else{
        if($Miembro.value !== null){
          el.setAttribute('state',true);
          removeStyleErrorInput('input[type="date"]');
        }
      }
    break;
  }
}
//funcionalidad para la exportacion o descarga de documento
function addMonthsYearSelect(el){
  let $months =['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']; 
    let select = ``;
    for (let i = 0; i < 12; i++) {
      select += `
        <option value="${i+1}">${$months[i]}</option>
      `;
    }
    for (let i = 0; i < document.querySelectorAll(el).length; i++) {
      document.querySelectorAll(el)[i].innerHTML = select; 
    }
}

//funcion para las exportacion
function exportWorksForMonths(){
  const $btn_formonth= document.querySelector('#down-forMonth'),
  f_ini= document.querySelector('input[name="f_inicio"]'),
  f_fin= document.querySelector('input[name="f_fin"]');


  $btn_formonth.addEventListener('click',()=>{
    if(f_ini.value && f_fin.value){
      f_ini.parentElement.submit();
    }
  });
}

//funcionalidad del creador de elemento
// elemento textarea para insertar las actividades
let numValue = 1;
let $inputNumber = document.querySelector('#number');
const $btnIncrement = document.querySelector('#btn-increment'),
 $btnDecrement = document.querySelector('#btn-decrement');

function setNumElement(value) {
  numValue = value;
}

function getNumElement() {
  return numValue;
}
//Funcionalidades principales
//ACCION ---- obtener el valor del input number y crear el emento inicial por defecto
function getNumberElementCreate(numberObject){
  let totalElement = numberObject;
  $inputNumber.value = totalElement;
  let getValue = $inputNumber.getAttribute('value');
  setNumElement(totalElement);
  for (let i = 0; i < getValue; i++) {
    createdInput();
  }
}
//ACCION ---- recuperar los valores de los textarea una vez que recargue el navegador
function returnValueElementCreated(indice,value) {
  document.querySelector('.box-activities').children[indice].children[0].innerHTML = value;  
}

function createdElementForDefault(){
  let getValue = $inputNumber.getAttribute('value');
  setNumElement(getValue);
  for (let i = 0; i < getValue; i++) {
    createdInput();
  }
}

//ACCION ----
function actionEventChangeInputNumber(){
  $inputNumber.addEventListener('change',(e)=>validatedCreatedAndRemoveElements(e.target.value));
}
//ACCION ---- 
function actionEventKeyupInputNumber(){
  $inputNumber.addEventListener('keyup',(e)=>validatedCreatedAndRemoveElements2(e.target.value));
}
//ACCION ---- incrementar y disminuir elemento con los botones
function actionEventIncrementAndDecrementButton(){
  $btnIncrement.addEventListener('click',()=>{
    let num = getNumElement();
    num++;
    $inputNumber.value = num;
    validatedCreatedAndRemoveElements(num);
    validatedCreatedAndRemoveElements2(num);
  });
  
  $btnDecrement.addEventListener('click',()=>{
    let num = getNumElement();
    if(num > 0){
      num--;
    }
    $inputNumber.value = num;
    validatedCreatedAndRemoveElements(num);
    validatedCreatedAndRemoveElements2(num);
  });
}

//ACCION ---- eliminar elementos [actividades]
function actionEventDeleteElement(){
  document.addEventListener('click',e=>{
    if(e.target.matches('span.act-delete')){
      let numElement = e.target.parentElement.parentElement.childElementCount - 1;
      if(e.target.parentElement.parentElement.childElementCount > 1){
        e.target.parentElement.parentElement.removeChild(e.target.parentElement);
        //actualizar valor
        $inputNumber.value = numElement;
        setNumElement(numElement);
      }
    }
  });
}

//fin de la funcionalidades principales

//funcionalidades - recursos, metodos

function validatedCreatedAndRemoveElements(value){
  let inputValue = value,
  contentInputs = document.querySelector('.box-activities');
  
  if(inputValue > contentInputs.childElementCount){
    createdInput();
    setNumElement(inputValue);
  }else if(inputValue < contentInputs.childElementCount && inputValue > 0){
    removeInput();
    setNumElement(inputValue);
  }

  if(inputValue < 1){
    contentInputs.children[0].children[0].value = "";
  }
}

function validatedCreatedAndRemoveElements2(value) {
  let inputValue = parseInt(value);
  let contentInputs = document.querySelector('.box-activities');
  for (let i = 0; i < inputValue; i++) {
    if(inputValue > contentInputs.childElementCount){
      createdInput();
      setNumElement(inputValue);
    }
  }
  for (let i = contentInputs.childElementCount; i > inputValue; i--) {
    if(inputValue < contentInputs.childElementCount && inputValue > 0){
      removeInput();
      setNumElement(inputValue);
    }
  }

  if(inputValue == 0 && inputValue != ""){
    contentInputs.children[0].children[0].value = "";
  }
}

function createdInput($value = null){
  let div = document.createElement('div'),
  textarea = document.createElement('textarea'),
  span = document.createElement('span');
  //styles
  //div
  div.setAttribute('class','mt-4 mb-4');
  //span
  span.setAttribute('class','far fa-trash-alt act-delete');
  //textarea
  textarea.setAttribute('name','actividades[]');
  textarea.setAttribute('autocomplete','off');
  textarea.setAttribute('class','form-control textarea-activity');
  textarea.setAttribute('placeholder',`Actividad`);
  textarea.textContent = $value;
  textarea.style.display = 'block';

  div.appendChild(textarea);
  div.appendChild(span);
  document.querySelector('.box-activities').appendChild(div);
}

function removeInput() {
  let childElement = document.querySelector('.box-activities').lastChild;
  document.querySelector('.box-activities').removeChild(childElement);
}