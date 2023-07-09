const formulario = document.getElementById('formulario');
//constates de inputs para valdiar
const Unidad = document.getElementById('Unidad');
const UnidadID = document.getElementById('UnidadID');
const Curso = document.getElementById('Curso');
//alertas de errores de los campos
const alertaUnidad = document.getElementById('alertaUnidad');
const alertaUnidadID = document.getElementById('alertaUnidadID');
const alertaCurso = document.getElementById('alertaCurso');
//rangos de campos
const regUnidad = /^[a-zA-Z0-9\s]{4,50}$/;
const regUnidadID = /^[a-zA-Z0-9\s\-]{1,50}$/;
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

  // validar Unidad
  if (!regUnidad.test(Unidad.value) || !Unidad.value.trim()) {
    Unidad.classList.add('is-invalid');
    //validar si existe un otro Unidad
    
    errores.push(alertaUnidad.textContent = "El Unidad debe tener minimo 4 caracteres y maximo 10");

  } else {
    Unidad.classList.remove('is-invalid');
    Unidad.classList.add('is-valid');
    alertaUnidad.classList.add('d-none');
  }
  // validar contraseña
  if (!regUnidadID.test(UnidadID.value) || !UnidadID.value.trim()) {
    UnidadID.classList.add('is-invalid');
    errores.push(alertaUnidadID.textContent = "Su contraseña debe tener un minimo de 8 y 20 maximo caracteres");
  } else {
    UnidadID.classList.remove('is-invalid');
    UnidadID.classList.add('is-valid');
    alertaUnidadID.classList.add('d-none');
  }
  // validar Select tipo de Unidad
    var optForm = document.forms["formulario"]["Curso"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    Curso.classList.add('is-invalid');

    errores.push(alertaCurso.textContent = "Seleccione un tipo de Unidad");
  } else {
    Curso.classList.remove('is-invalid');
    Curso.classList.add('is-valid');
    alertaCurso.classList.add('d-none');
  }

//Reviso el formulario si tiene errores o tine campos vacios
  if (errores.length !== 0) {
    pintarMensajeError(errores);
    return;
  }
  return true;
};