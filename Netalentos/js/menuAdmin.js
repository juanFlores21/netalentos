//////////////////////////////////////////////////////////////////////////////////////////
// DESPLEGAR SUBMENÚ
let listElements = document.querySelectorAll('.list__button--click');

listElements.forEach(listElement => {
    listElement.addEventListener('click', () => {

        listElement.classList.toggle('arrow');

        let height = 0;
        let menu = listElement.nextElementSibling;

        if (menu.clientHeight === 0) {
            height = menu.scrollHeight;
        }

        menu.style.height = `${height}px`;
    })
});

//////////////////////////////////////////////////////////////////////////////////////////
// MOSTRAR SOLO CIERTOS DIV
document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencias a los elementos del DOM
    const altaCategoriaDiv = document.querySelector('.alta_categoria');
    const regisCritDiv = document.querySelector('.regis_crit');
    const calendarioDiv = document.querySelector('.calendario');
    const consultarDiv = document.querySelector('.consultar');

    // Función para ocultar todos los divs
    function ocultarTodosLosDivs() {
        altaCategoriaDiv.style.display = 'none';
        regisCritDiv.style.display = 'none';
        calendarioDiv.style.display = 'none';
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