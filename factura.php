<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-top: 30px;
}

li {
    margin: 10px 0;
}

p {
    text-align: center;
    margin-top: 30px;
    font-size: large;
}

table {
    width: 80%;
    text-align: center;
    margin-top: 30px;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #dddddd;
    padding: 8px;
}

th {
    background-color: #dddddd;
}
    </style>
</head>
<body>
    <h2 style="text-align: center;">Factura de compra</h2>
    <?php
/*REALIZAR LA CONEXIÓN CON LA BASE DE DATOS*/
$server = "localhost";
$usuario = "adminmoda";
$contraseña = "adminmoda";
$bd = "moda";
$puerto = 3307;
mysqli_report(MYSQLI_REPORT_OFF); //Deshabilitamos el reportado
error_reporting(0); // Desactivar toda notificación de error
$conexion = new mysqli($server, $usuario, $contraseña, $bd, $puerto);
if ($conexion->connect_error) {
    echo "No se ha podido realizar la conexión con la base de datos";
}
/* CONEXIÓN REALIZADA */

session_start(); //RECOGEMOS EL DNI DEL USUARIO
$dniusuario = $_SESSION["DNI"];

if (isset($_REQUEST['articulo'])) {
    $articulo = $_REQUEST['articulo'];

    if (is_array($articulo)) {
        echo "<ul style='text-align: center; list-style: none;' >";
        $suma = 0;
        foreach ($articulo as $nombre => $valor) {
            print("<li >$nombre, precio: $valor &euro; </li>");

            $suma += $valor;
        }
        foreach ($articulo as $nombre=> $valor) {
            //OBTENCIÓN DEL ID DEL PRODUCTO SEGÚN EL NOMBRE Y EL VALOR DE LOS DATOS DE LA TIENDA
            $consultaid = "SELECT id FROM productos WHERE nombre = '$nombre' and precio = $valor"; //SACAMOS EL ID DEL PRODUCTO CUYO NOMBRE Y PRECIO SEAN LOS DEL ARRAY
            $resultcompra = $conexion->query($consultaid);
            $row_compra = $resultcompra->fetch_assoc();
            $idproducto = $row_compra['id']; 
         
            $insertquery = "INSERT INTO compra VALUES('$idproducto','$dniusuario', sysdate())";
            $insertar=$conexion->query($insertquery); //INSERTAR EN LA TABLA COMPRA EL id del producto,dni usuario Y FECHA

         }
        echo "</ul>";

        echo "<p style='text-align: center;'> <strong>Total: $suma &euro;</strong></p> <br> <br>";
        /* AHORA MOSTRAMOS LAS COMPRAS QUE HA REALIZADO EL USUARIO ADEMÁS DE SUS COMPRAS ANTERIORES*/
        echo "<p style='text-align:center;'>Compras realizadas por ti anteriormente:</p> <br>";

        $vercompras="SELECT ID_PRODUCTO,DNI_USUARIO,FECHA_COMPRA FROM compra where dni_usuario='$dniusuario'";
        $resultvercompra = $conexion->query($vercompras);
        $fila=$resultvercompra->fetch_assoc();
         echo "<table> <tr> <th>ID</th> <th>DNI USUARIO</th> <th>FECHA</th> </tr>";
        while($fila=$resultvercompra ->fetch_assoc()){
            echo "<tr>
            <td>{$fila['ID_PRODUCTO']}&nbsp</td>
            <td>{$fila['DNI_USUARIO']}&nbsp</td>
            <td>{$fila['FECHA_COMPRA']}&nbsp</td>
            </tr>";

        }
        echo "</table>";
    

    }

     
    
    else {
        echo "<p>Los datos no se han enviado correctamente</p>";
    }
} 
else {
    echo "<p>No se han comprado artículos</p>";
}

?>
</body>
</html>