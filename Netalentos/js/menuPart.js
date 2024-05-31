//////////////////////////////////////////////////////////////////////////////////////////
// RELLENAR EDAD
document.addEventListener("DOMContentLoaded", function() {
    var edadSelect = document.getElementById("edad");

    // Autorellenar el combo box con valores del 18 al 30
    for (var i = 18; i <= 30; i++) {
        var option = document.createElement("option");
        option.value = i;
        option.text = i;
        edadSelect.appendChild(option);
    }
});

//////////////////////////////////////////////////////////////////////////////////////////
// OPCIONES DE EDITAR
// Obtener los elementos relevantes
// Obtener los elementos relevantes
const editarButton = document.getElementById('editarButton');
const guardarButton = document.getElementById('guardarButton');
const inputFields = document.querySelectorAll('.form-value input, .form-value select');

// Función para habilitar/deshabilitar campos
function toggleCampos(estado) {
    inputFields.forEach(input => {
        input.disabled = estado;
    });
}

// Inicialmente, ocultar el botón de guardar y deshabilitar los campos
toggleCampos(true);

// Agregar evento al botón de editar
editarButton.addEventListener('click', () => {
    // Habilitar campos y mostrar el botón de guardar
    toggleCampos(false);
    guardarButton.style.display = 'block';
    editarButton.style.display = 'none';
});

// Agregar evento al botón de guardar
guardarButton.addEventListener('click', () => {
    // Deshabilitar campos (¡comentado para mantener los campos habilitados!) y mostrar el botón de editar
    // toggleCampos(true);
    guardarButton.style.display = 'none';
    editarButton.style.display = 'block';

    // Aquí puedes agregar código adicional si necesitas enviar los datos mediante AJAX u otro método.
    // Por ejemplo:
    // document.getElementById('updateForm').submit(); // Esto enviará el formulario mediante el método POST.

    // O si necesitas realizar alguna acción después de enviar el formulario, como redireccionar a otra página:
    // window.location.href = 'pagina_de_confirmacion.php';
});



//////////////////////////////////////////////////////////////////////////////////////////
// MOSTRAR SOLO CIERTOS DIV
document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencias a los elementos del DOM
    const modificarDatosDiv = document.querySelector('.modificar_datos');
    const inscripcionDiv = document.querySelector('.inscripcion');
    const consultCalifDiv = document.querySelector('.consult_calif');

    // Función para ocultar todos los divs
    function ocultarTodosLosDivs() {
        modificarDatosDiv.style.display = 'none';
        inscripcionDiv.style.display = 'none';
        consultCalifDiv.style.display = 'none';
    }

    // Función para mostrar un div específico
    function mostrarDiv(div) {
        ocultarTodosLosDivs();
        div.style.display = 'block';
    }

    // Ocultar todos los divs al cargar la página
    ocultarTodosLosDivs();

    // Manejar clic en los botones del menú
    const navLinks = document.querySelectorAll('.nav__link');
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            const targetDivClass = this.getAttribute('data-target');
            const targetDiv = document.querySelector(`.${targetDivClass}`);
            mostrarDiv(targetDiv);
        });
    });
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

document.getElementById("updateForm").addEventListener("submit", function(event) {
  let isValid = true;
  const fields = [
      { id: 'nombre', name: 'Nombre' },
      { id: 'apPa', name: 'Apellido Paterno' },
      { id: 'apMa', name: 'Apellido Materno' },
      { id: 'correo', name: 'Correo' },
      { id: 'edad', name: 'Edad' },
      { id: 'birthdate', name: 'Fecha de Nacimiento' },
      { id: 'calle', name: 'Calle' },
      { id: 'numero', name: 'Número' },
      { id: 'cp', name: 'Código Postal' }
  ];

  fields.forEach(field => {
      const input = document.getElementById(field.id);
      if (input.value === '') {
          alert(`Completa el campo "${field.name}"`);
          isValid = false;
      }
  });

  if (!isValid) {
      event.preventDefault(); // Previene el envío del formulario si hay campos vacíos
  }
});