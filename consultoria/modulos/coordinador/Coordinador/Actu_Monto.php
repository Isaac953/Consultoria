<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Ofertas</title>
  </head>
    <body style="padding:15px;">
    
    <?php

include('../../../conexion/conexion.php');
$consulta="select * from Consultoria";
$resultado=sqlsrv_query($conexion,$consulta);

$id_oferta=$_POST['id'];

$query="select * from Ofertas O, Consultoria C where O.Codigoconsultoria=C.Codigoconsultoria and O.CodigoOferta = '$id_oferta';";
$params = array( array($id_oferta, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$ofer=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);
$presu=$ofer["Presupuesto"];

?>

<form accept-charset="utf-8" action="librerias/php/ModMonto/modificar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoOferta" value="<?php echo $ofer['CodigoOferta'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>OFERTAS</strong></p></h2></legend>
<h2 align="center" style="color:red; font-family: Verdana"><strong>Presupuesto de la Consultoria: <?php echo "$".$presu; ?></strong></h2>
<br>
<center><strong style="font-family: Verdana;">Llenar el campo Monto para asignarlo a una Oferta</strong></center>


<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label"></label>
  <div class="col-md-4">
  <input id="textinput" name="CodigoOferta" value="<?php echo $_POST['id'];?>"  type="hidden" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Consultoria:</label>
  
  <div class="col-md-4">
  <input type="text" name="lsConsultoria" style="font-family: Verdana;" disabled class='form-control' value="<?php echo $ofer['NombreConsultoria'];?>" >
  </div>


</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Nombre Empresa:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NombreEmpresa" style="font-family: Verdana;" disabled value="<?php echo $ofer['NombreEmpresa'];?>" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Nit:</label>  
  <div class="col-md-4">
  <input id="textinput" name="Nit" style="font-family: Verdana;" disabled value="<?php echo $ofer['Nit'];?>" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Telefono:</label>  
  <div class="col-md-4">
  <input id="textinput" name="Telefono" style="font-family: Verdana;" disabled value="<?php echo $ofer['Telefono'];?>" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Correo:</label>  
  <div class="col-md-4">
  <input id="textinput" name="Correo" style="font-family: Verdana;" disabled value="<?php echo $ofer['Correo'];?>" type="text" placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Monto:</label>  
  <div class="col-md-4">
  <input id="textinput" name="Monto" style="font-family: Verdana;" type="text" required placeholder="Escriba" class="form-control input-md">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" style="font-family: Verdana;" name="singlebutton" class="btn btn-primary"><Strong>Actualizar</Strong></button>
  </div>
</div>

    </body>
</html>