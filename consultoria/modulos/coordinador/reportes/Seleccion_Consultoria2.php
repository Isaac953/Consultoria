<?php 

include("../../../conexion/conexion.php");

session_start();

//$persona_aux = 
/*$query="Select o.CodigoOferta, a.CodigoAsignacion,c.NombreConsultoria, o.NombreEmpresa, c.TipoConsultoria,o.Nit,o.Telefono
FROM Consultoria c JOIN Asignacion a ON c.Codigoconsultoria = a.CodigoConsultoria
JOIN Personal p on p.CodigoPersonal = a.CodigoPersonal
JOIN Ofertas o on c.Codigoconsultoria = o.Codigoconsultoria
Where p.CodigoPersonal =". $_SESSION['id_usuario'].";";
*/

/*
$idus=$_SESSION['id_usuario'];

//ESTA CONSULTA FUNCIONA
$query="
Select Distinct o.CodigoOferta,  o.NombreEmpresa, o.Nit,o.Telefono, a.CodigoAsignacion,c.NombreConsultoria, c.TipoConsultoria
FROM Consultoria c 
JOIN Asignacion a ON c.Codigoconsultoria = a.CodigoConsultoria
JOIN Ofertas o on c.Codigoconsultoria = o.Codigoconsultoria
JOIN evaluacionOfertas e on e.CodigoOferta = o.CodigoOferta 
where a.CodigoPersonal = '$idus' and e.CodigoAsignacion <> (SELECT asig.codigoAsignacion FROm Asignacion asig where asig.CodigoPersonal = '$idus' );

";

*/

$query="Select o.CodigoOferta, a.CodigoAsignacion,c.NombreConsultoria, o.NombreEmpresa, c.TipoConsultoria,o.Nit,o.Telefono
FROM Consultoria c JOIN Asignacion a ON c.Codigoconsultoria = a.CodigoConsultoria
JOIN Personal p on p.CodigoPersonal = a.CodigoPersonal
JOIN Ofertas o on c.Codigoconsultoria = o.Codigoconsultoria
Where p.CodigoPersonal =". $_SESSION['id_usuario'].";";

$resultado=sqlsrv_query($conexion, $query);
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sistema de administracion de consultorias</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


<link rel="stylesheet" href="../../librerias/css/bootstrap.min.css" >
<link rel="stylesheet" href="../../librerias/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="../../librerias/css/estilo.css">
<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->
<link rel="stylesheet" href="../../librerias/css/font-awesome-4.4.0/css/font-awesome.min.css">
</head>

<body>
<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">

            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">

            <legend><h3 align=center><p style="font-family: Verdana; color:#0E5DFD"><strong>HISTORIAL DE EVALUACIONES</strong></p></h3></legend>

        <br>
     <thead>
             <tr width=90px, height=35px>
            <th style='text-align:center;' width="5%">Codigo</th>
            <th style='text-align:center;' width="20%">Consultoria</th><!--Estado-->
            <th style='text-align:center;' width="20%">Empresa</th>
            <th style='text-align:center;' width="10%">Tipo</th>
            <th style='text-align:center;' width="20%">NIT</th>
            <th style='text-align:center;' width="10%">Telefono</th>
            <th style='text-align:center;' width="20%">Acción</th>
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
              <td style='text-align:center;'><?php echo $row['CodigoOferta'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'><?php echo $row['TipoConsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['Nit'];?></td>
              <td style='text-align:center;'><?php echo $row['Telefono'];?></td>



             <?php  
             $aux=$row['CodigoOferta']; 
             $aux2 =$row['CodigoAsignacion'];

             echo "<input type='hidden' value='$aux2' id='valor2'/>";
              ?>

              <td style='text-align:center;'><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:100px; height:35px;" onclick="evaluacionfinalhistorial3(<?php echo $aux?>, $('#valor2').val());return false;" > Ver </button>
            </tr>

          <?php } ?>
        </tbody>
                  
            </table>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

</body>
</html>