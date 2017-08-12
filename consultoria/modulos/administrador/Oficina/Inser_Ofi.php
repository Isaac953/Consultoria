<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="UTF-8">
    <title>Oficina</title>
	</head>
    <body style="padding:15px;">
    
    <?php

include('../../../conexion/conexion.php');
?>
<form accept-charset="utf-8" action="librerias/php/Oficinas/insertar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoOficina"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>OFICINA</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para registrar una Oficina</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre de Oficina:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NombreOficina" type="text" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana;" class="btn btn-primary"><strong>Guardar</strong></button>
  </div>
</div>

    </body>
</html>