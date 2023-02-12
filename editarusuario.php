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
        $dni = isset($_REQUEST['dni']) ? $_REQUEST['dni'] : null;// CON ESTO COGEMOS EL DNI DEL USUARIO, QUE ESTÁ EN LA URL
        $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null; 
        $apellidos = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null;
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
        $telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : null;
        $nombreusuario = isset($_REQUEST['nombre_usuario']) ? $_REQUEST['nombre_usuario'] : null;
        $contraseña = isset($_REQUEST['contrasenia']) ? $_REQUEST['contrasenia'] : null;
        $borrado = isset($_REQUEST['borrado']) ? $_REQUEST['borrado'] : null;
        $tipousuario = isset($_REQUEST['tipo_usuario']) ? $_REQUEST['tipo_usuario'] : null;
    }    
    echo "<form action='updateuser.php' method='post'>
    <label for='id'>DNI</label>
    <input type='text' id='id' name='dni' value='$dni' readonly><br><br>
    
    <label for='nombre'>Nombre:</label>
    <input type='text' id='nombre' name='nombre' value='$nombre'><br><br>
    
    <label for='apellidos'>Apellidos</label>
    <input type='text' name='apellidos' value='$apellidos'><br><br>
    
    <label for='email'>Email</label>
    <input type='text'  name='email' value='$email'><br><br>

    <label for='telefono'>Teléfono</label>
    <input type='text'  name='telefono' value='$telefono'><br><br>
    
    <label for='nombre_usuario'>Nombre de usuario</label>
    <input type='text'  name='nombre_usuario' value='$nombreusuario'><br><br>

    <label for='contraseña'>Contraseña</label>
    <input type='text'  name='contraseña'  value='$contraseña' readonly><br><br>

    <label for='borrado'>Borrado</label>
    <input type='text'  name='borrado'  value='$borrado'><br><br>

    <label for='tipo_usuario'>Tipo de usuario</label>
    <input type='text'  name='tipo_usuario' value='$tipousuario' ><br><br>
    <input type='submit' value='Enviar'>
</form>";
    ?>
    
</body>
</html>