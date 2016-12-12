<?php

##require('seguridad.php');
$fn = $_REQUEST['fn'];
switch ($fn) {
#DATOS PARA INSERCION#########Direccion
    case '1': {#DATOS PARA INSERCION#########Cliente
            $nombrec = $_REQUEST['nombre'];
            $apellidoc = $_REQUEST['apellidos'];
            $correoc = $_REQUEST['correo'];
            $telefonoc = $_REQUEST['telefono'];
            $usuarioc = $_REQUEST['usuario'];
            $passc = $_REQUEST['contrasena'];
            $passwordc = md5($passc);
            $v = "insert into cliente (nombre,apellidos,correo,telefono,usuario,contrasena)
                   values('$nombrec','$apellidoc','$correoc','$telefonoc','$usuarioc','$passwordc')";
            include('../class/conexion.php');
            $rs = mysql_query($v);
            if (!$rs) {
                echo '<h3>Los datos ya Existen!</h3>';
            } else {
                header("Location:../login/cliente.php");
                include_once('../correo/class.phpmailer.php');
                include_once('../correo/class.smtp.php');
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;

                $mail->Username = 'tecnoos2016@gmail.com';
                $mail->Password = 'mascota2016';
                $mail->AddAddress($correoc);
                $mail->Subject = "Registro exitoso!!!";
                $mail->Body = $nombrec;
                $mail->MsgHTML("<center><h1>Bienvenido ".$nombrec." ".$apellidoc."</h1></center> <br><h4> Usted puede acceder a nuestra pagina con: <br> Usuario: " . $usuarioc . "<br> Contrase&ntilde;a: " . $passc . "<br>Tipo de Usuario: Cliente "
                        . "<br>Inicie sesion en: scittlaxiaco.com.mx/katya/web </h4>");
                if ($mail->Send()) {
                    echo "Enviado Correctamente";
                } else {
                    echo "No fue enviado";
                }
                exit();
            }
            mysql_close($conexion);
        } break;
    case '2': {#DATOS PARA INSERCION#########Administrador
            $nombrea = $_REQUEST['nombre'];
            $apellidoa = $_REQUEST['apellidos'];
            $correoa = $_REQUEST['correo'];
            $telefonoa = $_REQUEST['telefono'];
            $usuarioa = $_REQUEST['usuario'];
            $passa = $_REQUEST['contrasena'];
            $passworda = md5($passa);
            $v = "insert into administrador (nombre,apellidos,correo,telefono,usuario,contrasena)
                   values('$nombrea','$apellidoa','$correoa','$telefonoa','$usuarioa','$passworda')";
            include('../class/conexion.php');
            $rs = mysql_query($v);
            if (!$rs) {
                echo '<h3>Los datos ya Existen!</h3>';
            } else {
                echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                include_once('../correo/class.phpmailer.php');
                include_once('../correo/class.smtp.php');
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;

                $mail->Username = 'tecnoos2016@gmail.com';
                $mail->Password = 'mascota2016';
                $mail->AddAddress($correoa);
                $mail->Subject = "Registro exitoso!!!";
                $mail->Body = $nombrea;
                $mail->MsgHTML("<center><h1>Bienvenido ".$nombrea." ".$apellidoa."</h1></center> <br><h4> Usted puede acceder a nuestra pagina con: <br> Usuario: " . $usuarioa . "<br> Contrase&ntilde;a: " . $passa . "<br>Tipo de Usuario: Administrador "
                        . "<br>Inicie sesion en: scittlaxiaco.com.mx/katya/web </h4>");
                if ($mail->Send()) {
                    echo "Enviado Correctamente";
                } else {
                    echo "No fue enviado";
                }
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
    case '4': {#DATOS PARA INSERCION#########pizza
            $nombrep = $_REQUEST['nombre'];
            $ring = $_REQUEST['ref_ingrediente'];
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
            if ($contenido == "none") {
                $error = "Seleccione un archivo valido..........";
                header("location:index2.php?ncapa=$ncapa&error=$error");
                exit();
            } else {
                # Contenido del archivo
                $fp = fopen($contenido, "rb");
                $contenido = fread($fp, $tamanio);
                $contenido = addslashes($contenido);
                fclose($fp);
                $variable1 = "insert into pizza";
                $campos = " (nombre,ref_ingrediente,nfoto,tipo,foto,tamanio)";
                $valores = " values('$nombrep','$ring','$nfoto','$tipo','$contenido',$tamanio)";
                include('../class/conexion.php');
                $rs = mysql_query($variable1 . $campos . $valores, $conexion);
                if (!$rs) {
                    echo $error = "Error al guardar " . mysql_error();
                    $_SESSION['nombre'] = $nombrep;
                    $_SESSION['ref_ingrediente'] = $ring;
                    $_SESSION['error'] = $error;
                    //header("location:index2.php?ncapa=$ncapa");exit();
                } else {
                    //header("location:index2.php?ncapa=$ncapa");exit();
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
    
