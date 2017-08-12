<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Parametros</title>
  </head>
    <body style="padding:15px;">
    
<?php
include('../../../conexion/conexion.php');

$id_parametroscriterios=$_POST['id'];
$query="select C.CodigoCriterio, p.CodigoParametrosCriterios, p.Parametro, p.Ponderacion as pondeP, C.Ponderacion as pondeC from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio and P.CodigoParametrosCriterios = ?";
$params = array( array($id_parametroscriterios, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$par=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

$idcrit=$par["CodigoCriterio"];
//echo $idcrit;

/*logica para recuperar el maximo*/
 $consultaMaximo = "select ((c.Ponderacion - sum(p.Ponderacion))*100) as maximo , c.Ponderacion as pondeC from ParametrosCriterios p, criterios c where p.CodigoCriterio=c.CodigoCriterio and c.CodigoCriterio
= '$idcrit' group by c.Ponderacion"; 
  $maximocon = sqlsrv_query($conexion, $consultaMaximo);
  while($fila=sqlsrv_fetch_array($maximocon) )
  {
    $maximo=($fila["maximo"]/$fila["pondeC"]);
    $pondeC=$fila["pondeC"];
  }

//echo "<br>maximo: ".$maximo;
//echo "<br>Ponderacion criterio: ".$pondeC;

//ponderacion convertida
$ponderConvert=($par['pondeP']/$par['pondeC'])*(100);

//calculando el maximo, teniendo en cuenta sumar el valor actual
//de la ponderacion del parametro
$maximoSumado=$maximo+$ponderConvert;
//echo "<br>".$maximoSumado;

?>

<form accept-charset="utf-8" action="librerias/php/Parametros/modificar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="txtIdParametro" value="<?php echo $par['CodigoParametrosCriterios'];?>"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>PARAMETROS DE EVALUACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar una Parametro de Evaluación</strong></center>
  <input type="text" hidden id="caja" name="caja">

  <br>
<br>

<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Id de Parametro:</label>  
  <div class="col-md-4">
  <input id="textinput"  value="<?php echo $_POST['id'];?>" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" disabled>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre Parametro:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NParametro" value="<?php echo $par['Parametro'];?>" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Asigne Ponderación:</label>  
  <div class="col-md-4">
  <input id="textinput" name="ponderacion" value="<?php echo $ponderConvert; ?>" style="font-family: Verdana;" type="number" min="1" max="<?php echo $maximoSumado; ?>"  placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana;" class="btn btn-primary"><Strong>Actualizar</Strong></button>
  </div>
</div>

    </body>
</html>