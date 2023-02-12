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
    //mysqli_report(MYSQLI_REPORT_OFF); //Deshabilitamos el reportado
    //error_reporting(0); // Desactivar toda notificación de error
    $conexion = new mysqli($server, $usuario, $contraseña,$bd,$puerto);
    if ($conexion->connect_error){
        echo "No se ha podido realizar la conexión con la base de datos";
    }
    else{
        $idprod=$_POST['id'];
        $nombreprod=$_POST['nombre'];
        $tipoprenda=$_POST['tipo_prenda'];
        $precio=$_POST['precio'];

        $update="UPDATE PRODUCTOS SET ID='$idprod',nombre='$nombreprod',tipo_prenda='$tipoprenda',precio='$precio' WHERE ID='$idprod'";
        $run=mysqli_query($conexion,$update);
        header("Location: dueño.php");
        die();


    }
    ?>
</body>
</html>