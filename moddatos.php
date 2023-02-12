<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align:center;">Cambia tus datos en este formulario</h1> <br>
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
    $dni = isset($_REQUEST['dni']) ? $_REQUEST['dni'] : null;// CON ESTO COGEMOS EL ID DEL PRODUCTO, QUE ESTÁ EN LA URL
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
    $apellidos = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : null;
    $user = isset($_REQUEST['user']) ? $_REQUEST['user'] : null;
    $contraseña = isset($_REQUEST['contrasenia']) ? $_REQUEST['contrasenia'] : null;

   echo" <form action='nuevosdatos.php' method='POST' style='text-align: center;'>
            <label for='dni'>DNI</label> <br>
            <input type='text' name='dni' value='$dni' readonly><br>

            <label for='nombre'>Nombre</label><br>
            <input type='text' name='nombre' value='$nombre'> <br>

            <label for='apellidos'>Apellidos</label> <br>
            <input type='text' name='apellidos' value='$apellidos'> <br>

            <label for='email'>Email</label> <br>
            <input type='text' name='email' value='$email'> <br>

            <label for='telefono'>Teléfono</label> <br>
            <input type='text' name='telefono' value='$telefono'> <br>

            <label for='user'>Nombre de usuario</label> <br>
            <input type='text' name='user' value='$user'> <br>

            <label for='pass'>Contraseña</label> <br>
            <input type='password' name='pass' value='$contraseña'> <br> <br>

            <input type='submit' value='Cambiar datos'>
        </form>"

    ?>
</body>
</html>