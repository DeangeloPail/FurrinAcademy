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

//mostrar select 1
Profesor.addEventListener('change', (event) => {
  var selectedOption = event.target.value;
  var seleccion_Profesor = (selectedOption);
  var formData = new FormData();

  formData.append('Profesor', seleccion_Profesor);

  fetch('../../sql/vistas/mat_profe.php', {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {

      // Limpiar el contenido de los párrafos
      CursProfetID.value = '';

      data.forEach(metodo => {
        let cedulaProfesor =`${metodo.codigo_profesor}`;
        CursProfetID.value += (cedulaProfesor);
      });

    })
    .catch(error => console.error(error));
});
//mostrar select 2
Curso.addEventListener('change', (event) => {
    var selectedOption = event.target.value;
    var seleccion_Curso = (selectedOption);
    var id = CursProfetID.value + ' - ';
    var formData = new FormData();
    if(!CursProfetID.value == "") {
    formData.append('curso', seleccion_Curso);
    formData.append('idMat', id);

    fetch('../../sql/vistas/mat_profe.php', {
        method: 'POST',
        body: formData,
        headers: {
          'Accept': 'application/json'
        }
      })
      .then(response => response.json())
      .then(data => {

        // Limpiar el contenido de los párrafos
        CursProfetID.value = '';
        
        CursProfetID.value= data;


      })
      .catch(error => console.error(error));

    }else{
      console.log("seleccione algo");
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

