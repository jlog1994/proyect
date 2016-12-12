<?php require '../class/seguridad.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ingrediente</title>

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
                        <center><h2>Registro Ingrediente</h2></center>
                    </div>

                    <form id="defaultForm" method="post" class="form-horizontal" action="../funcion/insertar.php">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ingrediente:</label>
                            <div class="col-lg-5">
                                <input type="text" id="nom_ingrediente" class="form-control" name="nom_ingrediente" />
                            </div>
                        </div>
                        <input type="hidden" name="fn" value="3">

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
                                nom_ingrediente: {
                                    message: 'Ingrediente invalido',
                                    validators: {
                                        notEmpty: {
                                            message: 'Se require su ingrediente'
                                        },
                                        stringLength: {
                                            min: 3,
                                            max: 200,
                                            message: 'Su ingrediente require como minimo 3 caracteres y maximo 200'
                                        },
                                        regexp: {
                                            regexp: /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/,
                                            message: 'Su ingrediente no puede contener numeros, simbolos o signos'
                                        }
                                    }
                                },
                            }
                        });
                        
            });
        </script>
    </body>
</html>