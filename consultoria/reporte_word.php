<?php 
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=ReporteConsultoria.doc");


header('Content-Type: text/html; charset=utf-8');
	include("conexion/conexion.php");


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>reporte</title>
 	 	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

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
  padding: 10px;
  transition: all 0.2s;
  font-family: Verdana;
}

    </style>

 </head>
 <body>

 <?php 
    include("conexion/conexion.php");

//echo $_POST["id"];


//PARA LA CONSULTORIA
 $query1="select * from Consultoria c, Personal p where c.CodigoPersonal=p.CodigoPersonal
and  Codigoconsultoria= 1";
      
$resultadoConsultoria=sqlsrv_query($conexion,$query1);
$resultadoConsultoria2=sqlsrv_query($conexion,$query1);


while($row=sqlsrv_fetch_array( $resultadoConsultoria, SQLSRV_FETCH_ASSOC))
  {

  	$nombreConsul=$row["NombreConsultoria"];
  }
 ?>

 <center><legend><h2 align="center" style="font-family: Verdana; color:#0072bb">Consultoria: <?php echo " "."<b style='color:#0072bb'>".$nombreConsul."</b>"; ?></h2></legend>
</center>
 <!--para la consultoria-->

<?php 
while($rowC=sqlsrv_fetch_array( $resultadoConsultoria2, SQLSRV_FETCH_ASSOC))
{
	$idConsultoria=$rowC["Codigoconsultoria"];
	$tipo=$rowC["NivelAlcance"];
	$presupuesto=$rowC["Presupuesto"];
	//echo $idConsultoria;
?>

<center>
<table style="width:90%;">
	<tr>
		<th>Solicitante</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Presupuesto</th>
		<th>Forma de Pago</th>
		<th>Tipo Consultoria</th>
		<th>Nivel de Alcance</th>
	</tr>

	<tr>
	<td style="font-weight:bold;"><?php echo $rowC["Nombres"]; ?></td>
	<td><?php echo DATE_FORMAT($rowC['FechaInicio'], 'Y-m-d'); ?></td>
	<td><?php echo DATE_FORMAT($rowC['FechaFinal'], 'Y-m-d'); ?></td>
	<td><?php echo "$".$rowC["Presupuesto"]; ?></td>
	<td><?php echo $rowC["FormaPa"]; ?></td>
	<td><?php echo $rowC["TipoConsultoria"]; ?></td>
	<td><?php echo $rowC["NivelAlcance"]; ?></td>
	</tr>
</table>
</center>

<!--para las areas-->
<?php
$query2="select a.AreaEspecializacion, s.SubArea from AreaEspecializacion a, SubArea s, DetalleConsultoria d, Consultoria c
where a.CodigoArea=s.CodigoArea and s.CodigoSubArea=d.CodigoSubArea
and d.Codigoconsultoria=c.Codigoconsultoria and c.Codigoconsultoria = '$idConsultoria';";

$resultadoAreas=sqlsrv_query($conexion,$query2);
?>

<center>
<table style="width:90%">
<tr>
	<th colspan="3">AREAS DE ESPECIALIZACION</th>
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
</center>

<?php
$query3="select d.ElementoPep from Consultoria c, DetalleConsultoriaPep d where c.Codigoconsultoria=d.CodigoConsultoria
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoPep=sqlsrv_query($conexion,$query3);
?>
<!--para los elementos pep-->
<center>
<table style="width:90%">
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
</center>

<!--para los evaluadores-->

<?php
$query4="select * from Consultoria c, Asignacion a, Personal p
where c.Codigoconsultoria=a.Codigoconsultoria
and a.CodigoPersonal=p.CodigoPersonal
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoEva=sqlsrv_query($conexion,$query4);
?>
<!--para los elementos pep-->
<center>
<table style="width:90%">
<tr>
	<th colspan="4">EVALUADORES</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Función</th>
	</tr>
	<?php
	$contadorE=1;
	$funcion="";
while($rowE=sqlsrv_fetch_array( $resultadoEva, SQLSRV_FETCH_ASSOC))
{
	if ($rowE["Car"]=="Coordinador") 
	{
	$funcion="<b style='color:red'>".$rowE["Car"]."</b>";
	}
	if ($rowE["Car"]=="Evaluador") 
	{
	$funcion=$rowE["Car"];
	}


	echo "<tr><td style='font-weight:bold;'>".$contadorE."</td><td>".$rowE["Nombres"]."</td><td>".$rowE["Apellidos"]."</td><td>".$funcion."</td></tr>";

$contadorE++;
}
?>

</table>
</center>

<!--para los productos-->

<?php
$query5="select p.Producto, p.Desembolso, p.fechaPlanificada, p.MontoPagado, p.RecibiConforme, p.pagado from Consultoria c, Producto p
where c.Codigoconsultoria=p.Codigoconsultoria
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoProd=sqlsrv_query($conexion,$query5);
?>
<!--para los elementos pep-->
<center>
<table style="width:90%">
<tr>
	<th colspan="7">PRODUCTOS</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Nombre Producto</th>
		<th>% Desembolso</th>
		<th>Fecha Planificada</th>
		<th>Recibi Conforme</th>
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
}

elseif ($rowProd["MontoPagado"]!='') 
{
$montoP=$rowProd["MontoPagado"];

}


	echo "<tr><td style='font-weight:bold;'>".$contadorProd."</td><td>".$rowProd["Producto"]."</td><td>".$rowProd["Desembolso"]."%"."</td><td>".DATE_FORMAT($rowProd['fechaPlanificada'], 'Y-m-d')."</td><td>".$recibiMsg."</td><td>".$pagoMsg."</td><td>"."$".$montoP."</td></tr>";

$contadorProd++;
}
?>
</table>
</center>


<!--para los evaluadores-->

<?php
$query6="select d.NombreDepartamento, m.NombreMunicipio from Consultoria c, ZonaTrabajo z, municipios m, Departamentos d where c.Codigoconsultoria=z.Codigoconsultoria
and d.CodigoDepartamento=m.CodigoDepartamento and z.CodigoMunicipio=m.CodigoMunicipio
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoZona=sqlsrv_query($conexion,$query6);
?>


<!--otra condicion del if-->
<?php
if ($tipo=="Nacional") 
{
//echo "no hay zonas";
}
?>

<?php 
if ($tipo!="Nacional")
{
?>	

<center>
<table style="width:90%">
<tr>
	<th colspan="3">ZONAS DE TRABAJO</th>
</tr>

	<tr>
		<th style="width:5%">N°</th>
		<th>Departamento</th>
		<th>Municipio</th>
	</tr>
	<?php
	$contadorZona=1;
while($rowZona=sqlsrv_fetch_array( $resultadoZona, SQLSRV_FETCH_ASSOC))
{

	echo "<tr><td style='font-weight:bold;'>".$contadorZona."</td><td>".$rowZona["NombreDepartamento"]."</td><td>".$rowZona["NombreMunicipio"]."</td></tr>";

$contadorZona++;
}
?>

</table>
</center>
<!--fin para el if de las zonas-->
<?php
}
?>




<!--fin del bucle while-->
<?php
}
?>


 </body>
 </html>