<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="registroPart.css">
        <title>REGISTRO PARTICPANTE</title>
    </head>
    <body>
        <!-- Barra superior con logotipo y boton de regresar -->
        <div class="logo-bar">
            <div class="back-button">
                <a href="tipoDeUsuario.html">Regresar</a>
            </div>
            <img class="logo" src="img/logotipo.jpg" alt="Logotipo">
        </div>

        <!-- CUADRO -->
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="save_task.php" method="post">
                        <!-- INICIAR SESION -->
                        <h2>Registro participante</h2>

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
                            <input type="email" name="correo" required>
                            <label for="">Correo</label>
                        </div>

                        <!-- EDAD -->
                        <div class="inputbox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="number" min="0" name="edad" required>
                            <label for="">Edad</label>
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
                                <option value="otro">Prefiero no decirlo</option>
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
                            <input type="text" name="numero" required>
                            <label for="">Número</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="location-outline"></ion-icon>
                            <input type="text" name="direccion" required>
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
                        <!------------------------------------------------------------------------------->

                        <!-- ENTRAR -->
                        <button class="button-logIn">Aceptar</button>

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
        <script src="registrarCuenta.js"></script>
    </body>
</html>