<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>

<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->

    </head>

<?php
session_start();
include("../../conexion/conexion.php");
$cod= $_POST['id']; //este id lo llevare a la vista de editar productos

$queryMonto = "
select co.montoOfertado from Consultoria c, Contrato co
where co.Codigoconsultoria=c.Codigoconsultoria
and c.Codigoconsultoria='$cod';";

$resultadoMonto=sqlsrv_query($conexion, $queryMonto);
while($rowMon=sqlsrv_fetch_array( $resultadoMonto, SQLSRV_FETCH_ASSOC))
{
  $montoOfer = $rowMon['montoOfertado'];
  $montoconv=number_format($montoOfer);

}


$query = "SELECT c.NombreConsultoria, c.TDR, c.Presupuesto,  pr.Producto , pr.Desembolso , pr.fechaPlanificada ,pr.RecibiConforme, pr.pagado,pr.MontoPagado,pr.CodigoProducto
FROM Personal p JOIN  Consultoria c on p.CodigoPersonal = c.CodigoPersonal 
JOIN Producto pr ON pr.Codigoconsultoria = c.Codigoconsultoria
WHERE c.Codigoconsultoria='$cod';";

$resultado=sqlsrv_query($conexion, $query);
while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC))
{
	$nombre = $row['NombreConsultoria'];
  $presu = $row['Presupuesto'];
  $presuconv=number_format($presu);

}

?>
	<body>

<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">
 <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">

<legend><h3 align=center><p style="font-family: Verdana; color:#0B4EFA"><strong>CONSULTORIA: <?php echo "  ".$nombre ; ?></strong></p></h3></legend>

<h4 align="center"><p style=" font-family: Verdana; color:red"><Strong>PRESUPUESTO: <?php echo " $".$montoconv; ?></Strong></p></h4>

<br>
<br>



            <thead>
            <tr width="90px" height="35px">
            <th style='text-align:center;' width="10%">Código</th>
            <th style='text-align:center;' width="20%">Producto</th><!--Estado-->
            <th style='text-align:center;' width="20%">% Desembolso</th>
            <th style='text-align:center;' width="20%">Desembolso</th>

            <th style='text-align:center;' width="10%">Fecha Planificada</th>
            <th style='text-align:center;' width="20%">Acción </th>
            </tr>
            </thead>

            <tfoot>
            <tr width=90px, height=35px>
                        <th></th>
                        <th></th>
                    </tr>
            </tfoot>

        <tbody>
           <?php 
           	$resultado=sqlsrv_query($conexion, $query);
           while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC)){ 
            $pagosin=$row['Desembolso']/(100)*$montoOfer;
            $pagoconv=number_format($pagosin);
            ?>

            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $row['CodigoProducto'];?></td>
              <td style='text-align:center;'><?php echo $row['Producto'];?></td>
              <td style='text-align:center;'><?php echo $row['Desembolso']."%";?></td>
              <td style='text-align:center;'><?php echo '$'. $pagoconv;?></td>
              <td style='text-align:center;'><?php  echo DATE_FORMAT($row['fechaPlanificada'], 'd-m-Y'); ?></td>
             <?php  
             $aux=$row['CodigoProducto']; 
             $aux2=$cod;
              echo "<input type='hidden' value='$aux2' id='valor2'/>";
              ?>

              <td style='text-align:center;'>
              <button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:110px; height:35px;" onclick="actualizarProd(<?php echo $aux?>, $('#valor2').val());return false;" > 
              Actualizar </button></td>
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