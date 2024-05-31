<?php
header('Content-Type: application/json');

include("conexion_db.php");

// Obtener el ID del parámetro GET
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Consulta SQL para obtener los datos del usuario y en qué concurso y categoría está inscrito
$sql = "SELECT p.idParticipante, p.Nombre, p.Paterno, p.Edad, p.Email, c.nombre AS nombreConcurso, cat.nombre AS nombreCategoria
        FROM participante p
        JOIN inscripcion i ON p.idParticipante = i.idParticipante
        JOIN concurso c ON i.idConcurso = c.idConcurso
        JOIN categorias cat ON c.idCategorias = cat.idCategorias
        WHERE p.idParticipante = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}


// Devolver los resultados en formato JSON
echo json_encode($users);

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
