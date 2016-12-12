<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ruta</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCgNjYzwkGC0WgAkr5w0YYbLe11PQW4mRE"></script>
  
  <script type="text/javascript" src="js/gmaps.js"></script>
  <link rel="stylesheet" href="https://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="js/examples.css" />
  
</head>
<body>
    <?php
        $nc=$_REQUEST['nc'];
        include('class/conexion.php');
        $sql = "SELECT * FROM pedido where id_pedido=".$nc.";";
        $re = mysql_query($sql);
        $registro2 = mysql_fetch_array($re)
    ?>
    
    <script type="text/javascript">
    var map;
    var latitud;
    var longitud;
    $(document).ready(function(){
        localizar();
    });
    function localizar () {
         navigator.geolocation.getCurrentPosition(coordenadas);
    }
    function coordenadas(position){
           var latitud = position.coords.latitude;
           var longitud = position.coords.longitude;
           cargarMapa();
     }
    function cargarMapa () {
        map = new GMaps({
        zoom:17,
        el: '#map',
        lat: 17.269822,
        lng: -97.676701,

      });
        map.drawRoute({
        origin: [17.269822, -97.676701],
        //destination: [17.269822, -97.676701],
        destination: [<?php echo $registro2['latitud']?>,<?php echo $registro2['longitud']?>],
        travelMode: 'driving',
        strokeColor: '#131540',
        strokeOpacity: 0.6,
        strokeWeight: 6
      });
        map.addMarker({ lat: 17.269822, lng: -97.676701});
        map.addMarker({ lat:<?php echo $registro2['latitud']?>,lng:<?php echo $registro2['longitud']?>});
        }
  </script>
 
  <div class="row">
    <div class="span11">
      <div id="map"></div>
      <ul id="instructions">
      </ul>
    </div>
  </div>
</body>
</html>