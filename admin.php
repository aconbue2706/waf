<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Página del administrador</title>
    <style>
.tabla {
  width: 50%;
  margin: 0 auto;
  border-collapse: collapse;
  border-radius: 1px;
  border: 2px double #ddd;
  text-align: center;
}

.tabla th, .tabla td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

.tabla th {
  background-color: #ddd;
}

.tabla tr:nth-child(even) {
  background-color: #f2f2f2;
}
.AÑADIR, .ELIMINAR, h2:nth-child(3), h2:nth-child(4) {
    width: 100%;
    text-align: center;
    margin: 0 0 20px 0;
}

.formañadir, .formeliminar {
    display: inline-block;
    width: 100%;
    margin: 0 auto 20px auto;
    text-align: center;
}

.button {
    background-color: green;
    color: white;
    padding: 7px 12px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
  }
  .caja1{
    text-align: center;
    float: left;
    width: 40%;
    padding: 10px;
    margin: 10px;

  }
  .caja2{
    text-align: center;
    float: left;
    width: 40%;
    padding: 10px;
    margin: 10px;

  }



</style>
</head>
<body>
    <h1 style='text-align: center;'>Hola administrador, desde aquí puedes gestionar los usuarios y los productos de la tienda</h1>
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
    ?>
    
     

<div class="caja1">
<h2 class="AÑADIR">Añadir Usuario</h2>
        <form class="formañadir" action="insert.php" method="post">
        <label for="dni">DNI</label> <br>
        <input type="text" name="dni"><br>

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre"> <br>

        <label for="apellidos">Apellidos</label> <br>
        <input type="text" name="apellidos"> <br>

        <label for="email">Email</label> <br>
        <input type="text" name="email"> <br>

        <label for="telefono">Teléfono</label> <br>
        <input type="text" name="telefono"> <br>

        <label for="user">Nombre de usuario</label> <br>
        <input type="text" name="user"> <br>

        <label for="pass">Contraseña</label> <br>
        <input type="password" name="pass"> <br> <br>
        <input type="submit" value="INSERTAR USUARIO">
        
        </form>
</div>

<div class="caja2">
<h2 class="AÑADIR">Insertar producto</h2>
        <form class="formañadir" action="insertproductoadmin.php" method="post">
        <label for="nombre">Nombre</label> <br>
        <input type="text" name="nombre"><br>

        <label for="tipo_prenda">Tipo de Prenda</label><br>
        <input type="text" name="tipo_prenda"> <br>

        <label for="precio">Precio</label> <br>
        <input type="text" name="precio"> <br>
        <input type="submit" value="INSERTAR PRODUCTO">
        
        </form>
</div>
<br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br> <br><br> 

<h1 style="text-align: center;">Usuarios de la Base de datos</h1>

<?php
$MOSTRARUSUARIOS = "SELECT DNI, NOMBRE, APELLIDOS, EMAIL, TELEFONO, NOMBRE_USUARIO,CONTRASEÑA,BORRADO,TIPO_USUARIO 
                    FROM USUARIOS";
$resultado=$conexion->query($MOSTRARUSUARIOS);
$fila=$resultado->fetch_assoc();
echo "<table class='tabla';>";

echo "<tr>
        <th>DNI</th>
        <th>NOMBRE</th>
        <th>APELLIDOS</th>
        <th>EMAIL</th>
        <th>TELEFONO</th>
        <th>NOMBRE DE USUARIO&nbsp</th>
        <th>CONTRASEÑA</th>
        <th>BORRADO</th>
        <th>TIPO DE USUARIO</th>
        <th>EDITAR</th>
        <th>BORRAR</th>


     </tr>";


while($fila=$resultado->fetch_assoc()){
    echo "<tr>
        <td>{$fila['DNI']}&nbsp</td>
        <td>{$fila['NOMBRE']}&nbsp</td>
        <td>{$fila['APELLIDOS']}&nbsp</td>
        <td>{$fila['EMAIL']}&nbsp</td>
        <td>{$fila['TELEFONO']}&nbsp</td>
        <td>{$fila['NOMBRE_USUARIO']}&nbsp</td>
        <td>{$fila['CONTRASEÑA']}&nbsp</td>
        <td>{$fila['BORRADO']}&nbsp</td>
        <td>{$fila['TIPO_USUARIO']}&nbsp</td>
        <td><a class='button' href='editarusuario.php?dni={$fila['DNI']}&nombre={$fila['NOMBRE']}&apellidos={$fila['APELLIDOS']}&email={$fila['EMAIL']}&telefono={$fila['TELEFONO']}&nombre_usuario={$fila['NOMBRE_USUARIO']}&contrasenia={$fila['CONTRASEÑA']}&borrado={$fila['BORRADO']}&tipo_usuario={$fila['TIPO_USUARIO']}'>EDITAR</td>
        <td><a class='button' href='borrarusuario.php?nombreuser={$fila['NOMBRE_USUARIO']}'>BORRAR</td> 
     </tr>";
     
}
echo "</table>";
?>
<h1 style="text-align: center;">Productos de la Base de datos</h1>

<?php
  $MOSTRARPRODUCTOS = "SELECT ID, NOMBRE, TIPO_PRENDA, PRECIO FROM PRODUCTOS";
  $resultadoconsultaproductos=$conexion->query($MOSTRARPRODUCTOS);
  $filaprod = $resultadoconsultaproductos->fetch_assoc();
  echo "<table class='tabla';>";

echo "<tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>TIPO DE PRENDA</th>
        <th>PRECIO</th>
        <th>EDITAR</th>
        <th>ELIMINAR</th>


     </tr>";
     while($filaprod=$resultadoconsultaproductos->fetch_assoc()){
      echo "<tr>
          <td>{$filaprod['ID']}&nbsp</td>
          <td>{$filaprod['NOMBRE']}&nbsp</td>
          <td>{$filaprod['TIPO_PRENDA']}&nbsp</td>
          <td>{$filaprod['PRECIO']}&nbsp €</td>
          <td><a class='button' href='editarproductoadmin.php?id={$filaprod['ID']}&nombre={$filaprod['NOMBRE']}&tipoprenda={$filaprod['TIPO_PRENDA']}&precio={$filaprod['PRECIO']}'>EDITAR</td>
          <td><a class='button' href='eliminarproductoadmin.php?id={$filaprod['ID']}'>ELIMINAR</td>

       </tr>";
       
  }

  echo "</table>";
  ?>
  <br><br>


</body>
</html>