<?php
// Iniciar la sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("conexion_db.php");


// Consulta para obtener los concursos
$sql = "SELECT idConcurso, nombre, fechaInicio, horaInicio FROM concurso";
$result = $conn->query($sql);

$concursos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $concursos[] = $row;
    }
} else {
    echo "0 resultados";
}

// Depuración: Inspeccionar el contenido de $_POST
var_dump($_POST);

// Verificar si el usuario está autenticado
if (!isset($_SESSION['idParticipante'])) {
    echo "Debe iniciar sesión para inscribirse.";
    exit();
}

if (isset($_POST['idConcurso']) && isset($_POST['idParticipante'])) {
    // Obtener datos del formulario
    $idConcurso = $_POST['idConcurso'];
    $idParticipante = $_POST['idParticipante'];

    // Verificar si idParticipante existe en la tabla participante
    $checkParticipant = $conn->prepare("SELECT idParticipante FROM participante WHERE idParticipante = ?");
    $checkParticipant->bind_param("i", $idParticipante);
    $checkParticipant->execute();
    $checkParticipant->store_result();

    if ($checkParticipant->num_rows > 0) {
        // Preparar y ejecutar la inserción
        $sql = "INSERT INTO inscripcion (idConcurso, idParticipante) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $idConcurso, $idParticipante);

        if ($stmt->execute()) {
            include("menuPart.php");
                        ?>
                    <div id="error-message" style="background-color: #00FF00; color: #000000; padding: 20px; border: 2px solid #00FF00; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <p style="font-size: 18px; margin: 0;"><?php echo $error; ?></p>
                        <p style="font-size: 16px; margin: 0;">Usuario registrado correctamente</p>
                    </div>
                    <script>
                        // Desaparecer el mensaje de error después de 5 segundos
                        setTimeout(function() {
                            var errorMessage = document.getElementById('error-message');
                            errorMessage.style.display = 'none';
                        }, 5000); // 5000 milisegundos = 5 segundos
                    </script>
                    <?php
        } else {
            include("menuPart.php");
            ?>
        <div id="error-message" style="background-color: #00FF00; color: #000000; padding: 20px; border: 2px solid #00FF00; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <p style="font-size: 18px; margin: 0;"><?php echo $error; ?></p>
            <p style="font-size: 16px; margin: 0;">Usuario registrado correctamente</p>
        </div>
        <script>
            // Desaparecer el mensaje de error después de 5 segundos
            setTimeout(function() {
                var errorMessage = document.getElementById('error-message');
                errorMessage.style.display = 'none';
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>
        <?php
        }

        $stmt->close();
    } else {
        echo "El participante no existe.";
    }

    $checkParticipant->close();
} 
$conn->close();
?>
