<?php
// Inicia la sesión
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['nombre'])) {
    // Si el usuario no está autenticado, redirige a la página de inicio de sesión
    header("Location: iniciarSesion.php");
    exit; // Asegura que el script se detenga después de redireccionar
}

// El resto de tu código para la página "menuPart.php" iría aquí
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/iniciarSesion.css">
        <title>MENU PARTICIPANTE</title>
    </head>
    <body>
        <!-- Barra superior con logotipo -->
        <div class="logo-bar">
            <img class="logo" src="img/logotipo.jpg" alt="Logotipo">
        </div>
        
        <!-- Menú -->
        <nav class="nav">
            <ul class="list">
                <li class="list__item">
                    <div class="list__button">
                        <img src="assets/edit.svg" class="list__img">
                        <a href="#" class="nav__link" data-target="modificar_datos">Modificar mis datos</a>
                    </div>
                </li> 

                <li class="list__item">
                    <div class="list__button">
                        <img src="assets/edit.svg" class="list__img">
                        <a href="#" class="nav__link" data-target="inscripcion">Registro/<br>Inscripción</a>
                    </div>
                </li>

                <li class="list__item">
                    <div class="list__button">
                        <img src="assets/user.svg" class="list__img">
                        <a href="#" class="nav__link" data-target="consult_calif">Consultar calificaciones</a>
                    </div>
                </li>

                <li class="list__item">
                    <div class="list__button">
                        <img src="assets/logout.svg" class="list__img">
                        <a href="sesionPart.php" class="nav__link">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="content">
            <!---------------------------------------------------------------------------------->
            <!-- MODIFICAR DATOS -->
            <div class="modificar_datos">
                <div class="form-value">
                    <!-- INICIAR SESION -->
                    <h2>Mis datos</h2>
                    <!-- NOMBRE -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" required>
                        <label for=""><br>Nombre</label>
                    </div>
                    <!-- APELLIDOS-->
                    <div class="group">
                        <div class="inputbox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="text" required>
                            <label for="">Apellido Paterno</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="text" required>
                            <label for="">Apellido Materno</label>
                        </div>
                    </div>
                    <div class="group">
                        <!-- CORREO -->
                        <div class="inputbox">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="email" required>
                            <label for="">Correo</label>
                        </div>
                        <!-- EDAD -->
                        <div class="inputbox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="number" min="0" required>
                            <label for="">Edad</label>
                        </div>
                    </div>
                    <!-- SEXO -->
                    <div class="dob-label">
                        <p>Sexo</p>
                    </div>
                    <div class="dob-inputbox">
                        <select required>
                            <option value="" disabled selected>Selecciona el sexo</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <!-- DIRECCION -->
                    <div class="dob-label">
                        <p><br>Direccion</p>
                    </div>
                    <div class="group">
                        <div class="inputbox">
                            <ion-icon name="location-outline"></ion-icon>
                            <input type="text" required>
                            <label for="">Calle</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="location-outline"></ion-icon>
                            <input type="text" required>
                            <label for="">Número</label>
                        </div>
                    </div>
                    <div class="group">
                        <div class="inputbox">
                            <ion-icon name="location-outline"></ion-icon>
                            <input type="text" required>
                            <label for="">Colonia</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="location-outline"></ion-icon>
                            <input type="text" required>
                            <label for="">Ciudad</label>
                        </div>
                    </div>
                    <div class="group">
                        <div class="inputbox">
                            <ion-icon name="location-outline"></ion-icon>
                            <input type="text" required>
                            <label for="">Estado/Región/Provincia</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="location-outline"></ion-icon>
                            <input type="text" required>
                            <label for="">Código Postal</label>
                        </div>
                    </div>
                    <!-- Botones de modificar y guardar -->
                    <div class="buttons">
                        <button id="editarButton">Editar</button>
                        <button id="guardarButton" style="display: none;">Guardar</button>
                    </div>
                </div>
            </div>
            <!---------------------------------------------------------------------------------->

            <!---------------------------------------------------------------------------------->
            <!-- INSCRIPCIÓN -->
            <div class="inscripcion">
                <h2>Inscripción</h2>
            </div>
            <!------------------------------------------------------------------------------->

            <!---------------------------------------------------------------------------------->
            <!-- CONSULTAR CALIFICACIONES -->
            <div class="consult_calif">
                <h2>Consultar calificaciones</h2>
            </div>
            <!------------------------------------------------------------------------------->
        </div>
        <!---------------------------------------------------------------------------------------------------->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- Script -->
        <script src="js/menuPart.js"></script>
    </body>
</html>