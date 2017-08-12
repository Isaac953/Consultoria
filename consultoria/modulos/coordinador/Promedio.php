<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Promedio de notas</title>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>

<?php
include('../../conexion/conexion.php');

$CodigoConsultoria = 6; // cambiar por $_RESQUES[]

$consulta="select * from Criterios C where  C.TipoCriterio='Evaluacion de Ofertas'";
$resultado=sqlsrv_query($conexion,$consulta);

$query = " SELECT DISTINCT(o.CodigoOferta), NombreEmpresa FROM EvaluacionOfertas e JOIN Ofertas o ON e.CodigoOferta = o.CodigoOferta where CodigoConsultoria = '$CodigoConsultoria';";  // Cambiar el 6 por el codigo de consultoria 
$resultado3=sqlsrv_query($conexion,$query);

?>

  <body>
  <legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>PROMEDIOS DE EVALUACION DE OFERTAS</strong></p></h2></legend>
        <br>
        <form action="librerias/php/EvaluacionIni/insertarEvaluaciones.php" method="post">
<br>
        <!--TABLA DE CRITERIOS-->
<table class="table table-bordered" align="center" border="2" style="width: 45%">
  <tbody>
    <tr>
      <th style="background-color: #17ACE5; color: white; font-family: Verdana; text-align: center;">CRITERIOS DE EVALUACION</th>
      <th style="background-color: #17ACE5; color: white; font-family: Verdana; text-align: center;">%</th>  
      <?php 
      while($fila5 = sqlsrv_fetch_array($resultado3,SQLSRV_FETCH_ASSOC)){
        echo "<th>   ".$fila5['NombreEmpresa']."      </th>";
      }
      ?>

    </tr>
    <!--AQUI VAN LOS CRITERIOS Y PARAMETROS-->
<?php
$resultado3=sqlsrv_query($conexion,$query);



 while($fila=sqlsrv_fetch_object($resultado) )
  {

    $idC=$fila->CodigoCriterio;
    echo "<tr><td  align='center' style='font-family: Verdana; text-align: center; background-color: #1BC66E; color:white;'><b>".$fila->Criterio."</b></td><td  align='center' style='font-family: Verdana; text-align: center; background-color: #1BC66E; color:white;'>"."<b>".$fila->Ponderacion*(100)."</b>"."%"."</td></tr>";
   

   //PARA LOS PARA
$consulta2="select * from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio and  P.CodigoCriterio='$idC';";
$resultado2=sqlsrv_query($conexion,$consulta2);

$var=0;
while($fila2=sqlsrv_fetch_object($resultado2) )
{
    echo "<tr><td align='left'><input type='hidden' name='parametro[]' value='$fila2->CodigoParametrosCriterios' size='1' />"."  ".$fila2->Parametro." </td> <td>".$fila2->Ponderacion*(100)."%"." </td>";


    $resultado3=sqlsrv_query($conexion,$query);

while($fila3 = sqlsrv_fetch_array($resultado3,SQLSRV_FETCH_ASSOC))
{
  $varId = $fila3['CodigoOferta'];

  $Query66="SELECT e.CodigoParametrosCriterios, o.CodigoOferta as oferta ,sum(Puntaje) as suma,Count(*) as cantidad,(Select Ponderacion from ParametrosCriterios where CodigoParametrosCriterios =  e.CodigoParametrosCriterios ) as ponderacion,(sum(Puntaje) /Count(*))*(Select Ponderacion from ParametrosCriterios where CodigoParametrosCriterios =  e.CodigoParametrosCriterios ) 
 FROM EvaluacionOfertas e JOIN Ofertas o ON e.CodigoOferta = o.CodigoOferta where e.CodigoParametrosCriterios='$fila2->CodigoParametrosCriterios' and  o.CodigoOferta=".$varId." and o.CodigoConsultoria = '$CodigoConsultoria' Group by  CodigoParametrosCriterios,o.CodigoOferta ;"; // Cambiar el 6 por el codigo de consultoria 

 

  $resultado4=sqlsrv_query($conexion,$Query66);
  

while($fila4 = sqlsrv_fetch_array( $resultado4, SQLSRV_FETCH_NUMERIC) ){
        //echo "<td>".$fila4[5]." $fila2->CodigoParametrosCriterios' ".$fila3['CodigoOferta']."</td></tr>";
        echo "<td> ".$fila4[5]." </td>";
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
        echo "<td> ".$fila7[0]." </td>";
      }
}

?>
</tr>

    <tr>
      <th>Escala de Evaluación 1 al 10</th>
      <th colspan="3" align="center"><b><?php echo date("m/d/Y") ?></b></th>
    </tr>
  </tbody>
</table>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana;" class="btn btn-primary"><strong>Imprimir</strong></button>
  </div>
</div>  
</form> 

    </body>
</html>