<?php 
   // $fecha1 = new DateTime('2015-11-04'); //fecha planificada
   // $fecha2 = new DateTime('2015-11-01'); //fecha entrega

    //$fecha1 = new DateTime('2017-03-29'); //fecha planificada
    //$fecha2 = new DateTime('2017-03-30'); //fecha entrega

$retraso='';

$fechaPlanificada = new DateTime('2017-03-31');
$fechaEntrega = new DateTime('2017-03-29');

if ($fechaEntrega > $fechaPlanificada) 
{
 $intervalo = $fechaPlanificada ->diff($fechaEntrega);
$retraso = $intervalo ->format('%R%a días de retraso')."\n\r";  
}

if ($fechaPlanificada > $fechaEntrega) 
{
 $intervalo = $fechaEntrega ->diff($fechaPlanificada);
$retraso = $intervalo ->format('%R%a días para entregar')."\n\r";  
}

if ($fechaPlanificada ==  $fechaEntrega) 
{
$retraso = "Entrega A tiempo";  
}

//echo $intervalo ->format('%R%a días')."\n\r";  

echo $retraso;
  


   /* $intervalo = $fechaPlanificada ->diff($fechaEntrega, true);
    echo $intervalo ->format('%R%a días');
*/
 ?>