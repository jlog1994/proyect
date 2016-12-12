<?php
//session_start();
include '../class/conexion.php';
if (isset($_SESSION['carrito'])) {
    if (isset($_GET['id'])) {
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION['carrito'] = $arreglo;
        } else {
            $nombre = "";
            $precio = 0;
            $imagen = "";
            $re = mysql_query("select * from pizza where id_pizza=" . $_GET['id']);
            while ($f = mysql_fetch_array($re)) {
                $id_pizza=$f['id_pizza'];
                $nombre = $f['nombre'];
                $precio = $f['precio'];
                $imagen = $f['imagen'];
            }
            $datosNuevos = array('Id' => $_GET['id'],
                'Id_pizza'=>$id_pizza,
                'Nombre' => $nombre,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1);

            array_push($arreglo, $datosNuevos);
            $_SESSION['carrito'] = $arreglo;
        }
    }
} else {
    if (isset($_GET['id'])) {
        $nombre = "";
        $precio = 0;
        $imagen = "";
        $re = mysql_query("select * from pizza where id_pizza=" . $_GET['id']);
        while ($f = mysql_fetch_array($re)) {
            $id_pizza=$f['id_pizza'];
            $nombre = $f['nombre'];
            $ingrediente = $f['ref_ingrediente'];
            //$imagen = $f['imagen'];
        }
        $arreglo[] = array('Id' => $_GET['id'],
            'Id_pizza'=>$id_pizza,
            'Nombre' => $nombre,
            'ingrediente' => $ingrediente,
            'Precio'=>5,
            'Cantidad' => 1);
        $_SESSION['carrito'] = $arreglo;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Carrito de Compras</title>
        <link rel="stylesheet" type="text/css" href="../estilo/estilos2.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript"  src="js/scripts.js"></script>
    </head>
    <body>
        <!--header>
            <img src="./imagenes/logo.png" id="logo">
            <a href="./carritodecompras.php" title="ver carrito de compras">
                <img src="./imagenes/carrito.png">
            </a>
        </header-->
        <section>
            <?php
            $total = 0;
            if (isset($_SESSION['carrito'])) {
                $datos = $_SESSION['carrito'];

                $total = 0;
                for ($i = 0; $i < count($datos); $i++) {
                    ?>
                    <div class="producto">
                        <center>
                            <?php echo '<img src="../slider/mostrarfoto.php?rfc=' . $datos[$i]['Id_pizza'] . '" width="100%" heigth="100%" ><br>'; ?>
                            <span ><?php echo $datos[$i]['Nombre']; ?></span><br>
                            <span>Precio: <?php echo $datos[$i]['Precio']; ?></span><br>
                            <span>Cantidad: 
                                <input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
                                       data-precio="<?php echo $datos[$i]['Precio']; ?>"
                                       data-id="<?php echo $datos[$i]['Id']; ?>"
                                       class="cantidad">
                            </span><br>
                            <span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad'] * $datos[$i]['Precio']; ?></span><br>
                            <a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id'] ?>">Eliminar</a>
                        </center>
                    </div>
                    <?php
                    $total = ($datos[$i]['Cantidad'] * $datos[$i]['Precio']) + $total;
                }
            } else {
                echo '<center><h2>No has añadido ningun producto</h2></center>';
            }
            echo '<center><h2 id="total">Total: ' . $total . '</h2></center>';
            if ($total != 0) {
                echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>;';
            }
            ?>
            <center><a href="compras.php">Ver catalogo</a></center>





        </section>
    </body>
</html>