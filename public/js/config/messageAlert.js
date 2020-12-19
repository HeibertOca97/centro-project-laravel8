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

//alerta de error
function errorAlert(title,text) {
  Swal.fire({
  icon: 'error',
  title: title,
  text: text,
  })
}
//alerta de confirmacion
function confirmDeleteAlert(form){
  Swal.fire({
  title: 'Estas seguro?',
  text: "¡No podrás revertir esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
  }
})
}

function deleteAlert(text) {
  Swal.fire(
      'Eliminado!',
      `${text}!`,
      'success'
    )
}