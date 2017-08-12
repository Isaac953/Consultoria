<?php 

    include("../../../conexion/conexion.php");

 $query="select *  from Personal P, Oficinas O, Accesos A where P.CodigoOficina=O.CodigoOficina and P.CodigoAcceso=A.CodigoAcceso";
      
$resultado=sqlsrv_query($conexion,$query);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mantenimientos de Personal</title>
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

<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>MANTENIMIENTO DE PERSONAL</strong></p></h3></legend>

        <div><a class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(151, 196, 254) inset; background: rgb(61, 148, 246)
         linear-gradient(to bottom, rgb(61, 148, 246) 5%, rgb(30, 98, 208) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(51, 127, 237); 
         display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; 
         text-decoration: none; text-shadow: 0px 1px 0px rgb(21, 112, 205);" href="modulos/administrador/Personal/Personal.php" >Nuevo Personal</a></div>
        <br>
                <thead>
                    <tr width=90px, height=35px>
            <th style='text-align:center;' width="10%">Id</th>
            <th style='text-align:center;' width="10%">Nombres</th><!--Estado-->
            <th style='text-align:center;' width="10%">Email</th>
            <th style='text-align:center;' width="10%">Oficina</th>
            <th style='text-align:center;' width="10%">Username</th>
            <th style='text-align:center;' width="10%">Password</th>
            <th style='text-align:center;' width="10%">Acceso</th>
            <th style='text-align:center;' width="10%">Cargo</th>
            <th style='text-align:center;' width="10%">Estado</th>
            <th style='text-align:center;' width="10%">Acciones</th>

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
           $cestado=$row["Estado"];
           ?>
            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $row['CodigoPersonal'];?></td>
              <td style='text-align:center;'><?php echo $row['Nombres'];?> <?php echo $row['Apellidos'];?></td>
              <td style='text-align:center;'><?php echo $row['email'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreOficina'];?></td>
              <td style='text-align:center;'><?php echo $row['Username'];?></td>
              <td style='text-align:center;'><?php echo $row['password'];?></td>
              <td style='text-align:center;'><?php echo $row['TituloAcceso'];?></td>
              <td style='text-align:center;'><?php echo $row['Car'];?></td>

<?php 
if ($cestado==true) 
{
?>
              
              <td style='text-align:center;'>Activo</td>
              <?php $aux = $row['CodigoPersonal']?>
              <td style='text-align:center;'><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:100px; height:35px;" onclick="actualizarPersonal('<?php echo $aux ?>')" > Editar </button> &nbsp;&nbsp;&nbsp;&nbsp;

<?php 
if ($cestado==true) 
{
?>

 <button name="esdesactivar" class="myButton" value="desactivar" id="btndesactivar" style="box-shadow: 0px 1px 0px 0px rgb(242, 156, 147) inset; background: rgb(254, 26, 0) linear-gradient(to bottom, rgb(254, 26, 0) 5%, rgb(206, 1, 0) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(216, 53, 38); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(178, 62, 53); width:100px; height:35px;" onclick="eliminarPersonal(<?php echo $aux ?>, $('#btndesactivar').val());return false;">Desactivar</button>
<?php
}

if ($cestado==false)
{
?>
 <button name="esactivar" class="myButton" id="btnActivar" value="activar" style="box-shadow: 0px 1px 0px 0px rgb(242, 156, 147) inset; background: rgb(254, 26, 0) linear-gradient(to bottom, rgb(254, 26, 0) 5%, rgb(206, 1, 0) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(216, 53, 38); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(178, 62, 53); width:100px; height:35px;" onclick="eliminarPersonal(<?php echo $aux ?>, $('#btnActivar').val());return false;">Activar</button>

<?php
}
?>

<?php 
}
?>



<?php 
if ($cestado==false) 
{
?>
              
              <td style='text-align:center;'>Inactivo</td>
              <?php $aux = $row['CodigoPersonal']?>
              <td style='text-align:center;'><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:100px; height:35px;" onclick="actualizarPersonal('<?php echo $aux ?>')" > Editar </button> &nbsp;&nbsp;&nbsp;&nbsp;

<?php 
if ($cestado==true) 
{
?>

 <button name="esdesactivar" class="myButton" value="desactivar" id="btndesactivar" style="box-shadow: 0px 1px 0px 0px rgb(242, 156, 147) inset; background: rgb(254, 26, 0) linear-gradient(to bottom, rgb(254, 26, 0) 5%, rgb(206, 1, 0) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(216, 53, 38); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(178, 62, 53); width:100px; height:35px;" onclick="eliminarPersonal(<?php echo $aux ?>, $('#btndesactivar').val());return false;">Desactivar</button>
<?php
}

if ($cestado==false)
{
?>
 <button name="esactivar" class="myButton" id="btnActivar" value="activar" style="box-shadow: 0px 1px 0px 0px rgb(242, 156, 147) inset; background: rgb(254, 26, 0) linear-gradient(to bottom, rgb(254, 26, 0) 5%, rgb(206, 1, 0) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(216, 53, 38); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(178, 62, 53); width:100px; height:35px;" onclick="eliminarPersonal(<?php echo $aux ?>, $('#btnActivar').val());return false;">Activar</button>

<?php
}
?>

<?php 
}
?>
              </td>

            </tr>
            </div>
          <?php } ?>
        </tbody>
                  
            </table>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

</body>
</html>