<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Parametros</title>
  </head>
    <body style="padding:15px;">
    
<?php
include('../../../conexion/conexion.php');
$consulta="select * from Criterios";
$resultado=sqlsrv_query($conexion,$consulta);

$id_parametroscriterios=$_POST['id'];

$query="select * from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio and P.CodigoParametrosCriterios = ?";

$params = array( array($id_parametroscriterios, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$par=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

?>

<form accept-charset="utf-8" action="librerias/php/Parametros/eliminar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="id" value="<?php echo $par['CodigoParametrosCriterios'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>PARAMETROS DE EVALUACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana; color: #DC143C">¿Esta seguro que desea eliminar este Parametro de evaluación?</strong></center>

<br>
<br>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Criterios de Evaluación:</label>
  <div class="col-md-4">
  <select name='lsVerCriterios' style="font-family: Verdana;" disabled class='form-control' required>
  <option selected value="<?php echo $par['CodigoCriterio'];?>"><?php echo $par['Criterio'];?>
    
  </option>
  <?php

  while ($row=sqlsrv_fetch_object($resultado))
  {
  
  echo "<option  <option  value='$row->CodigoCriterio'>",$row->Criterio,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre Parametro:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NParametro" style="font-family: Verdana;" disabled value="<?php echo $par['Parametro'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Asigne Ponderación:</label>  
  <div class="col-md-4">
  <input id="textinput" name="ponderacion" style="font-family: Verdana;" disabled value="<?php echo $par['Ponderacion'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
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