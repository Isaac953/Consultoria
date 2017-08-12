<?php 

session_start();
$id=$_SESSION['id_usuario'];
    include("../../../conexion/conexion.php");


//$query="select * from Ofertas O, Consultoria C where O.Codigoconsultoria=C.Codigoconsultoria";
   

/*$query="select *  from Ofertas O, Consultoria C, Asignacion A, Personal P, Accesos ac where O.Codigoconsultoria=C.Codigoconsultoria
and C.Codigoconsultoria=A.CodigoConsultoria and A.CodigoPersonal=P.CodigoPersonal and P.CodigoAcceso=ac.CodigoAcceso and ac.CodigoAcceso=2 
and P.CodigoPersonal= 5";
*/
$query="
select *  from Ofertas O, Consultoria C, Asignacion A, Personal P, Accesos ac where O.Codigoconsultoria=C.Codigoconsultoria
and C.Codigoconsultoria=A.CodigoConsultoria and A.CodigoPersonal=P.CodigoPersonal and P.CodigoAcceso=ac.CodigoAcceso and ac.CodigoAcceso=2 
and P.CodigoPersonal= '$id' and O.Monto is null;
 ";




/* PARA MOSTRAR LAS OFERTAS QUE AUN NO SE LE HAN ASIGNADO MONTO
select *  from Ofertas O, Consultoria C, Asignacion A, Personal P, Accesos ac where O.Codigoconsultoria=C.Codigoconsultoria
and C.Codigoconsultoria=A.CodigoConsultoria and A.CodigoPersonal=P.CodigoPersonal and P.CodigoAcceso=ac.CodigoAcceso and ac.CodigoAcceso=2 
and P.CodigoPersonal=5 and O.Monto is null;
*/



$resultado=sqlsrv_query($conexion,$query);
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mantenimientos de Ofertas</title>
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

<legend><h3 align=center><p style="font-family: Verdana; color:#0E5DFD"><strong>OFERTAS SIN MONTO ASIGNADO</strong></p></h3></legend>

        <br>
                <thead>
                    <tr width=90px, height=35px>
            <th style='text-align:center;'>Id</th>
            <th style='text-align:center;'>Consultoria</th><!--Estado-->
            <th style='text-align:center;'>Nombre Empresa</th>
            <th style='text-align:center;'>Nit</th>
            <th style='text-align:center;'>Telefono</th>
            <th style='text-align:center;'>Correo</th>
            <th style='text-align:center;'>Monto</th>
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
              <td style='text-align:center;'><?php echo $row['CodigoOferta'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'><?php echo $row['Nit'];?></td>
              <td style='text-align:center;'><?php echo $row['Telefono'];?></td>
              <td style='text-align:center;'><?php echo $row['Correo'];?></td>
              <td style='text-align:center;'><?php echo "$".$row['Monto'];?></td>
              <?php $aux = $row['CodigoOferta']?>
              <td style='text-align:center;'><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:100px; height:35px;" onclick="actualizarMonto('<?php echo $aux ?>')" > Asignar </button></td>
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