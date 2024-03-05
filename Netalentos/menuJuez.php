<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/menuJuez.css">
        <title>MENU JUEZ</title>
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
                        <a href="#" class="nav__link" data-target="calificar">Calificar</a>
                    </div>
                </li>
                
                <li class="list__item">
                    <div class="list__button">
                        <img src="assets/logout.svg" class="list__img">
                        <a href="sesionJuez.php" class="nav__link">Cerrar Sesión</a>
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

                    <div class="group">
                        <!-- APELLIDOS-->
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
                    
                    <!-- NACIONALIDAD -->
                    <div class="dob-label">
                        <p>Nacionalidad</p>
                    </div>
                    <div class="dob-inputbox">
                        <select required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="Española">Española</option>
                            <option value="Mexicana">Mexicana</option>
                            <option value="Argentina">Argentina</option>
                        </select>
                    </div>
                    
                    <!------------------------------------------------------------------------------>
                    <!-- FECHA DE NACIMIENTO -->
                    <div class="dob-label">
                        <p><br>Fecha de nacimiento</p>
                    </div>
                    <div class="dob-inputbox">
                        <!-- DÍA -->
                        <select id="day" name="day" required>
                            <option value="" disabled selected>Selecciona el día</option>
                        </select>

                        <!-- MES -->
                        <select id="month" name="month" required>
                            <option value="" disabled selected>Selecciona el mes</option>
                        </select>

                        <!-- AÑO -->
                        <select id="year" name="year" required>
                            <option value="" disabled selected>Selecciona el año</option>
                        </select>
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
                    
                    <!-- CORREO -->
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required>
                        <label for="">Correo</label>
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
            <div class="calificar">
                <h2>Calificar</h2>
            </div>
            <!------------------------------------------------------------------------------->
        </div>
        <!---------------------------------------------------------------------------------------------------->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- Script -->
        <script src="js/menuJuez.js"></script>
    </body>
</html>