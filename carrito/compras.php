
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
                    <?php echo '<img src="../slider/mostrarfoto.php?rfc=' . $f["id_pizza"] . '" width="800px" heigth="600px" alt="11" title="picha" id="wows1_0"/><br>'; ?>
                    <span><?php echo $f['nombre']; ?></span><br>
                    <a href="detalles.php?id=<?php echo $f['id_pizza']; ?>">ver</a>
                </center>
            </div>
            <?php
        }
        ?>
    
</form>