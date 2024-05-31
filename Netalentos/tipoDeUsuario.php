<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="tipoDeUsuario.css">
        <title>TIPO DE USUARIO</title>
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
                    <!-- TIPO DE USUARIO -->
                    <h2>Elige el tipo de usuario</h2>
                    <!-- Botón con Imagen y Texto que redirige a otro archivo HTML -->
                    <center>
                        <div class="btn-group justify-content-center" role="group" aria-label="Basic example">
                            <button type="tipoUs" class="btn btn-secondary" onclick="window.location.href='registroPart.php'">
                                <div class="button-content">
                                    <img class="img" src="img/parti.png" alt="Part" class="rounded-circle" style="width: 80px; height: 80px;">
                                    <span class="button-text">Participante</span>
                                </div>
                            </button>
                            <button type="tipoUs" class="btn btn-secondary" onclick="window.location.href='registroJuez.php'">
                                <div class="button-content">
                                    <img class="img" src="img/Juez.png" alt="Part" class="rounded-circle" style="width: 80px; height: 80px;">
                                    <span class="button-text">Juez</span>
                                </div>
                            </button>
                        </div>
                    </center>
                </div>
            </div>
        </section>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- Script -->
        <script src="registrarCuenta.js"></script>
    </body>
</html>