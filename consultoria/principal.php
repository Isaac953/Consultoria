<?php
session_start();
if (!empty($_SESSION['usuario']) ) {
	$nickname = $_SESSION['usuario'];
	$password= $_SESSION['password'];
} else {
	header('Location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<frame width="100%">
	<meta charset="UTF-8">
	<title>.::Sistema de Gestión de Consultorías::.</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link rel="stylesheet" href="librerias/css/bootstrap.min.css" class="rel">
<link rel="stylesheet" href="librerias/css/bootstrap-theme.min.css" class="href">
<link rel="stylesheet" href="librerias/css/estilo.css">

 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>


<link rel="stylesheet" href="librerias/css/font-awesome-4.4.0/css/font-awesome.min.css">

<script type="text/javascript" src="librerias/js/jquery.js"></script>
<script type="text/javascript" src="librerias/js/bootstrap.min.js"></script>
<script type="text/javascript" src="librerias/js/bootstrap.js"></script>

<!-- Controlador -->
<script type="text/javascript" src="controlador/administrador.js"></script>
<script type="text/javascript" src="controlador/evaluador.js"></script>
<script type="text/javascript" src="controlador/visitante.js"></script>
<script type="text/javascript" src="controlador/coordinador.js"></script>
<script type="text/javascript" src="controlador/recepcion.js"></script>
<script type="text/javascript" src="controlador/solicitante.js"></script>
<script type="text/javascript" src="controlador/supervisor.js"></script>
<script type="text/javascript" src="controlador/cargar.js"></script>

 <!--    ESTILO GENERAL    -->
 <!--    JQUERY   -->
 <script type="text/javascript" language="javascript" src="librerias/js/funciones.js"></script>

 <!--    JQUERY    -->
 <!--    FORMATO DE TABLAS    -->
 <link type="text/css" href="librerias/css/demo_table.css" rel="stylesheet" />
 <script type="text/javascript" language="javascript" src="librerias/js/jquery.dataTables.js"></script>
</head>

<?php if(isset($_GET['p'])){ ?>
<body onLoad="cargarPaginaPosicionada(<?php echo $_SESSION['tipo_usuario']?>, <?php echo $_GET['p'] ?>)">
<?php}else{ ?>
<body onLoad="cargarPagina(<?php echo $_SESSION['tipo_usuario']?>)">
<?php } ?>

<body onLoad="cargarPagina(<?php echo $_SESSION['tipo_usuario']?>)">

<div id="wrapper">
<header>
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="width: 100%">
			<div class="container" style="width: 100%">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" onclick="cargarPagina(<?php echo $_SESSION['tipo_usuario'] ?>)" class="navbar-brand"><strong>Inicio</strong></a>
				</div>
				<!-- Inicia Menu -->
				<div class="collapse navbar-collapse" id="navegacion-fm" style="width: 100%">
					    <div style="margin-top:1.3%" align="right">
					    	<font color="white" style="font-family: Verdana;"><strong> 
					    	<i class="fa fa-user"></i> <?php echo  $_SESSION['clasificacion'] ?>: <?php echo $_SESSION['nombre']  ?> [<a href="index.php">Cerrar sesion</a>] </strong>
							</font>
						</div>
				</div>
			</div>
		</nav>
	</header>
	
	<section  style="background-color: #FFFFFF;  
    background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#FFFFFF));  
    background: -webkit-linear-gradient(top, #FFFFFF, #FFFFFF);  
    background: -moz-linear-gradient(top, #FFFFFF, #FFFFFF);  
    background: -ms-linear-gradient(top, #FFFFFF, #FFFFFF);  
    background: -o-linear-gradient(top, #FFFFFF, #FFFFFF);  
    background: linear-gradient(top, #FFFFFF, #FFFFFF);  
    border: 1px solid #FFFFFF;  
    border-bottom: 1px solid #2B6F9A; width: 100% " class="bg-info">
	
		<div class="container">
			<div>
				<img width="175px" style="position:absolute; margin-top:1.5%;" src="librerias/images/logo.png"/>
			</div>
			<div align="right" style="margin-right:11%; margin-left:12%; ">
			</div>

		<div>
			<center><font color="#0072ce" style="font-weight: bold;"><h1><b>PLAN INTERNATIONAL<b></h1></font></center>
			<center><font color="#0072ce" style="font-weight: bold;"><h3><p><b>Sistema de gestión de consultorías<b></p></h3></font></center>
		</div>	
	</section>

	<section class="main container" style="width: 100%">
		<div class="row">

			<aside class="col-md-3 hidden-xs hidden-sm">
				<h4 style="font-family: Arial; font-weight: bold;">Menu</h4>
				<div id="menu" style="width: 300px; height: 10%">
				</div>
			</aside>

<!-- Se quita o se pone? -->
			<section  class="posts col-md-9" >

				<div style="border:solid; border-radius:10px; margin-top:40px; border-color:#D8D8D8;" id="cuerpo">
					<div style="margin-left:5%; margin-top:5%; margin-right:5%; margin-bottom:5%;" id="contenido">
					</div>			    
				</div>		
			</section>
<!--  Siguiente columnas -->
		</div>
	</section>

</div><!--  wrapper -->

	<div> </div>
	<footer id="footer" style="width: 100%">
           <center>
				<font color="white">	
					<ul class="copyright" style="font-family: Arial; font-weight: bold;">
							<br>&copy; Derechos Reservados</br>
							<a href="">Plan International</a>
						</ul>
			   </font>
		   </center>
	</footer>

<!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Producto</b></h4>
            </div>
          </div>
        </div>
      </div>
</body>
</html>