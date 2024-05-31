<?php
if (session_status() == PHP_SESSION_NONE) {    
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['nombre']) && !isset($_SESSION['idParticipante']) && !isset($_SESSION['Email'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: iniciarSesion.php");
    exit;
}

// Incluir el archivo de conexión a la base de datos
include("conexion_db.php");

// Obtener el idParticipante del usuario autenticado
$idParticipante = $_SESSION['idParticipante'];

// Modificar la consulta para utilizar el idParticipante del usuario
$sql = "SELECT nombre, paterno, materno, edad, fechaNac, email, calle, num, colonia, codigoPostal, pwd, idParticipante, idGenero, idNacionalidad, idCiudad FROM Participante WHERE idParticipante = $idParticipante";
$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($resultado);



// Consulta para obtener estados
$sql_estados = "SELECT idEstado, nombre FROM estado";
$result_estados = $conn->query($sql_estados);
$row1 = mysqli_fetch_assoc($result_estados);

$sql_sexo = "SELECT tipo FROM genero";
$result_sexo = $conn->query($sql_sexo);
$row2 = mysqli_fetch_assoc($result_sexo);

$sql_ciudad = "SELECT idCiudad, nombre FROM Ciudad";
$result_ciudad = $conn->query($sql_ciudad);
$row3 = mysqli_fetch_assoc($result_ciudad);

$sql_nacionalidades = "SELECT nombre FROM Nacionalidad";
$result_nacionalidades = $conn->query($sql_nacionalidades);
$row4 = mysqli_fetch_assoc($result_nacionalidades);

//conversion fechanac
$fechaNacimiento = str_replace('-', '/', $row['fechaNac']);


// Asignar los valores obtenidos a variables
$idParticipante = $row['idParticipante'];
$nombre = $row['nombre'];
$apPaterno = $row['paterno'];
$apMaterno = $row['materno'];
$correo = $row['email'];
$edad = $row['edad'];
$nombreNacionalidad = $row4['nombre'];
$nombreGenero = $row2['tipo'];
$calle = $row['calle'];
$numero = $row['num'];
$colonia = $row['colonia'];
$ciudad = $row3['nombre'];
$codigoPostal = $row['codigoPostal'];
$pwd = $row['pwd'];

// Cerrar la conexión
$conn->close();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="menuPart.css">
    <title>MENU PARTICIPANTE</title>
</head>

<body>
    <!-- Barra superior con logotipo -->
    <div class="logo-bar">
        <p style="text-align: center; font-size: 24px;">Bienvenid@ Participante <?php echo $nombre; ?></p>
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
                    <a href="menuPart.php" class="nav__link" data-target="inscripcion">Inscripción</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/user.svg" class="list__img">
                    <a href="menuPart.php" class="nav__link" data-target="consult_calif">Consultar calificaciones</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/logout.svg" class="list__img">
                    <a href="iniciarSesion.php" class="nav__link">Cerrar Sesión</a>
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
                <form action="validaModPart.php" method="POST" id="updateForm">
                    <!-- INICIAR SESION -->
                    <h2>Mis datos</h2>
                    <!-- NOMBRE -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="hidden" name="idParticipante" value="<?php echo $idParticipante; ?>">
                        <input type="text" id="nombre" name="nombre" required value="<?php echo $nombre ?>" >
                        <label for="">Nombre</label>
                    </div>                    

                    <!-- APELLIDOS-->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apPa" id="apPa" required value="<?php echo $apPaterno ?>" >
                        <label for="">Apellido Paterno</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apMa" id="apMa" required value="<?php echo $apMaterno ?>" >
                        <label for="">Apellido Materno</label>
                    </div>

                    <!-- CORREO -->
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="correo" id="correo" required oninput="validateEmail(this.value)" value="<?php echo $correo ?>" disabled>
                        <label for="correo">Correo</label>
                    </div>
                    <p id="errorEmail" style="display: none;">Correo electrónico no válido</p>                   

                    <!-- EDAD -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="number" min="0" name="edad" id="edad" required value="<?php echo $edad ?>" disabled>
                        <label for="">Edad</label>
                    </div>

                    <!-- FECHA DE NACIMIENTO -->
                    <div class="dob-label">
                        <p><br>Fecha de nacimiento</p>
                    </div>
                    <div class="dob-inputbox">
                        <!-- Campo de entrada para la fecha -->
                        <input type="text" id="birthdate" name="birthdate" placeholder="yyyy/mm/dd" pattern="\d{4}/\d{2}/\d{2}" required title="Por favor, ingresa la fecha en formato yyyy/mm/dd" value="<?php echo $fechaNacimiento ?>" disabled>
                    </div>

                    <!------------------------------------------------------------------------------->
                    <!-- DIRECCION -->
                    <div class="dob-label">
                        <p><br>Direccion</p>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="calle" id="calle" required value="<?php echo $calle ?>" disabled>
                        <label for="">Calle</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="number" name="numero" id="numero" required value="<?php echo $numero ?>" disabled>
                        <label for="">Número</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="number" name="cp" id="cp" required value="<?php echo $codigoPostal ?>" disabled>
                        <label for="">Código Postal</label>
                    </div>

                    <!-- Botones de modificar y guardar -->
                    <div class="buttons">                        
                
                        <button type="submit" id="guardarButton" style="display: none;">Guardar</button>
                    </div>
                </form>
                <button type="button" id="editarButton">Editar</button>
            </div>
        </div>      

        <!---------------------------------------------------------------------------------->

        <!---------------------------------------------------------------------------------->
        <!---------------------------------------------------------------------------------->
       <!-- INSCRIPCIÓN -->         

        <!------------------------------------------------------------------------------->

        <!---------------------------------------------------------------------------------->
        <!-- CONSULTAR CALIFICACIONES -->
        
        <!------------------------------------------------------------------------------->
    </div>
    <!---------------------------------------------------------------------------------------------------->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Script -->
    <script src="js/menuPart.js"></script>

    <!-- correo -->
    <script>
                        const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                        function validateEmail(email) {
                            const isValid = emailRegex.test(email);
                            const errorEmailElement = document.getElementById('errorEmail');

                            if (!isValid) {
                                errorEmailElement.style.display = 'block';
                            } else {
                                errorEmailElement.style.display = 'none';
                            }
                        }
                    </script>

    <!-- correo -->
    
</body>

</html>