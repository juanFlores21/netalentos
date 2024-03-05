<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/menuAdmin.css">
        <title>MENU ORGANIZADOR</title>
    </head>
    <body>
        <!-- Barra superior con logotipo -->
        <div class="logo-bar">
            <img class="logo" src="img/logotipo.jpg" alt="Logotipo">
        </div>

        <!-- Menú -->
        <nav class="nav">
            <ul class="list">
                <li class="list__item list__item--click">
                    <div class="list__button list__button--click">
                        <img src="assets/calendar.svg" class="list__img">
                        <a href="#" class="nav__link">Crear concurso</a>
                        <img src="assets/arrow.svg" class="list__arrow">
                    </div>
                    <ul class="list__show">
                        <li class="list__inside">
                            <a href="#" class="nav__link nav__link--inside" data-target="alta_categoria">Dar de alta categoría</a>
                        </li>
                        <li class="list__inside">
                            <a href="#" class="nav__link nav__link--inside" data-target="regis_crit">Registrar criterios</a>
                        </li>
                        <li class="list__inside">
                            <a href="#" class="nav__link nav__link--inside" data-target="calendario">Calendario</a>
                        </li>
                    </ul>
                </li>

                <li class="list__item">
                    <div class="list__button">
                        <img src="assets/check.svg"class="list__img">
                        <a href="#" class="nav__link" data-target="consultar">Consultar/ Monitorear</a>
                    </div>
                </li>

                <li class="list__item">
                    <div class="list__button">
                        <img src="assets/logout.svg" class="list__img">
                        <a href="sesionAdmin.php" class="nav__link">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="content">
            <!---------------------------------------------------------------------------------->
            <!-- DAR DE ALTA CATEGORÍA -->
            <div class="alta_categoria">
                <h2>Dar de alta categoría</h2>
            </div>
            <!------------------------------------------------------------------------------->

            <!---------------------------------------------------------------------------------->
            <!-- REGISTRAR CRITERIOS -->
            <div class="regis_crit">
                <h2>Registrar criterios</h2>
            </div>
            <!------------------------------------------------------------------------------->

            <!---------------------------------------------------------------------------------->
            <!-- CALENDARIO -->
            <div class="calendario">
                <h2>Calendario</h2>
            </div>
            <!------------------------------------------------------------------------------->

            <!---------------------------------------------------------------------------------->
            <!-- CONSULTAR/ MONITOREAR -->
            <div class="consultar">
                <h2>Consultar/ Monitorear</h2>
            </div>
            <!------------------------------------------------------------------------------->
        </div>

        <!-- Script -->
        <script src="js/menuAdmin.js"></script>
    </body>
</html>