<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <style>
      /* Definimos estilos para el formulario */
      form {
        margin: 50px auto;
        width: 500px;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f2f2f2;
      }

      /* Definimos estilos para los elementos del formulario */
      label {
        font-size: 16px;
        font-weight: bold;
      }

      input[type="text"], input[type="number"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
      }

      input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
      }

      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
    </style>
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
        $nombreuser = isset($_REQUEST['nombreuser']) ? $_REQUEST['nombreuser'] : null;// CON ESTO COGEMOS EL ID DEL PRODUCTO, QUE ESTÁ EN LA URL
    }    
        $SQL= "UPDATE USUARIOS SET BORRADO='SI' WHERE NOMBRE_USUARIO='$nombreuser'";
        $result = mysqli_query($conexion,$SQL);
        header("Location: admin.php");


    ?>
    
</body>
</html>