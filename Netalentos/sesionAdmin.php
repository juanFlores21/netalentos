<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="iniciarSesion.css">
    <title>INICIAR SESION</title>
</head>
<body>
    <!-- Barra superior con logotipo -->
    <div class="logo-bar">
        <img class="logo" src="img/logotipo.jpg" alt="Logotipo">
    </div>
    
    <!-- CUADRO -->
    <section>
        <div class="form-box">
            <div class="form-value">
                <!-- TIPO DE USUARIO -->
                <!-- Botón con Imagen y Texto que redirige a otro archivo HTML -->
                <center>
                    <div class="btn-group justify-content-center" role="group" aria-label="Basic example">
                        <button type="tipoUs" class="btn btn-secondary" onclick="window.location.href='menuPart.php'">
                            <div class="button-content">
                                <a href="iniciarSesion.php"></a>
                                <img class="img rounded-circle" src="img/parti.png" alt="Part" style="width: 80px; height: 80px;">                            
                                <span class="button-text">Participante</span>
                            </div>
                        </button>
                        <button type="tipoUs" class="btn btn-secondary" onclick="window.location.href='menuJuez.php'">
                            <div class="button-content">
                            <a href="SesionJuez.php">
                                <img class="img rounded-circle" src="img/juez.png" alt="Part" style="width: 80px; height: 80px;">
                            </a>
                                <span class="button-text">Juez</span>
                            </div>
                        </button>
                        <button type="tipoUs" class="btn btn-secondary" onclick="window.location.href='menuAdmin.php'">
                            <div class="button-content">
                            <a href="SesionAdmin.php">
                                <img class="img rounded-circle" src="img/admin.png" alt="Part" style="width: 80px; height: 80px;">
                            </a>

                                <span class="button-text">Administrador</span>
                            </div>
                        </button>
                    </div>
                </center>

                                        
                <!--<form action="menuOrganizador.html" method="post">-->
                <form action="loginAdmin.php" method="post">
                    <!-- INICIAR SESION -->
                    <h2><br>Iniciar sesión</h2>                    

                    <!-- PEDIR USUARIO -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nombre" required>
                        <label for="">Usuario</label>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="pass" required>
                        <label for="">Contraseña</label>
                    </div>
                    <br>
                    <!-- ENTRAR -->                    
                    <button type="submit" name="btningresar" class="button-logIn">Ingresar</button>                                   
                    <!-- REGISTRAR USUARIO -->
                    <div class="register">
                        <p>No tengo cuenta <a href="tipoDeUsuario.php">Registrar Usuario</a></p>
                    </div>                   
                </form>
            </div>
            <!--<img class="imagen" src="img/fondo2.jpg" alt="">-->
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>