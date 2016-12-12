<?php require '../class/seguridad.php'; ?>
<script type="text/javascript" src="javascript/validaciones.js"></script>
<form name="form5" action="datos.php" method="POST" enctype="multipart/form-data">
			  <?php
			  include("conexion.php");
			  	if(isset($_REQUEST['rfc5'])){
				$rfc5=$_REQUEST['rfc5'];
				$result1=mysql_query("select * from clientes where rfc='$rfc5'",$conexion); 
				if (mysql_num_rows($result1)>=1) {
					while ($row=mysql_fetch_array($result1))
					{
						$rfc5=$row["rfc"];$nombre5=$row["nombre"];$edad5=$row["edad"];
						$sexo5=$row["sexo"];$direccion5=$row["direccion"];
						$telefono5=$row["telefono"];$email5=$row["email"];
					}?>
					<table cols="3" border="0" align="center">
					<tr align="center"><td colspan="3"><H1>Modificacion del cliente</H1></td></tr>
					<tr align="right"><td>NOMBRE:</td><td align="left"><input type="text" maxlength="30" name="nombre5" value="<?php echo $nombre5;?>"/></td>
					<td rowspan="5" align="center"><?php echo '<img src="mostrarfoto.php?rfc='.$rfc5.'" width="80" heigth="120" />';?> </td>
					</tr>
					<tr align="right"><td>EDAD:</td><td align="left">
					<select name="edad5">
					 <option selected><?php echo $edad5; ?> </option>
					<?php for($i=18;$i<=60;$i++){?>
					<option value="<?php echo $i ;?>"><?php echo $i ;?>
					<?php } ?>
					</select>
					</td></tr>
					<tr align="right"><td>SEXO:</td>
					  <td align="left"><label>
					  <select name="sexo5">
		                    <option selected><?php echo $sexo5; ?> </option>
							<option value="M">M</option>
							<option value="H">H</option>
						  </select>
					  </label></td>
					</tr>
					<tr align="right"><td>DIRECCION:</td><td align="left"><input type="text" maxlength="60" name="direccion5" value="<?php echo $direccion5;?>"/></td></tr>				
					<tr align="right"><td>TELEFONO:</td><td align="left"><input type="text" maxlength="15" name="telefono5" value="<?php echo $telefono5;?>" /></td></tr>						
					<tr align="right"><td>E_MAIL:</td><td align="left"><input type="text" maxlength="60" name="email5" value="<?php echo $email5;?>"/></td>
					<td><input name="file2" type="file" class="texto2" size="10" maxlength="80"></td>	</tr>				
					<tr align="right"><td colspan="2">
					<input type="button" name="Actualizar" value="Actualizar Datos" onclick="actualiza()"/>
					<input type="button" name="Eliminar" value="Eliminar Registro" onclick="baja()"/>
					</td><td align="center"><input type="button" name="modfoto" value="Actualizar foto" onclick="afoto()"/></td></tr>	
					<tr align="center"><td colspan="3">					
					<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />
					<input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />
					<input type="hidden" name="g" value="<?php echo $g;?>" />
					<input type="hidden" name="b" value="<?php echo $b;?>" />
					<input type="hidden" name="af" value="<?php echo $af;?>" />
					</td></tr>	
					</table>
				<?php }
				else{
					echo"<BR><CENTER><H3>NO HAY DATOS</CENTER></H3>";
				}
				mysql_close($conexion);
				}
?>
		</form>	
