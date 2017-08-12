<?php 

    include("../../../conexion/conexion.php");
     
$query="select * from Consultores C, EmpresaPersona E where E.CodigoEmpresa=C.CodigoEmpresa";
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

<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONSULTORES REGISTRADOS</strong></p></h3></legend>

  
                <thead>
                    <tr width=90px, height=35px>
            <th style='text-align:center;' width="8%">N°</th>
			<th style='text-align:center;' width="11%">Empresa</th>
            <th style='text-align:center;' width="11%">Consultor</th>
            <th style='text-align:center;' width="12%">Dui</th><!--Estado-->
            <th style='text-align:center;' width="10%">Telefono</th>
            <th style='text-align:center;' width="10%">Correo</th>
            <th style='text-align:center;' width="10%">Estado</th>
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
$Contador=1;

          while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC)){ ?>
            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $Contador;?></td>
			  <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'><?php echo $row['NombresConsultor'];?> <?php echo $row['ApellidosConsultor'];?></td>
              <td style='text-align:center;'><?php echo $row['DuiC'];?></td>

              
              <td style='text-align:center;'><?php echo $row['TelefonoC'];?></td>

              <td style='text-align:center;'><?php echo $row['Correo'];?></td>

<?php 
$esta=$row['EstadoC'];
if ($esta==true) 
{
?>

<td style='text-align:center;'>Activo</td>

<?php 
}

if ($esta==false)
{
?>
<td style='text-align:center;'>Inactivo</td>
<?php 
}
?>

            </tr>
          <?php
$Contador++;

           } ?>
        </tbody>
                  
            </table>
</div>

      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

</body>
</html>