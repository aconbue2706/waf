<?php
    /*REALIZAR LA CONEXIÓN CON LA BASE DE DATOS*/
    $server="localhost";
    $usuario="adminmoda";
    $contraseña="adminmoda";
    $bd="moda";
    $puerto = 3307;
    //mysqli_report(MYSQLI_REPORT_OFF); //Deshabilitamos el reportado
    //error_reporting(0); // Desactivar toda notificación de error
    $conexion = new mysqli($server, $usuario, $contraseña,$bd,$puerto);
    if ($conexion->connect_error){
        echo "No se ha podido realizar la conexión con la base de datos";
    }
      $dni = $_POST['dni'];
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $email = $_POST['email'];
      $telefono = $_POST['telefono'];
      $user = $_POST['user'];
      $pass = $_POST['pass'];
    if (strlen($dni) == 0 || strlen($nombre) == 0 || strlen($apellidos) == 0 || strlen($email) == 0 || strlen($telefono) == 0 || strlen($user) == 0 || strlen($pass) == 0) {
        echo "INTRODUCE DATOS VÁLIDOS <br>";
    echo "<a href='moddatos.php'>Volver</a>";
    }

      else{
        $cambiardatos = "UPDATE usuarios
                        SET nombre='$nombre',apellidos='$apellidos',email='$email',telefono='$telefono',nombre_usuario='$user',contraseña='$pass'
                        where dni='$dni'";

    // $registrado = $conexion->query($registrarse, MYSQLI_STORE_RESULT);

        if($conexion->query($cambiardatos)===TRUE){
            echo "Has cambiado tus datos correctamente <br>";
            echo "Inicia sesión con tu nuevo usuario en <a href='login.html'>este enlace</a>";
        }
        else{
            echo "Error: No te has registrado correctamente, puede que ya tengas una cuenta con esas credenciales";
        }
    }
    ?>