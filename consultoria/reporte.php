 <!DOCTYPE html>
 <html>
 <head>
 	<title>reporte</title>
 	 	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<script type="text/javascript">
	function evaluadores()
	{
if (document.getElementById('r1').checked==true) 
{
 // rate_value = document.getElementById('r1').value;
//alert("si");
document.getElementById('divevaluadores').style.display='block';
document.getElementById('imagebutton').disabled=false;


};
}

function evaluadoresno()
{
	if (document.getElementById('r2').checked==true) 
{
 // rate_value = document.getElementById('r1').value;
//alert("si");
document.getElementById('divevaluadores').style.display='none';
document.getElementById('imagebutton').disabled=false;

};
}
</script>

  <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  box-sizing: border-box;
}

table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #38678f;
  background: white;
  align: center;
}
th {
  background: #0072bb;
  height: 30px;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  border: 1px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
  text-align: center;
  font-family: Verdana;
  font-weight: bold;
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
text-align: center;
  border-right: 1px solid #cccccc;
  transition: all 0.2s;
  font-family: Verdana;
}

    </style>

    <style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 1s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>

 </head>
 <body>

 <?php 
    include("conexion/conexion.php");

//echo $_POST["id"];


//PARA LA CONSULTORIA
 $query1="select * from Consultoria c, Personal p, Contrato co
 where c.CodigoPersonal=p.CodigoPersonal
 and co.Codigoconsultoria=c.Codigoconsultoria
and  c.Codigoconsultoria= 1";
      
$resultadoConsultoria=sqlsrv_query($conexion,$query1);
$resultadoConsultoria2=sqlsrv_query($conexion,$query1);


while($row=sqlsrv_fetch_array( $resultadoConsultoria, SQLSRV_FETCH_ASSOC))
  {

  	$nombreConsul=$row["NombreConsultoria"];
  	$codcontrato=$row["CodigoContrato"];
  }
 ?>

 <center><legend><h2 align="center" style="font-family: Verdana; color:#0072bb">Consultoría: <?php echo " "."<b style='color:#0072bb'>".$nombreConsul."</b>"; ?></h2></legend>
</center>
<form action="reporte_consultoria.php" method="post" onsubmit='redirect();return false;'>
<center>
<div class="tooltip"><b style="display: none">Hover over me</b>
 <span class="tooltiptext">Generar PDF</span>
<input type="image" id="imagebutton" disabled value="enviar" src="pdf2.png" style="width: 80px; height: 70px" alt="Submit"/>

</div>
</center>
 <!--para la consultoria-->
<div id="radioseva">
<table align="center" style="width: 25%;">
	<tr>
		<th colspan="2">Desea ver el comité evaluador</th>
	</tr>
	<tr>
		<td>Si<input type="radio" name="reval" value="rsi" id="r1" onclick="evaluadores()"/></td>
		<td>No<input type="radio" name="reval" value="rno" id="r2" onclick="evaluadoresno()"/></td>
	</tr>
</table>
</div>

<?php 
while($rowC=sqlsrv_fetch_array( $resultadoConsultoria2, SQLSRV_FETCH_ASSOC))
{
	$idConsultoria=$rowC["Codigoconsultoria"];
	$tipo=$rowC["NivelAlcance"];
	$presupuesto=$rowC["Presupuesto"];
	$presupuestoConv = number_format($presupuesto);

	//echo $idConsultoria;
?>

<div style=" text-align: center;  width: 100%;">
  <div style="margin: 5px auto;  width: 95%">
<table>
	<tr>
		<th>Solicitante</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Presupuesto</th>
		<th>Forma de Pago</th>
		<th>Tipo Consultoría</th>
		<th>Nivel de Alcance</th>
	</tr>

	<tr>
	<td style="font-weight:bold;"><?php echo $rowC["Nombres"]; ?></td>
	<td><?php echo DATE_FORMAT($rowC['FechaInicio'], 'Y-m-d'); ?></td>
	<td><?php echo DATE_FORMAT($rowC['FechaFinal'], 'Y-m-d'); ?></td>
	<td><?php echo "$".$presupuestoConv; ?></td>
	<td><?php echo $rowC["FormaPa"]; ?></td>
	<td><?php echo $rowC["TipoConsultoria"]; ?></td>
	<td><?php echo $rowC["NivelAlcance"]; ?></td>
	</tr>
</table>
</div>



<!--para las areas-->
<?php
$query2="select a.AreaEspecializacion, s.SubArea from AreaEspecializacion a, SubArea s, DetalleConsultoria d, Consultoria c
where a.CodigoArea=s.CodigoArea and s.CodigoSubArea=d.CodigoSubArea
and d.Codigoconsultoria=c.Codigoconsultoria and c.Codigoconsultoria = '$idConsultoria';";

$resultadoAreas=sqlsrv_query($conexion,$query2);



  ?>
  <div style="margin: 5px auto; width: 95%">

<table>
<tr>
	<th colspan="3">ÁREAS DE ESPECIALIZACIÓN</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Área de Especialización</th>
		<th>Sub Área</th>
	</tr>
	<?php
	$contadorA=1;
while($rowA=sqlsrv_fetch_array( $resultadoAreas, SQLSRV_FETCH_ASSOC))
{
	echo "<tr><td style='font-weight:bold;'>".$contadorA."</td><td>".$rowA["AreaEspecializacion"]."</td><td>".$rowA["SubArea"]."</td></tr>";

$contadorA++;
}
?>

</table>
</div>


<?php
$query3="select d.ElementoPep from Consultoria c, DetalleConsultoriaPep d where c.Codigoconsultoria=d.CodigoConsultoria
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoPep=sqlsrv_query($conexion,$query3);
?>
<!--para los elementos pep-->
<div style="margin: 5px auto;  width: 95%">
<table>
<tr>
	<th colspan="3">ELEMENTOS PEP</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Elemento Pep</th>
	</tr>
	<?php
	$contadorP=1;
while($rowP=sqlsrv_fetch_array( $resultadoPep, SQLSRV_FETCH_ASSOC))
{
	echo "<tr><td style='font-weight:bold;'>".$contadorP."</td><td>".$rowP["ElementoPep"]."</td></tr>";

$contadorP++;
}
?>

</table>
</div>



<!--para los productos-->

<?php
$query5="select p.Producto, p.Desembolso, p.fechaPlanificada, p.MontoPagado, p.RecibiConforme, p.pagado from Consultoria c, Producto p
where c.Codigoconsultoria=p.Codigoconsultoria
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoProd=sqlsrv_query($conexion,$query5);
?>
<!--para los elementos pep-->
<div style="margin: 5px auto; width: 95%">
<table>
<tr>
	<th colspan="7">PRODUCTOS</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Nombre Producto</th>
		<th>% Desembolso</th>
		<th>Fecha Planificada</th>
		<th>Recibí Conforme</th>
		<th>Fecha de Pago</th>
		<th>Monto a Pagar</th>

	</tr>
	<?php
	$contadorProd=1;
	//$recibi='';
	$recibiMsg='';
	$pagoMsg='';
	$pago='';
	$fecha = new DateTime('1900-01-01');
while($rowProd=sqlsrv_fetch_array( $resultadoProd, SQLSRV_FETCH_ASSOC))
{

//logica para los productos y las fechas de recibi y la fecha de pago
$recibi=$rowProd['RecibiConforme'];
if ($recibi==$fecha) 
{
	$recibiMsg="Aun no Recibido";
	$pagoMsg='Aun no Pagado';
}

elseif ($recibi!=$fecha) 
{
$recibiMsg=DATE_FORMAT($rowProd['RecibiConforme'], 'Y-m-d');
$pagoMsg=DATE_FORMAT($rowProd['pagado'], 'Y-m-d');

}

//para el monto a pagar
$montoP='';
if ($rowProd["MontoPagado"]=='')
{
$montoP=$presupuesto*($rowProd["Desembolso"]/(100));
$montoConv= number_format($montoP); // returns: 1,23

}

elseif ($rowProd["MontoPagado"]!='') 
{
$montoP=$rowProd["MontoPagado"];
//$montoConv = number_format($montoP);
$montoConv= number_format($montoP); // returns: 1,23

}


	echo "<tr><td style='font-weight:bold;'>".$contadorProd."</td><td>".$rowProd["Producto"]."</td><td>".$rowProd["Desembolso"]."%"."</td><td>".DATE_FORMAT($rowProd['fechaPlanificada'], 'Y-m-d')."</td><td>".$recibiMsg."</td><td>".$pagoMsg."</td><td>"."$".$montoConv."</td></tr>";

$contadorProd++;
}
?>
</table>
</div>

<!--para los consultores y la empresa-->
<?php
$query5="select E.NombreEmpresa, E.CodigoEmpresa from EmpresaPersona E, Contrato Co, Consultoria Cl where E.CodigoEmpresa=Co.CodigoEmpresa and Co.Codigoconsultoria=Cl.Codigoconsultoria
and Cl.Codigoconsultoria = '$idConsultoria';";

$resultadoCons=sqlsrv_query($conexion,$query5);

while($rowCons=sqlsrv_fetch_array( $resultadoCons, SQLSRV_FETCH_ASSOC))
{
$nombreEmp=$rowCons["NombreEmpresa"];
$codEmpre=$rowCons["CodigoEmpresa"];
?>
<div style="margin: 5px auto; width: 95%;">
<table>
<tr>
	<th colspan="5">Empresa <?php echo " ".$nombreEmp;?></th>
</tr>

<tr>
    <th style="width:5%">N°</th>
	<th>Nombres</th>
	<th>Apellidos</th>
	<th>Recomendación</th>
	<th>No Recomendación</th>

</tr>
<?php 
$query6="select Ce.CodigoConsultor, Ce.NombresConsultor, Ce.ApellidosConsultor, Ev.resultado from EmpresaPersona E, Consultores Ce, Contrato Co, Consultoria Cl, EvaluacionFinalConsultores Ev where Co.Codigoconsultoria=Cl.Codigoconsultoria
and Co.CodigoEmpresa=E.CodigoEmpresa and E.CodigoEmpresa=Ce.CodigoEmpresa and Ce.CodigoConsultor=Ev.CodigoConsultor and Ev.CodigoContrato=Co.CodigoContrato
and Cl.Codigoconsultoria = '$idConsultoria' and E.CodigoEmpresa = '$codEmpre';";

$resultadoCons2=sqlsrv_query($conexion,$query6);
$contCons=1;
while($rowCons2=sqlsrv_fetch_array( $resultadoCons2, SQLSRV_FETCH_ASSOC))
{
	            $idconsultor=$rowCons2["CodigoConsultor"];

?>
<tr>
<?php
echo "<td style='font-weight:bold;'>".$contCons."</td><td>".$rowCons2["NombresConsultor"]."</td><td>".$rowCons2["ApellidosConsultor"]."</td>";
?>

<td>
	<?php
$queryRecomendado=" select c.NombresConsultor,  COUNT(*) as recomendaciones from Consultores c, EvaluacionFinalConsultores e
 where c.CodigoConsultor = e.CodigoConsultor and c.CodigoConsultor = '$idconsultor'
 and e.resultado = 'Recomendado' group by c.NombresConsultor, c.CodigoConsultor;";
$resultadoR=sqlsrv_query($conexion, $queryRecomendado);

  while($rowR=sqlsrv_fetch_array($resultadoR))
          { 

            echo $rowR['recomendaciones'];
          }
?>

</td>

<td>
	              <?php 

$queryNoRecomendado=" select c.NombresConsultor,  COUNT(*) as recomendaciones from Consultores c, EvaluacionFinalConsultores e
 where c.CodigoConsultor = e.CodigoConsultor and c.CodigoConsultor = '$idconsultor'
 and e.resultado = 'No Recomendado' group by c.NombresConsultor, c.CodigoConsultor;";

$resultadoNoR=sqlsrv_query($conexion, $queryNoRecomendado);


	while($rowN=sqlsrv_fetch_array($resultadoNoR))
          { 

            echo $rowN['recomendaciones'];
          }

 ?>
</td>

</tr>
<?php

$contCons++;
} //cierre para los consultores
?>

<?php
}//cierre del externo
?>

</table>
</div>

<!--para los evaluadores-->

<?php
$query4="select distinct(P.CodigoPersonal), P.Nombres, P.Apellidos, P.Car, O.NombreOficina from Contrato CO, EvaluacionFinalConsultoria E, Consultoria C, Personal P, Oficinas O where CO.CodigoContrato=E.CodigoContrato
and CO.Codigoconsultoria=C.Codigoconsultoria and E.CodigoPersonal=P.CodigoPersonal and P.CodigoOficina=O.CodigoOficina and C.Codigoconsultoria = '$idConsultoria';";

$resultadoEva=sqlsrv_query($conexion,$query4);
?>
<!--para los elementos pep-->

<div style="margin: 5px auto; width: 95%; display: none" id="divevaluadores" >
<table>
<tr>
	<th colspan="5">COMITÉ EVALUADOR</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Puesto</th>
		<th>Oficina</th>
	</tr>
	<?php
	$contadorE=1;
while($rowE=sqlsrv_fetch_array( $resultadoEva, SQLSRV_FETCH_ASSOC))
{

	echo "<tr><td style='font-weight:bold;'>".$contadorE."</td><td>".$rowE["Nombres"]."</td><td>".$rowE["Apellidos"]."</td><td>".$rowE["Car"]."</td><td>".$rowE["NombreOficina"]."</td></tr>";

$contadorE++;
}
?>

</table>
</div>

<?php
//para el promedio de la consultoria
     $querypromedio = "exec promedioConsultoria '$codcontrato';"; // Cambiar el 6 por el codigo de consultoria 
      $resultadopromedio=sqlsrv_query($conexion,$querypromedio);
while($filaPromedio = sqlsrv_fetch_array($resultadopromedio,SQLSRV_FETCH_NUMERIC))
      {
$promedio=$filaPromedio[0];
      }
?>

<div style="margin: 5px auto; width: 95%;">
<table>
<tr>
	<th >Promedio de Consultoría: <?php echo '<b style="font-size: 20px;">'. $promedio. '</b>'; ?></th>
</tr>
</table>
</div>

</div>
</form>
<?php
date_default_timezone_set("America/El_Salvador");
echo "<center><b style='color:red; font-size: 17px;'>Generado: ".date("d/m/y H:i")."</b></center>"; 
?>
<!--fin del bucle while-->
<?php
}
?>


 </body>
 </html>