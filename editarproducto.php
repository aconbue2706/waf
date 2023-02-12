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
        $idprod = isset($_REQUEST['id']) ? $_REQUEST['id'] : null; // CON ESTO COGEMOS EL ID DEL PRODUCTO, QUE ESTÁ EN LA URL
        $nombreprod= isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
        $tipoprenda= isset($_REQUEST['tipoprenda']) ? $_REQUEST['tipoprenda'] : null;
        $precio= isset($_REQUEST['precio']) ? $_REQUEST['precio'] : null;
    }    
    echo "<form action='updateproddueño.php' method='post'>
    <label for='id'>ID:</label>
    <input type='text' id='id' name='id' value='$idprod' readonly><br><br>
    
    <label for='nombre'>Nombre:</label>
    <input type='text'  name='nombre' value='$nombreprod' ><br><br>
    
    <label for='tipo_prenda'>Tipo de prenda:</label>
    <input type='text' id='tipo_prenda' name='tipo_prenda' value='$tipoprenda'><br><br>
    
    <label for='precio'>Precio:</label>
    <input type='text' id='precio' name='precio' value='$precio'><br><br>
    
    <input type='submit' value='Enviar'>
</form>";
    ?>


</body>
</html>