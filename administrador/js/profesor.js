const formulario = document.getElementById('formulario');
//constates de inputs para valdiar
const ProfesorID = document.getElementById('ProfesorID');
const NombreProfesor = document.getElementById('NombreProfesor');
const Direccion = document.getElementById('Direccion');
const CodigoUsuario = document.getElementById('CodigoUsuario');
//alertas de errores de los campos
const alertaProfesorID = document.getElementById('alertaProfesorID');
const alertaNombreProfesor = document.getElementById('alertaNombreProfesor');
const alertaDireccion = document.getElementById('alertaDireccion');
const alertaCodigoUsuario = document.getElementById('alertaCodigoUsuario');
//rangos de campos
const regProfesorID = /^\d{1,10}$/;
const regNombreProfesor = /^[a-zA-ZÀ-ÿ\s]{4,45}$/;
const regDireccion = /^.{5,50}$/;
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

  // validar ProfesorID
  if (!regProfesorID.test(ProfesorID.value) || !ProfesorID.value.trim()) {
    ProfesorID.classList.add('is-invalid');
    //validar si existe un otro ProfesorID
    
    errores.push(alertaProfesorID.textContent = "El número de documento de identidad debe tener de 5 a 10 caracteres");

  } else {
    ProfesorID.classList.remove('is-invalid');
    ProfesorID.classList.add('is-valid');
    alertaProfesorID.classList.add('d-none');
  }
  // validar NombreProfesor
  if (!regNombreProfesor.test(NombreProfesor.value) || !NombreProfesor.value.trim()) {
    NombreProfesor.classList.add('is-invalid');
    //validar si existe un otro NombreProfesor
    
    errores.push(alertaNombreProfesor.textContent = "El debe ser menor a 45 caracteres");

  } else {
    NombreProfesor.classList.remove('is-invalid');
    NombreProfesor.classList.add('is-valid');
    alertaNombreProfesor.classList.add('d-none');
  }
  // validar contraseña
  if (!regDireccion.test(Direccion.value) || !Direccion.value.trim()) {
    Direccion.classList.add('is-invalid');
    errores.push(alertaDireccion.textContent = "Contenido inferior a 50 caracteres");
  } else {
    Direccion.classList.remove('is-invalid');
    Direccion.classList.add('is-valid');
    alertaDireccion.classList.add('d-none');
  }
  // validar Select tipo de NombreProfesor
    var optForm = document.forms["formulario"]["CodigoUsuario"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    CodigoUsuario.classList.add('is-invalid');

    errores.push(alertaCodigoUsuario.textContent = "Seleccione el usuario que corresponde al docente");
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
