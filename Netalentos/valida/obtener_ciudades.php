<?php
// Conexión a la base de datos
require '../conexion_db.php';



$idEstado = $conn->real_escape_string($_POST['estado']);

$sql = $conn->query("SELECT idCiudad, nombre FROM ciudad WHERE idEstado=$idEstado");

$respuesta = "<option value=''>Seleccionar</option>";

while ($row = $sql->fetch_assoc()) {
    $respuesta .= "<option value='" . $row['idCiudad'] . "'>" . $row['nombre'] . "</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
