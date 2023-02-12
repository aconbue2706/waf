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
        if(strlen($telefono)!=9){
            echo "Introduce un número de teléfono válido <br>" ;
            echo "<a href='admin.php'>Volver al panel</a>";
        }
    } else {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $insert = "INSERT INTO USUARIOS (DNI,NOMBRE,APELLIDOS,EMAIL,TELEFONO,NOMBRE_USUARIO,CONTRASEÑA,BORRADO,TIPO_USUARIO)
        VALUES ('$dni','$nombre','$apellidos','$email','$telefono','$user','$pass','no','Cliente')";


        $result =$conexion->query($insert);
 
        header("Location: admin.php");
        die();
    }
    ?>
</body>
</html>