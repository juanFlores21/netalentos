<?php

/*
$conexion = mysqli_connect ('localhost','root','','talentos');
$conexion ->set_charset("utf8");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}   

*/
// Establecer la conexión a la base de datos (reemplaza los valores con los de tu servidor)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "talentos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

/*
// Obtener los datos del formulario
$usuario = $_POST["id_usuario"];
$contrasena = $_POST["contrasena"];

// Consulta SQL para buscar el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario'";
$result = $conn->query($sql);

// Verificar si se encontró un usuario con ese nombre de usuario
if ($result->num_rows > 0) {
    // Obtener la fila del resultado
    $row = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($contrasena, $row["contrasena"])) {
        echo "Inicio de sesión exitoso";
        // Redirigir al usuario a la página deseada
        // header("Location: pagina_deseada.php");
    } else {
        echo "Usuario o contraseña incorrectos";
    }
} else {
    echo "Usuario o contraseña incorrectos";
}

// Cerrar la conexión a la base de datos
$conn->close();

*/
?>



