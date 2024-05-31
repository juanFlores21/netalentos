<?php
include("conexion_db.php");

// Consulta SQL para obtener las nacionalidades
$sql_nacionalidades = "SELECT idNacionalidad, nombre FROM Nacionalidad";
$result_nacionalidades = $conn->query($sql_nacionalidades);

// Crear un array para almacenar las nacionalidades
$nacionalidades = array();

// Llenar el array con las nacionalidades obtenidas
if ($result_nacionalidades->num_rows > 0) {
    while($row = $result_nacionalidades->fetch_assoc()) {
        $nacionalidad = array(
            'idNacionalidad' => $row['idNacionalidad'],
            'nombre' => $row['nombre']
        );
        array_push($nacionalidades, $nacionalidad);
    }
}

// Convertir el array a formato JSON y enviarlo como respuesta
echo json_encode($nacionalidades);

// Cerrar conexión
$conn->close();
?>
