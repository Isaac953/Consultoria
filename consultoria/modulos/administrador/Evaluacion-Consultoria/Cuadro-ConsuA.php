<?php 

include("../../../conexion/conexion.php");

$query="select * from Consultoria c, Contrato ct where c.Codigoconsultoria=ct.Codigoconsultoria"; 

/*$query="

SELECT  distinct(c.Codigoconsultoria), c.NombreConsultoria, c.TipoConsultoria, c.TDR, c.FechaRegistro, co.CodigoContrato
 FROM Consultoria c 
JOIN Personal a ON c.CodigoPersonal = a.CodigoPersonal
JOIN Contrato co on co.Codigoconsultoria=c.Codigoconsultoria
JOIN EvaluacionFinalConsultoria o on c.Codigoconsultoria = co.CodigoContrato

where a.CodigoPersonal = ".$_SESSION['id_usuario']." 
and o.CodigoContrato not in (SELECT distinct e.CodigoContrato 
FROM EvaluacionFinalConsultoria e join Personal a on e.CodigoPersonal = a.CodigoPersonal where a.CodigoPersonal = ".$_SESSION['id_usuario'].");
";
*/
$resultado=sqlsrv_query($conexion, $query);


?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sistema de administracion de consultorias</title>
 
<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->
</head>

<body>
  <legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONSULTORÍAS EVALUADAS</strong></p></h3></legend>

<br>

<form action="librerias/php/evaConsultoria/insertar.php" method="post">
<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">
            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">
                <thead>
             <tr width=90px, height=35px>
             <th style='text-align:center;' width="10%">Código</th>
             <th style='text-align:center;' width="20%">Consultoría</th><!--Estado-->
             <th style='text-align:center;' width="10%">TDR</th>
             <th style='text-align:center;' width="20%">Fecha de registro</th>
             <th style='text-align:center;' width="20%">Tipo</th>
            <th style='text-align:center;' width="20%">Ver Evaluadores</th>
                    </tr>
                </thead>
                <tfoot>
            <tr width=90px, height=35px>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
        <tbody>
           <?php while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC)){ ?>
            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $row['Codigoconsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;'><a target="_blank" href="<?php echo 'modulos/solicitante/ConsultoriaVista/'.$row['TDR'];?>">TDR</a></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaRegistro'],'d-m-Y') ;?></td>
              <td style='text-align:center;'><?php echo $row['TipoConsultoria'];?></td>

             <?php  
              $aux=$row['CodigoContrato']; 

              ?>

              <td style='text-align:center;'><a class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:90px; height:35px;" onclick="showVerConsultorias2('<?php echo $aux ?>')">Ver</a></td>
            </tr>

          <?php } ?>
        </tbody>
                  
            </table>
            </div>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

</body>
</html>