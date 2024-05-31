<?php
// Establecer la conexión a la base de datos (reemplaza los valores con los de tu servidor)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "netalentos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>



