<?php 
require_once("dompdf/dompdf_config.inc.php");
include("conexion/conexion.php");
header('Content-Type: text/html; charset=utf-8');

$evaluador=$_POST["reval"];

if ($evaluador=="rsi")
{
$codigoHTML='<!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte Consultoría</title>
 	 	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

   <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */

table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid black;
  background: white;
  align: center;
}
th {
  background: #0072bb;
  height: 30px;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  border: 1px solid black;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
  text-align: center;
  font-family: Verdana;
  font-weight: bold;
}
tr {
   border: 1px solid black;
   height:5px;
}
tr:last-child 
{
  border-bottom: 0px;
}
td 
{
    height: 30px;
text-align: center;
  border: 1px solid black;
  padding: 5px;
  transition: all 0.2s;
  font-family: Verdana;
}

    </style>

 </head>
 <body>';

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

$codigoHTML.='<center><legend><h2 align="center" style="font-family: Verdana; color:#0072bb">'.'Consultoría: '.$row["NombreConsultoria"].'</h2></legend></center>';
  }




while($rowC=sqlsrv_fetch_array( $resultadoConsultoria2, SQLSRV_FETCH_ASSOC))
{
	$idConsultoria=$rowC["Codigoconsultoria"];
	$tipo=$rowC["NivelAlcance"];
	$presupuesto=$rowC["Presupuesto"];
   $presupuestoConv = number_format($presupuesto);

	//echo $idConsultoria;
  $codigoHTML.='<div style=" text-align: center; width: 100%;">
  <div style="margin: 5px auto; width: 95%">
<table>
	<tr>
		<th>Solicitante</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Presupuesto</th>
		<th>Forma de Pago</th>
		<th>Tipo Consultoría</th>
		<th>Nivel de Alcance</th>
	</tr>';

  $codigoHTML.='<tr>
	<td style="font-weight:bold;">'.$rowC["Nombres"].'</td>
	<td>'.DATE_FORMAT($rowC['FechaInicio'], 'Y-m-d').'</td>
	<td>'.DATE_FORMAT($rowC['FechaFinal'], 'Y-m-d').'</td>
	<td>'.'$'.$presupuestoConv.'</td>
	<td>'.$rowC["FormaPa"].'</td>
	<td>'.$rowC["TipoConsultoria"].'</td>
	<td>'.$rowC["NivelAlcance"].'</td>
	</tr>
</table>
</div>';


$query2="select a.AreaEspecializacion, s.SubArea from AreaEspecializacion a, SubArea s, DetalleConsultoria d, Consultoria c
where a.CodigoArea=s.CodigoArea and s.CodigoSubArea=d.CodigoSubArea
and d.Codigoconsultoria=c.Codigoconsultoria and c.Codigoconsultoria = '$idConsultoria';";
$resultadoAreas=sqlsrv_query($conexion,$query2);
  
  $codigoHTML.='<div style="margin: 5px auto; width: 95%">

<table>
<tr>
	<th colspan="3">ÁREAS DE ESPECIALIZACIÓN</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Área de Especialización</th>
		<th>Sub Área</th>
	</tr>';

	$contadorA=1;
while($rowA=sqlsrv_fetch_array( $resultadoAreas, SQLSRV_FETCH_ASSOC))
{
	$codigoHTML.='<tr><td style="font-weight:bold;">'.$contadorA.'</td><td>'.$rowA["AreaEspecializacion"].'</td><td>'.$rowA["SubArea"].'</td></tr>';

$contadorA++;
}
$codigoHTML.='
</table>
</div>';


$query3="select d.ElementoPep from Consultoria c, DetalleConsultoriaPep d where c.Codigoconsultoria=d.CodigoConsultoria
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoPep=sqlsrv_query($conexion,$query3);

$codigoHTML.='<!--para los elementos pep-->
<div style="margin: 5px auto; width: 95%">
<table>
<tr>
	<th colspan="2">ELEMENTOS PEP</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Elemento Pep</th>
	</tr>';

	$contadorP=1;
while($rowP=sqlsrv_fetch_array( $resultadoPep, SQLSRV_FETCH_ASSOC))
{
	$codigoHTML.='<tr><td style="font-weight:bold;">'.$contadorP.'</td><td>'.$rowP["ElementoPep"].'</td></tr>';

$contadorP++;
}
$codigoHTML.='
</table>
</div>';



$query5="select p.Producto, p.Desembolso, p.fechaPlanificada, p.MontoPagado, p.RecibiConforme, p.pagado from Consultoria c, Producto p
where c.Codigoconsultoria=p.Codigoconsultoria
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoProd=sqlsrv_query($conexion,$query5);
$codigoHTML.='<div style="margin: 5px auto;  width: 95%">
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

	</tr>';

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
$montoConv= number_format($montoP); 
}

elseif ($rowProd["MontoPagado"]!='') 
{
$montoP=$rowProd["MontoPagado"];
$montoConv= number_format($montoP); 

}


	$codigoHTML.='<tr><td style="font-weight:bold;">'.$contadorProd.'</td><td>'.$rowProd["Producto"].'</td><td>'.$rowProd["Desembolso"].'%'.'</td><td>'.DATE_FORMAT($rowProd['fechaPlanificada'], 'Y-m-d').'</td><td>'.$recibiMsg.'</td><td>'.$pagoMsg.'</td><td>'.'$'.$montoConv.'</td></tr>';

$contadorProd++;
}
$codigoHTML.='
</table>
</div>';

$query5="select E.NombreEmpresa, E.CodigoEmpresa from EmpresaPersona E, Contrato Co, Consultoria Cl where E.CodigoEmpresa=Co.CodigoEmpresa and Co.Codigoconsultoria=Cl.Codigoconsultoria
and Cl.Codigoconsultoria = '$idConsultoria';";

$resultadoCons=sqlsrv_query($conexion,$query5);

while($rowCons=sqlsrv_fetch_array( $resultadoCons, SQLSRV_FETCH_ASSOC))
{
$nombreEmp=$rowCons["NombreEmpresa"];
$codEmpre=$rowCons["CodigoEmpresa"];

$codigoHTML.='
<div style="margin: 5px auto; width: 95%;">

<table>
<tr>
	<th colspan="4">Empresa '.$nombreEmp.'</th>
</tr>

<tr>
    <th style="width:5%">N°</th>
	<th>Nombres</th>
	<th>Apellidos</th>
    <th>Recomendación</th>
	<th>No Recomendación</th>

</tr>';
 
$query6="select Ce.CodigoConsultor, Ce.NombresConsultor, Ce.ApellidosConsultor, Ev.resultado from EmpresaPersona E, Consultores Ce, Contrato Co, Consultoria Cl, EvaluacionFinalConsultores Ev where Co.Codigoconsultoria=Cl.Codigoconsultoria
and Co.CodigoEmpresa=E.CodigoEmpresa and E.CodigoEmpresa=Ce.CodigoEmpresa and Ce.CodigoConsultor=Ev.CodigoConsultor and Ev.CodigoContrato=Co.CodigoContrato
and Cl.Codigoconsultoria = '$idConsultoria' and E.CodigoEmpresa = '$codEmpre';";

$resultadoCons2=sqlsrv_query($conexion,$query6);
$contCons=1;
while($rowCons2=sqlsrv_fetch_array( $resultadoCons2, SQLSRV_FETCH_ASSOC))
{

	$idconsultor=$rowCons2["CodigoConsultor"];

$codigoHTML.='<tr><td style="font-weight:bold;">'.$contCons.'</td><td>'.$rowCons2["NombresConsultor"].'</td><td>'.$rowCons2["ApellidosConsultor"].'</td>';

$codigoHTML.='<td>';

$queryRecomendado=" select c.NombresConsultor,  COUNT(*) as recomendaciones from Consultores c, EvaluacionFinalConsultores e
 where c.CodigoConsultor = e.CodigoConsultor and c.CodigoConsultor = '$idconsultor'
 and e.resultado = 'Recomendado' group by c.NombresConsultor, c.CodigoConsultor;";
$resultadoR=sqlsrv_query($conexion, $queryRecomendado);

  while($rowR=sqlsrv_fetch_array($resultadoR))
          { 

           $codigoHTML.='<b>'.$rowR['recomendaciones'].'</b>';
          }

$codigoHTML.='</td><td>';

$queryNoRecomendado=" select c.NombresConsultor,  COUNT(*) as recomendaciones from Consultores c, EvaluacionFinalConsultores e
 where c.CodigoConsultor = e.CodigoConsultor and c.CodigoConsultor = '$idconsultor'
 and e.resultado = 'No Recomendado' group by c.NombresConsultor, c.CodigoConsultor;";

$resultadoNoR=sqlsrv_query($conexion, $queryNoRecomendado);


	while($rowN=sqlsrv_fetch_array($resultadoNoR))
          { 

            $codigoHTML.='<b>'.$rowN['recomendaciones'].'</b>';
          }

$codigoHTML.='</td></tr>';


$contCons++;
}

}

$codigoHTML.='
</table>
</div>';

$query4="select distinct(P.CodigoPersonal), P.Nombres, P.Apellidos, P.Car, O.NombreOficina from Contrato CO, EvaluacionFinalConsultoria E, Consultoria C, Personal P, Oficinas O where CO.CodigoContrato=E.CodigoContrato
and CO.Codigoconsultoria=C.Codigoconsultoria and E.CodigoPersonal=P.CodigoPersonal and P.CodigoOficina=O.CodigoOficina and C.Codigoconsultoria = '$idConsultoria';";
$resultadoEva=sqlsrv_query($conexion,$query4);

$codigoHTML.='<div style="margin: 5px auto; width: 95%"">
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
	</tr>';

	$contadorE=1;
while($rowE=sqlsrv_fetch_array( $resultadoEva, SQLSRV_FETCH_ASSOC))
{

$codigoHTML.='<tr><td style="font-weight:bold;">'.$contadorE.'</td><td>'.$rowE["Nombres"].'</td><td>'.$rowE["Apellidos"].'</td><td>'.$rowE["Car"].'</td><td>'.$rowE["NombreOficina"].'</td></tr>';

$contadorE++;
}

$codigoHTML.='
</table>
</div>';

//para el promedio de la consultoria
     $querypromedio = "exec promedioConsultoria '$codcontrato';"; // Cambiar el 6 por el codigo de consultoria 
      $resultadopromedio=sqlsrv_query($conexion,$querypromedio);
while($filaPromedio = sqlsrv_fetch_array($resultadopromedio,SQLSRV_FETCH_NUMERIC))
      {
$promedio=$filaPromedio[0];
      }

$codigoHTML.='<div style="margin: 5px auto; width: 95%;">
<table>
<tr>
	<th >Promedio de Consultoría: <b style="font-size: 20px;">'. $promedio. '</b> </th>
</tr>
</table>
</div>
</div>';

date_default_timezone_set("America/El_Salvador");
$codigoHTML.='<center><br><b style="color:red">Generado: '.date("d/m/y H:i").'</b></center>'; 


}
   $codigoHTML.='
 </body>
 </html>';

 $dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_consultoria.pdf");

}

if ($evaluador=="rno")
{
$codigoHTML='<!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte Consultoria</title>
 	 	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

   <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */

table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid black;
  background: white;
  align: center;
}
th {
  background: #0072bb;
  height: 30px;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  border: 1px solid black;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
  text-align: center;
  font-family: Verdana;
  font-weight: bold;
}
tr {
   border: 1px solid black;
   height:5px;
}
tr:last-child 
{
  border-bottom: 0px;
}
td 
{
    height: 30px;
text-align: center;
  border: 1px solid black;
  padding: 5px;
  transition: all 0.2s;
  font-family: Verdana;
}

    </style>

 </head>
 <body>';

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

$codigoHTML.='<center><legend><h2 align="center" style="font-family: Verdana; color:#0072bb">'.'Consultoría: '.$row["NombreConsultoria"].'</h2></legend></center>';
  }




while($rowC=sqlsrv_fetch_array( $resultadoConsultoria2, SQLSRV_FETCH_ASSOC))
{
	$idConsultoria=$rowC["Codigoconsultoria"];
	$tipo=$rowC["NivelAlcance"];
	$presupuesto=$rowC["Presupuesto"];
   $presupuestoConv = number_format($presupuesto);

	//echo $idConsultoria;
  $codigoHTML.='<div style=" text-align: center; width: 100%;">
  <div style="margin: 5px auto; width: 95%">
<table>
	<tr>
		<th>Solicitante</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Presupuesto</th>
		<th>Forma de Pago</th>
		<th>Tipo Consultoría</th>
		<th>Nivel de Alcance</th>
	</tr>';

  $codigoHTML.='<tr>
	<td style="font-weight:bold;">'.$rowC["Nombres"].'</td>
	<td>'.DATE_FORMAT($rowC['FechaInicio'], 'Y-m-d').'</td>
	<td>'.DATE_FORMAT($rowC['FechaFinal'], 'Y-m-d').'</td>
	<td>'.'$'.$presupuestoConv.'</td>
	<td>'.$rowC["FormaPa"].'</td>
	<td>'.$rowC["TipoConsultoria"].'</td>
	<td>'.$rowC["NivelAlcance"].'</td>
	</tr>
</table>
</div>';


$query2="select a.AreaEspecializacion, s.SubArea from AreaEspecializacion a, SubArea s, DetalleConsultoria d, Consultoria c
where a.CodigoArea=s.CodigoArea and s.CodigoSubArea=d.CodigoSubArea
and d.Codigoconsultoria=c.Codigoconsultoria and c.Codigoconsultoria = '$idConsultoria';";
$resultadoAreas=sqlsrv_query($conexion,$query2);
  
  $codigoHTML.='<div style="margin: 5px auto; width: 95%">

<table>
<tr>
	<th colspan="3">ÁREAS DE ESPECIALIZACIÓN</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Área de Especialización</th>
		<th>Sub Área</th>
	</tr>';

	$contadorA=1;
while($rowA=sqlsrv_fetch_array( $resultadoAreas, SQLSRV_FETCH_ASSOC))
{
	$codigoHTML.='<tr><td style="font-weight:bold;">'.$contadorA.'</td><td>'.$rowA["AreaEspecializacion"].'</td><td>'.$rowA["SubArea"].'</td></tr>';

$contadorA++;
}
$codigoHTML.='
</table>
</div>';


$query3="select d.ElementoPep from Consultoria c, DetalleConsultoriaPep d where c.Codigoconsultoria=d.CodigoConsultoria
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoPep=sqlsrv_query($conexion,$query3);

$codigoHTML.='<!--para los elementos pep-->
<div style="margin: 5px auto; width: 95%">
<table>
<tr>
	<th colspan="2">ELEMENTOS PEP</th>
</tr>
	<tr>
		<th style="width:5%">N°</th>
		<th>Elemento Pep</th>
	</tr>';

	$contadorP=1;
while($rowP=sqlsrv_fetch_array( $resultadoPep, SQLSRV_FETCH_ASSOC))
{
	$codigoHTML.='<tr><td style="font-weight:bold;">'.$contadorP.'</td><td>'.$rowP["ElementoPep"].'</td></tr>';

$contadorP++;
}
$codigoHTML.='
</table>
</div>';



$query5="select p.Producto, p.Desembolso, p.fechaPlanificada, p.MontoPagado, p.RecibiConforme, p.pagado from Consultoria c, Producto p
where c.Codigoconsultoria=p.Codigoconsultoria
and c.Codigoconsultoria = '$idConsultoria';";

$resultadoProd=sqlsrv_query($conexion,$query5);
$codigoHTML.='<div style="margin: 5px auto;  width: 95%">
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

	</tr>';

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
$montoConv= number_format($montoP); 
}

elseif ($rowProd["MontoPagado"]!='') 
{
$montoP=$rowProd["MontoPagado"];
$montoConv= number_format($montoP); 

}


	$codigoHTML.='<tr><td style="font-weight:bold;">'.$contadorProd.'</td><td>'.$rowProd["Producto"].'</td><td>'.$rowProd["Desembolso"].'%'.'</td><td>'.DATE_FORMAT($rowProd['fechaPlanificada'], 'Y-m-d').'</td><td>'.$recibiMsg.'</td><td>'.$pagoMsg.'</td><td>'.'$'.$montoConv.'</td></tr>';

$contadorProd++;
}
$codigoHTML.='
</table>
</div>';

$query5="select E.NombreEmpresa, E.CodigoEmpresa from EmpresaPersona E, Contrato Co, Consultoria Cl where E.CodigoEmpresa=Co.CodigoEmpresa and Co.Codigoconsultoria=Cl.Codigoconsultoria
and Cl.Codigoconsultoria = '$idConsultoria';";

$resultadoCons=sqlsrv_query($conexion,$query5);

while($rowCons=sqlsrv_fetch_array( $resultadoCons, SQLSRV_FETCH_ASSOC))
{
$nombreEmp=$rowCons["NombreEmpresa"];
$codEmpre=$rowCons["CodigoEmpresa"];

$codigoHTML.='
<div style="margin: 5px auto; width: 95%;">

<table>
<tr>
	<th colspan="4">Empresa '.$nombreEmp.'</th>
</tr>

<tr>
    <th style="width:5%">N°</th>
	<th>Nombres</th>
	<th>Apellidos</th>
    <th>Recomendación</th>
	<th>No Recomendación</th>

</tr>';
 
$query6="select Ce.CodigoConsultor, Ce.NombresConsultor, Ce.ApellidosConsultor, Ev.resultado from EmpresaPersona E, Consultores Ce, Contrato Co, Consultoria Cl, EvaluacionFinalConsultores Ev where Co.Codigoconsultoria=Cl.Codigoconsultoria
and Co.CodigoEmpresa=E.CodigoEmpresa and E.CodigoEmpresa=Ce.CodigoEmpresa and Ce.CodigoConsultor=Ev.CodigoConsultor and Ev.CodigoContrato=Co.CodigoContrato
and Cl.Codigoconsultoria = '$idConsultoria' and E.CodigoEmpresa = '$codEmpre';";

$resultadoCons2=sqlsrv_query($conexion,$query6);
$contCons=1;
while($rowCons2=sqlsrv_fetch_array( $resultadoCons2, SQLSRV_FETCH_ASSOC))
{

	$idconsultor=$rowCons2["CodigoConsultor"];

$codigoHTML.='<tr><td style="font-weight:bold;">'.$contCons.'</td><td>'.$rowCons2["NombresConsultor"].'</td><td>'.$rowCons2["ApellidosConsultor"].'</td>';

$codigoHTML.='<td>';

$queryRecomendado=" select c.NombresConsultor,  COUNT(*) as recomendaciones from Consultores c, EvaluacionFinalConsultores e
 where c.CodigoConsultor = e.CodigoConsultor and c.CodigoConsultor = '$idconsultor'
 and e.resultado = 'Recomendado' group by c.NombresConsultor, c.CodigoConsultor;";
$resultadoR=sqlsrv_query($conexion, $queryRecomendado);

  while($rowR=sqlsrv_fetch_array($resultadoR))
          { 

           $codigoHTML.='<b>'.$rowR['recomendaciones'].'</b>';
          }

$codigoHTML.='</td><td>';

$queryNoRecomendado=" select c.NombresConsultor,  COUNT(*) as recomendaciones from Consultores c, EvaluacionFinalConsultores e
 where c.CodigoConsultor = e.CodigoConsultor and c.CodigoConsultor = '$idconsultor'
 and e.resultado = 'No Recomendado' group by c.NombresConsultor, c.CodigoConsultor;";

$resultadoNoR=sqlsrv_query($conexion, $queryNoRecomendado);


	while($rowN=sqlsrv_fetch_array($resultadoNoR))
          { 

            $codigoHTML.='<b>'.$rowN['recomendaciones'].'</b>';
          }

$codigoHTML.='</td></tr>';


$contCons++;
}

}

$codigoHTML.='
</table>
</div>';

//para el promedio de la consultoria
     $querypromedio = "exec promedioConsultoria '$codcontrato';"; // Cambiar el 6 por el codigo de consultoria 
      $resultadopromedio=sqlsrv_query($conexion,$querypromedio);
while($filaPromedio = sqlsrv_fetch_array($resultadopromedio,SQLSRV_FETCH_NUMERIC))
      {
$promedio=$filaPromedio[0];
      }

$codigoHTML.='<div style="margin: 5px auto; width: 95%;">
<table>
<tr>
	<th >Promedio de Consultoría: <b style="font-size: 20px;">'. $promedio. '</b> </th>
</tr>
</table>
</div>
</div>';

date_default_timezone_set("America/El_Salvador");
$codigoHTML.='<center><br><b style="color:red">Generado: '.date("d/m/y H:i").'</b></center>'; 


}
   $codigoHTML.='
 </body>
 </html>';

 $dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_consultoria.pdf");


//echo $codigoHTML;
}


 ?>