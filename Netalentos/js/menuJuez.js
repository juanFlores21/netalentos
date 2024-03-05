//////////////////////////////////////////////////////////////////////////////////////////
// FECHA DE NACIMIENTO
// Rellenar opciones para DÍA
var daySelect = document.getElementById("day");
for (var i = 1; i <= 31; i++) {
    var option = document.createElement("option");
    option.value = i;
    option.text = i;
    daySelect.add(option);
}

// Rellenar opciones para MES
var monthSelect = document.getElementById("month");
var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
for (var i = 0; i < months.length; i++) {
    var option = document.createElement("option");
    option.value = i + 1; // Los meses comienzan desde 1
    option.text = months[i];
    monthSelect.add(option);
}

// Rellenar opciones para AÑO
var yearSelect = document.getElementById("year");
for (var i = 1980; i <= 2015; i++) {
    var option = document.createElement("option");
    option.value = i;
    option.text = i;
    yearSelect.add(option);
}

//////////////////////////////////////////////////////////////////////////////////////////
// OPCIONES DE EDITAR
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
    // Deshabilitar campos y mostrar el botón de editar
    toggleCampos(true);
    guardarButton.style.display = 'none';
    editarButton.style.display = 'block';
});

//////////////////////////////////////////////////////////////////////////////////////////
// MOSTRAR SOLO CIERTOS DIV
document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencias a los elementos del DOM
    const modificarDatosDiv = document.querySelector('.modificar_datos');
    const calificarDiv = document.querySelector('.calificar');

    // Función para ocultar todos los divs
    function ocultarTodosLosDivs() {
        modificarDatosDiv.style.display = 'none';
        calificarDiv.style.display = 'none';
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