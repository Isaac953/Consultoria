<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Promedio de notas</title>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   
    </head>
<?php
include('../../../conexion/conexion.php');

$CodigoConsultoria = $_POST["id"]; // cambiar por $_RESQUES[]
//$CodigoConsultoria=1;
$queryconsul="select C.NombreConsultoria from Consultoria C where C.Codigoconsultoria ='$CodigoConsultoria';";
$resulconsul=sqlsrv_query($conexion,$queryconsul);

      while($filaC = sqlsrv_fetch_array($resulconsul,SQLSRV_FETCH_ASSOC))
      {
      $nombrecon =$filaC['NombreConsultoria'];
      }

/*$consulta="select distinct(c.CodigoCriterio), c.Criterio, c.TipoCriterio, c.Ponderacion from Criterios c join ParametrosCriterios p
on c.CodigoCriterio=p.CodigoCriterio
and  c.TipoCriterio='Evaluacion de Ofertas'";
*/

$consulta = "select distinct(c.CodigoCriterio), c.Criterio, c.TipoCriterio, c.Ponderacion from Criterios c 
join ParametrosCriterios p on c.CodigoCriterio=p.CodigoCriterio
join EvaluacionOfertas ev on ev.CodigoParametrosCriterios= p.CodigoParametrosCriterios
join Ofertas o on o.CodigoOferta=ev.CodigoOferta
join Asignacion a on a.CodigoAsignacion=ev.CodigoAsignacion
join Consultoria co on co.Codigoconsultoria=a.Codigoconsultoria
join Personal pr on a.CodigoPersonal=pr.CodigoPersonal
and  c.TipoCriterio='Evaluacion de Ofertas' and co.Codigoconsultoria = '$CodigoConsultoria' ";
$resultado=sqlsrv_query($conexion,$consulta);



$query = " SELECT DISTINCT(o.CodigoOferta), NombreEmpresa FROM EvaluacionOfertas e JOIN Ofertas o ON e.CodigoOferta = o.CodigoOferta where CodigoConsultoria = '$CodigoConsultoria';";  // Cambiar el 6 por el codigo de consultoria 
$resultado3=sqlsrv_query($conexion,$query);

?>

  <body onload="ventanaBienvenida()" onunload="ventanaDespedida()">


  <legend><h2 align=center><p style="font-family: Verdana; color:#027BF6"><strong>PROMEDIOS DE EVALUACIÓN DE OFERTAS</strong></p></h2></legend>

        <br>
        <h2 align="center" style="font-family: Verdana;"><strong>Consultoria: <?php echo " ".$nombrecon; ?></strong></h2>
        <form >
<br>
        <!--TABLA DE CRITERIOS-->
<table align="center" border="1" class="table table-bordered" style="width: 50%">
  <tbody>
    <tr>
      <th style="font-family: Verdana; text-align: center; background: #0072bb; color: white;">CRITERIOS DE EVALUACIÓN</th>
      <th style="font-family: Verdana; text-align: center; background: #0072bb; color: white;">%</th>  
      <?php 
      while($fila5 = sqlsrv_fetch_array($resultado3,SQLSRV_FETCH_ASSOC)){
        echo "<th style='font-family: Verdana; text-align: center; background: #0072bb; color: white;'>".$fila5['NombreEmpresa']."      </th>";
      }
      ?>
    </tr>
    <!--AQUI VAN LOS CRITERIOS Y PARAMETROS-->
<?php
$resultado3=sqlsrv_query($conexion,$query);



 while($fila=sqlsrv_fetch_object($resultado) )
  {

    $idC=$fila->CodigoCriterio;
    echo "<tr><td align='center' style='font-family: Verdana; text-align: center; background-color: #0072bb; color:white;' class='enc'><b>".$fila->Criterio."</b></td><td class='enc' style='font-family: Verdana; text-align: center; background-color: #0072bb; color:white; text-align: center;'>"."<b>".$fila->Ponderacion*(100)."</b>"."%"."</td></tr>";
   

   //PARA LOS PARA
//$consulta2="select * from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio and  P.CodigoCriterio='$idC';";
$consulta2="select C.Criterio, P.Parametro, P.Ponderacion as pondeP, C.Ponderacion as pondeC,  P.CodigoParametrosCriterios from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio
and C.CodigoCriterio = '$idC';";

$resultado2=sqlsrv_query($conexion,$consulta2);

$var=0;
while($fila2=sqlsrv_fetch_object($resultado2) )
{
    echo "<tr><td align='left'><input type='hidden' name='parametro[]' value='$fila2->CodigoParametrosCriterios' size='1' />"."  ".$fila2->Parametro." </td> <td style='text-align: center;'>".$fila2->pondeP*(100)."%"." </td>";


    $resultado3=sqlsrv_query($conexion,$query);

while($fila3 = sqlsrv_fetch_array($resultado3,SQLSRV_FETCH_ASSOC))
{
  $varId = $fila3['CodigoOferta'];

  $Query66="SELECT e.CodigoParametrosCriterios, o.CodigoOferta as oferta ,sum(Puntaje) as suma,Count(*) as cantidad,(Select Ponderacion from ParametrosCriterios where CodigoParametrosCriterios =  e.CodigoParametrosCriterios ) as ponderacion,(sum(Puntaje) /Count(*))*(Select Ponderacion from ParametrosCriterios where CodigoParametrosCriterios =  e.CodigoParametrosCriterios ) 
 FROM EvaluacionOfertas e JOIN Ofertas o ON e.CodigoOferta = o.CodigoOferta where e.CodigoParametrosCriterios='$fila2->CodigoParametrosCriterios' and  o.CodigoOferta=".$varId." and o.CodigoConsultoria = '$CodigoConsultoria' Group by  CodigoParametrosCriterios,o.CodigoOferta ;"; // Cambiar el 6 por el codigo de consultoria 

 

  $resultado4=sqlsrv_query($conexion,$Query66);
  

while($fila4 = sqlsrv_fetch_array( $resultado4, SQLSRV_FETCH_NUMERIC) ){
        //echo "<td>".$fila4[5]." $fila2->CodigoParametrosCriterios' ".$fila3['CodigoOferta']."</td></tr>";
        echo "<td style='text-align:center'> ".ROUND($fila4[5],2)." </td>";
        //echo "<td>".$fila4[5]."</td></tr>";
     }
  }
}
}
$resultado9=sqlsrv_query($conexion,$query);

echo "</tr><tr><td><td>";

 while($fila6 = sqlsrv_fetch_array($resultado9,SQLSRV_FETCH_NUMERIC))
 {
  $varId2 = $fila6[0];

      $query77 = "exec promedio '$varId2', '$CodigoConsultoria';"; // Cambiar el 6 por el codigo de consultoria 
      $resultado5=sqlsrv_query($conexion,$query77);

    while($fila7 = sqlsrv_fetch_array($resultado5,SQLSRV_FETCH_NUMERIC))
      {
        
    //$array[] = $fila7[0];
  $Valoresarray[]=$fila7[0];
//echo "<td style='text-align:center'><b id='ganador'>".ROUND($fila7[0],2)."</b> </td>";
       }
       // $resultado = sizeof($array);


      }
        $mayor=max($Valoresarray);
      foreach ($Valoresarray as $key => $value) 
{
  # code...
    if ($value ==$mayor)  //comparamos si es igual el valor del areglo a mayor que imprima el color
     {

if ($mayor >= 7)
{
 echo "<td align='center'><p style='background:lime'>".ROUND($mayor,2)."</p><b>Ganador</b></td>";
}

if ($mayor < 7)
 {
 echo "<td align='center'><p style='background:red'>".ROUND($mayor,2)."</p><b>Ganador</b></td>"; 
}
    
     }
     //aqui le puedes cambar el color a una celda de una tabla
    else
    {
    echo "<td align='center'>".ROUND($value, 2)."</td>";
    }
}

/*      for($i=0; $i<$resultado; $i++)
      {    
      //saco el valor de cada elemento

        echo "<td>".$array[$i]."</td>";

        }

*/
      


?>
</tr>

    <tr>
      <th style="text-align: center; background-color:  #0072bb; color:white;">Escala de Evaluación 1 al 10</th>
      <th style="text-align: center;" colspan="3" align="center"><b><?php echo date("m/d/Y") ?></b></th>
    </tr>
  </tbody>
</table>

</form> 
    </body>
</html>