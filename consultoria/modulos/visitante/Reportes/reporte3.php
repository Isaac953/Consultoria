<?php 

include("../../../conexion/conexion.php");
/*$query="select distinct(A.CodigoArea),E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor, A.AreaEspecializacion
 from EmpresaPersona E, Consultores C, detalleEmpresa D, AreaEspecializacion A, SubArea S
 where E.CodigoEmpresa = C.CodigoEmpresa and E.CodigoEmpresa=D.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and A.CodigoArea=S.CodigoArea ;
";
*/
$query="select e.NombreEmpresa, c.NombreConsultoria, p.Producto, p.fechaPlanificada, p.RecibiConforme
 from Contrato co, Consultoria c, EmpresaPersona e, Producto p
where co.Codigoconsultoria=c.Codigoconsultoria and
co.CodigoEmpresa=e.CodigoEmpresa and
c.Codigoconsultoria=p.Codigoconsultoria;
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
            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">
                <thead>
                    <tr>
            <th style='text-align:center;'>Empresa</th>
            <th style='text-align:center;'>Cosultoria</th>
             <th style='text-align:center;'>Producto</th>
             <th style='text-align:center;'>Fecha Planificada</th>
             <th style='text-align:center;'>Fecha Entregada</th>

                    </tr>
                </thead>
                
        <tbody>
          <?php

           while($row=sqlsrv_fetch_array($resultado))
          { 
            ?>
            <tr width=90px, height=35px>
            <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>

              <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['Producto'];?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['fechaPlanificada'],'Y-m-d') ;?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['RecibiConforme'],'Y-m-d');?></td>

            </tr>
            <?php } ?>
        </tbody>
                  
            </table>
            </div>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

<div id="contenido">
  
</div>

</body>
</html>