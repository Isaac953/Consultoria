<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Evaluacion Inicial</title>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<style type="text/css">
.enc
  {
    background-color: #21ADF6;
    text-align: center;
  }

</style>
    </head>

<?php
include('../../../conexion/conexion.php');

$id=$_POST["valorCaja1"];
$id2=$_POST["valorCaja2"];
$idpersonal=$_SESSION['id_usuario'];

$consultaOferta="select c.NombreConsultoria, f.NombreEmpresa, f.Nit, f.Correo, f.Monto from Consultoria c, Ofertas f where c.Codigoconsultoria=f.Codigoconsultoria and f.CodigoOferta = '$id';";
$resultadoOferta=sqlsrv_query($conexion,$consultaOferta);


/*$consulta="select distinct(c.CodigoCriterio), c.Criterio, c.TipoCriterio, c.Ponderacion from Criterios c join ParametrosCriterios p
on c.CodigoCriterio=p.CodigoCriterio
and  c.TipoCriterio='Evaluacion de Ofertas'";
*/

$consulta="select distinct(c.CodigoCriterio), c.Criterio, c.TipoCriterio, c.Ponderacion from Criterios c 
join ParametrosCriterios p on c.CodigoCriterio=p.CodigoCriterio
join EvaluacionOfertas ev on ev.CodigoParametrosCriterios= p.CodigoParametrosCriterios
join Ofertas o on o.CodigoOferta=ev.CodigoOferta
join Asignacion a on a.CodigoAsignacion=ev.CodigoAsignacion
join Consultoria co on co.Codigoconsultoria=a.Codigoconsultoria
join Personal pr on a.CodigoPersonal=pr.CodigoPersonal
and pr.CodigoPersonal = '$idpersonal' and o.CodigoOferta = '$id'
and  c.TipoCriterio='Evaluacion de Ofertas'
";

$resultado=sqlsrv_query($conexion,$consulta);




$query="select * from Ofertas O, Consultoria C where O.Codigoconsultoria=C.Codigoconsultoria and O.CodigoOferta = ?";
$params = array( array($id, SQLSRV_PARAM_IN), array($id2, SQLSRV_PARAM_IN));
$resultado2=sqlsrv_query($conexion,$query,$params);
$cri=sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC);

?>

	<body>
<legend><h2 align=center><p style="font-family: Verdana; color:#027BF6"><strong>EVALUACIÓN DE OFERTAS</strong></p></h2></legend>

        <br>
<br>
        <!--TABLA DE CRITERIOS-->
<table align="center" class="table table-bordered" style="text-align: center; cellspacing: 10px " border="1" width="100%">
<tr width=90px, height=35px>
<th class="enc" style="background-color: #0072bb; color: white; font-family: Verdana" width="20%">Consultoria</th>
<th class="enc" style="background-color: #0072bb; color: white; font-family: Verdana" width="20%">Nombre Empresa</th>
<th class="enc" style="background-color: #0072bb; color: white; font-family: Verdana" width="20%">Nit</th>
<th class="enc" style="background-color: #0072bb; color: white; font-family: Verdana" width="20%">Correo</th>
<th class="enc" style="background-color: #0072bb; color: white; font-family: Verdana" width="20%">Monto</th>
</tr>
<tr>
<?php 
 while($filaO=sqlsrv_fetch_object($resultadoOferta) )
  {

echo "<td>".$filaO->NombreConsultoria."</td>";
echo "<td>".$filaO->NombreEmpresa."</td>";
echo "<td>".$filaO->Nit."</td>";
echo "<td>".$filaO->Correo."</td>";
echo "<td>"."$".number_format($filaO->Monto)."</td>";

  }

 ?>
 </tr>
</table>
<br>
		<center>
		<input type="hidden" size="2"  name="codOferta"  value="<?php echo $id; ?>"/>
		<input type="hidden" size="5"  name="codAsignacion"  value="<?php echo $id2;?>"/>

		</center>
             <table align="center" border="1" class="table table-bordered" style="width: 50%">
  <tbody>
 
    <tr>
      <th style="font-family: Verdana; text-align: center; background: #0072bb; color: white;">CRITERIOS DE EVALUACIÓN</th>
      <th style="font-family: Verdana; text-align: center; background: #0072bb; color: white;">%</th>  
      <th style="font-family: Verdana; text-align: center; background: #0072bb; color: white;">Notas</th> 

    </tr>

    <!--AQUI VAN LOS CRITERIOS Y PARAMETROS-->
<?php
 while($fila=sqlsrv_fetch_object($resultado) )
  {

    $idC=$fila->CodigoCriterio;
    echo "<tr><td align='center' style='font-family: Verdana; text-align: center; background-color: #0072bb; color:white;' class='enc'><b>".$fila->Criterio."</b></td><td class='enc' style='font-family: Verdana; text-align: center; background-color: #0072bb; color:white; text-align: center;'>"."<b>".$fila->Ponderacion*(100)."</b>"."%"."</td><td class='enc' style='font-family: Verdana; text-align: center; background-color: #0072bb; color:white; text-align: center;'></td></tr>";

    $consulta2="select cr.CodigoCriterio, p.CodigoParametrosCriterios, cr.Ponderacion as pondeC, p.Ponderacion as pondeP,
cr.Criterio, p.Parametro, e.Puntaje as puntajeP
from Ofertas O, Asignacion a, EvaluacionOfertas e, ParametrosCriterios p, Criterios cr, Personal pr
where O.CodigoOferta=e.CodigoOferta
and a.CodigoAsignacion=e.CodigoAsignacion
and e.CodigoParametrosCriterios=p.CodigoParametrosCriterios
and p.CodigoCriterio=cr.CodigoCriterio
and a.CodigoPersonal=pr.CodigoPersonal
and e.CodigoOferta=O.CodigoOferta
and pr.CodigoPersonal='$idpersonal' and e.CodigoOferta='$id' and p.CodigoCriterio='$idC'
;";

   
   //PARA LOS PARA
    /*$consulta2="select * from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio and  P.CodigoCriterio='$idC';";
    */
    $resultado2=sqlsrv_query($conexion,$consulta2);
     while($fila2=sqlsrv_fetch_object($resultado2) )
     {
    echo "<tr><td align='left'><input type='hidden' name='parametro[]' value='$fila2->CodigoParametrosCriterios' size='1' />"." ".$fila2->Parametro."</td><td align='center'>".$fila2->pondeP*(100)."%"."</td>";
  echo "<td align='center'><input type='number' class='form-control input-md' required placeholder='nota' style='font-family: Verdana; text-align: center; pointer-events:none;' name='puntaje[]' value='$fila2->puntajeP' min='1' max='10' size='10' /></td>
  </tr>";
     }
  }
?>

    <tr>
      <th style="text-align: center; background-color:  #0072bb; color:white;">Escala de Evaluación 1 al 10</th>
    </tr>
  </tbody>
</table>
      
	
    </body>
</html>