<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>

<?php
include('conexion.php');

$consulta="select * from Criterios C where  C.TipoCriterio='Evaluacion de Consultoria'";
$resultado=sqlsrv_query($conexion,$consulta);

$id2=$_POST["valorCaja1"];
$id=$_POST["valorCaja2"];

//echo $id2;
//echo $id;

$consult="select * from Consultoria c, Contrato ct where ct.Codigoconsultoria=c.Codigoconsultoria and ct.CodigoContrato = '$id2';";
$resultConsult=sqlsrv_query($conexion,$consult);
//$query="select * from Ofertas O, Consultoria C where O.Codigoconsultoria=C.Codigoconsultoria and O.CodigoOferta = ?";

//$params = array( array($id, SQLSRV_PARAM_IN), array($id2, SQLSRV_PARAM_IN));

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

<legend><h2 align=center><p style="font-family: Verdana; color:#027BF6"><strong>EVALUACIÓN DE CONSULTORIA</strong></p></h2></legend>

<h3 align="center"><Strong>CONSULTORIA: <?php echo " ".$nomConsultoria; ?> </Strong> </h3>


        <br>
        <form action="librerias/php/evaConsultoria/insertarsupervisor.php" method="post">
<br>
        <!--TABLA DE CRITERIOS-->
<input type="hidden" name="txtIdUsuario" value="<?php echo $id; ?>" />
<input type="hidden" name="txtIdContrato"  value="<?php echo $id2; ?>" />


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
    echo "<tr><td align='center' style='font-family: Verdana; text-align: center; background-color: #0072bb; color:white;' class='enc''><b>".$fila->Criterio."</b></td><td>"."<b>".$fila->Ponderacion*(100)."</b>"."%"."</td><td></td></tr>";
   
   //PARA LOS PARA
    $consulta2="select * from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio and  P.CodigoCriterio='$idC';";
    $resultado2=sqlsrv_query($conexion,$consulta2);
     while($fila2=sqlsrv_fetch_object($resultado2) )
     {
    echo "<tr><td align='left'><input type='hidden' name='parametro[]' value='$fila2->CodigoParametrosCriterios' size='1' />"." ".$fila2->Parametro."</td><td>".$fila2->Ponderacion*(100)."%"."</td>";
  echo "<td><input type='number' class='form-control input-md' required placeholder='puntaje' name='puntaje[]' min='1' max='10' size='2' /></td>
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

<h2 style="text-align: center;">Comentarios</h2>

<center>
<textarea name="txtcomentario" style="font-family: Verdana;" class='form-control input-md'></textarea></center>
   
   <br>     

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" name="singlebutton" style="font-family: Verdana;" class="btn btn-primary"><strong>Registrar Evaluaciones</strong></button>
  </div>
</div>  
</form>    
</form> 




    </body>
</html>