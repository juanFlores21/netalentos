<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="registrarUsuario..css">
    <title>REGISTRAR USUARIO</title>
</head>

<body>
    <!-- Barra superior con logotipo y boton de regresar -->
    <div class="logo-bar">
        <div class="back-button">
            <a href="iniciarSesion.html">Regresar</a>
        </div>
        <img class="logo" src="img/logotipo.jpg" alt="Logotipo">
    </div>

    <!-- CUADRO -->
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="validaRegPart.php" method="post">
                    <!-- INICIAR SESION -->
                    <h2>Registro</h2>

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

                    <!-- TIPO DE USUARIO -->
                    <div class="dob-label">
                        <p>Tipo de usuario</p>
                    </div>
                    <div class="dob-inputbox">
                        <select name="tipo" required>
                            <option value="" disabled selected>Selecciona el usuario</option>
                            <option value="masculino">Juez</option>
                            <option value="femenino">Participante</option>
                        </select>
                    </div>

                    <!-- SEXO -->
                    <div class="dob-label">
                        <p><br>Sexo</p>
                    </div>
                    <div class="dob-inputbox">
                        <select name="sexo" required>
                            <option value="" disabled selected>Selecciona el sexo</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <!-- EDAD -->
                    <div class="dob-label">
                        <p><br>Edad</p>
                    </div>
                    <div class="dob-inputbox">
                        <select id="edad" name="edad" required>
                            <option value="" disabled selected>Selecciona tu edad</option>
                            <!-- Generar opciones de 1 a 100 años -->
                            <?php
                            for ($i = 2; $i <= 90; $i++) {
                                echo "<option value='$i'>$i años</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!------------------------------------------------------------------------------>
                    <!-- FECHA DE NACIMIENTO -->
                    <div class="dob-label">
                        <p><br>Fecha de nacimiento</p>
                    </div>
                    <div class="dob-inputbox">
                        <!-- Día -->
                        <select id="dia" name="dia" required>
                            <option value="" disabled selected>Día</option>
                            <?php
                            // Generar opciones para los días del mes
                            for ($i = 1; $i <= 31; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>

                        <!-- Mes -->
                        <select id="mes" name="mes" required>
                            <option value="" disabled selected>Mes</option>
                            <?php
                            // Generar opciones para los meses del año
                            $meses = array(
                                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                                "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                            );
                            foreach ($meses as $key => $mes) {
                                echo "<option value='" . ($key + 1) . "'>$mes</option>";
                            }
                            ?>
                        </select>

                        <!-- Año -->
                        <select id="year" name="year" required>
                            <option value="" disabled selected>Año</option>
                            <?php
                            // Generar opciones de años desde 1900 hasta el año actual
                            $yearActual = date("Y");
                            for ($i = 1900; $i <= $yearActual; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!------------------------------------------------------------------------------>

                    <!-- CORREO -->
                    <br>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="correo" required>
                        <label for="">Correo</label>
                    </div>

                    <!-- NACIONALIDAD -->
                    <div class="dob-label">
                        <p>Nacionalidad</p>
                    </div>
                    <div class="dob-inputbox">
                        <select name="nacionalidad" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="Española">Española</option>
                            <option value="Mexicana">Mexicana</option>
                            <option value="Argentina">Argentina</option>
                        </select>
                    </div>

                    <!------------------------------------------------------------------------------->
                    <!-- DIRECCION -->
                    <div class="dob-label">
                        <p><br>Direccion</p>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="direccion" required>
                        <label for="">Calle</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="numero" required>
                        <label for="">Número</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="colonia" required>
                        <label for="">Colonia</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="ciudad" required>
                        <label for="">Ciudad</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="estado" required>
                        <label for="">Estado/Región/Provincia</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="cp" required>
                        <label for="">Código Postal</label>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="contra" required>
                        <label for="">Contraseña</label>
                    </div>
                    <!-- CONFIRMAR CONTRASEÑA -->
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="contra2" required>
                        <label for="">Confirmar Contraseña</label>
                    </div>
                    <!------------------------------------------------------------------------------->

                    <!-- ENTRAR -->
                    <button class="button-logIn">Registrar</button>

                    <!-- REGRESAR A INICIAR SESION -->
                    <div class="register">
                        <p>¿Ya tienes una cuenta? <a href="iniciarSesion.html">Iniciar sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Script -->
    <script src="registrarUsuario.js"></script>
</body>

</html>