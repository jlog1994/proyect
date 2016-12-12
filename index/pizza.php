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
                        <center><h2>Registro Pizza</h2></center>
                    </div>

                    <form id="defaultForm" method="post" class="form-horizontal" enctype="multipart/form-data" action="../funcion/insertar.php">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nombre:</label>
                            <div class="col-lg-5">
                                <input type="text" id="nombre" class="form-control" name="nombre" />
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ingrediente:</label>
                            <div class="col-lg-5">
                                <?php
                                include("../class/conexion.php");
                                $result = mysql_query("select * FROM ingrediente");
                                $row = mysql_fetch_array($result);
                                ?>  
                                <select  name="ref_ingrediente" id="ref_ingrediente"> 
                                    <?php
                                    do {
                                        ?> 
                                        <option value="<?php echo $row['id_ingrediente'] ?>"><?php echo $row['nom_ingrediente'] ?></option> 
                                        <?php
                                    } while ($row = mysql_fetch_assoc($result));
                                    ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Foto:</label>
                            <div class="col-lg-5">
                                <input name="file" id="file" type="file" class="texto2" size="10" maxlength="80"></td></tr>				
                            </div>
                        </div>

                        <input type="hidden" name="fn" value="4">

                        <div class="form-group">
                            <div class="col-lg-6 ">
                                <input class="btn btn-default pull-right" type="button" onclick="window.parent.location.reload();" value="Cancelar">
                            </div>
                            <div class="col-lg-2 ">
                                <input class="btn btn-default pull-right"  type="submit" value="Registrar">
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