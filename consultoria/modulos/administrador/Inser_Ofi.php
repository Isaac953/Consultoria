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
<legend style="text-align: center;">OFICINA</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre de Oficina:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NombreOficina" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-primary">Guardar</button>
  </div>
</div>

    </body>
</html>