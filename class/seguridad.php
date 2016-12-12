<?php
@session_start();
@$usuario = $_SESSION["name"];
@require('conexion.php');
@$consulta = "select * from administrador where  usuario='$usuario'";
@$rs = mysql_query($consulta);
@$rs = mysql_num_rows($rs);
if ($rs <= 0) {
    /* if($usuario!='admin'){ */
    @session_destroy();
    @header("Location:../index.php");
    @exit();
}
?>
