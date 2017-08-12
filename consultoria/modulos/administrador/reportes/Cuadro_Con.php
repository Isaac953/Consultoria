<?php 
session_start();
$id=$_SESSION['id_usuario'];

    include("../../../conexion/conexion.php");

 $query="select distinct(c.Codigoconsultoria), p.Nombres, c.NombreConsultoria, c.FechaInicio, c.FechaFinal, c.FechaRegistro, c.Presupuesto, c.FormaPa, c.TDR, c.TipoConsultoria, c.NivelAlcance 
 from Consultoria c, Ofertas f, EvaluacionOfertas e, Personal p
 where c.Codigoconsultoria=f.Codigoconsultoria and p.CodigoPersonal=c.CodigoPersonal and f.CodigoOferta=e.CodigoOferta";
      
$resultado=sqlsrv_query($conexion,$query);
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Consultorias Registradas</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


<link rel="stylesheet" href="librerias/css/bootstrap.min.css" >
<link rel="stylesheet" href="librerias/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="librerias/css/estilo.css">
<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->
<link rel="stylesheet" href="librerias/css/font-awesome-4.4.0/css/font-awesome.min.css">



</head>

<body>

<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">
  
            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">

<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>REPORTE DE OFERTAS EVALUADAS</strong></p></h3></legend>

          <br>
                <thead>
                    <tr width=90px, height=35px>
            <th style='text-align:center;'>Id</th>
            <th style='text-align:center;'>Consultoria</th><!--Estado-->
            <th style='text-align:center;'>Solicitante</th>
            <th style='text-align:center;'>Fecha Inicio</th>
            <th style='text-align:center;'>Fecha Final</th>
            <th style='text-align:center;'>Fecha Registro</th>
            <th style='text-align:center;'>Presupuesto</th>
            <th style='text-align:center;'>Forma Pago</th>
            <th style='text-align:center;'>TDR</th>
            <th style='text-align:center;'>Tipo Consultoria</th>
            <th style='text-align:center;'>Nivel Alcance</th>
            <th style='text-align:center;'>Acciones</th>

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
              <td style='text-align:center;'><?php echo $row['Nombres'];?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaFinal'], 'd-m-Y');?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaRegistro'], 'd-m-Y');?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaRegistro'], 'd-m-Y');?></td>
              <td style='text-align:center;'><?php echo "$".number_format($row['Presupuesto']);?></td>
              <td style='text-align:center;'><?php echo $row['FormaPa'];?></td>
              <td style='text-align:center;'><a target="_blank" href="<?php echo 'modulos/solicitante/ConsultoriaVista/'.$row['TDR'];?>">TDR</a></td>
              <td style='text-align:center;'><?php echo $row['TipoConsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['NivelAlcance'];?></td>
              <?php $aux = $row['Codigoconsultoria']?>

              <td style='text-align:center;'><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:100px; height:35px;" onclick="verReportesOfertas('<?php echo $aux ?>')" > Reporte </button>

              
          <?php } ?>
        </tbody>
                  
            </table>


      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

</body>
</html>