<?php

$conexion = mysql_connect("mysql.hostinger.mx", "u243481060_root", "qwerty")
        or die("Error de conexion" . mysql_error());

if (!$conexion) {
    header("location:verificacion.php?error=Error en la Conexion de la DB");
    exit();
}
$db = mysql_select_db("u243481060_hola")
        or die("Error al seleccionar la base de datos" . mysql_error());
if (!$db) {
    header("location:verificacion.php?error=Error al Seleecionar la DB");
    exit();
}
?>
