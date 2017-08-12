<!DOCTYPE html>
<html>
<head>
<title>Pensión Alameda</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<link type="text/css" href="css/jquery-ui-1.7.2.custom.css" rel="stylesheet">
<meta charset="utf-8" />
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
Remove this if you use the .htaccess -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
</head>

<body>
<!--clase de el título y la imagen-->
<div class="container">
<div class = "row">
<div class = "span6 offset3">
<h1 id = "title">Pensión Alameda</h1>
</div>
<div class = "span2">
<img width="100" height="45" src="./img/logo1.jpg">
</div>
</div>
<!--menú-->
<div class = "table"> 
<ul class="nav nav-tabs">
<li><a href="index.php">Inicio</a></li>
<li><a href="whoarewe.php">Quienes somos</a></li>
<li><a href="facilities.php">Instalaciones</a></li>
<li><a href="prices.php">Precios</a></li>
<li class="active">
<a href="bookings.php">Reservas</a>
</li>
<li><a href="localization.php">Localización</a></li>
</ul>
</div>

<!-- contenido de la página -->
<script type="text/javascript" src="development-bundle/demos/datepicker"></script>
<script type="text/javascript"><!-- Si vas a ejecutar código dentro de la etiqueta, no puede haber un atributo src -->
$(document).ready(function() {
  $("#datepicker").datepicker();
});
</script>

<div class="demo">
<p>Date: <input id="datepicker" type="text"></p>
</div>

</div>


</body>

</html>