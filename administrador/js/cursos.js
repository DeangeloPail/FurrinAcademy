const formulario = document.getElementById('formulario');
//constates de inputs para valdiar
const CodigoCurso = document.getElementById('CodigoCurso');
const NombreCurso = document.getElementById('NombreCurso');
const Duracion = document.getElementById('Duracion');
const AreaCurso = document.getElementById('AreaCurso');
const TipoCurso = document.getElementById('TipoCurso');
const CodigoUsuario = document.getElementById('CodigoUsuario');

//alertas de errores de los campos
const alertaCodigoCurso = document.getElementById('alertaCodigoCurso');
const alertaNombreCurso = document.getElementById('alertaNombreCurso');
const alertaDuracion = document.getElementById('alertaDuracion');
const alertaAreaCurso = document.getElementById('alertaAreaCurso');
const alertaTipoCurso = document.getElementById('alertaTipoCurso');
const alertaCodigoUsuario = document.getElementById('alertaCodigoUsuario');

//rangos de campos
const regCodigoCurso = /^[0-9]{1,19}$/;
const regNombreCurso = /^[a-zA-ZÀ-ÿ\s]{5,45}$/;
const regDuracion = /^[0-9]{1,3}$/;


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


  // validar Curso
  if (!regCodigoCurso.test(CodigoCurso.value) || !CodigoCurso.value.trim()) {
    CodigoCurso.classList.add('is-invalid');
    //validar si existe un otro CodigoCurso
    
    errores.push(alertaCodigoCurso.textContent = "Los nombres deben tener de 5 a 45 caracteres, ni contener caracteres especiales");

  } else {
    CodigoCurso.classList.remove('is-invalid');
    CodigoCurso.classList.add('is-valid');
    alertaCodigoCurso.classList.add('d-none');
  }
  // validar NombreCurso
  if (!regNombreCurso.test(NombreCurso.value) || !NombreCurso.value.trim()) {
    NombreCurso.classList.add('is-invalid');
    //validar si existe un otro NombreCurso
    
    errores.push(alertaNombreCurso.textContent = "Los nombres deben tener de 5 a 45 caracteres, ni contener caracteres especiales");

  } else {
    NombreCurso.classList.remove('is-invalid');
    NombreCurso.classList.add('is-valid');
    alertaNombreCurso.classList.add('d-none');
  }
  // validar Duracion
  if (!regDuracion.test(Duracion.value) || !Duracion.value.trim()) {
    Duracion.classList.add('is-invalid');
    //validar si existe un otro Duracion
    
    errores.push(alertaDuracion.textContent = "Los apellidos deben tener de 5 a 45 caracteres, ni contener caracteres especiales");

  } else {
    Duracion.classList.remove('is-invalid');
    Duracion.classList.add('is-valid');
    alertaDuracion.classList.add('d-none');
  }

  // validar Select tipo de AreaCurso
    var optForm = document.forms["formulario"]["AreaCurso"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    AreaCurso.classList.add('is-invalid');

    errores.push(alertaAreaCurso.textContent = "Seleccione el usuario correspondiete");
  } else {
    AreaCurso.classList.remove('is-invalid');
    AreaCurso.classList.add('is-valid');
    alertaAreaCurso.classList.add('d-none');
  }
    // validar Select tipo de TipoCurso
    var optForm = document.forms["formulario"]["TipoCurso"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    TipoCurso.classList.add('is-invalid');

    errores.push(alertaTipoCurso.textContent = "Seleccione el usuario correspondiete");
  } else {
    TipoCurso.classList.remove('is-invalid');
    TipoCurso.classList.add('is-valid');
    alertaTipoCurso.classList.add('d-none');
  }

    // validar Select tipo de CodigoUsuario
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