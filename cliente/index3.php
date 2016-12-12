<?php require '../class/seguridadcliente.php'; ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pizzas "CHIRRIS"</title>
        <link rel="icon" href="../img/favicon.ico">
        <!-- Bootstrap Core CSS -->
        <link href="../estilo/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../estilo/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../estilo/dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../estilo/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../estilo/bower_components/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../estilo/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="../estilo/barra.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav id="barra" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Navegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img class="navbar-brand" src="../img/logo.png">
                    <a class="navbar-brand" href="index2.php">PUJKontrol</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php
                            echo "Bienvenido " . $_SESSION['name'];
                            ?>
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Cliente</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../class/cerrarsesion.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index3.php"><i class="fa fa-home fa-fw"></i> Home</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Consultas</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Promociones</a>
                            </li>
                            <a href="../carrito/carrito.php" target="zona" title="ver carrito de compras"> <img src="../img/carrito.png" height="80" width="80" ></a>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div id="empresa">
                        <center><h1 class="page-header">PIZZAS "CHIRRIS"</h1></center>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="">
                    <iframe name="zona" width="100%" height="400px" frameborder="0" src="../carrito/compras.php "></iframe>
                </div>
                <!-- /.row -->
              
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../estilo/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../estilo/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../estilo/bower_components/metisMenu/dist/metisMenu.min.js"></script>

       

        <!-- Custom Theme JavaScript -->
        <script src="../estilo/dist/js/sb-admin-2.js"></script>

    </body>

</html>