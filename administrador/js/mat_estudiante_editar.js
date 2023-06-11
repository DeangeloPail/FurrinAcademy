const formulario = document.getElementById('formulario');
//constates de inputs para valdiar
const CursEstID = document.getElementById('CursEstID');
const Estudiante = document.getElementById('Estudiante');
const Curso = document.getElementById('Curso');

//alertas de errores de los campos
const alertaCursEstID = document.getElementById('alertaCursEstID');
const alertaEstudiante = document.getElementById('alertaEstudiante');
const alertaCurso = document.getElementById('alertaCurso');

//rangos de campos
const regCursEstID = /^.{1,50}$/;

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

  // validar CursEstID
  if (!regCursEstID.test(CursEstID.value) || !CursEstID.value.trim()) {
    CursEstID.classList.add('is-invalid');
    //validar si existe un otro CursEstID
    
    errores.push(alertaCursEstID.textContent = "El documento de identidad debe tener de 5 a 10 caracteres");

  } else {
    CursEstID.classList.remove('is-invalid');
    CursEstID.classList.add('is-valid');
    alertaCursEstID.classList.add('d-none');
  }

  // validar Select tipo de Estudiante
    var optForm = document.forms["formulario"]["Estudiante"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    Estudiante.classList.add('is-invalid');

    errores.push(alertaEstudiante.textContent = "Seleccione el usuario correspondiete");
  } else {
    Estudiante.classList.remove('is-invalid');
    Estudiante.classList.add('is-valid');
    alertaEstudiante.classList.add('d-none');
  }

  // validar Select tipo de Curso
  var optForm = document.forms["formulario"]["Curso"].selectedIndex;
  if( optForm == null || optForm == 0 ) {
  Curso.classList.add('is-invalid');

  errores.push(alertaCurso.textContent = "Seleccione el usuario correspondiete");
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

