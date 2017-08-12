<?php

session_start();

?>
<!--Contenido del sistema creado el dia 15/08/2014 -->			
				<div class="caja">
					<div align="center" style="text-shadow: 1px 4px 3px #D9D9D9;">
							
							<br><br>
							<h1 style="font-family: Arial; font-weight: bold;">Bienvenido al Sistema Gestión de Consultorias</h1>
							<h3>HOME</h3>
					</div>
	 <div align="center"><img width="40%" height="450px" src="librerias/images/Infanciaplan.JPG"/> </div>				<div class="sidepan pic">
						<br>
						
					</div>
				
					<div align="center" style="text-shadow: 1px 4px 3px #D9D9D9;">
						<h2 style="font-family: Arial; font-weight: bold;"><font color=#273D67><?php echo  $_SESSION['nombre'] ?></font></h2>
					  <h3><font color=#273D67><?php echo  $_SESSION['clasificacion']?></font></h3>
					
					</div>
				</div>