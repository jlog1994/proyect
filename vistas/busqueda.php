<?php require '../class/seguridad.php'; ?>
<script type="text/javascript" src="../javascript/validaciones.js"></script>
<form name="form3" method="POST" action="">
    <center>
        <h1>Busqueda de Clientes</h1>
        <p>CRITERIOS:
            <select name="criterios" id="select">
                <option value="Nombre">Nombre</option>
                <option value="Todos">Todos</option
                ></select>
        </p>
        <p>
            Busqueda por RFC:
            <input type="text" name="buscar1" value="<?php if (isset($buscar1)) echo $buscar1; ?>"/>
        </p>
        <p>
            <label>
                <input type="button" name="boton2" value="Buscar"  onclick="validaform3()"/>
                <input type="image" src="img/excel.gif" name="boton2" onclick="excel()"/>           
                <input type="image" src="img/excel.gif" name="boton2" onclick="word()"/>           
            </label>
        </p>
        <input type="hidden" name="ncapa" value="<?php echo $ncapa; ?>" />	
    </center>
</form>
<form name="form4" method="post">
    <table width="610px" border="0" align="center">
        <tr>
            <td>
                <div id="pp">
                    <table width="600" cols="3" border="1" cellpadding="0" cellspacing="0" align="center">
                        <tr><td width="107"><h4>RFC</h4></td><td width="399"><h4>Nombre</h4></td><td width="86"><h4>Fotografia</h4></td></tr>
                        <?php
                        if (isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])) {
                            $buscar1 = $_REQUEST['buscar1'];
                            $criterios = $_REQUEST['criterios'];
                            if ($buscar1 != "" or $criterios == 'Todos') {
                                if ($criterios == 'Nombre') {
                                    $_pagi_sql = "SELECT rfc,nombre FROM clientes WHERE nombre LIKE '$buscar1%' ORDER BY rfc";
                                }
                                if ($criterios == 'Todos') {
                                    $_pagi_sql = "SELECT rfc,nombre FROM clientes ORDER BY rfc";
                                }
                                include("../class/conexion.php");
                                $result1 = mysql_query($_pagi_sql, $conexion);
                                //if (mysql_num_rows($result1)>=1) {
                                //$_pagi_cuantos = 5;
                                //$_pagi_nav_num_enlaces = 5;
                                //include("paginator.inc.php");
                                while ($row = mysql_fetch_array($result1)) {
                                    echo '<tr><td><a href="modificarclientes.php?rfc5=' . $row["rfc"] . '">' . $row["rfc"] . '</a></td>
								<td>' . $row["nombre"] . '</td>
								<td><img src="mostrarfoto.php?rfc=' . $row["rfc"] . '" width="50" height="50" align="absmiddle"></td></tr>';
                                }
                                //echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
                                //}
                                echo '<tr><td colspan="3" align="center"><h4>' . mysql_num_rows($result1) . ' filas en la tabla </h4></td></tr>';
                            } else {
                                echo '<tr><td colspan="3" align="center"><h4>No hay Datos </h4></td></tr>';
                            }
                        }
                        ?>								
                    </table>
                </div>
        <center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
        <input type="hidden" name="ncapa" value="<?php echo $ncapa; ?>" />	
        <input type="hidden" name="rfc5" value="<?php echo $rfc5; ?>" />
        </td>
        </tr>
    </table>	
</form>	
