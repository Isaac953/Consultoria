<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Contrato</title>
  </head>
    <body style="padding:15px;">
    
    <?php
    include('../../../conexion/conexion.php');
$consulta="select * from Consultoria";
$resultado=sqlsrv_query($conexion,$consulta);
$consulta2="select * from Empresa";
$resultado2=sqlsrv_query($conexion,$consulta2);

$id_contrato=$_POST['id'];

$query="select * from Contrato C, EmpresaPersona E, Consultoria CS where C.CodigoEmpresa=E.CodigoEmpresa and C.Codigoconsultoria=CS.Codigoconsultoria and C.CodigoContrato = ?";

$params = array( array($id_contrato, SQLSRV_PARAM_IN));

$resultado3=sqlsrv_query($conexion,$query,$params);
$cont=sqlsrv_fetch_array($resultado3,SQLSRV_FETCH_ASSOC);

?>

<form accept-charset="utf-8" action="librerias/php/Contrato/eliminar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="id" value="<?php echo $cont['CodigoContrato'];?>"/>
<fieldset>

<!-- Form Name -->

<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONTRATO</strong></p></h2></legend>

<center><strong style="font-family: Verdana; color: #DC143C">¿Esta seguro que desea eliminar este Contrato?</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Empresa:</label>  
  <div class="col-md-4">
  <select name='lsEmpresa' class='form-control' required disabled>
  <option selected value="<?php echo $cont['CodigoEmpresa'];?>"><?php echo $cont['NombreEmpresa'];?>
    
  </option>
  <?php

  while ($row2=sqlsrv_fetch_object($resultado2))
  {
  
  echo "<option   value='$row2->CodigoEmpresa'>",$row2->NombreEmpresa,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Consultoria:</label>  
  <div class="col-md-4">
  <select name='lsConsultoria' class='form-control' required disabled>
  <option selected value="<?php echo $cont['Codigoconsultoria'];?>"><?php echo $cont['NombreConsultoria'];?>
    
  </option>
  <?php

  while ($row2=sqlsrv_fetch_object($resultado2))
  {
  
  echo "<option value='$row->Codigoconsultoria'>",$row2->NombreConsultoria,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Fecha de Inicio:</label>  
  <div class="col-md-4">
  <input id="textinput" disabled name="FechaInicio" value="<?PHP echo date ("Y-m-d");?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Fecha de Fin:</label>  
  <div class="col-md-4">
  <input id="textinput" disabled name="FechaFin" value="<?PHP echo date("Y-m-d");?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Estatus:</label>  
  <div class="col-md-4">
  <input id="textinput" disabled name="Estatus" value="<?php echo $cont['Estatus'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Monto Ofertado:</label>  
  <div class="col-md-4">
  <input id="textinput" disabled name="montoOfertado" value="<?php echo $cont['montoOfertado'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
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
