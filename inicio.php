<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicio.css">
    <title>Tienda de Ropa</title>
<style>
    .imagen-centrada {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

.contenedor-bienvenida {
    text-align: center;
    padding: 20px;
}

.contenedor-boton-modificar {
    text-align: center;
    padding: 20px;
}

.texto-centrado {
    text-align: center;
}

.titulo-productos {
    font-size: 24px;
    font-weight: bold;
}
.titulo {
    font-size: 48px;
    color:coral;
    text-align: center;
    font-family: 'Playfair Display', serif;
    text-shadow: 2px 2px #333;
  }

</style>


</head>
<body>
<h1 class="titulo" >Adri Zara</h1>
<img src="ropa.png" class="imagen-centrada"> <br>
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
        $usuariologin = $_POST['usuario'];
        $contraseñalogin=$_POST['contraseña'];

        /*Comprobamos si el usuario es el fueño y si lo es lo enviamos a dueño.php*/
        $compruebaadmin = "SELECT nombre_usuario, contraseña 
                            FROM usuarios 
                            WHERE nombre_usuario='$usuariologin' and contraseña='$contraseñalogin' and tipo_usuario='Administrador'";
        $resultadoadmin=$conexion->query($compruebaadmin);
        if ($resultadoadmin->num_rows>0){
            header("Location: admin.php"); // ESTAS DOS LÍNEAS REDIRIGEN AL USUARIO AL FORMULARIO DE REGISTRO SI NO ESTÁ EN LA BASE DE DATOS YA
            die();
        }
         //---------------------------------------------------------------------------------------//  
        /*Comprobamos si el usuario es el fueño y si lo es lo enviaoms a dueño.php*/

        $compruebadueño = "SELECT nombre_usuario, contraseña 
                         FROM usuarios 
                         WHERE nombre_usuario='$usuariologin' and contraseña='$contraseñalogin' and tipo_usuario='Dueño'";
        $resultadodueño=$conexion->query($compruebadueño);
        if ($resultadodueño->num_rows>0){
            header("Location: dueño.php"); // ESTAS DOS LÍNEAS REDIRIGEN AL USUARIO DUEÑO A SU PÁGINA
            die();
        }  
        //---------------------------------------------------------------------------------------//     


        $compruebausuario = "SELECT nombre_usuario, contraseña
                             FROM usuarios
                            where nombre_usuario='$usuariologin' and contraseña='$contraseñalogin'";                  
        $result=$conexion->query($compruebausuario);
        if($result->num_rows>0){
            echo "<p class='contenedor-bienvenida'>Bienvenido usuario $usuariologin</p> <br>";
        }
        else{
            header("Location: registro.html"); // ESTAS DOS LÍNEAS REDIRIGEN AL USUARIO AL FORMULARIO DE REGISTRO SI NO ESTÁ EN LA BASE DE DATOS YA
            die();
        }

        $consultauser="SELECT DNI, NOMBRE, APELLIDOS,EMAIL,TELEFONO,NOMBRE_USUARIO,CONTRASEÑA FROM USUARIOS WHERE NOMBRE_USUARIO='$usuariologin'";
        $resultadoconsultauser=$conexion->query($consultauser); 
        $filauser=$resultadoconsultauser->fetch_assoc();
        $dni=$filauser['DNI'];
        session_start();
        $_SESSION['DNI']=$dni;
        echo "<div class='contenedor-boton-modificar'><form action='moddatos.php?dni={$filauser['DNI']}&nombre={$filauser['NOMBRE']}&apellidos={$filauser['APELLIDOS']}&email={$filauser['EMAIL']}&telefono={$filauser['TELEFONO']}&user={$filauser['NOMBRE_USUARIO']}&contrasenia={$filauser['CONTRASEÑA']}' method='post'><button href='moddatos.php'>Modificar mis datos</button></form></div>";

        echo "<p style='text-align: center;'>ELIGE QUÉ QUIERES COMPRAR</p>";
        /* AHORA VAMOS A MOSTRAR LOS PRODUCTOS QUE SE PUEDEN COMPRAR EN NUESTRA TIENDA */
        $consultaproductos = "SELECT id,nombre,precio from productos";
        $resultadoconsultaproductos=$conexion->query($consultaproductos);
        $filaprod=$resultadoconsultaproductos->fetch_assoc();

        echo "<form action='factura.php' method='get' style='text-align: center;'>";

        while($filaprod=$resultadoconsultaproductos->fetch_assoc()){
            echo "<input type='checkbox' name='articulo[{$filaprod['nombre']}]' value='{$filaprod['precio']}'/>";
            echo "<label>ID:{$filaprod['id']}&nbsp&nbsp</label>
                  <label>{$filaprod['nombre']}&nbsp</label>
                  <label>{$filaprod[ 'precio']}€</label> <br>";


        }
        echo "<br><input type='submit' value='comprar'>";
        echo "</form>";
        $conexion->close(); //cierre de la conexión

    ?>
            
</body>
</html>
