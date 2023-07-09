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
const regCursEstID = /^[a-zA-ZÀ-ÿ0-9/-]{1,50}$/;

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

//mostrar select 1
Estudiante.addEventListener('change', (event) => {
  var selectedOption = event.target.value;
  var seleccion_estudiante = (selectedOption);
  var formData = new FormData();

  formData.append('estudainte', seleccion_estudiante);

  fetch('../../sql/vistas/mat_estudiante.php', {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {

      // Limpiar el contenido de los párrafos
      CursEstID.value = '';

      data.forEach(metodo => {
        let cedulaEstudiante =`${metodo.Codigo_estudiante}`;
        CursEstID.value += (cedulaEstudiante);
      });

    })
    .catch(error => console.error(error));
});
//mostrar select 2
Curso.addEventListener('change', (event) => {
    var selectedOption = event.target.value;
    var seleccion_Curso = (selectedOption);
    var id = CursEstID.value + '-';
    var formData = new FormData();
    if(!CursEstID.value == "") {
    formData.append('curso', seleccion_Curso);
    formData.append('idMat', id);

    fetch('../../sql/vistas/mat_estudiante.php', {
        method: 'POST',
        body: formData,
        headers: {
          'Accept': 'application/json'
        }
      })
      .then(response => response.json())
      .then(data => {

        // Limpiar el contenido de los párrafos
        CursEstID.value = '';
        
        CursEstID.value= data;


      })
      .catch(error => console.error(error));

    }else{
      console.log("seleccione algo");
    }
});

function validarFormulario() {
  const errores = [];

  // validar CursEstID
  if (!regCursEstID.test(CursEstID.value) || !CursEstID.value.trim()) {
    CursEstID.classList.add('is-invalid');
    //validar si existe un otro CursEstID
    
    errores.push(alertaCursEstID.textContent = "El codigo no pude tenre espacios");

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

