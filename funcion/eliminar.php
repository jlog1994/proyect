<?php

##require('seguridad.php');
$fn = $_REQUEST['fn'];
//$fn='1';
switch ($fn) {
#DATOS PARA INSERCION#########Direccion
    case '1': {#DATOS PARA eliminar#########Administrador 
            $nombrec = $_REQUEST['idadmin'];
            $v = "delete from administrador  where id_administrador='$nombrec'";
            include('../class/conexion.php');
            $rs = mysql_query($v);
            if (!$rs) {
                echo '<h3>Los datos ya Existen!</h3>';
            } else {
                // header("Location:../index/cliente.php");
                exit();
            }
            mysql_close($conexion);
        } break;
    case '2': {#DATOS Para eliminar cliente############
            $nombrec = $_REQUEST['idadmin'];
            $v = "delete from cliente  where id_cliente='$nombrec'";
            include('../class/conexion.php');
            $rs = mysql_query($v);
            if (!$rs) {
                echo '<h3>Los datos ya Existen!</h3>';
            } else {
                // header("Location:../index/cliente.php");
                exit();
            }
            mysql_close($conexion);
        } break;
    case '3': {#DATOS PARA INSERCION#########ingrediente
            $ningr = $_REQUEST['nom_ingrediente'];
            $v = "insert into ingrediente (nom_ingrediente) values('$ningr')";
            include('../class/conexion.php');
            $rs = mysql_query($v);
            if (!$rs) {
                echo "El ingrediente ya existe!!";
            } else {
                //header("Location:../index/ingrediente.php");
                echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                exit();
            }
            mysql_close($conexion);
        } break;
    case '4': {#DATOS PARA ELIMINAR#########pizza
            $nombrec = $_REQUEST['idadmin'];
            $v = "delete from pizza  where id_pizza='$nombrec'";
            include('../class/conexion.php');
            $rs = mysql_query($v);
            if (!$rs) {
                echo '<h3>Los datos no Existen!</h3>';
            } else {
                  echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                exit();
            }

            mysql_close($conexion);
        }

        break;
    default:
        echo 'NO SE PUDO REALIZAR LA OPERACION';
}
?>
    
