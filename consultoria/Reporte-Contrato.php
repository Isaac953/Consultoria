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

 ?>

<center><legend><h2 align="center" style="font-family: Verdana; color:#0072bb">Reporte de Contratos</h2></legend>
</center>

    <div class="container">
      <div>
        <img width="200px" style="position:absolute; margin-right:11%; margin-left:2%; margin-bottom: 5%;" src="librerias/images/logo.png"/>
        <br>
      </div>
      <div align="right" style="" ">
      </div>
      </div>

<form action="Reporte-ContratoE.php" method="post" onsubmit='redirect();return false;'>
<center>
<div class="tooltip"><b style="display: none">Hover over me</b>
 <span class="tooltiptext">Generar Excel</span>
<input type="image" id="imagebutton" value="enviar" src="librerias/images/Excel-2-icon.png" style="width: 80px; height: 75px" alt="Submit"/>

</div>
</center>

<?php
 $query="select Co.CodigoContrato, Ca.NombreConsultoria, E.NombreEmpresa, Co.FechaInicio, Co.FechaFin from 
Contrato Co, Consultoria Ca, EmpresaPersona E where 
Co.Codigoconsultoria=Ca.Codigoconsultoria and Co.CodigoEmpresa=E.CodigoEmpresa;";

$resultado=sqlsrv_query($conexion,$query);
?>
<!--para los elementos pep-->
<div style="margin: 5px auto;  width: 95%">
<table>
<tr>
  <th colspan="5">CONTRATOS</th>
</tr>
  <tr>
    <th style="width: 10%">N°</th>
    <th>Nombre Consultoria</th>
    <th>Nombre Empresa</th>
    <th>Fecha Inicio</th>
    <th>Fecha Final</th>
  </tr>
  <?php
  $contadorC=1;
while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC))
{
  echo "<tr><td style='font-weight:bold;'>".$contadorC."</td><td>".$row["NombreConsultoria"]."</td><td>".$row["NombreEmpresa"]."</td><td>".DATE_FORMAT($row['FechaInicio'], 'Y-m-d')."</td><td>".DATE_FORMAT($row['FechaFin'], 'Y-m-d')."</td></tr>";

$contadorC++;
}
?>

</table>
</div>

</form>

<?php
date_default_timezone_set("America/El_Salvador");
echo "<center><b style='color:red; font-size: 17px;'>Generado: ".date("d/m/y H:i")."</b></center>"; 
?>


 </body>
 </html>