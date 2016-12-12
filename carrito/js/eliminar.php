<?php

//session_start();
$arreglo = $_SESSION['carrito'];
for ($i = 0; $i < count($arreglo); $i++) {
    if ($arreglo[$i]['Id'] != $_POST['Id']) {
        $datosNuevos[] = array(
            'Id' => $arreglo[$i]['Id'],
            'Id_pizza' => $id_pizza,
            'Nombre' => $nombre,
            'ingrediente' => $ingrediente,
            'Precio' => 5,
            'Cantidad' => 1);
    }
}
if (isset($datosNuevos)) {
    $_SESSION['carrito'] = $datosNuevos;
} else {
    unset($_SESSION['carrito']);
    echo '0';
}
?>