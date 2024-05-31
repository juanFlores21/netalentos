<?php
include 'conexion.php';

$id_participante = $_GET['id'];

$sql = "SELECT nombre, paterno, materno FROM participante WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_participante);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $nombre = $row['nombre'];
    $apellido_paterno = $row['paterno'];
    $apellido_materno = $row['materno'];
    $categoria = $row['categoria'];
    echo json_encode(array("nombre" => $nombre, "apellido_paterno" => $apellido_paterno, "apellido_materno" => $apellido_materno, "categoria" => $categoria));
} else {
    echo json_encode(array("error" => "Usuario no encontrado"));
}

$stmt->close();
$conn->close();
?>
