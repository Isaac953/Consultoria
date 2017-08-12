<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>

<?php
include('conexion.php');

$consulta="select * from Criterios C where  C.TipoCriterio='Evaluacion de Consultoria'";
$resultado=sqlsrv_query($conexion,$consulta);

$idcontrato=$_POST["valorCaja1"];
$id=$_POST["valorCaja2"];
$idpersonal=$_SESSION['id_usuario'];

//echo $id2;
//echo $id;

$consult="select * from Consultoria c, Contrato ct where ct.Codigoconsultoria=c.Codigoconsultoria and ct.CodigoContrato = '$idcontrato';";
$resultConsult=sqlsrv_query($conexion,$consult);

//$cont=sqlsrv_fetch_array($resultConsult,SQLSRV_FETCH_ASSOC);

//$idconsulto=$cont["Codigoconsultoria"];
//echo "<br>codigo consultoria: ".$idconsulto;
//$resultado2=sqlsrv_query($conexion,$query,$params);
//$cri=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

?>

	<body>
<?php 

while($fila3=sqlsrv_fetch_object($resultConsult) )
  {
    $nomConsultoria=$fila3->NombreConsultoria;
  }

 ?>

<legend><h2 align=center><p style="font-family: Verdana; color:#027BF6"><strong>PUNTUACIONES DE EVALUACIÓN</strong></p></h2></legend>

<h3 align="center"><Strong>CONSULTORIA: <?php echo " ".$nomConsultoria; ?> </Strong> </h3>


        <br>
<br>


             <table align="center" border="1" class="table table-bordered" style="width: 50%">
  <tbody>
 
    <tr>
<th style="font-family: Verdana; text-align: center; background: #0072bb; color: white;">CRITERIOS DE EVALUACIÓN</th>
      <th style="font-family: Verdana; text-align: center; background: #0072bb; color: white;">%</th>  
      <th style="font-family: Verdana; text-align: center; background: #0072bb; color: white;">Notas</th> 

    </tr>

    <!--AQUI VAN LOS CRITERIOS Y PARAMETROS-->
<?php
//consulta a ocupar para el historial de evaluaciones

 while($fila=sqlsrv_fetch_object($resultado) )
  {

    $idC=$fila->CodigoCriterio;
    echo "<tr><td align='center' style='font-family: Verdana; text-align: center; background-color: #0072bb; color:white;' class='enc''><b>".$fila->Criterio."</b></td><td>"."<b>".$fila->Ponderacion*(100)."</b>"."%"."</td><td></td></tr>";
   
$consulta2="select cr.CodigoCriterio, p.CodigoParametrosCriterios, cr.Ponderacion as pondeC, p.Ponderacion as pondeP,
cr.Criterio, p.Parametro, e.Puntaje as puntajeP
from Consultoria c, Contrato ct, EvaluacionFinalConsultoria e, ParametrosCriterios p, Criterios cr, Personal pr
where c.Codigoconsultoria=ct.Codigoconsultoria
and ct.CodigoContrato=e.CodigoContrato
and e.CodigoParametrosCriterios=p.CodigoParametrosCriterios
and p.CodigoCriterio=cr.CodigoCriterio
and e.CodigoPersonal=pr.CodigoPersonal
and e.CodigoPersonal='$idpersonal' and p.CodigoCriterio = '$idC' and ct.CodigoContrato = '$idcontrato';

   ";

   //PARA LOS PARA
    /*$consulta2="select * from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio and  P.CodigoCriterio='$idC';";
*/
    $resultado2=sqlsrv_query($conexion,$consulta2);
     while($fila2=sqlsrv_fetch_object($resultado2) )
     {

echo "<tr><td align='left'><input type='hidden' name='parametro[]' value='$fila2->CodigoParametrosCriterios' size='1' />"." ".$fila2->Parametro."</td><td>".$fila2->pondeP*(100)."%"."</td>";
  echo "<td><input type='number' class='form-control input-md' required placeholder='puntaje' name='puntaje[]' style='text-align:center; pointer-events:none' value='$fila2->puntajeP' min='1' max='10' size='2' /></td>
  </tr>";
     
     }
  }
?>

    <tr>
      <th style="text-align: center; background-color:  #0072bb; color:white;">Escala de Evaluación 1 al 10</th>
      <th style="text-align: center;" colspan="3" align="center"><b>Fecha: <?php echo ' '.date("m/d/Y") ?></b></th>
    </tr>
  </tbody>
</table>
    
    </body>
</html>