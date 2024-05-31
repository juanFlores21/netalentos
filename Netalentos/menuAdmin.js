//////////////////////////////////////////////////////////////////////////////////////////
// MOSTRAR SOLO CIERTOS DIV
document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencias a los elementos del DOM
    const concursoDiv = document.querySelector('.concurso');
    const consultarDiv = document.querySelector('.consultar');

    // Función para ocultar todos los divs
    function ocultarTodosLosDivs() {
        concursoDiv.style.display = 'none';
        consultarDiv.style.display = 'none';
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

//////////////////////////////////////////////////////////////////////////////////////////
// Calendario
flatpickr("#fecha_evento", {
    dateFormat: "d-m-Y", // Formato de fecha: día-mes-año
    locale: "es", // Idioma español
    inline: true, // Mostrar el calendario desde el principio
    altFormat: "l, F j, Y", // Formato de la fecha mostrada
    altInput: true, // Mostrar la fecha seleccionada en el campo de entrada
    altInputClass: "flatpickr-alt-input", // Clase para el campo de entrada alternativo
    static: true, // Mostrar el calendario de forma estática
    theme: "light", // Tema claro
    nextArrow: '<i class="fas fa-chevron-right"></i>', // Icono para siguiente mes
    prevArrow: '<i class="fas fa-chevron-left"></i>', // Icono para mes anterior
    onChange: function(selectedDates, dateStr, instance) {
        // Código a ejecutar cuando se selecciona una fecha
    },
    onOpen: function(selectedDates, dateStr, instance) {
        // Código a ejecutar cuando se abre el calendario
    }
});

//////////////////////////////////////////////////////////////////////////////////////////
//Mostrar criterios y requerir solo los correspondientes a la categoría seleccionada
var categoriaDropdown = document.getElementById("categoria");
var criteriosCanto = document.getElementById("criterios_canto");
var criteriosBaile = document.getElementById("criterios_baile");
var criteriosDibujo = document.getElementById("criterios_dibujo");

categoriaDropdown.addEventListener("change", function() {
    // Ocultar todos los conjuntos de criterios primero
    criteriosCanto.style.display = "none";
    criteriosBaile.style.display = "none";
    criteriosDibujo.style.display = "none";

    // Desactivar atributo required en todos los select
    var selects = document.querySelectorAll(".criterios select");
    for (var i = 0; i < selects.length; i++) {
        selects[i].removeAttribute("required");
    }

    // Obtener la categoría seleccionada
    var categoriaSeleccionada = categoriaDropdown.value;

    // Mostrar el conjunto de criterios correspondiente y activar el atributo required solo para ellos
    if (categoriaSeleccionada === "canto") {
        criteriosCanto.style.display = "block";
        var selectsCanto = criteriosCanto.querySelectorAll("select");
        for (var i = 0; i < selectsCanto.length; i++) {
            selectsCanto[i].setAttribute("required", "true");
        }
    } else if (categoriaSeleccionada === "baile") {
        criteriosBaile.style.display = "block";
        var selectsBaile = criteriosBaile.querySelectorAll("select");
        for (var i = 0; i < selectsBaile.length; i++) {
            selectsBaile[i].setAttribute("required", "true");
        }
    } else if (categoriaSeleccionada === "dibujo") {
        criteriosDibujo.style.display = "block";
        var selectsDibujo = criteriosDibujo.querySelectorAll("select");
        for (var i = 0; i < selectsDibujo.length; i++) {
            selectsDibujo[i].setAttribute("required", "true");
        }
    }
});