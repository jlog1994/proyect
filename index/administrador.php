<?php require '../class/seguridad.php'; ?>
<!DOCTYPE html>
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
                        <center><h2>Registro Administrador</h2></center>
                    </div>

                    <form id="defaultForm" method="post" class="form-horizontal" action="../funcion/insertar.php">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nombres:</label>
                            <div class="col-lg-5">
                                <input type="text" id="nombre" class="form-control" name="nombre" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Apellidos:</label>
                            <div class="col-lg-5">
                                <input type="text" id="apellidos" class="form-control" name="apellidos" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Correo:</label>
                            <div class="col-lg-5">
                                <input type="text" id="correo" class="form-control" name="correo" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Telefono</label>
                            <div class="col-lg-5">
                                <input type="text" id="telefono" class="form-control" name="telefono" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Usuario:</label>
                            <div class="col-lg-5">
                                <input type="text" id="usuario" class="form-control" name="usuario" />
                            </div>
                        </div>

                        <div class="form-group">
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
                        </div>
                        <input type="hidden" name="fn" value="2">

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
        <script type="text/javascript" src="../javascript/valida.js"></script>
    </body>
</html>