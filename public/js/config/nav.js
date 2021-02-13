const APP_URL="http://centro.test/";
const $pxmax = "250px",
  $pxdefault = "0px",
  $barra_menu = document.querySelector("#box-nav"),
  $barra_cuenta = document.querySelector("#box-barra-cuenta"),
  $barra_notify = document.querySelector("#box-barra-notify"),
  $btn_menu = document.querySelector("#icon-mas"),
  $btn_cuenta = document.querySelector("#icon-cuenta"),
  $btn_notify = document.querySelector("#icon-notify"),
  $btn_modo = document.querySelector("#ac-modo"),
  $list_menu = document.querySelector("#bar-menu"),
  $seccion_contenido = document.querySelector("#box-section"),
  $opt_list = document.querySelectorAll(".opt-list");

  const max_width_show_bar = 650,
max_height_modal_Cuenta = $barra_cuenta.clientHeight + document.querySelector(".header").clientHeight,
max_height_modal_Notificacion = $barra_notify.clientHeight + document.querySelector(".header").clientHeight;

//FUNCION QUE APLICA EL ANCHO DE LA BARRA
function estilosBarraMenu(px) {
  $barra_menu.style.maxWidth = px;
  $barra_menu.style.minWidth = px;
}

document.addEventListener("DOMContentLoaded", () => {
  //FUNCIONALIDAD DE LAS LISTAS DE SUBMENUS - QUE ADOPTA LAS REGLAS Y ESTILOS POR DEFECTO
  ejecutarAccionMenuPorDefecto();
  //FUNCIONALIDAD QUE SE EJECUTA AL CARGAR EL SITIO
  if (
    window.innerWidth > max_width_show_bar &&
    $barra_menu.getAttribute("state") == "false"
  ) {
    $barra_menu.setAttribute("state", "true");
    estilosBarraMenu("250px");
    activeIconMenu("var(--cl-text-active-icon)", "var(--bg-active-icon)");
  } else {
    $barra_menu.setAttribute("state", "false");
    estilosBarraMenu("0px");
    activeIconMenu("", "");
  }

  //FUNCIONALIDAD QUE SE EJECUTA AL REDIMENSIONAR LA VENTANA
  window.addEventListener("resize", () => {
    if (window.innerWidth > max_width_show_bar) {
      estilosBarraMenu("250px");
      $barra_menu.setAttribute("state", "true");
      activeIconMenu("var(--cl-text-active-icon)", "var(--bg-active-icon)");
    } else {
      estilosBarraMenu("0px");
      $barra_menu.setAttribute("state", "false");
      activeIconMenu("", "");
    }
    //VALIDACION DEL ALTO DEL MODAL DE HERRAMIENTAS
    toolWindowHeight(max_height_modal_Cuenta,'box-barra-cuenta');
    toolWindowHeight(max_height_modal_Notificacion,'box-barra-notify');
  });
  //VALIDACION DEL ALTO DEL MODAL DE HERRAMIENTAS
  toolWindowHeight(max_height_modal_Cuenta,'box-barra-cuenta');
  toolWindowHeight(max_height_modal_Notificacion,'box-barra-notify');
  //FUNCIONALIDAD QUE EJECUTA LAS ACCIONES DEL MENU
  ejercutarAccionMenus();
});

function toolWindowHeight(maxHeightWindowModal,el){
  if(window.innerHeight <= maxHeightWindowModal){
      const mx_height = document.getElementById(el).clientHeight;
      
      document.getElementById(el).style.minHeight = mx_height+"px";
      document.getElementById(el).style.maxHeight = mx_height+"px";
      document.getElementById(el).style.overflow = "auto";
      mx=mx_height - 50;
      document.getElementById(el).lastElementChild.style.marginBottom = mx+"px";
      document.getElementById(el).lastElementChild.style.display = "block";
    }else{
      document.getElementById(el).lastElementChild.style.marginBottom = "";
      document.getElementById(el).lastElementChild.style.display = "none";
    }
}
/****************************
FUNCIONALIDAD DEL EVENTO CLICK DE LA BARRA DE MENUS
******************************** */
//SI EXISTE EL ELEMENTO
if (document.querySelector("#icon-mas") !== null) {
  $btn_menu.addEventListener("click", ()=>{
    accionarBarraMenu();
    inactiveBarOptionAccount('box-barra-cuenta','icon-cuenta');
    inactiveBarOptionAccount('box-barra-notify','icon-notify');
  });
}

function validarBarraMenu() {
  if ($barra_menu.getAttribute("state") == "false") {
    $barra_menu.setAttribute("state", "true");
    return true;
  } else {
    $barra_menu.setAttribute("state", "false");
    return false;
  }
}
function accionarBarraMenu() {
  if (validarBarraMenu()) {
    estilosBarraMenu($pxmax);
    activeIconMenu("var(--cl-text-active-icon)", "var(--bg-active-icon)");
  } else {
    estilosBarraMenu($pxdefault);
    ocultarMenus();
    activeIconMenu("", "");
  }
}
function activeIconMenu(cl, bg) {
  $btn_menu.style.color = cl;
  $btn_menu.style.backgroundColor = bg;
}
/*******************
FUNCIONALIDAD DE LOS ENLACES DE LA BARRA MENU
********************/
//accion que se ejecutar al cargar el sitio
function ejecutarAccionMenuPorDefecto(){
  for (let i = 0; i < $opt_list.length; i++) {
    if ($opt_list[i].children.length > 1) {
      toggleListMenuDefault(i);
    }
  }
}

function toggleListMenuDefault(i) {
  if ($opt_list[i].children[0].getAttribute("state") === "true") {
    let alto_el = ($opt_list[i].children[1].children[0].clientHeight / 2) - 1,
      num_el = $opt_list[i].children[1].children.length;
      console.log(alto_el, num_el, alto_el/2)
    $opt_list[i].children[0].setAttribute("state", "true");
    $opt_list[i].children[1].style.height = alto_el * num_el + "px";
    $opt_list[i].children[0].children[2].setAttribute(
      "class",
      "fas fa-minus"
    );
  } else {
    $opt_list[i].children[0].setAttribute("state", "false");
    $opt_list[i].children[1].style.height = "0px";
    $opt_list[i].children[0].children[2].setAttribute("class", "fas fa-plus");
  }
}
//accion que se ejecutar cuando se activa el evento click
function ejercutarAccionMenus() {
  for (let i = 0; i < $opt_list.length; i++) {
    if ($opt_list[i].children.length > 1) {
      desplegarListMenu(i);
    }
  }
}

function desplegarListMenu(i) {
  $opt_list[i].children[0].addEventListener("click", () => {
    if ($opt_list[i].children[0].getAttribute("state") === "false") {
      let alto_el = $opt_list[i].children[1].children[0].clientHeight,
        num_el = $opt_list[i].children[1].children.length;
      $opt_list[i].children[0].setAttribute("state", "true");
      $opt_list[i].children[1].style.height = alto_el * num_el + "px";
      $opt_list[i].children[0].children[2].setAttribute(
        "class",
        "fas fa-minus"
      );
    } else {
      $opt_list[i].children[0].setAttribute("state", "false");
      $opt_list[i].children[1].style.height = "0px";
      $opt_list[i].children[0].children[2].setAttribute("class", "fas fa-plus");
    }
  });
}

function ocultarMenus() {
  for (let i = 0; i < $opt_list.length; i++) {
    $opt_list[i].children[0].setAttribute("state", "false");
    $opt_list[i].children[1].style.height = "0px";
    $opt_list[i].children[0].children[2].setAttribute("class", "fas fa-plus");
  }
}
/****************************
FUNCIONALIDAD DEL EVENTO CLICK PARA OCULTAR LAS BARRAS DE OPCIONES
******************************** */
//ocultar ventana de cuenta
document.addEventListener('click',(e)=>{
  if (e.target.matches('header.header')) {
  inactiveBarOptionAccount('box-barra-cuenta','icon-cuenta');
  inactiveBarOptionAccount('box-barra-notify','icon-notify');
  }
});
/****************************
FUNCIONALIDAD DEL EVENTO CLICK DE LA BARRA DE NOTIFICACIONES
******************************** */
//SI EXISTE EL ELEMENTO
if (document.querySelector("#icon-notify") !== null) {
  $btn_notify.addEventListener("click", ()=>{
    activeBarOptionAccount('box-barra-notify','icon-notify');
    inactiveBarOptionAccount('box-barra-cuenta','icon-cuenta');
  });
}
/****************************
FUNCIONALIDAD DEL EVENTO CLICK DE LA BARRA DE MENUS
******************************** */
//SI EXISTE EL ELEMENTO
if (document.querySelector("#icon-cuenta") !== null) {
  $btn_cuenta.addEventListener("click", ()=>{
    activeBarOptionAccount('box-barra-cuenta','icon-cuenta');
    inactiveBarOptionAccount('box-barra-notify','icon-notify');
  });
}
function activeBarOptionAccount(el,btnId) {
  if (document.getElementById(el).getAttribute("state") == "false") {
    document.getElementById(el).setAttribute("state", "true");
    document.getElementById(el).style.visibility = "visible";
    document.getElementById(el).style.opacity = "1";
    activeIcon(btnId,"var(--cl-text-active-icon)", "var(--bg-active-icon)");
  } else {
    document.getElementById(el).setAttribute("state", "false");
    document.getElementById(el).style.visibility = "";
    document.getElementById(el).style.opacity = "";
    activeIcon(btnId,"", "");
  }
}

function activeIcon(el,cl, bg) {
  document.getElementById(el).style.color = cl;
  document.getElementById(el).style.backgroundColor = bg;
}

function inactiveBarOptionAccount(el,btnId){
  document.getElementById(el).setAttribute("state", "false");
  document.getElementById(el).style.visibility = "";
  document.getElementById(el).style.opacity = "";
  activeIcon(btnId,"", "");
}
