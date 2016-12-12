<?php require '../class/seguridad.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Descripcion pizza</title>

        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../dist/css/bootstrapValidator.css"/>

        <script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../dist/js/bootstrapValidator.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="page-header">
                        <center><h2>Descripcion Pizza</h2></center>
                    </div>

                    <form id="defaultForm" method="post" class="form-horizontal" action="../funcion/insertar.php">
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
                                $result = mysql_query("select * FROM ingrediente");
                                $row = mysql_fetch_array($result);
                                ?>  
                                <select name="ref_ingrediente" id="ref_ingrediente"> 
                                    <?php
                                    do {
                                        ?> 
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option> 
                                        <?php
                                    } while ($row = mysql_fetch_assoc($result));
                                    ?> 
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6 ">
                                <input class="btn btn-default pull-right" type="reset" value="Cancelar">
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
                        })
                        .on('success.form.bv', function (e) {
                            // Prevent form submission
                            e.preventDefault();

                            // Get the form instance
                            var $form = $(e.target);

                            // Get the BootstrapValidator instance
                            var bv = $form.data('bootstrapValidator');

                            // Use Ajax to submit form data
                            $.post($form.attr('action'), $form.serialize(), function (result) {
                                console.log(result);
                            }, 'json');
                        });
            });
        </script>
    </body>
</html>