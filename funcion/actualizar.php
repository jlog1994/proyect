<?php

##require('seguridad.php');
$fn = $_REQUEST['fn'];
switch ($fn) {
#DATOS PARA INSERCION#########Direccion
    case '1': {#DATOS PARA ACTUALIZAR#########Cliente
            $id = $_REQUEST['id_cliente'];

            $nombrea = $_REQUEST['nombre'];
            $apellidoa = $_REQUEST['apellido'];
            $correoa = $_REQUEST['correo'];
            $telefonoa = $_REQUEST['telefono'];
            $usuarioa = $_REQUEST['usuario'];
            // $passa = $_REQUEST['contrasena'];
            //$passworda = md5($passa);
            /* $v = "insert into administrador (nombre,apellidos,correo,telefono,usuario,contrasena)
              values('$nombrea','$apellidoa','$correoa','$telefonoa','$usuarioa','$passworda')"; */

            include('../class/conexion.php');
            /* $variable1="update administrador set "; 
              $campos = "nombre='$nombrea',apellido='$apellidoa',telefono=$telefonoa,correo='$correoa',usuario='$usuarioa'";
              $criterio = " where id_administrador='$id'";
              $rs = mysql_query($variable1 . $campos . $criterio, $conexion); */
            $v = "update cliente set nombre='$nombrea',apellidos='$apellidoa',telefono=$telefonoa,correo='$correoa',usuario='$usuarioa' where id_cliente=$id";
            //$v="update administrador set nombre='$nombrea',apellidos='$apellidoa' where id_administrador=$id";
            //echo "$v";
            $rs = mysql_query($v);
            //echo "$rs";
            if (!$rs) {
                echo '<h3>No se pudo realizar la operacion!</h3>';
            } else {
                //header("Location:../admin/index2.php");
                //header("location:../admin/index2.php");				
                // echo "<!DOCTYPE html>";
                //echo "<head>";
                //echo "<title>Form submitted</title>";
                echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                //echo "</head>";
                //echo "<body></body></html>";
                exit();
            }
            mysql_close($conexion);
        } break;
    case '2': {#DATOS PARA ACTUALIZAR#########Administrador
            $id = $_REQUEST['id_administrador'];

            $nombrea = $_REQUEST['nombre'];
            $apellidoa = $_REQUEST['apellido'];
            $correoa = $_REQUEST['correo'];
            $telefonoa = $_REQUEST['telefono'];
            $usuarioa = $_REQUEST['usuario'];
            // $passa = $_REQUEST['contrasena'];
            //$passworda = md5($passa);
            /* $v = "insert into administrador (nombre,apellidos,correo,telefono,usuario,contrasena)
              values('$nombrea','$apellidoa','$correoa','$telefonoa','$usuarioa','$passworda')"; */

            include('../class/conexion.php');
            /* $variable1="update administrador set "; 
              $campos = "nombre='$nombrea',apellido='$apellidoa',telefono=$telefonoa,correo='$correoa',usuario='$usuarioa'";
              $criterio = " where id_administrador='$id'";
              $rs = mysql_query($variable1 . $campos . $criterio, $conexion); */
            $v = "update administrador set nombre='$nombrea',apellidos='$apellidoa',telefono=$telefonoa,correo='$correoa',usuario='$usuarioa' where id_administrador=$id";
            //$v="update administrador set nombre='$nombrea',apellidos='$apellidoa' where id_administrador=$id";
            //echo "$v";
            $rs = mysql_query($v);
            //echo "$rs";
            if (!$rs) {
                echo '<h3>No se pudo realizar la operacion!</h3>';
            } else {
                //header("Location:../admin/index2.php");
                //header("location:../admin/index2.php");				
                // echo "<!DOCTYPE html>";
                //echo "<head>";
                //echo "<title>Form submitted</title>";
                echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                //echo "</head>";
                //echo "<body></body></html>";
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
    case '4': {#DATOS PARA ACTUALIZAR#########pizza
            $id_pizza = $_REQUEST['id_pizza'];
            $nombrep = $_REQUEST['nombre'];
            $ring = $_REQUEST['ring'];
            $ingre = $_REQUEST['ingrediente'];
            ob_start();
            $tipo = $_FILES["file"]["type"];
            $contenido = $_FILES["file"]["tmp_name"];
            $tamanio = $_FILES["file"]["size"];
            $nfoto = basename($_FILES["file"]["name"]);
            
             if (!strpos($tipo, "gif") and ! strpos($tipo, "jpg") and ! strpos($tipo, "jpeg") and ! strpos($tipo, "png")) {
              $error = "El Formato $tipo es Incompatible..........";
              session_start();
              $_SESSION['nombre'] = $nombrep;
              $_SESSION['ref_ingrediente'] = $ring;
              $_SESSION['error'] = $error;
              //header("location:index2.php?ncapa=$ncapa");exit();
              }
              if ($tamanio > 500000000) {//500kb
              $error = "El Tamaño del Archivo es muy Grande: $tamanio ..........";
              session_start();
              $_SESSION['nombre'] = $nombrep;
              $_SESSION['ref_ingrediente'] = $ring;
              $_SESSION['error'] = $error;
              //header("location:index2.php?ncapa=$ncapa");exit();
              } 
            if ($contenido == "") {
                //$error = "Seleccione un archivo valido..........";
                //header("location:index2.php?ncapa=$ncapa&error=$error");
                //exit();
                include('../class/conexion.php');
                $v = "update pizza set nombre='$nombrep' where id_pizza=$id_pizza"; 
                $v2 = "update ingrediente set nom_ingrediente='$ingre' where id_ingrediente=$ring"; 
                $rs = mysql_query($v);
                $rs2 = mysql_query($v2);
                
                
                if (!$rs) {
                    echo $error = "Error al guardar " . mysql_error();
                    $_SESSION['nombre'] = $nombrep;
                    $_SESSION['ref_ingrediente'] = $ring;
                    $_SESSION['error'] = $error;
                    //header("location:index2.php?ncapa=$ncapa");exit();
                } else {
                    
                    header("location:../vistas/pizzas.php");exit();
                }
            } else {
                # Contenido del archivo
                $fp = fopen($contenido, "rb");
                $contenido = fread($fp, $tamanio);
                $contenido = addslashes($contenido);
                fclose($fp);
                include('../class/conexion.php');
                $v = "update pizza set nombre='$nombrep',nfoto='$nfoto',tipo='$tipo',foto='$contenido',tamanio=$tamanio where id_pizza=$id_pizza"; 
                $v2 = "update ingrediente set nom_ingrediente='$ingre' where id_ingrediente=$ring"; 
                $rs = mysql_query($v);
                $rs2 = mysql_query($v2);
                
                
                if (!$rs) {
                    echo $error = "Error al guardar " . mysql_error();
                    $_SESSION['nombre'] = $nombrep;
                    $_SESSION['ref_ingrediente'] = $ring;
                    $_SESSION['error'] = $error;
                    //header("location:index2.php?ncapa=$ncapa");exit();
                } else {
                    
                   header("location:../vistas/pizzas.php");exit();
                }
            }
            ob_end_flush();

            /*
              /* $v = "insert into  pizza (nombre,ref_ingrediente) values('$nombrep','$ring')";
              include('../class/conexion.php'); */
            /* $rs = mysql_query($v);
              if (!$rs) {
              echo "Ya Existe";
              }  else {
              //header("Location:../index/pizza.php");
              echo "<script type='text/javascript'>window.parent.location.reload()</script>";
              exit();
              } */
            mysql_close($conexion);
        }

        break;
    default:
        echo 'NO SE PUDO REALIZAR LA OPERACION';
}
?>
    
