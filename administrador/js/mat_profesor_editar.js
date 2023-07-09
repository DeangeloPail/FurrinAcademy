const formulario = document.getElementById('formulario');
//constates de inputs para valdiar
const CursProfetID = document.getElementById('CursProfetID');
const Profesor = document.getElementById('Profesor');
const Curso = document.getElementById('Curso');

//alertas de errores de los campos
const alertaCursProfetID = document.getElementById('alertaCursProfetID');
const alertaProfesor = document.getElementById('alertaProfesor');
const alertaCurso = document.getElementById('alertaCurso');

//rangos de campos
const regCursProfetID = /^.{1,50}$/;

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

  // validar CursProfetID
  if (!regCursProfetID.test(CursProfetID.value) || !CursProfetID.value.trim()) {
    CursProfetID.classList.add('is-invalid');
    //validar si existe un otro CursProfetID
    
    errores.push(alertaCursProfetID.textContent = "El documento de identidad debe tener de 5 a 10 caracteres");

  } else {
    CursProfetID.classList.remove('is-invalid');
    CursProfetID.classList.add('is-valid');
    alertaCursProfetID.classList.add('d-none');
  }

  // validar Select tipo de Profesor
    var optForm = document.forms["formulario"]["Profesor"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    Profesor.classList.add('is-invalid');

    errores.push(alertaProfesor.textContent = "Seleccione el usuario correspondiete");
  } else {
    Profesor.classList.remove('is-invalid');
    Profesor.classList.add('is-valid');
    alertaProfesor.classList.add('d-none');
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

