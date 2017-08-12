<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Criterios</title>
  </head>
    <body style="padding:15px;">
    
      <?php
include('../../../conexion/conexion.php');

$id_criterio=$_POST['id'];
$query="select * from Criterios where CodigoCriterio = ?";

$params = array( array($id_criterio, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$cri=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

//obteniendo el tipo de criterio
$tipocrit=$cri["TipoCriterio"];

//obteniendo la ponderacion del criterio
$pondecr=$cri["Ponderacion"]*(100);
//echo $tipocrit;
//echo "<br>ponderacion: ".$pondecr;

$consultaCriterios="select ((1-sum(Ponderacion))*100) as maximo from Criterios where  TipoCriterio='$tipocrit' and Estadoc = 1;";
$resultadoCriterios=sqlsrv_query($conexion,$consultaCriterios);
$cont=sqlsrv_fetch_array($resultadoCriterios,SQLSRV_FETCH_ASSOC);
$maxc=$cont['maximo'];

//calculando el maximo sumado
$maximoSumado=$maxc+$pondecr;
//echo "<br>maximo para criterios: ".$maxc;
//echo "<br>maximo sumado: ".$maximoSumado;


?>

<form accept-charset="utf-8" action="librerias/php/Criterios/modificar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="txtsuma" value="<?php echo $maximoSumado
; ?>">
<input type="hidden" name="txtIdCriterio" value="<?php echo $cri['CodigoCriterio'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CRITERIOS DE EVALUACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar un Criterio de Evaluación</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Id de Criterio:</label>  
  <div class="col-md-4">
  <input id="textinput" name="txtIdCriterio" style="font-family: Verdana;" value="<?php echo $_POST['id'];?>" type="text" placeholder="Escriba" class="form-control input-md" disabled>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre Criterio:</label>  
  <div class="col-md-4">
  <input  id="crit" name="CNombre" style="font-family: Verdana;" value="<?php echo $cri['Criterio'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Asigne Ponderación:</label>  
  <div class="col-md-4">
  <input id="pon" name="CPonderacion" style="font-family: Verdana;" value="<?php echo $cri['Ponderacion']*(100);?>" type="number"  min="1" max="<?php echo $maximoSumado; ?>" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<br>

<center>
  <p style="font-family: Verdana; color:#DC143C">Desea desactivar este Criterio (Opcional):</p>
</center>

<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Estado:</label>
  <div class="col-md-4">

<script type="text/javascript">
  function validar()
  {
    var opcion=document.getElementById("lsEs").value;

if (opcion==1)
 {
  document.getElementById('crit').removeAttribute("readonly");
document.getElementById('pon').removeAttribute("readonly");
 }

      if (opcion == 0)
     {
document.getElementById('crit').setAttribute("readonly", "readonly");
document.getElementById('pon').setAttribute("readonly", "readonly");

     }
  }
</script>
    <select id="lsEs" name="lsEstado" style="font-family: Verdana;" onchange="validar()" class="form-control" required>
      <option value="1">Activo
     </option>
      <option value="0">Inactivo</option>
    </select>
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