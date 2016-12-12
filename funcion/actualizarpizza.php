<?php require '../class/seguridad.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pizza</title>

        <link rel="stylesheet" href="../estilo2/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../estilo2/dist/css/bootstrapValidator.css"/>

        <script type="text/javascript" src="../estilo2/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../estilo2/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../estilo2/dist/js/bootstrapValidator.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="page-header">
                        <center><h2>Actualizar Pizza</h2></center>
                    </div>

                    <form id="defaultForm" method="post" class="form-horizontal" enctype="multipart/form-data" action="../funcion/actualizar.php">
                        <?php
                        include("../class/conexion.php");
                        if (isset($_REQUEST['idadmin'])) {
                            $rfc5 = $_REQUEST['idadmin'];
                            $result1 = mysql_query("select * from pizza where id_pizza='$rfc5'", $conexion);
                            if (mysql_num_rows($result1) >= 1) {
                                while ($row = mysql_fetch_array($result1)) {
                                    $id_pizza = $row["id_pizza"];
                                    $nombre = $row["nombre"];
                                    $ring = $row["ref_ingrediente"];
                                    $foto = $row["foto"];
                                    $nfoto = $row["nfoto"];
                                    $tamanio = $row["tamanio"];
                                }
                            }
                            $r2=mysql_query("select * from ingrediente where id_ingrediente='$ring'", $conexion);
                            if (mysql_num_rows($r2) >= 1) {
                                while ($r = mysql_fetch_array($r2)) {
                                    
                                    $nom_ing = $r["nom_ingrediente"];
                                    
                                }
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nombre:</label>
                            <div class="col-lg-5">
                                <input type="text" id="nombre" class="form-control" name="nombre" value="<?php echo $nombre; ?>" />
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ingrediente :</label>
                            <div class="col-lg-5">
                                <input type="text" id="ingrediente" class="form-control" name="ingrediente" value="<?php echo $nom_ing; ?>" />
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Foto:</label>
                            <div class="col-lg-5">
                                <input name="file" id="file" type="file" class="texto2" size="10" maxlength="80"></td></tr>				
                            </div>
                        </div>

                        <input type="hidden" name="fn" value="4">
                        <input type="hidden" name="ring" value="<?php echo $ring;?>">
                        <input type="hidden" name="id_pizza" value="<?php echo $id_pizza;?>">

                        <div class="form-group">
                            <div class="col-lg-6 ">
                                <input class="btn btn-default pull-right" type="button" onclick="window.parent.location.reload();" value="Cancelar">
                            </div>
                            <div class="col-lg-2 ">
                                <input class="btn btn-default pull-right"  type="submit" value="Actualizar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#defaultForm')
                        .bootstrapValidator({
                            message: 'This value is not valid',
                            feedbackIcons: {
                                valid: 'glyphicon glyphicon-ok',
                                invalid: 'glyphicon glyphicon-remove',
                                validating: 'glyphicon glyphicon-refresh'
                            },
                            fields: {
                                nombre: {
                                    message: 'Nombreinvalido',
                                    validators: {
                                        notEmpty: {
                                            message: 'Se require su nombre'
                                        },
                                        stringLength: {
                                            min: 6,
                                            max: 30,
                                            message: 'Su nombre require como minimo 6 caracteres y maximo 30'
                                        },
                                        regexp: {
                                            regexp: /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/,
                                            message: 'Su nombre no puede contener numeros, simbolos o signos'
                                        }
                                    }
                                },
                            }
                        });
            });
        </script>
    </body>
</html>