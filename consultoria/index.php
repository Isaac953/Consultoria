<!DOCTYPE HTML>

<?php
session_start();
session_destroy();
?>
<html>
	<head>
		<title>Bienvenido al Sistema de Consultorias</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="librerias/css/loginstyle.css" />
		<link rel="stylesheet" href="librerias/css/bootstrap.css" />
		<link rel="stylesheet" href="librerias/css/bootstrap-theme.css" />
		<link rel="stylesheet" href="librerias/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="librerias/css/bootstrap.min.css" />

		<noscript><link rel="stylesheet" href="librerias/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		
		
		<!-- Wrapper -->
			<div id="wrapper">
			
			
			
	<!-- ******************************CUADRO DE INICIO DE SESION********************************************** -->
					<section  id="main">
						<header>
							
							<span class="avatar"><img style="width:25%" src="librerias/images/consultoria-icon.jpg" alt="" /></span>
							<h2 style="font-weight: bold;">Sistema de Gestión de Consultorías</h2>
							<p">Plan Internacional, inc.</p>
					  </header>
		

                <!-- FORMULARIO CON SUS CAJAS DE TEXTO -->
		<div class="row omb_row-sm-offset-3">
			<div  class="">	
			    <form class="omb_loginForm" action="librerias/php/login/sp_login.php" autocomplete="off" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text"  class="form-control" name="user" placeholder="Usuario" required>
					</div>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" placeholder="Contraseña" required>
					</div>
                    <span class="help-block"> </span>

					<center><button class="btn btn-lg btn-primary btn-block" style="width: 40%; font-weight:bold;" type="submit">Iniciar Sesión</button></center>
				</form>
			</div>
    	</div>
		     <!-- FORMULARIO CON SUS CAJAS DE TEXTO -->
			 
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">

			</div>

		</div>	    	
		
		
						<footer>
							<ul class="icons">
								
							</ul>
						</footer>
					</section>
		<!-- *********************************FIN CUADRO DE INICIO DE SESION********************************** -->
					
					

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; Derechos Reservados</li>
							<li><a href="" style="color: #FFFFFF">Plan Internacional,inc.</a></li>
						</ul>
					</footer>

			</div> 

		<!-- Scripts -->
			
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>