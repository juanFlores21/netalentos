<?php
// Conexión a la base de datos (asegúrate de ajustar estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$database = "Netalentos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los concursos registrados
$sql = "SELECT idConcurso, Nombre, FechaInicio, HoraInicio FROM concursos";
$result = $conn->query($sql);

// Crear una matriz para almacenar los datos de los concursos
$concursos = array();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Almacenar los datos de los concursos en la matriz
    while($row = $result->fetch_assoc()) {
        $concursos[] = $row;
    }
}

// Convertir el array a formato JSON y devolverlo
echo json_encode($concursos);

// Cerrar conexión
$conn->close();
?>
