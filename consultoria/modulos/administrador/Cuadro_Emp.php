<?php 

    include("../../conexion/conexion.php");

 $query="select * from EmpresaPersona;";
      
$resultado=sqlsrv_query($conexion,$query);
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Empresas Registradas</title>
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

            <legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>EMPRESAS REGISTRADAS</strong></p></h3></legend>

          <br>
                <thead>
                    <tr width=90px, height=35px>
            <th style='text-align:center;'>Id</th>
            <th style='text-align:center;'>Nombre de Empresa</th><!--Estado-->
            <th style='text-align:center;'>Dirección</th>
            <th style='text-align:center;'>NIT</th>
            <th style='text-align:center;'>DUI</th>
            <th style='text-align:center;'>Tipo</th>
            <th style='text-align:center;'>Estado</th>
            <th style='text-align:center;'>Registro Iva</th>
            <th style='text-align:center;'>Representante</th>
            <th style='text-align:center;'>Telefono</th>
            <th style='text-align:center;'>Celular</th>
            <th style='text-align:center;'>Pagina Web</th>
            <th style='text-align:center;'>Email</th>
            <th style='text-align:center;'>Municipio</th>
            <th style='text-align:center;'>Pais</th>
            <th style='text-align:center;'>Fecha Registro</th>

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
              <td style='text-align:center;'><?php echo $row['CodigoEmpresa'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'><?php echo $row['Direccion'];?></td>
              <td style='text-align:center;'><?php echo $row['Nit'];?></td>
              <td style='text-align:center;'><?php echo $row['Dui'];?></td>
              <td style='text-align:center;'><?php echo $row['Tipo'];?></td>
              <td style='text-align:center;'><?php echo $row['Estado'];?></td>
              <td style='text-align:center;'><?php echo $row['RegistroIva'];?></td>
              <td style='text-align:center;'><?php echo $row['NombresRepresentante'];?> <?php echo $row['ApellidosRepresentante'];?></td>
              <td style='text-align:center;'><?php echo $row['Telefono'];?></td>
              <td style='text-align:center;'><?php echo $row['celular'];?></td>
              <td style='text-align:center;'><?php echo $row['paginaWeb'];?></td>
              <td style='text-align:center;'><?php echo $row['Email'];?></td>
              <td style='text-align:center;'><?php echo $row['CodigoMunicipio'];?></td>
              <td style='text-align:center;'><?php echo $row['CodigoPais'];?></td>
              <td style='text-align:center;'><?php echo DATE_FORMAT($row['FechaRegistro'], 'Y-m-d');?></td>
              <?php $aux = $row['CodigoEmpresa']?>
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