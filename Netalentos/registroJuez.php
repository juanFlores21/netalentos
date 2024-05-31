<?php
include("conexion_db.php");
//querys sql
$sql_estados = "SELECT idEstado, nombre FROM estado";
$result_estados = $conn->query($sql_estados);

$sql_sexo = "SELECT tipo FROM genero";
$result_sexo = $conn->query($sql_sexo);

$sql_ciudad = "SELECT idCiudad, nombre FROM Ciudad";
$result_ciudad = $conn->query($sql_ciudad);

$sql_nacionalidades = "SELECT nombre FROM Nacionalidad";
$result_nacionalidades = $conn->query($sql_nacionalidades);

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="registroPart.css">
    <title>REGISTRO JUEZ</title>

</head>

<body>
    <!-- Barra superior con logotipo y boton de regresar -->
    <div class="logo-bar">
        <div class="back-button">
            <a href="iniciarSesion.php">Regresar</a>
        </div>
        <img class="logo" src="img/logotipo.jpg" alt="Logotipo">
    </div>

    <!-- CUADRO -->
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="validaRegJuez.php" method="post" onsubmit="return validateForm()">
                    <!-- INICIAR SESION -->
                    <h2>Registro juez</h2>

                    <!-- NOMBRE -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nombre" required>
                        <label for="">Nombre</label>
                    </div>

                    <!-- APELLIDOS-->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apPa" required>
                        <label for="">Apellido Paterno</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apMa" required>
                        <label for="">Apellido Materno</label>
                    </div>

                    <!-- CORREO -->
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="correo" required oninput="validateEmail(this.value)">
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
                        <input type="number" min="0" name="edad" required>
                        <label for="">Edad</label>
                    </div>

                    <!-- NACIONALIDAD -->
                    <div class="dob-label">
                        <p>Nacionalidad</p>
                    </div>
                    <div class="dob-inputbox">
                        <select name="nacionalidad" required>
                            <option value="" disabled selected>Selecciona la nacionalidad</option>
                            <?php
                            if ($result_nacionalidades->num_rows > 0) {
                                while ($row = $result_nacionalidades->fetch_assoc()) {
                                    echo "<option value='" . $row["nombre"] . "'>" . $row["nombre"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <!-- FECHA DE NACIMIENTO -->
                    <div class="dob-label">
                        <p><br>Fecha de nacimiento</p>
                    </div>
                    <div class="dob-inputbox">
                        <!-- Campo de entrada para la fecha -->
                        <input type="text" id="birthdate" name="birthdate" placeholder="yyyy/mm/dd" pattern="\d{4}/\d{2}/\d{2}" required title="Por favor, ingresa la fecha en formato yyyy-mm-dd">
                    </div>

                    <!-- SEXO -->
                    <div class="dob-label">
                        <p>Género</p>
                    </div>
                    <div class="dob-inputbox">
                        <select name="genero" required>
                            <option value="" disabled selected>Selecciona el género</option>
                            <?php
                            if ($result_sexo->num_rows > 0) {
                                while ($row = $result_sexo->fetch_assoc()) {
                                    echo "<option value='" . $row["tipo"] . "'>" . $row["tipo"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <!------------------------------------------------------------------------------->
                    <!-- DIRECCION -->
                    <div class="dob-label">
                        <p><br>Direccion</p>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="calle" required>
                        <label for="">Calle</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="number" name="numero" required>
                        <label for="">Número</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="direccion" required>
                        <label for="">Colonia</label>
                    </div>
                    <!-- ESTADO -->
                    <div class="dob-label">
                        <p>Estado/Región/Provincia</p>
                    </div>
                    <div class="dob-inputbox">
                        <select name="estado" id="estado">
                            <option value="" disabled selected>Seleccionar</option>
                            <?php while ($row = $result_estados->fetch_assoc()) { ?>
                                <option value="<?php echo $row['idEstado']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Ciudad -->

                    <div class="dob-label">
                        <p>Ciudad</p>
                    </div>
                    <div class="dob-inputbox">
                        <select id="ciudad" name="ciudad" required>
                            <option value="" disabled selected>Selecciona la ciudad</option>
                        </select>
                    </div>



                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="number" name="cp" required>
                        <label for="">Código Postal</label>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name=pwd required>
                        <label for="">Contraseña</label>
                    </div>
                    <!-- CONFIRMAR CONTRASEÑA -->
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required>
                        <label for="">Confirmar Contraseña</label>
                    </div>

                    <!-- ENTRAR -->
                    <button class="button-logIn">Aceptar</button>

                    <!-- REGRESAR A INICIAR SESION -->
                    <div class="register">
                        <p>¿Ya tienes una cuenta? <a href="iniciarSesion.php">Iniciar sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Script -->
    <script src="js/registroJuez.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ciudades.js"></script> <!-- Incluye el archivo JavaScript aquí -->

</body>

</html>