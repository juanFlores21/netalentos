<?php
session_start();
// Conexión a la base de datos
include("conexion_db.php");

// Validación de datos
$usuario = $_POST['nombre']; // Cambiar 'nombre' por 'usuario' para manejar nombre de usuario o correo electrónico
$contra = $_POST['pwd'];

$error = "";

if (empty($usuario) || empty($contra)) {
    $error = "El usuario y la contraseña son obligatorios.";
} else {
    // Consulta a la base de datos
    $sql = "SELECT * FROM juez WHERE (nombre = '$usuario' OR Email = '$usuario' OR idJuez = '$usuario') AND pwd = '$contra'"; // Cambiar 'nombre' por 'usuario'
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_assoc($resultado);
            // Guardar el idJuez en la sesión
            $_SESSION['idJuez'] = $fila['idJuez'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['Email'] = $fila['Email'];
            header("Location: menuJuez.php");
            exit(); // Detener la ejecución del script después de redirigir al usuario
        } else {
            // Usuario o contraseña incorrectos
            $error = "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
        }
    } else {
        // Error en la consulta
        $error = "Error al consultar la base de datos.";
    }
}

// Mostrar mensaje de error
include("sesionjuez.php");
?>

<div id="error-message" style="background-color: #ffcccc; color: #cc0000; padding: 20px; border: 2px solid #cc0000; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <p style="font-size: 18px; margin: 0;"><?php echo $error; ?></p>
    <p style="font-size: 16px; margin: 0;">Por favor, verifica tus datos e intenta de nuevo.</p>
</div>

<script>
    // Desaparecer el mensaje de error después de 2 segundos
    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        errorMessage.style.display = 'none';
    }, 2000); // 2000 milisegundos = 2 segundos
</script>

<?php
mysqli_free_result($resultado);
mysqli_close($conn);
?>
