<html lang="es">
    <head>
        <title>Administrador</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../estilo2/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../estilo2/dist/js/bootstrapValidator.js"></script>

        <!--link rel="stylesheet" href="../estilo2/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../estilo2/dist/css/bootstrapValidator.css"/>

        <script type="text/javascript" src="../estilo2/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../estilo2/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../estilo2/dist/js/bootstrapValidator.js"></script-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="page-header">
                        <center><h2>Actualizar Usuario</h2></center>
                    </div>

                    <form id="defaultForm" method="post" class="form-horizontal" action="actualizar.php">
                        <?php
                        include("../class/conexion.php");
                        if (isset($_REQUEST['idadmin'])) {
                            $rfc5 = $_REQUEST['idadmin'];
                            $result1 = mysql_query("select * from administrador where id_administrador='$rfc5'", $conexion);
                            if (mysql_num_rows($result1) >= 1) {
                                while ($row = mysql_fetch_array($result1)) {
                                    $id = $row["id_administrador"];
                                    $nombre = $row["nombre"];
                                    $apellidos = $row["apellidos"];
                                    $correo = $row["correo"];
                                    
                                    $telefono = $row["telefono"];
                                    $usuario = $row["usuario"];
                                }
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nombres:</label>

                            <div class="col-lg-5">
                                <input type="text" id="nombre" class="form-control" name="nombre" value="<?php echo $nombre;?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Apellidos:</label>
                            <div class="col-lg-5">
                                <input type="text" id="apellido" class="form-control" name="apellido" value="<?php echo $apellidos;?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Correo:</label>
                            <div class="col-lg-5">
                                <input type="text" id="correo" class="form-control" name="correo" value="<?php echo $correo;?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Telefono</label>
                            <div class="col-lg-5">
                                <input type="text" id="telefono" class="form-control" name="telefono" value="<?php echo $telefono;?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Usuario:</label>
                            <div class="col-lg-5">
                                <input type="text" id="usuario" class="form-control" name="usuario" value="<?php echo $usuario;?>" />
                            </div>
                        </div>

                        <!--div class="form-group">
                            <label class="col-lg-3 control-label">Contrase&ntilde;a:</label>
                            <div class="col-lg-5">
                                <input type="password" id="contrasena" class="form-control" name="contrasena" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Confirmar Contrase&ntilde;a:</label>
                            <div class="col-lg-5">
                                <input type="password" id="confirmarcontrasena" class="form-control" name="confirmarcontrasena" />
                            </div>
                        </div-->
                        <input type="hidden" name="fn" value="2">
                        <input type="hidden" name="id_administrador" value="<?php echo $id; ?>">
                        

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
                                    message: 'Nombre  invalido',
                                    validators: {
                                        notEmpty: {
                                            message: 'Se require su nombre'
                                        },
                                        stringLength: {
                                            min: 3,
                                            max: 30,
                                            message: 'Su nombre require como minimo 3 caracteres y maximo 30'
                                        },
                                        regexp: {
                                            regexp: /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/,
                                            message: 'Su nombre no puede contener numeros, simbolos o signos'
                                        }
                                    }
                                },
                                apellido: {
                                    message: 'apellidos invalido',
                                    validators: {
                                        notEmpty: {
                                            message: 'Se require su o sus apellidos'
                                        },
                                        stringLength: {
                                            min: 4,
                                            max: 50,
                                            message: 'Su o sus apellidos require como minimo 4 caracteres y maximo 50'
                                        },
                                        regexp: {
                                            regexp: /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/,
                                            message: 'Su o sus apellidos no puede contener numeros, simbolos o signos'
                                        }
                                    }
                                },
                                correo: {
                                    validators: {
                                        notEmpty: {
                                            message: 'Se require correo electronico'
                                        },
                                        emailAddress: {
                                            message: 'correo electronico invalido'
                                        }
                                    }
                                },
                                telefono: {
                                    message: 'Telefono invalido',
                                    validators: {
                                        notEmpty: {
                                            message: 'Se require su telefono'
                                        },
                                        stringLength: {
                                            min: 10,
                                            max: 10,
                                            message: 'Su telefono require 10 numeros'
                                        },
                                        regexp: {
                                            regexp: /^[0-9_\.]+$/,
                                            message: 'Su nombre no puede contener numeros, simbolos o signos'
                                        }
                                    }
                                },
                                usuario: {
                                    message: 'Nombre de Usuario invalido',
                                    validators: {
                                        notEmpty: {
                                            message: 'Se require nombre de Usuario'
                                        },
                                        stringLength: {
                                            min: 3,
                                            max: 30,
                                            message: 'El usuario require como minimo 3 caracteres y maximo 30'
                                        },
                                        regexp: {
                                            regexp: /^[a-zA-Z0-9_\.]+$/,
                                            message: 'El usuario no puede ser creado con simbolos ni signos'
                                        }
                                    }
                                },
                               /* contrasena: {
                                    validators: {
                                        notEmpty: {
                                            message: 'Se require contrase&ntilde;a'
                                        },
                                        stringLength: {
                                            min: 6,
                                            max: 30,
                                            message: 'La contrase&ntilde;a require como minimo 6 caracteres y maximo 30'
                                        },
                                    }
                                },
                                confirmarcontrasena: {
                                    validators: {
                                        notEmpty: {
                                            message: 'Confirmar contrasena'
                                        },
                                        identical: {
                                            field: 'contrasena',
                                            message: 'Incorrecto'
                                        }
                                    }
                                }*/
                            }
                        });

            });
        </script>
    </body>
</html>
