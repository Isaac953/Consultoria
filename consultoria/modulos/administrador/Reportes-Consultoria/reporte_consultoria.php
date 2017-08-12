<?php 
session_start();
$idus=$_SESSION['id_usuario'];
$idcontrar=$_POST['idcont'];
require_once("dompdf/dompdf_config.inc.php");
include("conexion.php");
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

$codigoHTML.='
    <div class="container">
      <div>
        <img width="200px" style="position:absolute; margin-right:11%; margin-left:2%; margin-bottom: 5%;" src="../../../librerias/images/logo.png"/>
        <br>
        </div>
      </div>';

//capturando el id
 $idconsulto=$_POST["txtId"];
//PARA LA CONSULTORIA
 $query1="select * from Consultoria c, Personal p, Contrato co
 where c.CodigoPersonal=p.CodigoPersonal
 and co.Codigoconsultoria=c.Codigoconsultoria
and  c.Codigoconsultoria= '$idconsulto'";
      
$resultadoConsultoria=sqlsrv_query($conexion,$query1);
$resultadoConsultoria2=sqlsrv_query($conexion,$query1);


while($row=sqlsrv_fetch_array( $resultadoConsultoria, SQLSRV_FETCH_ASSOC))
  {

  	  	$nombreConsul=$row["NombreConsultoria"];
  	$codcontrato=$row["CodigoContrato"];

$codigoHTML.='<br><br><br><center><legend><h2 align="center" style="font-family: Verdana; color:#0072bb">'.'Consultoría: '.$row["NombreConsultoria"].'</h2></legend></center>';
  }




while($rowC=sqlsrv_fetch_array( $resultadoConsultoria2, SQLSRV_FETCH_ASSOC))
{
  $idConsultoria=$rowC["Codigoconsultoria"];
  $tipo=$rowC["NivelAlcance"];
  $monofert=$rowC["montoOfertado"];
  $presupuesto=$rowC["Presupuesto"];
  $presupuestoConv = number_format($presupuesto);
  $montconv = number_format($monofert);

	//echo $idConsultoria;
  $codigoHTML.='<div style=" text-align: center; width: 100%;">
  <div style="margin: 5px auto; width: 95%">
<table>
	<tr>
		<th>Solicitante</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Presupuesto</th>
    <th>Monto Ofertado</th>
		<th>Forma de Pago</th>
		<th>Tipo Consultoría</th>
		<th>Nivel de Alcance</th>
	</tr>';

  $codigoHTML.='<tr>
	<td style="font-weight:bold;">'.$rowC["Nombres"].'</td>
	<td>'.DATE_FORMAT($rowC['FechaInicio'], 'Y-m-d').'</td>
	<td>'.DATE_FORMAT($rowC['FechaFinal'], 'Y-m-d').'</td>
	<td>'.'$'.$presupuestoConv.'</td>
  <td>'.'$'.$montconv.'</td>
	<td>'.$rowC["FormaPa"].'</td>
	<td>'.$rowC["TipoConsultoria"].'</td>
	<td>'.$rowC["NivelAlcance"].'</td>
	</tr>
</table>
</div>
<br>';


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
</div>
<br>';


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
</div>

<br>';

$queryCont="select ct.CodigoContrato from Contrato ct, Consultoria c where c.Codigoconsultoria=ct.Codigoconsultoria and ct.Codigoconsultoria='$idConsultoria'";

$resultadoCont=sqlsrv_query($conexion,$queryCont);

$cont=sqlsrv_fetch_array($resultadoCont,SQLSRV_FETCH_ASSOC);

$id_contratob=$cont['CodigoContrato'];

/*consulta para las modificaciones del contrato*/
$queryContrato="SELECT * FROM Contrato c, bitacora_contrato b
where c.CodigoContrato=b.CodigoContrato and c.CodigoContrato = '$id_contratob'";
$resultadoContrato=sqlsrv_query($conexion,$queryContrato);

$codigoHTML.='<div style="margin: 5px auto;  width: 95%">
<table>
<tr>
	<th colspan="9">HISTORIAL DE MODIFICACIONES DE CONTRATO</th>
</tr>
  <tr>
    <th style="width:5%">Nº</th>
    <th>Fecha Inicio Anterior</th>
    <th>Fecha Fin Anterior</th>
    <th>Monto Anterior</th>
    <th>Fecha Inicio Nueva</th>
    <th>Fecha Fin Nueva</th>
    <th>Monto Nuevo</th>
    <th>Descripcion</th>
    <th>Fecha Modificacion</th>
  </tr>';
 
$contadorcontr=1;
while($rowC=sqlsrv_fetch_array( $resultadoContrato, SQLSRV_FETCH_ASSOC))
{ 

$codigoHTML.='<tr>
<td style="text-align:center; font-weight:bold;">'.$contadorcontr.'</td>

<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaInicioA'], 'd-m-Y').'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaFinA'], 'd-m-Y').'</td>
<td style="text-align:center;">'.'$'.number_format($rowC['montoOfertadoA']).'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaInicioN'], 'd-m-Y').'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaFinN'], 'd-m-Y').'</td>
<td style="text-align:center;">'.'$'.number_format($rowC['montoOfertadoN']).'</td>
<td style="text-align:center;">'.$rowC['Descripcion'].'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['fechaModificacion'], 'd-m-Y H:i').'</td>
</tr>';

$contadorcontr++;
}

$codigoHTML.='</table>
</div>

<br>';



/*para los productos vejos*/
$querybitacoraViejos="select b.Producto, b.Desembolso, b.fechaPlanificada, b.fechaModificacion, b.explicacion from BitacoraProductoViejo b, Consultoria c
where c.Codigoconsultoria=b.Codigoconsultoria
and c.Codigoconsultoria = '$idConsultoria'; ";
$resultadobitacoraViejos=sqlsrv_query($conexion,$querybitacoraViejos);


/*para obtener el monto del contrato*/
$queryConsultoriaMonto=" select co.Codigoconsultoria, c.montoOfertado from Contrato c, Consultoria co
 where c.Codigoconsultoria=co.Codigoconsultoria
 and c.CodigoContrato = '$id_contratob'";
$resultadoObtenConsul=sqlsrv_query($conexion,$queryConsultoriaMonto);
$contObte=sqlsrv_fetch_array($resultadoObtenConsul,SQLSRV_FETCH_ASSOC);
$montocontrato=$contObte["montoOfertado"];



$codigoHTML.='<div style="margin: 5px auto;  width: 95%">
<table>
<tr>
	<th colspan="7">HISTORIAL DE MODIFICACIONES DE PRODUCTOS</th>
</tr>
  <tr>
    <th style="width:5%">Nº</th>
    <th>Nombre producto</th>
    <th>% Desembolso</th>
    <th>Fecha planificada</th>
    <th>Monto a pagar</th>
    <th>Fecha de Registro</th>
    <th>Descripcion</th>

    </tr>';


$contadorproduV=1;
while($rowProd=sqlsrv_fetch_array( $resultadobitacoraViejos, SQLSRV_FETCH_ASSOC))
{ 

$codigoHTML.='<tr>
<td style="text-align:center; font-weight:bold;">'.$contadorproduV.'</td>
<td style="text-align:center;">'.$rowProd['Producto'].'</td>
<td style="text-align:center;">'.$rowProd['Desembolso'].'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowProd['fechaPlanificada'], 'd-m-Y').'</td>
<td style="text-align:center;">'.'$'.number_format(($rowProd['Desembolso']/100)*$montocontrato).'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowProd['fechaModificacion'], 'd-m-Y H:i').'</td>
<td style="text-align:center;">'.$rowProd['explicacion'].'</td>
</tr>';

$contadorproduV++;
}
$codigoHTML.='</table>
</div>
<br>';

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
$montoP=$montocontrato*($rowProd["Desembolso"]/(100));
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
</div>
<br>';

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
	<th colspan="5">Empresa '.$nombreEmp.'</th>
</tr>

<tr>
	<th colspan="5">Equipo Consultor</th>
</tr>

<tr>
    <th style="width:5%">N°</th>
	<th>Nombres</th>
	<th>Apellidos</th>
    <th>Recomendación</th>
	<th>No Recomendación</th>

</tr>';
 
$query6="SELECT distinct CodigoContrato,c.NombresConsultor, c.ApellidosConsultor,
 (SELECT COUNT(*) FROM EvaluacionFinalConsultores ev WHERE ev.resultado ='Recomendado' and ev.CodigoContrato = e.CodigoContrato   and ev.CodigoConsultor = e.CodigoConsultor group by ev.CodigoContrato,ev.CodigoConsultor ) as Recomendado,
 (SELECT COUNT(*) FROM EvaluacionFinalConsultores ev WHERE ev.resultado ='No Recomendado' and ev.CodigoContrato = e.CodigoContrato   and ev.CodigoConsultor = e.CodigoConsultor group by ev.CodigoContrato,ev.CodigoConsultor ) as NoRecomendado    
 FROM EvaluacionFinalConsultores e JOIN Consultores c ON e.CodigoConsultor = c.CodigoConsultor
 where CodigoContrato= '$idcontrar';";

$resultadoCons2=sqlsrv_query($conexion,$query6);
$contCons=1;
while($rowCons2=sqlsrv_fetch_array( $resultadoCons2, SQLSRV_FETCH_ASSOC))
{

	$idconsultor=$rowCons2["CodigoConsultor"];

$codigoHTML.= '<tr><td style="font-weight:bold;">'.$contCons.'</td><td>'.$rowCons2["NombresConsultor"].'</td><td>'.$rowCons2["ApellidosConsultor"].'</td><td>'.$rowCons2["Recomendado"].'</td><td>'.$rowCons2["NoRecomendado"].'</td></tr>';


$contCons++;
}

}

$codigoHTML.='
</table>
</div>
<br>';

$query4="select distinct(P.CodigoPersonal), P.Nombres, P.Apellidos, P.Car, O.NombreOficina from Contrato CO, EvaluacionFinalConsultoria E, Consultoria C, Personal P, Oficinas O where CO.CodigoContrato=E.CodigoContrato
and CO.Codigoconsultoria=C.Codigoconsultoria and E.CodigoPersonal=P.CodigoPersonal and P.CodigoOficina=O.CodigoOficina and C.Codigoconsultoria = '$idConsultoria';";
$resultadoEva=sqlsrv_query($conexion,$query4);

$codigoHTML.='<div style="margin: 5px auto; width: 95%"">
<table>
<tr>
	<th colspan="5">Evaluadores de la consultoría</th>
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
</div>
<br>';

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
</div>
<br>';

date_default_timezone_set("America/El_Salvador");
$codigoHTML.='<center><br><b style="color:red">Generado: '.date("d/m/y H:i").'</b></center>'; 


$queryPersonal="select * from Personal where CodigoPersonal =".$_SESSION['id_usuario'];
      
$resultadoPersonal=sqlsrv_query($conexion,$queryPersonal);

$nombres='';
$apell='';
while($filaPer = sqlsrv_fetch_array($resultadoPersonal,SQLSRV_FETCH_ASSOC))
      {
     $nombres=$filaPer["Nombres"];
     $apell=$filaPer["Apellidos"];

      }

$codigoHTML.='<center><b>Usuario:'.' '.$nombres.' '.$apell.'</b></center>';

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

 $codigoHTML.='
    <div class="container">
      <div>
        <img width="200px" style="position:absolute; margin-right:11%; margin-left:2%; margin-bottom: 5%;" src="../../../librerias/images/logo.png"/>
        <br>
        </div>
      </div>
      <br>';

      //capturando el id
 $idconsulto=$_POST["txtId"];

//PARA LA CONSULTORIA
$query1="select * from Consultoria c, Personal p, Contrato co
 where c.CodigoPersonal=p.CodigoPersonal
 and co.Codigoconsultoria=c.Codigoconsultoria
and  c.Codigoconsultoria= '$idconsulto'";
      
$resultadoConsultoria=sqlsrv_query($conexion,$query1);
$resultadoConsultoria2=sqlsrv_query($conexion,$query1);


while($row=sqlsrv_fetch_array( $resultadoConsultoria, SQLSRV_FETCH_ASSOC))
  {
  	  	$nombreConsul=$row["NombreConsultoria"];
  	$codcontrato=$row["CodigoContrato"];

$codigoHTML.='<br><br><br><center><legend><h2 align="center" style="font-family: Verdana; color:#0072bb">'.'Consultoría: '.$row["NombreConsultoria"].'</h2></legend></center>';
  }




while($rowC=sqlsrv_fetch_array( $resultadoConsultoria2, SQLSRV_FETCH_ASSOC))
{
  $idConsultoria=$rowC["Codigoconsultoria"];
  $tipo=$rowC["NivelAlcance"];
  $monofert=$rowC["montoOfertado"];
  $presupuesto=$rowC["Presupuesto"];
  $presupuestoConv = number_format($presupuesto);
  $montconv = number_format($monofert);
	//echo $idConsultoria;
  $codigoHTML.='<div style=" text-align: center; width: 100%;">
  <div style="margin: 5px auto; width: 95%">
<table>
	<tr>
		<th>Solicitante</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Presupuesto</th>
     <th>Monto Ofertado</th>
		<th>Forma de Pago</th>
		<th>Tipo Consultoría</th>
		<th>Nivel de Alcance</th>
	</tr>';

  $codigoHTML.='<tr>
	<td style="font-weight:bold;">'.$rowC["Nombres"].'</td>
	<td>'.DATE_FORMAT($rowC['FechaInicio'], 'Y-m-d').'</td>
	<td>'.DATE_FORMAT($rowC['FechaFinal'], 'Y-m-d').'</td>
	<td>'.'$'.$presupuestoConv.'</td>
  <td>'.'$'.$montconv.'</td>
	<td>'.$rowC["FormaPa"].'</td>
	<td>'.$rowC["TipoConsultoria"].'</td>
	<td>'.$rowC["NivelAlcance"].'</td>
	</tr>
</table>
</div>
<br>';


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
</div>
<br>';


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
</div>
<br>';

$queryCont="select ct.CodigoContrato from Contrato ct, Consultoria c where c.Codigoconsultoria=ct.Codigoconsultoria and ct.Codigoconsultoria='$idConsultoria'";

$resultadoCont=sqlsrv_query($conexion,$queryCont);

$cont=sqlsrv_fetch_array($resultadoCont,SQLSRV_FETCH_ASSOC);

$id_contratob=$cont['CodigoContrato'];

/*consulta para las modificaciones del contrato*/
$queryContrato="SELECT * FROM Contrato c, bitacora_contrato b
where c.CodigoContrato=b.CodigoContrato and c.CodigoContrato = '$id_contratob'";
$resultadoContrato=sqlsrv_query($conexion,$queryContrato);

$codigoHTML.='<div style="margin: 5px auto;  width: 95%">
<table>
<tr>
	<th colspan="9">HISTORIAL DE MODIFICACIONES DE CONTRATO</th>
</tr>
  <tr>
    <th style="width:5%">Nº</th>
    <th>Fecha Inicio Anterior</th>
    <th>Fecha Fin Anterior</th>
    <th>Monto Anterior</th>
    <th>Fecha Inicio Nueva</th>
    <th>Fecha Fin Nueva</th>
    <th>Monto Nuevo</th>
    <th>Descripcion</th>
    <th>Fecha Modificacion</th>
  </tr>';
 
$contadorcontr=1;
while($rowC=sqlsrv_fetch_array( $resultadoContrato, SQLSRV_FETCH_ASSOC))
{ 

$codigoHTML.='<tr>
<td style="text-align:center; font-weight:bold;">'.$contadorcontr.'</td>

<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaInicioA'], 'd-m-Y').'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaFinA'], 'd-m-Y').'</td>
<td style="text-align:center;">'.'$'.number_format($rowC['montoOfertadoA']).'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaInicioN'], 'd-m-Y').'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaFinN'], 'd-m-Y').'</td>
<td style="text-align:center;">'.'$'.number_format($rowC['montoOfertadoN']).'</td>
<td style="text-align:center;">'.$rowC['Descripcion'].'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['fechaModificacion'], 'd-m-Y H:i').'</td>
</tr>';

$contadorcontr++;
}

$codigoHTML.='</table>
</div>

<br>';

$queryCont="select ct.CodigoContrato from Contrato ct, Consultoria c where c.Codigoconsultoria=ct.Codigoconsultoria and ct.Codigoconsultoria='$idConsultoria'";

$resultadoCont=sqlsrv_query($conexion,$queryCont);

$cont=sqlsrv_fetch_array($resultadoCont,SQLSRV_FETCH_ASSOC);

$id_contratob=$cont['CodigoContrato'];

/*consulta para las modificaciones del contrato*/
$queryContrato="SELECT * FROM Contrato c, bitacora_contrato b
where c.CodigoContrato=b.CodigoContrato and c.CodigoContrato = '$id_contratob'";
$resultadoContrato=sqlsrv_query($conexion,$queryContrato);

$codigoHTML.='<div style="margin: 5px auto;  width: 95%">
<table>
<tr>
	<th colspan="9">HISTORIAL DE MODIFICACIONES DE CONTRATO</th>
</tr>
  <tr>
    <th style="width:5%">Nº</th>
    <th>Fecha Inicio Anterior</th>
    <th>Fecha Fin Anterior</th>
    <th>Monto Anterior</th>
    <th>Fecha Inicio Nueva</th>
    <th>Fecha Fin Nueva</th>
    <th>Monto Nuevo</th>
    <th>Descripcion</th>
    <th>Fecha Modificacion</th>
  </tr>';
 
$contadorcontr=1;
while($rowC=sqlsrv_fetch_array( $resultadoContrato, SQLSRV_FETCH_ASSOC))
{ 

$codigoHTML.='<tr>
<td style="text-align:center; font-weight:bold;">'.$contadorcontr.'</td>

<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaInicioA'], 'd-m-Y').'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaFinA'], 'd-m-Y').'</td>
<td style="text-align:center;">'.'$'.number_format($rowC['montoOfertadoA']).'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaInicioN'], 'd-m-Y').'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['FechaFinN'], 'd-m-Y').'</td>
<td style="text-align:center;">'.'$'.number_format($rowC['montoOfertadoN']).'</td>
<td style="text-align:center;">'.$rowC['Descripcion'].'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowC['fechaModificacion'], 'd-m-Y H:i').'</td>
</tr>';

$contadorcontr++;
}

$codigoHTML.='</table>
</div>

<br>';



/*para los productos vejos*/
$querybitacoraViejos="select b.Producto, b.Desembolso, b.fechaPlanificada, b.fechaModificacion, b.explicacion from BitacoraProductoViejo b, Consultoria c
where c.Codigoconsultoria=b.Codigoconsultoria
and c.Codigoconsultoria = '$idConsultoria'; ";
$resultadobitacoraViejos=sqlsrv_query($conexion,$querybitacoraViejos);


/*para obtener el monto del contrato*/
$queryConsultoriaMonto=" select co.Codigoconsultoria, c.montoOfertado from Contrato c, Consultoria co
 where c.Codigoconsultoria=co.Codigoconsultoria
 and c.CodigoContrato = '$id_contratob'";
$resultadoObtenConsul=sqlsrv_query($conexion,$queryConsultoriaMonto);
$contObte=sqlsrv_fetch_array($resultadoObtenConsul,SQLSRV_FETCH_ASSOC);
$montocontrato=$contObte["montoOfertado"];



$codigoHTML.='<div style="margin: 5px auto;  width: 95%">
<table>
<tr>
	<th colspan="7">HISTORIAL DE MODIFICACIONES DE PRODUCTOS</th>
</tr>
  <tr>
    <th style="width:5%">Nº</th>
    <th>Nombre producto</th>
    <th>% Desembolso</th>
    <th>Fecha planificada</th>
    <th>Monto a pagar</th>
    <th>Fecha de Registro</th>
    <th>Descripcion</th>

    </tr>';


$contadorproduV=1;
while($rowProd=sqlsrv_fetch_array( $resultadobitacoraViejos, SQLSRV_FETCH_ASSOC))
{ 

$codigoHTML.='<tr>
<td style="text-align:center; font-weight:bold;">'.$contadorproduV.'</td>
<td style="text-align:center;">'.$rowProd['Producto'].'</td>
<td style="text-align:center;">'.$rowProd['Desembolso'].'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowProd['fechaPlanificada'], 'd-m-Y').'</td>
<td style="text-align:center;">'.'$'.number_format(($rowProd['Desembolso']/100)*$montocontrato).'</td>
<td style="text-align:center;">'.DATE_FORMAT($rowProd['fechaModificacion'], 'd-m-Y H:i').'</td>
<td style="text-align:center;">'.$rowProd['explicacion'].'</td>
</tr>';

$contadorproduV++;
}
$codigoHTML.='</table>
</div>
<br>';




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
$montoP=$montocontrato*($rowProd["Desembolso"]/(100));
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
</div><br>';

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
	<th colspan="5">Empresa '.$nombreEmp.'</th>
</tr>
<tr>
	<th colspan="5">Equipo Consultor</th>
</tr>

<tr>
    <th style="width:5%">N°</th>
	<th>Nombres</th>
	<th>Apellidos</th>
    <th>Recomendación</th>
	<th>No Recomendación</th>

</tr>';
 
$query6="SELECT distinct CodigoContrato,c.NombresConsultor, c.ApellidosConsultor,
 (SELECT COUNT(*) FROM EvaluacionFinalConsultores ev WHERE ev.resultado ='Recomendado' and ev.CodigoContrato = e.CodigoContrato   and ev.CodigoConsultor = e.CodigoConsultor group by ev.CodigoContrato,ev.CodigoConsultor ) as Recomendado,
 (SELECT COUNT(*) FROM EvaluacionFinalConsultores ev WHERE ev.resultado ='No Recomendado' and ev.CodigoContrato = e.CodigoContrato   and ev.CodigoConsultor = e.CodigoConsultor group by ev.CodigoContrato,ev.CodigoConsultor ) as NoRecomendado    
 FROM EvaluacionFinalConsultores e JOIN Consultores c ON e.CodigoConsultor = c.CodigoConsultor
 where CodigoContrato= '$idcontrar';";

$resultadoCons2=sqlsrv_query($conexion,$query6);
$contCons=1;
while($rowCons2=sqlsrv_fetch_array( $resultadoCons2, SQLSRV_FETCH_ASSOC))
{

	$idconsultor=$rowCons2["CodigoConsultor"];

$codigoHTML.= '<tr><td style="font-weight:bold;">'.$contCons.'</td><td>'.$rowCons2["NombresConsultor"].'</td><td>'.$rowCons2["ApellidosConsultor"].'</td><td>'.$rowCons2["Recomendado"].'</td><td>'.$rowCons2["NoRecomendado"].'</td></tr>';

$contCons++;

}

}
$codigoHTML.='
</table>
</div><br>';

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
</div><br>';

date_default_timezone_set("America/El_Salvador");
$codigoHTML.='<center><br><b style="color:red">Generado: '.date("d/m/y H:i").'</b></center>'; 

$queryPersonal="select * from Personal where CodigoPersonal =".$_SESSION['id_usuario'];
      
$resultadoPersonal=sqlsrv_query($conexion,$queryPersonal);

$nombres='';
$apell='';
while($filaPer = sqlsrv_fetch_array($resultadoPersonal,SQLSRV_FETCH_ASSOC))
      {
     $nombres=$filaPer["Nombres"];
     $apell=$filaPer["Apellidos"];

      }

$codigoHTML.='<center><b>Usuario:'.' '.$nombres.' '.$apell.'</b></center>';


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