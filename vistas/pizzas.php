
<link rel="stylesheet" type="text/css" href="../estilo/estilos.css">
<link rel="stylesheet" type="text/css" href="../estilo/estilos2.css">
<script type="text/javascript" src="../javascript/validaciones.js"></script>
<form name="form6" method="POST" action="">

    <?php
    include '../class/conexion.php';
    $re = mysql_query("select * from pizza")or die(mysql_error());

    while ($f = mysql_fetch_array($re)) {
        ?>
        <div class="producto">
            <center>                
                <?php echo '<img src="../slider/mostrarfoto.php?rfc=' . $f["id_pizza"] . '" /><br>'; ?>
                <span><?php echo $f['nombre']; ?></span><br>

                <span  >
                    <?php echo '<a title="Eliminar pizza" href="../funcion/eliminar.php?idadmin=' . $f["id_pizza"] . '&fn=4"><img id="opciones" name="Eliminar" src="../img/Eliminar.png"/></a>' ?>
                    <?php echo '<a title="Actualizar" href="../funcion/actualizarpizza.php?idadmin=' . $f["id_pizza"] . '&fn=4"><img id="opciones" name="Eliminar" src="../img/actu.png"/></a>' ?>
                </span>
            </center>
        </div>
        <?php
    }
    ?>

</form>