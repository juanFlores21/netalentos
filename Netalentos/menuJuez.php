<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['nombre']) && !isset($_SESSION['idJuez']) && !isset($_SESSION['Email'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: sesionJuez.php");
    exit;
}

// Incluir el archivo de conexión a la base de datos
include("conexion_db.php");

// Obtener el idJuez del usuario autenticado
$idJuez = $_SESSION['idJuez'];

// Modificar la consulta para utilizar el idJuez del usuario
$sql = "SELECT nombre, paterno, materno, edad, fechaNac, email, calle, num, colonia, codigoPostal, pwd, idJuez, idGenero, idNacionalidad, idCiudad FROM Juez WHERE idJuez = $idJuez";
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
$idJuez = $row['idJuez'];
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
    <link rel="stylesheet" href="menuJuez.css">
    <title>MENU JUEZ</title>
</head>

<body>
    <!-- Barra superior con logotipo -->
    <div class="logo-bar">
        <p style="text-align: center; font-size: 24px;">Bienvenid@ Juez <?php echo $nombre; ?></p>
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
                <form action="validaModJuez.php" method="POST">
                    <!-- INICIAR SESION -->
                    <h2>Mis datos</h2>
                    <!-- NOMBRE -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="hidden" name="idJuez" value="<?php echo $idJuez; ?>">
                        <input type="text" name="nombre" required value="<?php echo $nombre ?>">
                        <label for="">Nombre</label>
                    </div>

                    <!-- APELLIDOS-->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apPa" required value="<?php echo $apPaterno ?>">
                        <label for="">Apellido Paterno</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apMa" required value="<?php echo $apMaterno ?>">
                        <label for="">Apellido Materno</label>
                    </div>

                    <!-- CORREO -->                    
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="hidden" name="correo_original" value="<?php echo $correo ?>">
                    <input type="email" name="correo" required oninput="validateEmail(this.value)" value="<?php echo $correo ?>">
                    <label for="correo">Correo</label>
                </div>
                <p id="errorEmail" style="display: none;">Correo electrónico no válido</p>

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


                    <!-- EDAD -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="number" min="0" name="edad" required value="<?php echo $edad ?>">
                        <label for="">Edad</label>
                    </div>

                    <!-- FECHA DE NACIMIENTO -->
                    <div class="dob-label">
                        <p><br>Fecha de nacimiento</p>
                    </div>
                    <div class="dob-inputbox">
                        <!-- Campo de entrada para la fecha -->
                        <input type="text" id="birthdate" name="birthdate" placeholder="yyyy/mm/dd" pattern="\d{4}/\d{2}/\d{2}" required title="Por favor, ingresa la fecha en formato yyyy/mm/dd" required value="<?php echo $fechaNacimiento ?>">
                    </div>

                    <!------------------------------------------------------------------------------->
                    <!-- DIRECCION -->
                    <div class="dob-label">
                        <p><br>Direccion</p>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="calle" required value="<?php echo $calle ?>">
                        <label for="">Calle</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="number" name="numero" required value="<?php echo $numero ?>">
                        <label for="">Número</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="number" name="cp" required value="<?php echo $codigoPostal ?>">
                        <label for="">Código Postal</label>
                    </div>



                    <!-- Botones de modificar y guardar -->
                    <div class="buttons">                                               
                        <button id="guardarButton" style="display: none;">Guardar</button>
                    </div>
                </form>
                <button id="editarButton">Editar</button> 
            </div>
        </div>
        <!---------------------------------------------------------------------------------->

        <!---------------------------------------------------------------------------------->
        <!-- Calificar -->
        <div class="calificar">
            <h2>Calificar</h2>
            <br>
            <!-- Agregar el formulario -->
            <form action="insertar_calificacion.php" method="post">
             <div class="search-container">
            <input type="text" id="id_participante" name="id_participante" placeholder="Ingresa ID...">
            <button type="button" onclick="buscarParticipante()">Buscar</button>
        </div>
        <br>
        <div class="container">
            <div class="nombre">
                <h3>Nombre</h3>
                <div class="data-content" id="nombre"></div>
            </div>
            <div class="apellido-paterno">
                <h3>Apellido Paterno</h3>
                <div class="data-content" id="paterno"></div>
            </div>
            <div class="apellido-materno">
                <h3>Apellido Materno</h3>
                <div class="data-content" id="materno"></div>
            </div>
        </div>
        <div class="container">
            <div class="categoria">
                <h3>Categoria</h3>
                <div class="data-content" id="categoria"></div>
            </div>
        </div>
        <br><br>
        <p>Ingresa la calificación:</p>
        <br>
        <div class="group">
            <div class="tonovoz">
                <p>Tono de voz:</p>
                <input type="text" name="tono_voz" placeholder="Ingresa la calificación">
                <div class="data-content"></div>
            </div>
            <div class="domincan">
                <p>Dominio de la canción:</p>
                <input type="text" name="dominio_cancion" placeholder="Ingresa la calificación">
                <div class="data-content"></div>
            </div>
        </div>
        <br>
        <div class="group">
            <div class="vivencia">
                <p>Vivencia:</p>
                <input type="text" name="vivencia" placeholder="Ingresa la calificación">
                <div class="data-content"></div>
            </div>
            <div class="disciplina">
                <p>Disciplina:</p>
                <input type="text" name="disciplina" placeholder="Ingresa la calificación">
                <div class="data-content"></div>
            </div>
        </div>
        <!-- Boton guardar -->
        <div class="buttons">
            <button id="guardarButton" type="submit">Guardar</button>
        </div>
    </form>

    <script>
        function buscarParticipante() {
            var id = document.getElementById('id_participante').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "buscar_participante.php?id=" + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var resultado = JSON.parse(xhr.responseText);
                    if (resultado.error) {
                        alert(resultado.error);
                    } else {
                        document.getElementById('nombre').innerText = resultado.nombre;
                        document.getElementById('apellido_paterno').innerText = resultado.apellido_paterno;
                        document.getElementById('apellido_materno').innerText = resultado.apellido_materno;
                        document.getElementById('categoria').innerText = resultado.categoria;
                    }
                }
            };
            xhr.send();
        }
    </script>
        </div>

        <!------------------------------------------------------------------------------->
    </div>
    <!---------------------------------------------------------------------------------------------------->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    

    <!-- Script -->
    <script src="js/menuJuez.js"></script>
</body>

</html>