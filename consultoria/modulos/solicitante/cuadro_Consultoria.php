<?php 

include("../../conexion/conexion.php");

session_start();

//$persona_aux = 
 /*$query="SELECT p.Username,c.Codigoconsultoria ,c.NombreConsultoria, c.NivelAlcance, c.TDR, c.FechaRegistro,c.TipoConsultoria
FROM Personal p JOIN  Consultoria c on p.CodigoPersonal = c.CodigoPersonal
Where p.CodigoPersonal =". $_SESSION['id_usuario'].";";
*/

$query="SELECT p.Username,c.Codigoconsultoria ,c.NombreConsultoria, c.NivelAlcance, c.TDR, c.FechaRegistro,c.TipoConsultoria
FROM Personal p JOIN  Consultoria c on p.CodigoPersonal = c.CodigoPersonal
join Contrato ct on ct.Codigoconsultoria=c.Codigoconsultoria
Where p.CodigoPersonal =".$_SESSION['id_usuario'].";";

$resultado=sqlsrv_query($conexion, $query);


?>

<html lang="en">
<head>
<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->
</head>

<body>

<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">

            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">

<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>SEGUIMIENTO</strong></p></h3></legend>
<br>

                <thead>
             <tr width=90px, height=35px>
            <th style='text-align:center;' width="5%">Código</th>
            <th style='text-align:center;' width="20%">Consultoria</th><!--Estado-->
            <th style='text-align:center;' width="10%">Tdr</th>
            <th style='text-align:center;' width="20%">Fecha de registro</th>
            <th style='text-align:center;' width="15%">Tipo</th>
            <th style='text-align:center;' width="30%">Acción</th>
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
              <td style='text-align:center;' ><?php echo $row['Codigoconsultoria'];?></td>
              <td style='text-align:center;' ><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;' ><a target="_blank" href="<?php echo 'modulos/solicitante/ConsultoriaVista/'.$row['TDR'];?>">TDR</a></td>
              <td style='text-align:center;' ><?php echo DATE_FORMAT($row['FechaRegistro'],'d-m-Y') ;?></td>
              <td style='text-align:center;' ><?php echo $row['TipoConsultoria'];?></td>


             <?php  
             $aux=$row['Codigoconsultoria']; 
              //echo "<input type='hidden' value='$aux2' id='valor2'/>";
              ?>

                      <td style='text-align:center;'><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 4px 15px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:110px; height:35px;" onclick="seguimientoConsultoria(<?php echo $aux?>);return false;" > Productos </button></td>
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