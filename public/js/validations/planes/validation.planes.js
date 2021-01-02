function sendDataFormPlanTrabajo() {
  let form = document.querySelector('#formPlanTrabajo');
form.addEventListener('submit',(e)=>{
  e.preventDefault();
  if(validatedInputTypeText()){
    e.target.submit();
  }
});
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
function exportWorksForYear(){
  const $btn_foryear = document.querySelector('#down-forYear'),
  inputYear = document.querySelector('input[name="year"]');


  $btn_foryear.addEventListener('click',()=>{
    if(inputYear.value){
      inputYear.parentElement.submit();
    }
  });
}