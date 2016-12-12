<!DOCTYPE html>
<html>
    <head>
        <title>Image slider</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Made with WOW Slider - Create beautiful, responsive image sliders in a few clicks. Awesome skins and animations. Image slider" />

        <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->

    </head>
    <body style="background-color:#e9e9e9 ;margin:auto">
       

        <!-- Start WOWSlider.com BODY section -->
        <div id="wowslider-container1">
            <div class="ws_images"><ul>
                    <?php
                    include("../class/conexion.php");
                    $consulta = "select id_pizza from pizza";
                    $result1 = mysql_query($consulta, $conexion);
                    if (mysql_num_rows($result1) >= 1) {
                        $c = 0;
                        while ($row = mysql_fetch_array($result1) /* and $c<5 */) {
                            //$c++;
                            //$nombre=$row["nombre"];
                            //echo "$nombre";
                            echo '<li><img src="mostrarfoto.php?rfc='. $row["id_pizza"] . '" width="100%" heigth="100%" alt="11" title="picha" id="wows1_0"/></li>';
                        }
                        
                    } else {
                        echo "<h1>No hay datos<h1>";
                    }
                    ?>
                    
                                      

                </ul></div>

            <div class="ws_shadow"></div>
        </div>	
        <script type="text/javascript" src="engine1/wowslider.js"></script>
        <script type="text/javascript" src="engine1/script.js"></script>
        <!-- End WOWSlider.com BODY section -->
    </body>
</html>
