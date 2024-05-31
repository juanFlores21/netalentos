<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['nombre']) && !isset($_SESSION['idParticipante']) && !isset($_SESSION['Email'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: iniciarSesion.php");
    exit;
}

// Incluir el archivo de conexión a la base de datos
include("conexion_db.php");

// Obtener el idParticipante del usuario autenticado
$idParticipante = $_SESSION['idParticipante'];

// Modificar la consulta para utilizar el idParticipante del usuario
$sql = "SELECT nombre, paterno, materno, edad, fechaNac, email, calle, num, colonia, codigoPostal, pwd, idParticipante, idGenero, idNacionalidad, idCiudad FROM Participante WHERE idParticipante = $idParticipante";
$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($resultado);

// Consulta para obtener el nombre del concurso
$sql_concu = "SELECT c.nombre AS nombreConcurso, c.idConcurso FROM inscripcion i JOIN concurso c ON i.idConcurso = c.idConcurso WHERE i.idParticipante = $idParticipante;";
$result = $conn->query($sql_concu);

// Obtener el nombre del concurso y su id
if ($result->num_rows > 0) {
    $roro = $result->fetch_assoc();
    $nombreConcurso = $roro["nombreConcurso"];
    $idConcurso = $roro["idConcurso"];
} else {
    echo "No results found";
}

// Consulta para obtener los criterios y calificaciones
$sql_calif = "SELECT cr.NomCriterio, cal.Calificacion
              FROM inscripcion i
              JOIN concurso c ON i.idConcurso = c.idConcurso
              JOIN categorias cat ON c.idCategorias = cat.idCategorias
              JOIN criterios cr ON cat.idCategorias = cr.idCategorias
              LEFT JOIN calificacion cal ON cr.idCriterios = cal.idCriterios 
                                          AND cal.idParticipante = i.idParticipante 
                                          AND cal.idConcurso = i.idConcurso
              WHERE i.idParticipante = $idParticipante AND i.idConcurso = $idConcurso";

$resultao = $conn->query($sql_calif);

// Almacenar los resultados en un array
$criteriosCalificaciones = array();
$totalCalificaciones = 0;
$countCalificaciones = 0;
if ($resultao->num_rows > 0) {
    while ($ro = $resultao->fetch_assoc()) {
        $criteriosCalificaciones[] = $ro;
        if (isset($ro['Calificacion'])) {
            $totalCalificaciones += $ro['Calificacion'];
            $countCalificaciones++;
        }
    }
}

// Calcular el promedio de las calificaciones
$promedioCalificaciones = $countCalificaciones > 0 ? $totalCalificaciones / $countCalificaciones : "N/A";

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <style>
        .user-table {
            width: 100%;
            border-collapse: collapse;
        }
        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .user-table th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .user-table td {
            text-align: center;
        }
    </style>
</head>
<body>

<table class="user-table">
    <thead>
        <tr>
            <th></th>
            <?php
            // Desplegar los resultados en las celdas
            for ($i = 0; $i < 4; $i++) {
                if (isset($criteriosCalificaciones[$i])) {
                    echo "<th>" . $criteriosCalificaciones[$i]['NomCriterio'] . "</th>";
                } else {
                    echo "<th>N/A</th>"; // Si hay menos de 4 criterios, llenar con "N/A"
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><h3>Calificación</h3></td>
            <?php
            for ($i = 0; $i < 4; $i++) {
                if (isset($criteriosCalificaciones[$i])) {
                    $calificacion = isset($criteriosCalificaciones[$i]['Calificacion']) ? $criteriosCalificaciones[$i]['Calificacion'] : "N/A";
                    echo "<td>" . $calificacion . "</td>";
                } else {
                    echo "<td>N/A</td>"; // Si hay menos de 4 calificaciones, llenar con "N/A"
                }
            }
            ?>
        </tr>
        <tr>
            <td colspan="4">Resultado final:</td>
            <td><?php echo $promedioCalificaciones; ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>
