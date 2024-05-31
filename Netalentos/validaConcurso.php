<?php

// Iniciar la sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['nombre'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: sesionAdmin.php");
    exit;
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "Netalentos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre_concurso = $_POST['nombre_concurso'];
    $fecha_evento = $_POST['fecha_evento'];
    $hora_evento = $_POST['hora_evento'];
    $id_juez = $_POST['id_juez'];
    $categoria = $_POST['categoria'];

    // Validar que los datos no estén vacíos
    if (!empty($nombre_concurso) && !empty($fecha_evento) && !empty($hora_evento) && !empty($id_juez) && !empty($categoria)) {
        // Preparar y ejecutar la consulta SQL para insertar el concurso
        $sql_insert = "INSERT INTO Concurso (Nombre, FechaInicio, HoraInicio, idJuez, idCategorias) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("sssii", $nombre_concurso, $fecha_evento, $hora_evento, $id_juez, $categoria);

        if ($stmt->execute()) {
            // Mostrar mensaje de éxito
            include("menuAdmin.php");
            ?>
            <div id="success-message" style="background-color: #00FF00; color: #000000; padding: 20px; border: 2px solid #00FF00; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <p style="font-size: 16px; margin: 0;">¡Concurso registrado correctamente!</p>
            </div>

            <script>
                // Desaparecer el mensaje después de 5 segundos y redirigir a la misma página
                setTimeout(function() {
                    var successMessage = document.getElementById('success-message');
                    successMessage.style.display = 'none';
                    // Redirigir después de que el mensaje desaparezca
                    window.location.href = window.location.href;
                }, 5000); // 5000 milisegundos = 5 segundos
            </script>

            <?php
        } else {
            // Mostrar mensaje de error si falla la ejecución de la consulta
            echo "Error: " . $stmt->error;
        }

        // Cerrar el statement
        $stmt->close();
    } else {
        // Mostrar mensaje de error si algún campo está vacío
        echo "Todos los campos son obligatorios.";
    }
}

// Cerrar la conexión
$conn->close();
?>
