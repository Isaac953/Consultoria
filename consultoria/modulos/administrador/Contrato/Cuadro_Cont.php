<?php 

    include("../../../conexion/conexion.php");

 $query="select C.CodigoContrato, C.FechaInicio, C.FechaFin, C.Estatus, C.montoOfertado, CS.NombreConsultoria, E.NombreEmpresa from Contrato C, EmpresaPersona E, Consultoria CS where C.CodigoEmpresa=E.CodigoEmpresa and C.Codigoconsultoria=CS.Codigoconsultoria";
      
$resultado=sqlsrv_query($conexion,$query);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mantenimientos de Contratos</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


<link rel="stylesheet" href="librerias/css/bootstrap.min.css" >
<link rel="stylesheet" href="librerias/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="librerias/css/estilo.css">
<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->
<link rel="stylesheet" href="librerias/css/font-awesome-4.4.0/css/font-awesome.min.css">

</head>

<body>

<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">

            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises" >

<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>MANTENIMIENTO DE CONTRATOS</strong></p></h3></legend>

        <div><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(151, 196, 254) inset; background: rgb(61, 148, 246) linear-gradient(to bottom, rgb(61, 148, 246) 5%, rgb(30, 98, 208) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(51, 127, 237); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(21, 112, 205);" onclick="showNewContrato()" >Nuevo Contrato</button></div>
        <br>
                <thead>
                    <tr width=90px, height=35px>
            <th style='text-align:center;' width="8%">Id</th>
            <th style='text-align:center;' width="10%">Empresa</th><!--Estado-->
            <th style='text-align:center;' width="11%">Consultoria</th>
            <th style='text-align:center;' width="12%">Fecha de Inicio</th><!--Estado-->
            <th style='text-align:center;' width="12%">Fecha de Fin</th>
            <th style='text-align:center;' width="10%">Estatus</th>
            <th style='text-align:center;' width="10%">Monto Ofertado</th>
            <th style='text-align:center;' width="25%">Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr width=90px, height=35px>
                        <th></th>
                        <th></th>
                       
                     
                    </tr>
                </tfoot>
        <tbody>
          <?php while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC)){ 
if ($row['Estatus']==true)
 {
  $estado="Activo";
 }
 elseif ($row['Estatus']!=true) {
 $estado="Inactivo"; 
}
            ?>
            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $row['CodigoContrato'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaInicio'], 'd-m-Y');?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaFin'], 'd-m-Y');?></td>
              <td style='text-align:center;'><?php echo $estado;?></td>
              <td style='text-align:center;'><?php echo "$".number_format($row['montoOfertado']);?></td>
              <?php $aux = $row['CodigoContrato']?>
              <td style='text-align:center;'><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:100px; height:35px;" onclick="actualizarContrato('<?php echo $aux ?>')" > Editar </button> &nbsp;&nbsp;&nbsp;&nbsp;

             

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

</body>
</html>