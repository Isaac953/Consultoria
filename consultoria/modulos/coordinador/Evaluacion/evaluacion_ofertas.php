<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Evaluacion Inicial</title>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="../../../librerias/css/bootstrap.min.css" class="rel">
<link rel="stylesheet" href="../../../librerias/css/bootstrap-theme.min.css" class="href">
<link rel="stylesheet" href="../../../librerias/css/estilo.css">
</head>

<?php
include('conexion.php');

$consulta="select * from Criterios C where  C.TipoCriterio='Evaluacion de Ofertas'";
$resultado=sqlsrv_query($conexion,$consulta);

$id=$_POST["valorCaja1"];
$id2=$_POST["valorCaja2"];



$query="select * from Ofertas O, Consultoria C where O.Codigoconsultoria=C.Codigoconsultoria and O.CodigoOferta = ?";

$params = array( array($id, SQLSRV_PARAM_IN), array($id2, SQLSRV_PARAM_IN));

$resultado2=sqlsrv_query($conexion,$query,$params);
$cri=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

?>

	<body>

<h1 align="center" style="color:#0072bb">EVALUACION DE OFERTAS</h1>

        <br>
        <form action="insertarEvaluaciones.php" method="post">
<br>
        <!--TABLA DE CRITERIOS-->
    <center>
    oferta<input type="text" size="2"  name="codOferta"  value="<?php echo $id; ?>"/>
    asignacion<input type="text" size="2"  name="codAsignacion"  value="<?php echo $id2;?>"/>

    </center>
             <table class="t2" align="center" border="1">
  <tbody>
 
    <tr>
      <th>CRITERIOS DE EVALUACION</th>
      <th>%</th>  
      <th align="center">Notas</th> 

    </tr>

    <!--AQUI VAN LOS CRITERIOS Y PARAMETROS-->
<?php
 while($fila=sqlsrv_fetch_object($resultado) )
  {

    $idC=$fila->CodigoCriterio;
    echo "<tr><td align='center'><b>".$fila->Criterio."</b></td><td>"."<b>".$fila->Ponderacion*(100)."</b>"."%"."</td><td></td></tr>";
   
   //PARA LOS PARA
    $consulta2="select * from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio and  P.CodigoCriterio='$idC';";
    $resultado2=sqlsrv_query($conexion,$consulta2);
     while($fila2=sqlsrv_fetch_object($resultado2) )
     {
    echo "<tr><td align='left'><input type='hidden' name='parametro[]' value='$fila2->CodigoParametrosCriterios' size='1' />"." ".$fila2->Parametro."</td><td>".$fila2->Ponderacion*(100)."%"."</td>";
  echo "<td><input type='number' required placeholder='puntaje' name='puntaje[]' min='1' max='10' size='2' /></td>
  </tr>";
     }
  }
?>

    <tr>
      <th>Escala de Evaluación 1 al 10</th>
      <th colspan="3" align="center"><b>Fecha</b></th>
    </tr>
  </tbody>
</table>
        

<center><input type="submit" value="Registrar Evaluaciones"></center>   
</form> 




    </body>
</html>