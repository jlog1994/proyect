<?php

include("../class/conexion.php");
$rfc = $_GET['rfc'];
/*$con = "SELECT tipo, foto, nfoto FROM pizza WHERE id_pizza='$rfc' ";
$res = mysql_query($con, $conexion);
$tipo = mysql_result($res, 0, "tipo");
$contenido = mysql_result($res, 0, "foto");
$nombre = mysql_result($res, 0, "nfoto");
header("Content-type: $tipo");
header("Content-Disposition: ; filename=\"$nombre\"");
echo $contenido;*/

$consulta = "SELECT tipo, foto,nfoto FROM pizza WHERE id_pizza = $rfc";
//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
$resultado = @mysql_query($consulta) or die(mysql_error());

//si el resultado fue exitoso
//obtendremos el dato que ha devuelto la base de datos
$datos = mysql_fetch_assoc($resultado);

//ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
$imagen = $datos['foto'];
$tipo = $datos['tipo'];
$tipo = $datos['nfoto'];

//ahora colocamos la cabeceras correcta segun el tipo de imagen
header("Content-type: $tipo");

echo $imagen;
?>


