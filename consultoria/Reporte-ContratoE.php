<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_ContratoE.xls");

include("conexion/conexion.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Contratos</title>

 <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */

table {
  background: white;
  text-align: center;
}

td 
{
  text-align: center;
  border-color: black;
  font-family: Verdana;
}
</style>

</head>
<body>

<?php
 $query="select Co.CodigoContrato, Ca.NombreConsultoria, E.NombreEmpresa, Co.FechaInicio, Co.FechaFin from 
Contrato Co, Consultoria Ca, EmpresaPersona E where 
Co.Codigoconsultoria=Ca.Codigoconsultoria and Co.CodigoEmpresa=E.CodigoEmpresa;";

$resultado=sqlsrv_query($conexion,$query);
?>

<table class="table table-bordered" border="1" width="95%">
<tr><td colspan="5" style="height: 70px;"><p align="center" style="font-family: Verdana; color:#0072bb; font-size:20px; font-weight: bold; vertical-align:middle;">Reporte de Contratos</p></tr>

<tr>
<td>
    <div class="container" align="center">
        <img width="20%" align="center" style="vertical-align: center;" src="http://localhost:8090/Plan%20%5b25-01-17%5d/consultoria/librerias/images/logo.png"/>
        <br>
      </div>
      </td>
      </tr>

  <tr style="height: 30px; vertical-align:middle;">
    <td colspan="5" bgcolor="#0072bb" style="color: white;"><CENTER><strong>CONTRATOS</strong></CENTER></td>
  </tr>
  <tr style="height: 30px; vertical-align:middle;">
    <td style="text-align: center; color: white; font-weight: bold; background: #0072bb;"><strong>N°</strong></td>
    <td style="text-align: center; color: white; font-weight: bold; background: #0072bb;"><strong>Nombre Consultoria</strong></td>
    <td style="text-align: center; color: white; font-weight: bold; background: #0072bb;"><strong>Nombre Empresa</strong></td>
    <td style="text-align: center; color: white; font-weight: bold; background: #0072bb;"><strong>Fecha de Inicio</strong></td>
    <td style="text-align: center; color: white; font-weight: bold; background: #0072bb;"><strong>Fecha de Fin</strong></td>
  </tr>
 
  <?php
  $contadorC=1;
while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC))
{
  echo "<tr style='height: 30px; vertical-align:middle;'><td style='font-weight:bold;'>".$contadorC."</td><td>".$row["NombreConsultoria"]."</td><td>".$row["NombreEmpresa"]."</td><td>".DATE_FORMAT($row['FechaInicio'], 'Y-m-d')."</td><td>".DATE_FORMAT($row['FechaFin'], 'Y-m-d')."</td></tr>";

$contadorC++;
}
?>

<tr><td colspan="5">
<?php
date_default_timezone_set("America/El_Salvador");
echo "<center><b style='color:red; font-size: 17px;'>Generado: ".date("d/m/y H:i")."</b></center>"; 
?></td></tr>

</table>

</body>
</html>