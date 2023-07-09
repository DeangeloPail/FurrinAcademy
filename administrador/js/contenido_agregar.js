const formulario = document.getElementById('formulario');
//constates de inputs para valdiar

const ContenidoID = document.getElementById('ContenidoID');
const Contenido = document.getElementById('Contenido');
const unidad_curso = document.getElementById('unidad_curso');

//alertas de errores de los campos
const alertaContenidoID = document.getElementById('alertaContenidoID');
const alertaContenido = document.getElementById('alertaContenido');
const alertaunidad_curso = document.getElementById('alertaunidad_curso');

//rangos de campos
const regContenidoID = /^[a-zA-ZÀ-ÿ0-9\s\-]{5,45}$/;
const regContenido = /^[a-zA-ZÀ-ÿ\s]{5,45}$/;


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
unidad_curso.addEventListener('change', (event) => {
  var selectedOption = event.target.value;
  var seleccion_unidad = (selectedOption);
  var formData = new FormData();
 
  formData.append('unidad', seleccion_unidad);

  fetch('../../sql/vistas/unidades.php', {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {

      // Limpiar el contenido de los párrafos
      ContenidoID.value = '';

      data.forEach(metodo => {
        let codigounidad =`${metodo.Unidad}`;
        ContenidoID.value += (codigounidad);
      });

    })
    .catch(error => console.error(error));
});
function validarFormulario() {
  const errores = [];


  // validar Curso
  if (!regContenidoID.test(ContenidoID.value) || !ContenidoID.value.trim()) {
    ContenidoID.classList.add('is-invalid');
    //validar si existe un otro ContenidoID
    
    errores.push(alertaContenidoID.textContent = "Los nombres deben tener de 5 a 19 caracteres, ni contener caracteres especiales");

  } else {
    ContenidoID.classList.remove('is-invalid');
    ContenidoID.classList.add('is-valid');
    alertaContenidoID.classList.add('d-none');
  }
  // validar Contenido
  if (!regContenido.test(Contenido.value) || !Contenido.value.trim()) {
    Contenido.classList.add('is-invalid');
    //validar si existe un otro Contenido
    
    errores.push(alertaContenido.textContent = "Los nombres deben tener de 5 a 45 caracteres, ni contener caracteres especiales");

  } else {
    Contenido.classList.remove('is-invalid');
    Contenido.classList.add('is-valid');
    alertaContenido.classList.add('d-none');
  }

  // validar Select tipo de unidad_curso
    var optForm = document.forms["formulario"]["unidad_curso"].selectedIndex;
    if( optForm == null || optForm == 0 ) {
    unidad_curso.classList.add('is-invalid');

    errores.push(alertaunidad_curso.textContent = "Seleccione el unidad correspondiete");
  } else {
    unidad_curso.classList.remove('is-invalid');
    unidad_curso.classList.add('is-valid');
    alertaunidad_curso.classList.add('d-none');
  }
  

//Reviso el formulario si tiene errores o tine campos vacios
  if (errores.length !== 0) {
    pintarMensajeError(errores);
    return;
  }
  return true;
};