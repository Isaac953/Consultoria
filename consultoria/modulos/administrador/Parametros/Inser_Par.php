<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Parametros</title>

  <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  box-sizing: border-box;
}

.tablap {
  width: 100%;
  max-width: 600px;
  height: 320px;
  border-collapse: collapse;
  border: 1px solid #38678f;
  background: white;
}
.cabeza {
  background: steelblue;
  height: 30px;
  width: 25%;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  border: 1px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
  text-align: center;
}
tr {
  border-bottom: 1px solid #cccccc;
}
tr:last-child 
{
  border-bottom: 0px;
}
td 
{
    height: 30px;

  border-right: 1px solid #cccccc;
  padding: 10px;
  transition: all 0.2s;
}

    </style>



  </head>
    <body style="padding:15px;">
    
<?php
include('../../../conexion/conexion.php');
$consulta="select * from Criterios where TipoCriterio = 'Evaluacion de Ofertas' and Estadoc = 1;";
$resultado=sqlsrv_query($conexion,$consulta);


  $strConsultaArea = "select * from Criterios where Estadoc = 1"; 
  $consultaAreas = sqlsrv_query($conexion, $strConsultaArea);
  $opcionesAreas = '<option value=""> Elija un Criterio</option>';
  while($fila=sqlsrv_fetch_object($consultaAreas) )
  {
    $opcionesAreas.='<option value="'.$fila->CodigoCriterio.'">'.$fila->Criterio.'</option>';
  }


//he seteado el valor del criterio

//logica para los porcentajes de los criterios
/*
select c.Criterio, ((c.Ponderacion - sum(p.Ponderacion))*100) as maximo, c.Ponderacion as pondeC
from ParametrosCriterios p right join criterios c on p.CodigoCriterio=c.CodigoCriterio 
group by c.Ponderacion, c.Criterio

*/
/*$consul="
select c.Criterio, ((c.Ponderacion - sum(p.Ponderacion))*100) as maximo, c.Ponderacion as pondeC
from ParametrosCriterios p, criterios c where p.CodigoCriterio=c.CodigoCriterio 
group by c.Ponderacion, c.Criterio;";
*/

$consul="
select c.Criterio, ((c.Ponderacion - sum(p.Ponderacion))*100) as maximo, c.Ponderacion as pondeC
from ParametrosCriterios p right join criterios c on p.CodigoCriterio=c.CodigoCriterio where c.EstadoC = 1
group by c.Ponderacion, c.Criterio;";
   $consultaParam = sqlsrv_query($conexion, $consul);



?>



<form accept-charset="utf-8" action="librerias/php/Parametros/insertar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoParametrosCriterios" />


<fieldset>


<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>PARAMETROS DE EVALUACIÓN</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para registrar una Parametro de Evaluación</strong></center>
  <input type="text" hidden id="caja" name="caja">

  <br>
<br>
<!--<table align="center" border="1" class="tablap">
  <tr>
    <th align="center" class="cabeza">Criterio</th>
    <th align="center" class="cabeza">Porcentaje restante</th>
  </tr>-->
    <?php 
     while($filaP=sqlsrv_fetch_object($consultaParam) )
  {
    $maxp=$filaP->maximo;
    $pondeC=$filaP->pondeC;


    $ponF=($maxp/$pondeC);
    
    $ver=0;
    if ($ponF==0)
    {
      $ver=100;
    }
    else if ($ponF!=0)
    {
      $ver=($maxp/$pondeC);
    }

 


 //echo "<tr><td>".$filaP->Criterio."</td><td align='center'>".$ver."%"."</td></tr>";
  }
     ?>
<!--</table>-->
<br>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Criterios de Evaluación:</label>
  <div class="col-md-4">
  <select name='lsVerCriterios'  style="font-family: Verdana;" id="idcrite" class='form-control' required onchange="recuperar
  ()">
<?php 
echo $opcionesAreas;
 ?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Nombre Parametro:</label>  
  <div class="col-md-4">
  <input id="textinput" name="NParametro" type="text" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Asigne Ponderación:</label>  
  <div class="col-md-4">

<input id="textinput" name="ponderacion" style="font-family: Verdana;" type="number" min="1"  placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" style="font-family: Verdana;" name="singlebutton" class="btn btn-primary"><Strong>Guardar</Strong></button>
  </div>
</div>

    </body>
</html>