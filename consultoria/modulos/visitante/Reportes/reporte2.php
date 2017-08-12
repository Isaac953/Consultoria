<?php 

include("../../../conexion/conexion.php");
/*$query="select distinct(A.CodigoArea),E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor, A.AreaEspecializacion
 from EmpresaPersona E, Consultores C, detalleEmpresa D, AreaEspecializacion A, SubArea S
 where E.CodigoEmpresa = C.CodigoEmpresa and E.CodigoEmpresa=D.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and A.CodigoArea=S.CodigoArea ;
";
*/
$query="select co.CodigoContrato, c.Codigoconsultoria, e.NombreEmpresa, c.NombreConsultoria from Consultoria c, Contrato co, EmpresaPersona e
where c.Codigoconsultoria=co.Codigoconsultoria
and co.CodigoEmpresa=e.CodigoEmpresa
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
<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>EVALUACIONES POR EQUIPO CONSULTOR</strong></p></h3></legend>
<br>
            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">
                <thead>
                    <tr>
            <th style='text-align:center;'>Nº</th>
            <th style='text-align:center;'>Cosultoria</th>
            <th style='text-align:center;'>Empresa</th>
             <th style='text-align:center;'>Áreas</th>
             <th style='text-align:center;'>Puntaje evaluación</th>


                    </tr>
                </thead>
                
        <tbody>
          <?php

           while($row=sqlsrv_fetch_array($resultado))
          { 
            //obteniendo el codigo de la empresa
            $idconsultoria=$row['Codigoconsultoria'];
            $codcontrato=$row["CodigoContrato"];
            ?>
            <tr width=90px, height=35px>
            <td style='text-align:center;'><?php echo $row['Codigoconsultoria'];?></td>

              <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'>

<?php 

$queryArea="
select distinct(A.CodigoArea), A.AreaEspecializacion from Consultoria c, DetalleConsultoria D, AreaEspecializacion A, SubArea S
where c.Codigoconsultoria=D.Codigoconsultoria
and D.CodigoSubArea=S.CodigoSubArea
and S.CodigoArea=A.CodigoArea
and c.Codigoconsultoria = '$idconsultoria' ";

$resultadoArea=sqlsrv_query($conexion, $queryArea);

  while($rowA=sqlsrv_fetch_array($resultadoArea))
          { 

            echo "&nbsp; &nbsp; &nbsp".$rowA['AreaEspecializacion']." ";
          }
 ?>

              </td>
              <?php
//para el promedio de la consultoria
     $querypromedio = "exec promedioConsultoria '$codcontrato';"; // Cambiar el 6 por el codigo de consultoria 
      $resultadopromedio=sqlsrv_query($conexion,$querypromedio);
while($filaPromedio = sqlsrv_fetch_array($resultadopromedio,SQLSRV_FETCH_NUMERIC))
      {
$promedio=$filaPromedio[0];
      }
?>
              <td style='text-align:center;'>
                <?php echo $promedio; ?>
              </td>

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