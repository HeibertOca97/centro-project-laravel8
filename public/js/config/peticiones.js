/**********************
FUNCION - PARA ENVIAR DATOS AL SERVIDOR
 **********************/
async function sendPostDataDB(url,formData){
  const $url = `${APP_URL}${url}`;
  console.log($url);
  const data = await fetch($url,{
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      // 'Content-Type': 'application/json'
    },
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