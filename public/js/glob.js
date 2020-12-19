//FUNCION QUE CARGA EL MODAL LOADER
window.addEventListener("load", loadedDOM);

function loadedDOM() {
  let boxLoaded = document.querySelector(".box-loaded ");
  boxLoaded.style.visibility = "hidden";
  boxLoaded.style.opacity = "0";
  setTimeout(() => {
    boxLoaded.style.display = "none";
  }, 1200);
}

//POPPER
//Activado de ventana de info
function infoData() {
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
}

//funcion checkeadora
function testCheck(el){
  if(el.checked == false){
     check(el.getAttribute('id'));
  }else{
     uncheck(el.getAttribute('id'));
  }
}

//OPERACIONES - CONVERSION DE TAMAÑO DE ARCHIVOS
function getSizeFile(fileZiseBytes) {
  const sizeLong = fileZiseBytes.toString().length;
  let result = 0,
    sizeType = null;
  //KB
  if (sizeLong > 3 && sizeLong < 7) {
    result = fileZiseBytes / 1024;
    sizeType = "KB";
  }
  //MB
  else if (sizeLong > 6 && sizeLong < 10) {
    result = fileZiseBytes / 1024;
    result = result / 1024;
    sizeType = "MB";
  }
  //GB
  else if (sizeLong > 9) {
    result = fileZiseBytes / 1024;
    result = result / 1024;
    result = result / 1024;
    sizeType = "GB";
  }
  return { sizeFile: result, extencion: sizeType };
}

function check(element){
   document.getElementById(element).checked = true;
}
  
function uncheck(element){
   document.getElementById(element).checked = false;
}

// window.addEventListener('resize',()=>{
//   if(window.innerHeight < 400){
//     document.querySelector('.box-fr').style.marginTop=(window.innerHeight / 2)+'px';
//   }else{
//     document.querySelector('.box-fr').style.marginTop='0';
//   }
// });