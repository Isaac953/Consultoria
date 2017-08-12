<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="UTF-8">
    <title>Oficina</title>
	</head>
    <body style="padding:15px;">
    
    <?php

include('../../../conexion/conexion.php');

$id_oficina=$_POST['id'];
$query="select * from Oficinas where CodigoOficina = ?";

$params = array( array($id_oficina, SQLSRV_PARAM_IN));

$resultado=sqlsrv_query($conexion,$query,$params);
$ofi=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);



?>
<form accept-charset="utf-8" action="librerias/php/Oficinas/eliminar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="id" value="<?php echo $ofi['CodigoOficina'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>OFICINA</strong></p></h2></legend>

<center><strong style="font-family: Verdana; color: #DC143C">¿Esta seguro que desea eliminar esta Oficina?</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre de Oficina:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NombreOficina" style="font-family: Verdana;" disabled value="<?php echo $ofi['NombreOficina'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana;width: 15%" class="btn btn-primary"><strong>Si</strong></button> &nbsp;&nbsp;&nbsp;&nbsp;

        <a href="principal.php" id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana; width: 15%" class="btn btn-primary"><strong>No</strong></a>
  </div>
</div>

    </body>
</html>