<?php 

include("../../../conexion/conexion.php");
/*$query="select distinct(A.CodigoArea),E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor, A.AreaEspecializacion
 from EmpresaPersona E, Consultores C, detalleEmpresa D, AreaEspecializacion A, SubArea S
 where E.CodigoEmpresa = C.CodigoEmpresa and E.CodigoEmpresa=D.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and A.CodigoArea=S.CodigoArea ;
";
*/

$query="select  C.CodigoConsultor, E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor
 from EmpresaPersona E, Consultores C
 where E.CodigoEmpresa = C.CodigoEmpresa;
";

$resultado=sqlsrv_query($conexion, $query);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>reporte</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />


  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
  </script>
</head>

<body>

<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">
<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>REPORTES POR EQUIPO CONSULTOR</strong></p></h3></legend>
<br>
            <table  id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
          
            <th style='text-align:center; width: 30%'>Empresa</th>
            <th style='text-align:center; width: 20%'>Áreas Especialización</th>
            <th style='text-align:center; width: 30%'>Nombre Consultor</th>
             <th style='text-align:center; width: 10%'>Recomendaciones</th>
             <th style='text-align:center; width: 10%'>No Recomendaciones</th>


                    </tr>
                </thead>
                
        <tbody>
          <?php

           while($row=sqlsrv_fetch_array($resultado))
          { 
            //obteniendo el codigo de la empresa
            $idempresa=$row['CodigoEmpresa'];
            $idconsultor=$row["CodigoConsultor"];
            ?>
            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'>

<?php 

$queryArea="
 select distinct(A.CodigoArea), A.AreaEspecializacion from detalleEmpresa D, EmpresaPersona E, AreaEspecializacion A, SubArea S
 where D.CodigoEmpresa=E.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and S.CodigoArea=A.CodigoArea and E.CodigoEmpresa = '$idempresa';";

$resultadoArea=sqlsrv_query($conexion, $queryArea);

  while($rowA=sqlsrv_fetch_array($resultadoArea))
          { 

            echo "&nbsp; &nbsp; &nbsp".$rowA['AreaEspecializacion']." ";
          }
 ?>

              </td>
              <td style='text-align:center;'><?php echo $row['NombresConsultor']." ".$row['ApellidosConsultor'] ;?></td>

      <td style='text-align:center;'>
        
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
      <td style='text-align:center;'>
        
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