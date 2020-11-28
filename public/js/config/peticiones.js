/********
FUNCION - OBTENER DATOS DEL USUARIO
**********/
//contolador / accion
async function getUserData(url) {
  const data = await fetch(url);
  
  try {
    if (data.ok) {
      const res = await data.json();
      return res;
    } else {
      throw new Error("Ha ocurrido un error al ejecutar esta peticion");
    }
  } catch (error) {
    console.clear();
    console.log(error.message);
  }
}

async function sendPostUserData(url, formData) {
  const data = await fetch(url,
    {
      method: "POST",
      body: formData,
    }
  );
  try {
    if (data.ok) {
      return data;
    } else {
      throw new Error("Ha ocurrido un error al ejecutar esta peticion");
    }
  } catch (error) {
    console.clear();
    console.log(error.message);
  }
}

/**********************
FUNCION - OBTENEDOR DE CUALQUIER DATO
 **********************/
async function getAllDataDB(url) {
  const data = await fetch(url);
  try {
    if (data.ok) {
      const res = await data.json();
      return res;
    } else {
      throw new Error("Ha ocurrido un error al ejecutar esta peticion");
    }
  } catch (error) {
    console.log(error.message);
    console.clear();
  }
}
/**********************
FUNCION - PARA ENVIAR DATOS AL SERVIDOR
 **********************/
async function sendPostDataDB(url,formData){
  const data = await fetch(url,{
    method:"POST",
    body:formData
  })
  try {
    if(data.ok){
      return data;
    }else{
      throw new Error("Ha ocurrido un error al ejecutar esta peticion");
    }
  } catch (error) {
    console.clear();
    console.log(error.message)
  }
}
/*****************
 * REDIRECT
 * ***************/
function redirect(controller,action){
  return `index.php?controller=${controller}&action=${action}`;
}