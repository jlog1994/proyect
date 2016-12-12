<?php
        echo "entro datos ";
	$ncapa=$_REQUEST['ncapa'];
	//$af=$_REQUEST['af'];
	if(isset($_REQUEST['g']))$g=$_REQUEST['g'];
	if(isset($_REQUEST['b']))$b=$_REQUEST['b'];
	if(isset($_REQUEST['af']))$af=$_REQUEST['af'];
	include("../class/conexion.php"); 
	if(!$conexion)
	{
			echo "No se pudo conectar con la base de datos";
	}else{
		if ($ncapa==3){//CAPA 3 PARA GUARDAR DATOS
			echo "entro";
			$rfc=$_REQUEST['rfc']; 
			$nombre=$_REQUEST['nombre']; 
			$edad=$_REQUEST['edad'];
			$sexo=$_REQUEST['sexo'];
			$direccion=$_REQUEST['direccion'];
			$telefono=$_REQUEST['telefono'];
			$email=$_REQUEST['email'];
			ob_start();
			$tipo = $_FILES["file"]["type"];
            $contenido = $_FILES["file"]["tmp_name"];
            $tamanio= $_FILES["file"]["size"];
            $nfoto = basename($_FILES["file"]["name"]);
			if (!strpos($tipo,"gif") and !strpos($tipo,"jpg") and !strpos($tipo,"jpeg") and !strpos($tipo,"png")) { 
				$error="El Formato $tipo es Incompatible..........";
				session_start();
				$_SESSION['rfc']=$rfc;
				$_SESSION['nombre']=$nombre;
				$_SESSION['edad']=$edad;
				$_SESSION['sexo']=$sexo;
				$_SESSION['telefono']=$telefono;
				$_SESSION['direccion']=$direccion;
				$_SESSION['email']=$email;
				$_SESSION['error']=$error;
				header("location:busqueda.php");exit();
			}
			if($tamanio>500000000){//500kb
				$error="El Tama�o del Archivo es muy Grande: $tamanio ..........";
				session_start();
				$_SESSION['rfc']=$rfc;
				$_SESSION['nombre']=$nombre;
				$_SESSION['edad']=$edad;
				$_SESSION['sexo']=$sexo;
				$_SESSION['telefono']=$telefono;
				$_SESSION['direccion']=$direccion;
				$_SESSION['email']=$email;
				$_SESSION['error']=$error;
				header("location:busqueda.php");exit();
			}
			if ($contenido=="none"){
				$error="Seleccione un archivo valido..........";
				header("location:index2.php?ncapa=$ncapa&error=$error");exit();				
			}else{
 				# Contenido del archivo
		        $fp = fopen($contenido, "rb");
			   $contenido = fread($fp, $tamanio);
			   $contenido = addslashes($contenido);
			   fclose($fp); 
				$variable1="insert into clientes"; 
				$campos=" (rfc,nombre,edad,sexo,direccion,telefono,email,nfoto,tipo,foto,tamanio)";
				$valores=" values('$rfc','$nombre',$edad,'$sexo','$direccion','$telefono','$email','$nfoto','$tipo','$contenido',$tamanio)";
				$rs=mysql_query($variable1.$campos.$valores,$conexion);
				if(!$rs){
						echo $error="Error al guardar ".mysql_error();
						session_start();
						$_SESSION['rfc']=$rfc;
						$_SESSION['nombre']=$nombre;
						$_SESSION['edad']=$edad;
						$_SESSION['sexo']=$sexo;
						$_SESSION['telefono']=$telefono;
						$_SESSION['direccion']=$direccion;
						$_SESSION['email']=$email;
						$_SESSION['error']=$error;
						header("location:busqueda.php");exit();
				}else
				{
						header("location:formulario.php");exit();
				}
			}
			ob_end_flush();			
		}//FIN CAPA 3 PARA GUARDAR DATOS
		if ($ncapa==5 && $g==1){//CAPA 5 PARA ACTUALIZAR DATOS
			$rfc5=$_REQUEST['rfc5']; 
			$nombre5=$_REQUEST['nombre5']; 
			$edad5=$_REQUEST['edad5'];
			$sexo5=$_REQUEST['sexo5'];
			$direccion5=$_REQUEST['direccion5'];
			$telefono5=$_REQUEST['telefono5'];
			$email5=$_REQUEST['email5'];
			$variable1="update clientes set "; 
			$campos="nombre='$nombre5',edad=$edad5,sexo='$sexo5',direccion='$direccion5',telefono='$telefono5',email='$email5'";
			$criterio=" where rfc='$rfc5'";
			$rs=mysql_query($variable1.$campos.$criterio,$conexion);
			//echo $rs=mysql_affected_rows($rs); 
			if($rs==1)
			{
					$ncapa='4';
					header("location:busqueda.php");exit();
			}
			else
			{
					$ncapa='5';
					$error="Error al Guardar ".mysql_error();
					session_start();
					$_SESSION['rfc5']=$rfc5;
					$_SESSION['error']=$error;
					header("location:busqueda.php");exit();
			}
		}//FIN CAPA 5 PARA ACTUALIZAR DATOS
		if ($ncapa==5 && $af==1){//CAPA 5 PARA ACTUALIZAR FOTO
			echo $ncapa.''.$af;
			$rfc5=$_REQUEST['rfc5'];
			ob_start();
			$tipo = $_FILES["file2"]["type"];
            $contenido = $_FILES["file2"]["tmp_name"];
            $tamanio= $_FILES["file2"]["size"];
            $nfoto = basename($_FILES["file2"]["name"]);
			if (!strpos($tipo,"gif") & !strpos($tipo,"jpg") & !strpos($tipo,"jpeg") & !strpos($tipo,"png")) { 
				$error="El Formato ".$tipo." es Incompatible..........";
				session_start();
				$_SESSION['rfc5']=$rfc5;
				$_SESSION['error']=$error;
				header("location:busqueda.php");

				exit();
			}
			if($tamanio>500000){//500kb
				$error="El Tama�o del Archivo es muy Grande: $tamanio ..........";
				session_start();
				$_SESSION['rfc5']=$rfc5;
				$_SESSION['error']=$error;
				header("location:busqueda.php");exit();
			}
			if ($contenido=="none"){
				$error="Seleccione un archivo valido..........";
				session_start();
				$_SESSION['rfc5']=$rfc5;
				$_SESSION['error']=$error;
				header("location:busqueda.php");exit();				
			}else{
 				# Contenido del archivo
		        $fp = fopen($contenido, "rb");
        		$buffer = fread($fp, filesize($contenido));
                fclose($fp);
				$buffer=addslashes($buffer);
				$variable1="update clientes set nfoto='$nfoto',foto='$buffer',tipo='$tipo',tamanio=$tamanio where rfc='$rfc5'";
				@$rs=mysql_query($variable1,$conexion);
				//$rs=mysql_affected_rows($rs); 
				if($rs==1)
				{
					$ncapa='4';
					header("location:busqueda.php");exit();
				}
				else
				{
					$ncapa='5';
					$error="Error al Guardar ".mysql_error();
					session_start();
					$_SESSION['rfc5']=$rfc5;
					$_SESSION['nombre5']=$nombre5;
					$_SESSION['error']=$error;
					header("location:busqueda.php");exit();
				}
			}
			ob_end_flush();	
		}//FIN CAPA 5 PARA ACTUALIZAR FOTOS
		if ($ncapa==5 && $b==1){//CAPA 5 PARA ELIMINAR DATOS
			echo "entro";
                        $rfc5=$_REQUEST['rfc5']; 
			$variable="delete from administrador  where id_administrador='$rfc5'"; 
			@$rs=mysql_query($variable,$conexion);
			//echo $rs=mysql_affected_rows($rs);
			if($rs==1)
			{
				$ncapa='4';
				//("location:index2.php?ncapa=$ncapa");exit();
			}
			else
			{
				$ncapa='5';
				$error="Error al Eliminar ";
				session_start();
				$_SESSION['error']=$error;
				//header("location:index2.php?ncapa=$ncapa");exit();
			}
		}//FIN CAPA 5 PARA ELIMINAR DATOS
		//--USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS--
		if ($ncapa==1){//CAPA 1 PARA GUARDAR DATOS DEL USUARIO
			$cuenta=$_REQUEST['cuenta']; 
			$password1=md5($_REQUEST['password1']);
			$con="SELECT cuenta FROM usuarios WHERE cuenta='".$cuenta."'";
			@$res = mysql_query($con,$conexion);
			@$nf = mysql_num_rows($res);  
			if($nf>0){
					$error="La cuenta ".$cuenta." ya existe, intente con otra cuenta ";
					session_start();
					$_SESSION['error']=$error;
					header("location:busqueda.php");exit();
			}else{
				$variable1="insert into usuarios (cuenta,password) values('$cuenta','$password1')";
				@$rs=mysql_query($conexion,$variable1);
				if(!$rs){
						$error="Error al guardar la cuanta introduzca nuevamente los datos ";
						session_start();
						$_SESSION['error']=$error;
						header("location:busqueda.php");exit();
				}else
				{
						header("location:busqueda.php");exit();
				}
			}
		}
		if ($ncapa==6 && $gu==1){//CAPA 6 PARA ACTUALIZAR DATOS
			$cuenta=$_REQUEST['cuenta']; 
			$passwordmu=md5($_REQUEST['passwordmu']); 
			$variable1="update usuarios set password='$passwordmu' where cuenta='$cuenta'";
			@$rs=mysql_query($conexion,$variable1);
			@$rs=mysql_affected_rows($rs); 
			if($rs==1)
			{
					$ncapa='2';
					header("location:busqueda.php");exit();
			}
			else
			{
					$ncapa='6';
					$error="Error al Guardar, vuelva a intentarlo";
					session_start();
					$_SESSION['cuenta']=$cuenta;
					$_SESSION['error']=$error;
					header("location:busqueda.php");exit();
			}
		}//--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FIN
		if($ncapa==20){//AUTENTIFICACION-AUTENTIFICACION-AUTENTIFICACION-AUTENTIFICACION-AUTENTIFICACION-AUTENTIFICACION-
			$cuentai=$_REQUEST['cuentai'];
			$passwordi=md5($_REQUEST['passwordi']);
			$consulta="select * from usuarios where  cuenta='$cuentai' and password='$passwordi'";
			@$rs=mysql_query($consulta,$conexion);
			$rs=mysql_num_rows($rs); 
			if($rs>0)
			{	session_start();
				$_SESSION["autentificado"]= $cuentai;
				header("location:busqueda.php");	exit();
			}else {
				$error="Cuenta o Password incorrecto";
				session_start();
				$_SESSION['error']=$error;
				$ncapa=20;
				header("location:busqueda.php");exit();
			}
		}
		if($ncapa==21){//CERRAR SESION
			session_start();
			session_destroy();
			header("location:busqueda.php");exit();			
		}
	}
	mysql_close($conexion);
?>

