<?php 

include("../../../conexion/conexion.php");

$id_contrato=$_POST['id'];

$query="select distinct(ct.CodigoContrato), p.CodigoPersonal, p.Nombres, p.Apellidos, a.TituloAcceso from EvaluacionFinalConsultoria e, Contrato ct, Consultoria c, Personal p, Accesos a 
where e.CodigoContrato=ct.CodigoContrato
and c.Codigoconsultoria=ct.Codigoconsultoria and p.CodigoPersonal=e.CodigoPersonal 
and a.CodigoAcceso=p.CodigoAcceso and ct.Codigoconsultoria='$id_contrato' Order by a.TituloAcceso"; 

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
             <th style='text-align:center;' width="10%">N°</th>
             <th style='text-align:center;' width="20%">Nombres</th><!--Estado-->
             <th style='text-align:center;' width="20%">Rol</th>
            <th style='text-align:center;' width="20%">Accción</th>
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
              <td style='text-align:center;'><?php echo $row['Nombres'];?> <?php echo $row['Apellidos'];?></td>
              <td style='text-align:center;'><?php echo $row['TituloAcceso'];?></td>

             <?php  
             $aux=$row['CodigoContrato']; 
             $aux2 =$row['CodigoPersonal'];

           // echo "<input type='hidden' value='$aux2' id='valor2'/>";
              ?>

              <td style='text-align:center;'><a class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:90px; height:35px;"
onclick="EvaluacionConsultoriaA(<?php echo $aux;?>, <?php echo $aux2;?> );return false;"> Editar </a> 
            </td></tr>

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