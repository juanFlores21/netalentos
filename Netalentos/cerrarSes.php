<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión
header("Location: iniciarSesion.php");
exit; // Asegura que el script se detenga después de redireccionar
?>
