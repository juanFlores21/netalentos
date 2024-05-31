<?php
// Establecer conexión con la base de datos
include ("conexion_db.php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del participante enviado por AJAX
$idParticipante = $_POST['idParticipante'];

// Realizar la consulta para buscar al participante
$sql = "SELECT nombre, paterno, materno FROM Participante WHERE idParticipante = '$idParticipante'";
$result = $conn->query($sql);

$participante = array();
if ($result->num_rows > 0) {
    // Obtener los datos del participante
    $row = $result->fetch_assoc();

    // Asegúrate de que los nombres de las columnas coincidan con los de tu base de datos
    $participante = array(
        'nombre' => $row['nombre'] ?? null,
        'apellido_paterno' => $row['paterno'] ?? null,
        'apellido_materno' => $row['materno'] ?? null,
        'categoria' => $row['categoria'] ?? null
    );
} else {
    $participante = array('error' => 'No se encontró el participante');
}

// Cerrar la conexión
$conn->close();

// Devolver los datos como JSON
echo json_encode($participante);
?>
