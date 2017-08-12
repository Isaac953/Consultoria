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

$id_subarea=$_POST['id'];

$query="select  * from SubArea S, AreaEspecializacion A where S.CodigoArea=A.CodigoArea and S.CodigoSubArea = ?";

$params = array( array($id_subarea, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$sub=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

?>

<form accept-charset="utf-8" action="librerias/php/SubAreas/modificar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoSubArea" value="<?php echo $sub['CodigoSubArea'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>SUB-AREAS DE ESPECIALIZACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar una Sub Área de Especialización</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Id de SubArea:</label>  
  <div class="col-md-4">
  <input id="textinput" name="CodigoSubArea" style="font-family: Verdana;" disabled value="<?php echo $_POST['id'];?>" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Área de Especialización:</label>
  <div class="col-md-4">
  <select name='lsAreas' class='form-control' style="font-family: Verdana;"  required>
  <option selected value="<?php echo $sub['CodigoArea'];?>"><?php echo $sub['AreaEspecializacion'];?>
    
  </option>
  <?php

  while ($row=sqlsrv_fetch_object($resultado))
  {
  
  echo "<option   value='$row->CodigoArea'>",$row->AreaEspecializacion,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre de SubÁrea:</label>  
  <div class="col-md-4">
  <input id="textinput" name="SubArea" style="font-family: Verdana;" required value="<?php echo $sub['SubArea'];?>" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-primary" style="font-family: Verdana;"><strong>Actualizar</strong></button>
  </div>
</div>

    </body>
</html>