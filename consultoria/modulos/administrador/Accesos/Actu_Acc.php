<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Opciones</title>
  </head>
    <body style="padding:15px;">
    
      <?php
include('../../../conexion/conexion.php');

$id_acceso=$_POST['id'];

$query="select * from Accesos A where A.CodigoAcceso = ?";

$params = array( array($id_acceso, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$acc=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

?>

<form accept-charset="utf-8" action="librerias/php/Accesos/modificar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="idAcceso"  value="<?php echo $acc['CodigoAcceso'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>ACCESOS</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar un Acceso</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Id de Acceso:</label>  
  <div class="col-md-4">
  <input id="textinput" name="idAcceso" style="font-family: Verdana;" value="<?php echo $_POST['id'];?>" type="text" placeholder="Escriba" class="form-control input-md" disabled>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Nombre de Acceso:</label>  
  <div class="col-md-4">
  <input id="textinput" name="nombreAcceso" style="font-family: Verdana;" value="<?php echo $acc['TituloAcceso'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" style="font-family: Verdana;" name="singlebutton" class="btn btn-primary"><strong>Actualizar</strong></button>
  </div>
</div>

    </body>
</html>