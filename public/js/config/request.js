/**********************
FUNCION - MODE POST
 **********************/
async function sendPostDataDB(url,formData){
  const $url = `${APP_URL}${url}`;
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
  } catch (er) {
    console.error(er.message)
    console.clear();
  }
}
/**********************
FUNCION - MODE POST
 **********************/
async function sendPostUrlCompleted(url,formData){
  const $url = `${url}`;
  const data = await fetch($url,{
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      // 'Content-Type': 'application/json'
    },
    method:"post",
    body:formData
  })
  try {
    if(data.ok){
      return data;
    }else{
      throw new Error("Ha ocurrido un error al ejecutar esta peticion");
    }
  } catch (er) {
    console.error(er.message)
    console.clear();
  }
}