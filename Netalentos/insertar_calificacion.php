<?php
// Establecer conexión con la base de datos
include("conexion_db.php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$idConcurso = $_POST['idConcurso'];
$idParticipante = $_POST['idParticipante'];
$idJuez = $_POST['idJuez'];
$calificacionTonoVoz = $_POST['calificacionTonoVoz'];
$calificacionDominio = $_POST['calificacionDominio'];
$calificacionVivencia = $_POST['calificacionVivencia'];
$calificacionDisciplina = $_POST['calificacionDisciplina'];

// Preparar la consulta SQL
$sql = "INSERT INTO Calificacion (idConcurso, idParticipante, idJuez, calificacionTonoVoz, calificacionDominio, calificacionVivencia, calificacionDisciplina) VALUES ('$idConcurso', '$idParticipante', '$idJuez', '$calificacionTonoVoz', '$calificacionDominio', '$calificacionVivencia', '$calificacionDisciplina')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Calificación insertada correctamente";
} else {
    echo "Error al insertar calificación: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
