<?php 

include("../../../conexion/conexion.php");
/*$query="select distinct(A.CodigoArea),E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor, A.AreaEspecializacion
 from EmpresaPersona E, Consultores C, detalleEmpresa D, AreaEspecializacion A, SubArea S
 where E.CodigoEmpresa = C.CodigoEmpresa and E.CodigoEmpresa=D.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and A.CodigoArea=S.CodigoArea ;
";
*/
$query="select Co.CodigoContrato, Ca.NombreConsultoria, E.NombreEmpresa, Co.FechaInicio, Co.FechaFin, Co.Estatus, Co.montoOfertado from 
Contrato Co, Consultoria Ca, EmpresaPersona E where 
Co.Codigoconsultoria=Ca.Codigoconsultoria and Co.CodigoEmpresa=E.CodigoEmpresa;
";
$resultado=sqlsrv_query($conexion, $query);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>reporte</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link rel="stylesheet" href="../../librerias/css/bootstrap.min.css" >
<link rel="stylesheet" href="../../librerias/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="../../librerias/css/estilo.css">
<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->
<link rel="stylesheet" href="../../librerias/css/font-awesome-4.4.0/css/font-awesome.min.css">

</head>

<body>
<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">
<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONSULTORÍA Y PRODUCTOS</strong></p></h3></legend>
<br>
<form action="Reporte-Contrato/Reporte-ContratoE.php" method="post">
            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">
                <thead>
                    <tr>
            <th style='text-align:center;'>N°</th>
            <th style='text-align:center;'>Cosultoria</th>
             <th style='text-align:center;'>Empresa</th>
             <th style='text-align:center;'>Fecha Inicio</th>
             <th style='text-align:center;'>Fecha Fin</th>
             <th style='text-align:center;'>Estatus</th>
             <th style='text-align:center;'>Monto Ofertado</th>

                    </tr>
                </thead>
                
        <tbody>
          <?php
  $contadorC=1;
           while($row=sqlsrv_fetch_array($resultado))
          { 
              $cestado=$row["Estatus"];
            ?>
            <tr width=90px, height=35px>
            <td style='text-align:center;'><?php echo $contadorC;?></td>

              <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaInicio'],'Y-m-d') ;?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaFin'],'Y-m-d');?></td>
<?php
if ($cestado==true) 
{
?>
              <td style='text-align:center;'>Activo</td>
<?php
} 
?>

<?php
if ($cestado==false)
{
?>
              <td style='text-align:center;'>Inactivo</td>
<?php 
}
?>
              <td style='text-align:center;'><?php echo "$".$row['montoOfertado'];?></td>

            </tr>
            <?php 
            $contadorC++;} ?>
        </tbody>
                  
            </table>
            </div>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

<br>

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

<br>
<center>
<input type="image" id="imagebutton" value="enviar" src="../../../librerias/images/Excel-2-icon.png" style="width: 80px; height: 75px" alt="Submit"/></center>
<input type="submit" name="" value="enviar">
</form>

uhu

<div id="contenido">
  
</div>

</body>
</html>