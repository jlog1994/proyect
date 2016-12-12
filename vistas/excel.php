<?php
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
	   if ($criterios=='Nombre') {
			$sql="SELECT id_cliente,nombre,usuario,correo,telefono FROM cliente WHERE nombre LIKE '$buscar1%' ORDER BY id_cliente"; 
	   }
		if ($criterios=='Todos') {
				$sql="SELECT id_cliente,nombre,usuario,correo,telefono FROM cliente ORDER BY id_cliente"; 
		}
}
require('../class/conexion.php');
$rs = mysql_query($sql);
$value=0;
$header="ID\tNOMBRE\tUSUARIO\tCORREO\tTELEFONO\n";
while($row = mysql_fetch_array($rs)){
	$value .= $row[0];
   	$value .= "\t".$row[1];
   	$value .= "\t".$row[2];
   	$value .= "\t".$row[3];
        $value .= "\t".$row[4];
   	$value .= "\n";
}
$data=$value;
$data = str_replace("\r", "", $data);
if ($data == "") {
	$data = "\nNo Hay Registros que Mostrar\n";
}
header('Content-Type: application/x-octet-stream');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Disposition: attachment; filename= datos.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo utf8_decode($header."\n".$data);
ob_end_flush();
?>