<?php
include("conexion_db.php");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$idJuez = $_POST['idJuez'];
$nombre = $_POST['nombre'];
$apPaterno = $_POST['apPa'];
$apMaterno = $_POST['apMa'];
$correo = $_POST['correo'];
$correo_original = $_POST['correo_original']; // Nuevo campo para el correo original
$edad = $_POST['edad'];
$fechaNacimiento = $_POST['birthdate'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$codigoPostal = $_POST['cp'];

// Verificar si el correo ha cambiado
if ($correo !== $correo_original) {
    // Verificar si el nuevo correo electrónico ya existe en la base de datos
    $sql_check_email = "SELECT idJuez FROM Juez WHERE email = ? AND idJuez != ?";
    $stmt_check_email = $conn->prepare($sql_check_email);
    $stmt_check_email->bind_param("si", $correo, $idJuez);
    $stmt_check_email->execute();
    $result_check_email = $stmt_check_email->get_result();

    if ($result_check_email->num_rows > 0) {
        // Si el correo ya existe, mostrar mensaje de error
        include("menuJuez.php");
        ?>
        <div id="error-message" style="background-color: #FF0000; color: #FFFFFF; padding: 20px; border: 2px solid #FF0000; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <p style="font-size: 16px; margin: 0;">El correo electrónico ya está en uso. Por favor, use otro correo.</p>
        </div>

        <script>
            // Desaparecer el mensaje de error después de 5 segundos
            setTimeout(function() {
                var errorMessage = document.getElementById('error-message');
                errorMessage.style.display = 'none';
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>
        <?php
        exit;
    }

    // Cerrar la conexión del chequeo de email
    $stmt_check_email->close();
}

// Actualizar los datos del juez en la base de datos
$sql = "UPDATE Juez 
        SET Nombre = ?, 
            Paterno = ?, 
            Materno = ?, 
            email = ?, 
            Edad = ?, 
            FechaNac = ?, 
            Calle = ?, 
            Num = ?, 
            CodigoPostal = ? 
        WHERE idJuez = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssiii", $nombre, $apPaterno, $apMaterno, $correo, $edad, $fechaNacimiento, $calle, $numero, $codigoPostal, $idJuez);

if ($stmt->execute()) {
    include("menuJuez.php");
    ?>
    <div id="success-message" style="background-color: #00FF00; color: #000000; padding: 20px; border: 2px solid #00FF00; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <p style="font-size: 16px; margin: 0;">Datos actualizados correctamente</p>
    </div>

    <script>
        // Desaparecer el mensaje de éxito después de 5 segundos y redirigir a la misma página
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            successMessage.style.display = 'none';
            // Redirigir después de que el mensaje desaparezca
            window.location.href = window.location.href;
        }, 5000); // 5000 milisegundos = 5 segundos
    </script>
    <?php
} else {
    echo "Error al actualizar los datos: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();

// Verificar si la conexión está abierta antes de intentar cerrarla
if (isset($conn) && $conn instanceof mysqli) {
    $conn->close();
}
?>
