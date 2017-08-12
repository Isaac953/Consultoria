<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Criterios</title>
  </head>
    <body style="padding:15px;">
    
      <?php
include('../../../conexion/conexion.php');
$consulta="select * from AreaEspecializacion";
$resultado=sqlsrv_query($conexion,$consulta);

$id_criterio=$_POST['id'];

$query="select * from Criterios where CodigoCriterio = ?";

$params = array( array($id_criterio, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$cri=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

?>

<form accept-charset="utf-8" action="librerias/php/Criterios/eliminar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="id" value="<?php echo $cri['CodigoCriterio'];?>"/>
<fieldset>

<!-- Form Name -->

<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CRITERIOS DE EVALUACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana; color: #DC143C">¿Esta seguro que desea eliminar este criterio de evaluación?</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Nombre Criterio:</label>  
  <div class="col-md-4">
  <input id="textinput" name="CNombre" disabled value="<?php echo $cri['Criterio'];?>" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Tipo Criterio:</label>
  <div class="col-md-4">
    <select id="selectbasic" disabled name="lsCriterios" style="font-family: Verdana;" class="form-control" required>
      <option value="Evaluación de Ofertas">Evaluación de Ofertas</option>
      <option value="Evaluación de Consultoria">Evaluación de Consultoria</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Asigne Ponderación:</label>  
  <div class="col-md-4">
  <input id="textinput" name="CPonderacion" style="font-family: Verdana;" disabled value="<?php echo $cri['Ponderacion'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
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