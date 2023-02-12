<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*REALIZAR LA CONEXIÓN CON LA BASE DE DATOS*/
        $server="localhost";
        $usuario="adminmoda";
        $contraseña="adminmoda";
        $bd="moda";
        $puerto = 3307;
        mysqli_report(MYSQLI_REPORT_OFF); //Deshabilitamos el reportado
        error_reporting(0); // Desactivar toda notificación de error
        $conexion = new mysqli($server, $usuario, $contraseña,$bd,$puerto);
        if ($conexion->connect_error){
            echo "No se ha podido realizar la conexión con la base de datos";
        }
    //  else{ejercicio13/inicio.php
    //      echo "La conexión se ha establecido correctamente";
    //  }
        /* CONEXIÓN REALIZADA*/
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            if(strlen($telefono)!=9){
                echo "Introduce un número de teléfono válido <br>" ;
                echo "<a href='registro.html'>Volver al registro</a>";
            }
            else{
                $registrarse = "INSERT INTO usuarios VALUES ('$dni','$nombre','$apellidos','$email','$telefono','$user','$pass','no')";
            // $registrado = $conexion->query($registrarse, MYSQLI_STORE_RESULT);
        
                if($conexion->query($registrarse)===TRUE){
                    echo "Te has registrado correctamente";
                    echo "Inicia sesión con tu nuevo usuario en <a href='login.html'>este enlace</a>";
                }
                else{
                    echo "Error: No te has registrado correctamente, puede que ya tengas una cuenta con esas credenciales";
                }
            }
    ?>
</body>
</html>