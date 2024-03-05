<?php
        session_start();
        // Conexión a la base de datos
        include("../conexion_db.php");

        // Validación de datos
        $nombre = $_POST['usuario'];
        $contra = $_POST['contrasena'];


        $error = "";

        if (empty($nombre) || empty($contra)) {
        $error = "El usuario y la contraseña son obligatorios.";
        }

        $_SESSION['usuario']=$nombre;

        // Consulta a la base de datos
        $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND passwd = '$contra'";
        $resultado = mysqli_query($conn, $sql);

        $filas=mysqli_num_rows($resultado);

        if($filas){
            header("Location:../menuAdmin.php");
            }else{
                include("../sesionAdmin.php");
    ?>
    <h1>Verifique sus datos.</h1>
    <?php
    mysqli_free_result($resultado);
    mysqli_close($conn);
    
}
?>

   