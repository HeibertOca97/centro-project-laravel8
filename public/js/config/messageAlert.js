//alerta por no haber completado los campos obligatorios
function campoObligatorio(){
  Swal.fire({
  icon: 'error',
  title: 'Invalido',
  text: 'Debe completar los campos obligatorios!',
  footer: 'Verifique aquellos que esten señalados con (*)'
})
}
//alerta para registros exitosos
function successAlert(title,text) {
  Swal.fire({
    icon: 'success',
    title: title,
    text: text,
  })
}