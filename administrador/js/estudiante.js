const formulario = document.getElementById('formulario');
//constates de inputs para valdiar
const CodigoEstudia = document.getElementById('CodigoEstudia');
const NombreEstudia = document.getElementById('NombreEstudia');
const ApellidoEstudia = document.getElementById('ApellidoEstudia');
const Direccion = document.getElementById('Direccion');
const Telefono = document.getElementById('Telefono');
const CodigoUsuario = document.getElementById('CodigoUsuario');
//alertas de errores de los campos
const alertaCodigoEstudia = document.getElementById('alertaCodigoEstudia');
const alertaNombreEstudia = document.getElementById('alertaNombreEstudia');
const alertaApellidoEstudia = document.getElementById('alertaApellidoEstudia');
const alertaDireccion = document.getElementById('alertaDireccion');
const alertaTelefono = document.getElementById('alertaTelefono');
const alertaCodigoUsuario = document.getElementById('alertaCodigoUsuario');
//rangos de campos
const regCodigoEstudia = /^\d{1,10}$/;
const regNombreEstudia = /^[a-zA-ZÀ-ÿ\s]{5,45}$/;
const regApellidoEstudia = /^[a-zA-ZÀ-ÿ\s]{5,45}$/;
const regDireccion = /^.{5,25}$/;
const regTelefono = /^[0-9\_\/\\]{10,25}$/;

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

  // validar CodigoEstudia
  if (!regCodigoEstudia.test(CodigoEstudia.value) || !CodigoEstudia.value.trim()) {
    CodigoEstudia.classList.add('is-invalid');
    //validar si existe un otro CodigoEstudia
    
    errores.push(alertaCodigoEstudia.textContent = "El documento de identidad debe tener de 5 a 10 caracteres");

  } else {
    CodigoEstudia.classList.remove('is-invalid');
    CodigoEstudia.classList.add('is-valid');
    alertaCodigoEstudia.classList.add('d-none');
  }
  // validar NombreEstudia
  if (!regNombreEstudia.test(NombreEstudia.value) || !NombreEstudia.value.trim()) {
    NombreEstudia.classList.add('is-invalid');
    //validar si existe un otro NombreEstudia
    
    errores.push(alertaNombreEstudia.textContent = "Los nombres deben tener de 5 a 45 caracteres, ni contener caracteres especiales");

  } else {
    NombreEstudia.classList.remove('is-invalid');
    NombreEstudia.classList.add('is-valid');
    alertaNombreEstudia.classList.add('d-none');
  }
  // validar ApellidoEstudia
  if (!regApellidoEstudia.test(ApellidoEstudia.value) || !ApellidoEstudia.value.trim()) {
    ApellidoEstudia.classList.add('is-invalid');
    //validar si existe un otro ApellidoEstudia
    
    errores.push(alertaApellidoEstudia.textContent = "Los apellidos deben tener de 5 a 45 caracteres, ni contener caracteres especiales");

  } else {
    ApellidoEstudia.classList.remove('is-invalid');
    ApellidoEstudia.classList.add('is-valid');
    alertaApellidoEstudia.classList.add('d-none');
  }
  // validar Direccion
  if (!regDireccion.test(Direccion.value) || !Direccion.value.trim()) {
    Direccion.classList.add('is-invalid');
    errores.push(alertaDireccion.textContent = "La dirección debe tener de 5 a 25 caracteres");
  } else {
    Direccion.classList.remove('is-invalid');
    Direccion.classList.add('is-valid');
    alertaDireccion.classList.add('d-none');
  }
  // validar Telefono
  if (!regTelefono.test(Telefono.value) || !Telefono.value.trim()) {
    Telefono.classList.add('is-invalid');
    //validar si existe un otro Telefono
    
    errores.push(alertaTelefono.textContent = "El Telefono no puede contener espacios y un minimo de 10 a 25 caracteres");

  } else {
    Telefono.classList.remove('is-invalid');
    Telefono.classList.add('is-valid');
    alertaTelefono.classList.add('d-none');
  }
  // validar Select tipo de NombreEstudia
    var optForm = document.forms["formulario"]["CodigoUsuario"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    CodigoUsuario.classList.add('is-invalid');

    errores.push(alertaCodigoUsuario.textContent = "Seleccione el usuario correspondiete");
  } else {
    CodigoUsuario.classList.remove('is-invalid');
    CodigoUsuario.classList.add('is-valid');
    alertaCodigoUsuario.classList.add('d-none');
  }

//Reviso el formulario si tiene errores o tine campos vacios
  if (errores.length !== 0) {
    pintarMensajeError(errores);
    return;
  }
  return true;
};