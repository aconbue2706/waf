<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eliminar productos</title>
</head>
<body>
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
    } else {
        $nombreprod=isset($_REQUEST['nombreprod']) ? $_REQUEST['nombreprod'] : null; 

        $delete = "DELETE FROM PRODUCTOS WHERE NOMBRE='$nombreprod'";

        $result =$conexion->query($delete);
 
        header("Location: dueño.php");
        die();
    }
    ?>    

</body>
</html>