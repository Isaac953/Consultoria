<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Ofertas</title>
  </head>
    <body style="padding:15px;">
    
    <?php

include('../../../conexion/conexion.php');
$consulta="select * from Consultoria where Estado = 1";
$resultado=sqlsrv_query($conexion,$consulta);
?>

<form accept-charset="utf-8" action="librerias/php/Oferta/insertar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoOferta"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>OFERTAS</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para registrar una Oferta</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Consultoria:</label>  
  <div class="col-md-4">
  <select name='lsConsultoria' style="font-family: Verdana;" class='form-control'>
  <?php
  echo "<option selected value='0'>Seleccione una Consultoria</option>";

  while ($row=sqlsrv_fetch_object($resultado))
  {
  
  echo "<option  value='$row->Codigoconsultoria'>",$row->NombreConsultoria,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Nombre Empresa:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NombreEmpresa" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Nit:</label>  
  <div class="col-md-4">
  <input id="textinput" name="Nit" type="text" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Telefono:</label>  
  <div class="col-md-4">
  <input id="textinput" name="Telefono" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Correo:</label>  
  <div class="col-md-4">
  <input id="textinput" name="Correo" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4"  align="center">
    <button id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana;" class="btn btn-primary"><Strong>Guardar</Strong></button>
  </div>
</div>

    </body>
</html>