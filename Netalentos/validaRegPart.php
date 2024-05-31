<?php
// Mandar a llamar la base de datos
include("conexion_db.php");

//variable de error
$error = "";

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apPaterno = $_POST['apPa'];
    $apMaterno = $_POST['apMa'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $nombreNacionalidad = $_POST['nacionalidad'];
    $fechaNacimiento = $_POST['birthdate'];
    $nombreGenero = $_POST['genero'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['direccion'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $codigoPostal = $_POST['cp'];
    $pwd = $_POST['pwd'];

        // Validar el correo electrónico utilizando filter_var()
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            // Si el correo no es válido, mostrar un mensaje de error y detener el proceso
            include("registroJuez.php");
            ?>
                    <div id="error-message" style="background-color: #ffcccc; color: #cc0000; padding: 20px; border: 2px solid #cc0000; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <p style="font-size: 18px; margin: 0;"><?php echo $error; ?></p>
                        <p style="font-size: 16px; margin: 0;">Favor de poner un correo electronico valido (tiene que tener terminacion ".com")</p>
                    </div>
                    <script>
                        // Desaparecer el mensaje de error después de 5 segundos
                        setTimeout(function() {
                            var errorMessage = document.getElementById('error-message');
                            errorMessage.style.display = 'none';
                        }, 5000); // 5000 milisegundos = 5 segundos
                    </script>
                    <?php
        } else if (empty(trim($nombre)) || empty(trim($apPaterno)) || empty(trim($apMaterno)) || empty(trim($correo)) || empty(trim($edad)) || empty(trim($nombreNacionalidad)) || empty(trim($fechaNacimiento)) || empty(trim($nombreGenero)) || empty(trim($calle)) || empty(trim($numero)) || empty(trim($colonia)) || empty(trim($estado)) || empty(trim($ciudad)) || empty(trim($codigoPostal)) || empty(trim($pwd))) {
            // Si el usuario llena los datos en blanco
            include("registroJuez.php");
    ?>
            <div id="error-message" style="background-color: #ffcccc; color: #cc0000; padding: 20px; border: 2px solid #cc0000; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <p style="font-size: 18px; margin: 0;"><?php echo $error; ?></p>
                <p style="font-size: 16px; margin: 0;">Favor de llenar correctamente el formulario</p>
            </div>
            <script>
                // Desaparecer el mensaje de error después de 5 segundos
                setTimeout(function() {
                    var errorMessage = document.getElementById('error-message');
                    errorMessage.style.display = 'none';
                }, 5000); // 5000 milisegundos = 5 segundos
            </script>
            <?php
        } else {
            // Aquí iría el resto del código para procesar los datos y realizar la inserción en la base de datos

    // Consultar si el correo ya está registrado en la tabla Participante
    $sqlCorreo = "SELECT COUNT(*) as total FROM Participante WHERE Email = '$correo'";
    $resultCorreo = $conn->query($sqlCorreo);
    $rowCorreo = $resultCorreo->fetch_assoc();
    $correoExistente = $rowCorreo['total'];

    if ($correoExistente > 0) {
        // Si el correo ya está registrado, mostrar mensaje de error
        include("registroPart.php");
        ?>
    <div id="error-message" style="background-color: #ffcccc; color: #cc0000; padding: 20px; border: 2px solid #cc0000; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <p style="font-size: 18px; margin: 0;"><?php echo $error; ?></p>
        <p style="font-size: 16px; margin: 0;">El correo ingresado ya existe, favor de poner uno valido</p>
    </div>
    <script>
        // Desaparecer el mensaje de error después de 5 segundos
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'none';
        }, 5000); // 5000 milisegundos = 5 segundos
    </script>
    <?php
    } else {
        // Consultar el ID de la nacionalidad en la tabla Nacionalidad
        $sqlNacionalidad = "SELECT idNacionalidad FROM Nacionalidad WHERE nombre = '$nombreNacionalidad'";
        $resultNacionalidad = $conn->query($sqlNacionalidad);

        // Consultar el ID del género en la tabla Genero
        $sqlGenero = "SELECT idGenero FROM Genero WHERE tipo = '$nombreGenero'";
        $resultGenero = $conn->query($sqlGenero);

        if ($resultNacionalidad->num_rows > 0 && $resultGenero->num_rows > 0) {
            // Si se encontró el ID de la nacionalidad y el género, obtener los valores
            $rowNacionalidad = $resultNacionalidad->fetch_assoc();
            $idNacionalidad = $rowNacionalidad['idNacionalidad'];

            $rowGenero = $resultGenero->fetch_assoc();
            $idGenero = $rowGenero['idGenero'];

            // Insertar los datos en la tabla Participante
            $sql = "INSERT INTO Participante (idGenero, idNacionalidad, idCiudad, Nombre, Paterno, Materno, Edad, FechaNac, Email, Calle, Num, Colonia, CodigoPostal, pwd) 
                    VALUES ('$idGenero', '$idNacionalidad', '$ciudad', '$nombre', '$apPaterno', '$apMaterno', '$edad', '$fechaNacimiento', '$correo', '$calle', '$numero', '$colonia', '$codigoPostal' , '$pwd')";

            if ($conn->query($sql) === TRUE) {
                // Redirigir al usuario si los datos se insertaron correctamente
                include("iniciarSesion.php");
                        ?>
                    <div id="error-message" style="background-color: #00FF00; color: #000000; padding: 20px; border: 2px solid #00FF00; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <p style="font-size: 18px; margin: 0;"><?php echo $error; ?></p>
                        <p style="font-size: 16px; margin: 0;">Usuario registrado correctamente</p>
                    </div>
                    <script>
                        // Desaparecer el mensaje de error después de 5 segundos
                        setTimeout(function() {
                            var errorMessage = document.getElementById('error-message');
                            errorMessage.style.display = 'none';
                        }, 5000); // 5000 milisegundos = 5 segundos
                    </script>
                    <?php
                    exit();
                } else {
                    // Error al insertar los datos en la base de datos
                    $error = "Error al insertar los datos en la base de datos: ";
                }
            } else {
                // Error: No se encontró la nacionalidad o el género en la base de datos
                $error = "Error: No se encontró la nacionalidad o el género en la base de datos.";
            } 
        }
    }
}
/*

    // Mostrar mensaje de error
    include("iniciarSesion.php");
    ?>
    <div id="error-message" style="background-color: #00FF00; color: #000000; padding: 20px; border: 2px solid #00FF00; border-radius: 10px; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <p style="font-size: 18px; margin: 0;"><?php echo $error; ?></p>

        <p style="font-size: 16px; margin: 0;">Usuario registrado correctamente</p>
    </div>

    <script>
        // Desaparecer el mensaje de error después de 5 segundos
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'none';
        }, 5000); // 5000 milisegundos = 5 segundos
    </script>

    <?php

    $conn->close();

    ?>  
    */
    ?>