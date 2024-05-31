<?php

include("conexion_db.php");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Verifica si se han enviado los datos del formulario

        // Obtener los datos del formulario
        $idParticipante = $_POST['idParticipante'];
        $nombre = $_POST['nombre'];
        $apPaterno = $_POST['apPa'];
        $apMaterno = $_POST['apMa'];
        $correo = $_POST['correo'];
        $edad = $_POST['edad'];
        $fechaNacimiento = $_POST['birthdate'];
        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $codigoPostal = $_POST['cp'];

        // Debug: mostrar datos recibidos
        echo "Datos recibidos: <br>";
        echo "ID: $idParticipante<br>";
        echo "Nombre: $nombre<br>";
        echo "Apellido Paterno: $apPaterno<br>";
        echo "Apellido Materno: $apMaterno<br>";
        echo "Correo: $correo<br>";
        echo "Edad: $edad<br>";
        echo "Fecha de Nacimiento: $fechaNacimiento<br>";
        echo "Calle: $calle<br>";
        echo "Número: $numero<br>";
        echo "Código Postal: $codigoPostal<br>";
        ?>