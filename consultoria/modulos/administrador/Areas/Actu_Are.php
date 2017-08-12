<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Areas</title>
  </head>
    <body style="padding:15px;">  

<?php
include('../../../conexion/conexion.php');

$id_area=$_POST['id'];

$query="select * from AreaEspecializacion where CodigoArea = ?";

$params = array( array($id_area, SQLSRV_PARAM_IN));

$resultado=sqlsrv_query($conexion,$query,$params);
$are=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);

?>

<form accept-charset="utf-8" action="librerias/php/Areas/modificar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoArea" value="<?php echo $are['CodigoArea'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>ÁREAS DE ESPECIALIZACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar una Área de Especialización</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Id Área:</label>  
  <div class="col-md-4">
  <input id="textinput" name="CodigoArea" style="font-family: Verdana;" disabled value="<?php echo $_POST['id'];?>" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre de Área:</label>  
  <div class="col-md-4">
  <input id="textinput" name="AreaEspecializacion" style="font-family: Verdana;" required value="<?php echo $are['AreaEspecializacion'];?>" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana;" class="btn btn-primary"><strong>Actualizar</strong></button>
  </div>
</div>

    </body>
</html>