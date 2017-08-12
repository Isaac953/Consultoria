<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>SubAreas</title>
  </head>
    <body style="padding:15px;">
    
      <?php
include('../../../conexion/conexion.php');
$consulta="select * from AreaEspecializacion";
$resultado=sqlsrv_query($conexion,$consulta);
?>

<form accept-charset="utf-8" action="librerias/php/SubAreas/insertar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoSubArea"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>SUB-AREAS DE ESPECIALIZACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para registrar una Sub Área de Especialización</strong></center>

<br>
<br>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Área de Especialización:</label>
  <div class="col-md-4">
  <select name='lsAreas' class='form-control' style="font-family: Verdana;" required>
  <?php
  echo "<option selected value='0'>Seleccione un Area</option>";

  while ($row=sqlsrv_fetch_object($resultado))
  {
  
  echo "<option  value='$row->CodigoArea'>",$row->AreaEspecializacion,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre de Sub Área:</label>  
  <div class="col-md-4">
  <input id="textinput" name="SubArea" style="font-family: Verdana;" required type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-primary" style="font-family: Verdana;"><strong>Guardar</strong></button>
  </div>
</div>

    </body>
</html>