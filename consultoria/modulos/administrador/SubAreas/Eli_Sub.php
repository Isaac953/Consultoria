<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Areas</title>

  </head>
    <body style="padding:15px;">  

<?php
include('../../../conexion/conexion.php');

$id_subarea=$_POST['id'];

$query="select  * from SubArea S, AreaEspecializacion A where S.CodigoArea=A.CodigoArea and S.CodigoSubArea = ?";

$params = array( array($id_subarea, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$sub=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

?>

<form accept-charset="utf-8" action="librerias/php/SubAreas/eliminar.php" name="formulario" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="id" value="<?php echo $sub['CodigoSubArea'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>SUB-AREAS DE ESPECIALIZACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana; color: #DC143C">¿Esta seguro que desea eliminar esta Sub Área de Especialización?</strong></center>

<br>
<br>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre Sub Área:</label>  
  <div class="col-md-4">
  <input id="textinput" name="AreaEspecializacion" style="font-family: Verdana;" disabled value="<?php echo $sub['SubArea'];?>" type="text" placeholder="Escriba" class="form-control input-md">
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