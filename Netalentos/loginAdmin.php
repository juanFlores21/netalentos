<?php
session_start();
// Conexión a la base de datos
include("conexion_db.php");

// Validación de datos
$nombre = $_POST['nombre'];
$contra = $_POST['pass'];
$id = $_POST['nombre'];

$error = "";

if (empty($nombre) || empty($contra)) {
    $error = "El usuario y la contraseña son obligatorios.";
}

$_SESSION['nombre'] = $nombre;

// Consulta a la base de datos
$sql = "SELECT * FROM admin WHERE nombre = '$nombre' OR idAdmin = '$id'";
$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila['pass'] == $contra) {
            // La contraseña es correcta
            header("Location:menuAdmin.php");
            exit(); // Detener la ejecución del script después de redirigir al usuario
        } else {
            // La contraseña es incorrecta
            $error = "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
        }
    } else {
        // Usuario no encontrado
        $error = "Usuario no encontrado.";
    }
} else {
    // Error en la consulta
    $error = "Error al consultar la base de datos.";
}

// Mostrar mensaje de error
include("sesionAdmin.php");
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
