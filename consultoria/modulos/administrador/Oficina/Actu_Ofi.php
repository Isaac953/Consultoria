<?php

include('../../../conexion/conexion.php');

$id_oficina=$_POST['id'];

$query="select * from Oficinas where CodigoOficina = ?";

$params = array( array($id_oficina, SQLSRV_PARAM_IN));

$resultado=sqlsrv_query($conexion,$query,$params);
$ofi=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
?>

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
<form accept-charset="utf-8" action="librerias/php/Oficinas/modificar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoOficina" value="<?php echo $ofi['CodigoOficina'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>OFICINA</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar una Oficina</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Id Oficina:</label>  
  <div class="col-md-4">
  <input id="textinput" name="CodigoOficina" style="font-family: Verdana;" value="<?php echo $_POST['id'];?>" type="text" placeholder="Escriba" class="form-control input-md" disabled>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Nombre de Oficina:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NombreOficina" style="font-family: Verdana;" value="<?php echo $ofi['NombreOficina'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
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
