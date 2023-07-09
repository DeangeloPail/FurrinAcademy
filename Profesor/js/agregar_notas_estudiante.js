const formulario = document.getElementById('formulario');
//constates de inputs para valdiar

const nota1 = document.getElementById('nota1');
const nota2 = document.getElementById('nota2');
const nota3 = document.getElementById('nota3');
const nota4 = document.getElementById('nota4');

//alertas de errores de los campos
const alertanota1 = document.getElementById('alertanota1');
const alertanota2 = document.getElementById('alertanota2');
const alertanota3 = document.getElementById('alertanota3');
const alertanota4 = document.getElementById('alertanota4');

//rangos de campos
const regnota1 = /^(0|[1-9]|1\d|20)$/;
const regnota2 = /^(0|[1-9]|1\d|20)$/;
const regnota3 = /^(0|[1-9]|1\d|20)$/;
const regnota4 = /^(0|[1-9]|1\d|20)$/;

const pintarMensajeError = () => {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Algo esta mal verifica',
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
  if (nota1.value.trim() === "") {
    nota1.value=0;
  }  if (nota2.value.trim() === "") {
    nota2.value=0;
  }  if (nota3.value.trim() === "") {
    nota3.value=0;
  }  if (nota4.value.trim() === "") {
    nota4.value=0;
  }

  // validar nota 1
    if (!regnota1.test(nota1.value)|| !nota1.value.trim()) {
        nota1.classList.add('is-invalid');
        //validar si existe un otro nota1
        
        errores.push(alertanota1.textContent = "solo se acepta valores del 1 al 20");

    } else {
        nota1.classList.remove('is-invalid');
        nota1.classList.add('is-valid');
        alertanota1.classList.add('d-none');
    }
    // validar nota 2
    if (!regnota2.test(nota2.value)|| !nota2.value.trim()) {
        nota2.classList.add('is-invalid');
        //validar si existe un otro nota2
        
        errores.push(alertanota2.textContent = "solo se acepta valores del 1 al 20");

    } else {
        nota2.classList.remove('is-invalid');
        nota2.classList.add('is-valid');
        alertanota2.classList.add('d-none');
    }
    // validar nota 3
    if (!regnota3.test(nota3.value)|| !nota3.value.trim()) {
        nota3.classList.add('is-invalid');
        //validar si existe un otro nota3
        
        errores.push(alertanota3.textContent = "solo se acepta valores del 1 al 20");

    } else {
        nota3.classList.remove('is-invalid');
        nota3.classList.add('is-valid');
        alertanota3.classList.add('d-none');
    }
      // validar nota 4

    if (!regnota4.test(nota4.value)|| !nota4.value.trim()) {
        nota4.classList.add('is-invalid');
        //validar si existe un otro nota4
        
        errores.push(alertanota4.textContent = "solo se acepta valores del 1 al 20");

    } else {
        nota4.classList.remove('is-invalid');
        nota4.classList.add('is-valid');
        alertanota4.classList.add('d-none');
    }



  
//Reviso el formulario si tiene errores o tine campos vacios
  if (errores.length !== 0) {
    pintarMensajeError(errores);
    return;
  }
  return true;
};