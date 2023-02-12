<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar productos</title>
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
    }
    $nombreprod = $_POST['nombre'];
    $tipoprenda = $_POST['tipo_prenda']; 
    $precio = $_POST['precio'];

    $insertarproductos = "INSERT INTO PRODUCTOS (NOMBRE,TIPO_PRENDA,PRECIO) VALUES ('$nombreprod','$tipoprenda','$precio')";

    $result =$conexion->query($insertarproductos);

    header("Location: dueño.php");

    ?>    

</body>
</html>