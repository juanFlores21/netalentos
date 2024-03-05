<?php

include("conexion_db.php");

/*

if(isset($_POST["btningresar"])){
    $usuario = trim($_POST["id_usuario"]);
    $contrasena = trim($_POST["contrasena"]);
    
    if (empty($usuario) || empty($contrasena)) {
        echo "LOS CAMPOS ESTÁN VACÍOS"; 
    } else {
        $usuario=$_POST["id_usuario"];        
        $contrasena=$_POST["contrasena"]; 
    }
}

*/

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

// Consulta SQL para buscar el usuario en la base de datos
$query = "SELECT * FROM usuarios WHERE nombre = '$usuario'";
$result = mysqli_query($conn,$query);

// Verificar si se encontró un usuario con ese nombre de usuario
if ($result->num_rows > 0) {
    // Obtener la fila del resultado
    $row = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($contrasena, $row["passwd"])) {
        echo "Inicio de sesión exitoso";
        // Redirigir al usuario a la página deseada
        // header("Location: pagina_deseada.php");
    } else {
        echo "Usuario o contraseña incorrectoso";
    }
} else {
    echo "Usuario o contraseña incorrectos";
}

$conn->close();


?>
