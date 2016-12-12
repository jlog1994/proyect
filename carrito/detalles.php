<link rel="stylesheet" type="text/css" href="../estilo/estilos.css">
<link rel="stylesheet" type="text/css" href="../estilo/estilos2.css">
<script type="text/javascript" src="../javascript/validaciones.js"></script>
<form name="form7" method="POST" action="">
    <section>
        <?php
        include '../class/conexion.php';
        $re = mysql_query("select * from pizza where id_pizza=" . $_GET['id'])or die(mysql_error());
        $rp = mysql_query("select * from precio")or die(mysql_error());
        while ($f = mysql_fetch_array($re)) {
            ?>

            <center>
                <?php echo '<img src="../slider/mostrarfoto.php?rfc=' . $f["id_pizza"] . '" width="50%" heigth="50%" ><br>'; ?>
                <span><?php echo $f['nombre']; ?></span><br>
                <span>TAMA&Ntilde;O: 
                    <select  name="tamanio" id="tamanio"> 
                        <?php
                        while ($r = mysql_fetch_assoc($rp)) {
                            ?> 
                        <option value="<?php echo $r['id_precio'] ?>"><?php echo $r['tamano']?> -----> $ <?php  echo $r['precio']   ?> </option> 
                            <?php
                        }
                        
                        ?> 
                    </select>

                </span><br>
                <span>PRECIO: <input type="text" disabled="disabled" value="tamanio.value"></span><br>
                <a href="carrito.php?id=<?php echo $f['id_pizza']; ?>&precio=">Añadir al carrito de compras</a>
            </center>

            <?php
        }
        ?>
    </section>

</form>