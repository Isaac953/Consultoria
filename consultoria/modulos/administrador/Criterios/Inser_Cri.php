
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

$consultaCriterios="select ((1-sum(Ponderacion))*100) as maximo from Criterios where  TipoCriterio='Evaluacion de Ofertas' and Estadoc = 1;";
$resultadoCriterios=sqlsrv_query($conexion,$consultaCriterios);
$cont=sqlsrv_fetch_array($resultadoCriterios,SQLSRV_FETCH_ASSOC);
$maxc=$cont['maximo'];


$consultaCriteriosCon="select ((1-sum(Ponderacion))*100) as maximo from Criterios where  TipoCriterio='Evaluacion de Consultoria' and Estadoc = 1;";
$resultadoCriteriosCon=sqlsrv_query($conexion,$consultaCriteriosCon);
$contCon=sqlsrv_fetch_array($resultadoCriteriosCon,SQLSRV_FETCH_ASSOC);
$maxCon=$contCon['maximo'];

$oferta=null;
$consul=null;

if (is_null($maxc))
{
$oferta='Porcentaje: '.'100%';
}

elseif (!is_null($maxc))
{
$oferta=$maxc;
}

if (is_null($maxCon))
{
$consul='Porcentaje: '.'100%';
}

elseif (!is_null($maxCon))
{
$consul=$maxCon;
}

?>
<br>
<p align="center" style="font-family: Verdana; color:red" >Porcentajes restantes segun criterios</p>
<p align="center" style="font-family: Verdana; color:red" > <?php echo "Criterios Oferta: ".$oferta."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Criterios Consultoria: ".$consul;?> </p>
<!-- Text input-->
<br>

<form accept-charset="utf-8" action="librerias/php/Criterios/insertar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="txtIdCriterio"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CRITERIOS DE EVALUACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para registrar un Criterio de Evaluación</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Nombre Criterio:</label>  
  <div class="col-md-4">
  <input id="textinput" name="CNombre" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Tipo Criterio:</label>
  <div class="col-md-4">
    <select id="selectbasic" style="font-family: Verdana;" name="lsCriterios" class="form-control" required>
      <option value="Evaluacion de Ofertas">Evaluación de Ofertas</option>
      <option value="Evaluacion de Consultoria">Evaluación de Consultoria</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Asigne Ponderación:</label>  
  <div class="col-md-4">
  <input id="textinput" name="CPonderacion" min="1"   type="number" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana;" class="btn btn-primary"><strong>Guardar</strong></button>
  </div>
</div>

    </body>
</html>