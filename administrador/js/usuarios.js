const formulario = document.getElementById('formulario');
//constates de inputs para valdiar
const usuario = document.getElementById('usuario');
const constrasena = document.getElementById('constrasena');
const TipUsuario = document.getElementById('TipUsuario');
//alertas de errores de los campos
const alertaUsuario = document.getElementById('alertaUsuario');
const alertaContrasena = document.getElementById('alertaContrasena');
const alertaTpUsuario = document.getElementById('alertaTpUsuario');
//rangos de campos
const regUsuario = /^[a-zA-Z0-9\_\-@$?¡\-_\/\\]{4,10}$/;
const regConstrasena = /^.{8,20}$/;
const pintarMensajeError = () => {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Error falta elementos por llenar',
  })
};

const pintarMensajeNo = (errores) => {
  errores.forEach((item) => {
    item.tipo.classList.remove('d-none');
    item.tipo.textContent = item.msg;
  });
};

//validacion de formulario
formulario.addEventListener("submit", function(evento) {
    // Si hay algún error en la validación, el formulario no se enviará
    if (!validarFormulario()) {
      evento.preventDefault(); // Evita que se envíe el formulario automáticamente
    }
});

function validarFormulario() {
  const errores = [];

  // validar usuario
  if (!regUsuario.test(usuario.value) || !usuario.value.trim()) {
    usuario.classList.add('is-invalid');
    //validar si existe un otro usuario
    
    errores.push(alertaUsuario.textContent = "El usuario debe tener minimo 4 caracteres y maximo 10");

  } else {
    usuario.classList.remove('is-invalid');
    usuario.classList.add('is-valid');
    alertaUsuario.classList.add('d-none');
  }
  // validar contraseña
  if (!regConstrasena.test(constrasena.value) || !constrasena.value.trim()) {
    constrasena.classList.add('is-invalid');
    errores.push(alertaContrasena.textContent = "Su contraseña debe tener un minimo de 8 y 20 maximo caracteres");
  } else {
    constrasena.classList.remove('is-invalid');
    constrasena.classList.add('is-valid');
    alertaContrasena.classList.add('d-none');
  }
  // validar Select tipo de usuario
    var optForm = document.forms["formulario"]["TipUsuario"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    TipUsuario.classList.add('is-invalid');

    errores.push(alertaTpUsuario.textContent = "Seleccione un tipo de Usuario");
  } else {
    TipUsuario.classList.remove('is-invalid');
    TipUsuario.classList.add('is-valid');
    alertaTpUsuario.classList.add('d-none');
  }

//Reviso el formulario si tiene errores o tine campos vacios
  if (errores.length !== 0) {
    pintarMensajeError(errores);
    return;
  }
  return true;
};