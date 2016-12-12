
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="../img/favicon.ico">
        <meta charset="utf-8">
        <title>Login | CHIRRIS</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        
        <!-- Import google fonts - Heading first/ text second -->
        
        <!-- Css files -->
        <!-- Icons -->
        <link href="css/icons.css" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="css/bootstrap.css" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="css/plugins.css" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="css/main.css" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="css/custom.css" rel="stylesheet" />
        <!-- Fav and touch icons -->

        
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
    </head>
    <body class="login-page">
        <!-- Start login container -->
        <div class="container login-container">
            <div class="login-panel panel panel-default plain animated bounceIn">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h6 class="panel-title text-center">
                        <img id="logo" src="img/logo.png" alt="logo">
                    </h6>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal mt0" method="post" action="cliente.php" name="login_form">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" name="name" id="name" class="form-control"  placeholder="Usuario">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                                </div>
                            </div>
                        </div>
                        <?php
                        @$usuario = $_REQUEST['name'];
                        @$password = md5($_REQUEST['password']);
                        if (isset($usuario)and isset($password)) {
                            require('../class/conexion.php');
                            //$consulta = "select * from usuarios where  name='$usuario' and password='$password'";
                            $consulta = "select * from cliente where  usuario='$usuario' and contrasena='$password'";
                            @$rs = mysql_query($consulta);
                            @$rs2 = mysql_num_rows($rs);
                            if ($rs2 > 0) {
                                session_start();
                                $_SESSION["name"] = $usuario;
                                header("Location:../cliente/index3.php");
                                exit();
                            } else {
                                echo '<center><h4> Usuario o Contraseña Incorrecta </h4></center>';
                            }
                        }
                        ?>
                        <input type="hidden" name="server" value="1">
                        <div class="form-group mb0">
                            <div class="col-lg-4 col-md-0 col-sm-0 col-xs-4 mb10">
                                <input class="btn btn-default pull-right" type="button" value="Cancelar" onclick="history.back(-1)" >
                            </div>
                            <div class="col-lg-8 col-md-0 col-sm- col-xs-8 mb25">
                                <input class="btn btn-default pull-right"  type="submit" value="Iniciar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer gray-lighter-bg bt">
                    <p class="text-center"><a href="../index/cliente.php" class="btn btn-primary">Crear Cuenta</a>
                    </p>
                </div>
            </div>

            <!-- End .panel -->
        </div>
        <!-- End login container -->
        <div class="container">
            <div class="footer">
                <p class="text-center">Tecno Os</p>
            </div>
        </div>
        <!-- Javascripts -->
        <!-- Important javascript libs(put in all pages) -->
        
        <script>
            window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')
        </script>
        
        <script>
            window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="js/bootstrap/bootstrap.js"></script>
        <!-- Form plugins -->
        <script src="plugins/forms/validation/jquery.validate.js"></script>
        <script src="plugins/forms/validation/additional-methods.min.js"></script>
        <!-- Init plugins olny for this page -->
        <script src="js/pages/login.js"></script>
        <!-- Google Analytics:  -->
        <script>
            (function (i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function ()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-3560057-28', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
</html>