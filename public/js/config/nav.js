const $pxmax = "250px",
  $pxdefault = "0px",
  $barra_menu = document.querySelector("#box-nav"),
  $barra_cuenta = document.querySelector("#box-barra-cuenta"),
  $btn_menu = document.querySelector("#icon-mas"),
  $btn_cuenta = document.querySelector("#icon-cuenta"),
  $btn_modo = document.querySelector("#ac-modo"),
  $list_menu = document.querySelector("#bar-menu"),
  $seccion_contenido = document.querySelector("#box-section"),
  $opt_list = document.querySelectorAll(".opt-list");
const max_width_show_bar = 650;
const max_height_modal_config = document.querySelector("#box-barra-cuenta").clientHeight + document.querySelector(".header").clientHeight
//FUNCION QUE APLICA EL ANCHO DE LA BARRA
function estilosBarraMenu(px) {
  $barra_menu.style.maxWidth = px;
  $barra_menu.style.minWidth = px;
}

document.addEventListener("DOMContentLoaded", () => {
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
    //VALIDACION DEL MODAL DE HERRAMIENTAS DE LA CUENTA
    if(window.innerHeight <= max_height_modal_config){
      const mx_height = document.querySelector("#box-barra-cuenta").clientHeight;
      document.querySelector("#box-barra-cuenta").style.minHeight = mx_height+"px";
      document.querySelector("#box-barra-cuenta").style.maxHeight = mx_height+"px";
      document.querySelector("#box-barra-cuenta").style.overflow = "auto";
      document.querySelector("#box-barra-cuenta").lastElementChild.style.marginBottom = window.innerHeight+"px";
    }else{
      document.querySelector("#box-barra-cuenta").lastElementChild.style.marginBottom = "";
    }
  });
  //FUNCIONALIDAD QUE EJECUTA LAS ACCIONES DEL MENU
  ejercutarAccionMenus();
});

/****************************
FUNCIONALIDAD DEL EVENTO CLICK DE LA BARRA DE MENUS
******************************** */
//SI EXISTE EL ELEMENTO
if (document.querySelector("#icon-mas") !== null) {
  $btn_menu.addEventListener("click", accionarBarraMenu);
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
FUNCIONALIDAD DEL EVENTO CLICK DE LA BARRA DE MENUS
******************************** */
//SI EXISTE EL ELEMENTO
if (document.querySelector("#icon-cuenta") !== null) {
  $btn_cuenta.addEventListener("click", accionarBarraOpcionCuenta);
}
function accionarBarraOpcionCuenta() {
  if ($barra_cuenta.getAttribute("state") == "false") {
    $barra_cuenta.setAttribute("state", "true");
    $barra_cuenta.style.visibility = "visible";
    $barra_cuenta.style.opacity = "1";
    activeIcon("var(--cl-text-active-icon)", "var(--bg-active-icon)");
  } else {
    $barra_cuenta.setAttribute("state", "false");
    $barra_cuenta.style.visibility = "";
    $barra_cuenta.style.opacity = "";
    activeIcon("", "");
  }
}
function activeIcon(cl, bg) {
  $btn_cuenta.style.color = cl;
  $btn_cuenta.style.backgroundColor = bg;
}

$(document).ready(()=>{
  console.log("JQuery");
  // $('#icon-mas').css({
  //   color:'red'
  // });
});