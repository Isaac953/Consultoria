<?php 

include("../../../conexion/conexion.php");
/*$query="select distinct(A.CodigoArea),E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor, A.AreaEspecializacion
 from EmpresaPersona E, Consultores C, detalleEmpresa D, AreaEspecializacion A, SubArea S
 where E.CodigoEmpresa = C.CodigoEmpresa and E.CodigoEmpresa=D.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and A.CodigoArea=S.CodigoArea ;
";
*/
$query="SELECT * FROM Personal;";
$resultado=sqlsrv_query($conexion, $query);

$id_consultoria=$_POST['id'];

//obteniendo el nombre de la consultoria
$queryConsultoria="SELECT * FROM Consultoria where Codigoconsultoria = '$id_consultoria' ;";
$resultadoConsultoria=sqlsrv_query($conexion, $queryConsultoria);

$resul=sqlsrv_fetch_array($resultadoConsultoria,SQLSRV_FETCH_ASSOC);
$nombreConsultoria=$resul["NombreConsultoria"];
//echo $id_consultoria;

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Asignacion</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>

<style>
  input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  padding: 10px;
  align-content: : center;
}
</style>

 <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  box-sizing: border-box;
}

.tablap {
  width: 50%;
  border-collapse: collapse;
  border: 1px solid #38678f;
  background: white;
}
.cabeza {
  background: steelblue;
  height: 15px;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  border: 1px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
  text-align: center;
}
.trt {
  border-bottom: 1px solid #cccccc;
}
.trt:last-child 
{
  border-bottom: 0px;
}
.tdt 
{
    height:15px;

  border-right: 1px solid #cccccc;
  transition: all 0.2s;
  text-align: center;
}

    </style>

</head>

<body>
<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>MODIFICAR ASIGNACIÓN</strong></p></h3></legend>
<br>

<h2 align="center">Consultoria: <?php echo " "."<b style='color:#0072bb'>".$nombreConsultoria."</b>"; ?></h2>

<br>

<?php

//obteniendo el nombre de la consultoria
$queryAsignacionAc="select p.Nombres, p.Apellidos from Consultoria c, Asignacion a, Personal p
where c.Codigoconsultoria=a.CodigoConsultoria and a.CodigoPersonal=p.CodigoPersonal
and c.Codigoconsultoria = '$id_consultoria' ;";
$resultadoAsignacionAc=sqlsrv_query($conexion, $queryAsignacionAc);

 ?>
<h2 align="center">Asignacion Actual</h2>
<table class="tablap" align="center">
<tr class="trt">
<th class="cabeza">Nombres</th>
<th class="cabeza">Apellidos</th>
</tr>

	<?php while($rowA=sqlsrv_fetch_array( $resultadoAsignacionAc, SQLSRV_FETCH_ASSOC))
	{
echo "<tr class='trt'><td lass='tdt'>".$rowA["Nombres"]."</td><td class='tdt'>".$rowA["Apellidos"]."</td></tr>";

    }
    ?>	

</table>
<br>



    <form method="post" action="librerias/php/Asignacion/InsertarModificar.php">
<center>
<b style="color:red;">Motivo de la actualización</b>

<br>

<input type="hidden" name="txtNombreConsultoria" value="<?php echo $nombreConsultoria; ?>">

<textarea name="explicacion" cols="30"></textarea></center>

    <input type="hidden" value="<?php echo $id_consultoria;?>" name="id">
<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">
            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">
                <thead>
                    <tr>
            <th style='text-align:center;'>Nº</th>
            <th style='text-align:center;'>Nombres</th>
            <th style='text-align:center;'>Apellidos</th>
            <th style='text-align:center;'>Seleccionar</th>



                    </tr>
                </thead>

                                <tfoot>
                    <tr width=90px, height=35px>
                        <th></th>
                        <th></th>
                       
                     
                    </tr>
                </tfoot>
                
        <tbody>


<script type="text/javascript">

  
  $(document).ready(function(){
   $('#tabla_lista_paises').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "bPaginate": false,
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
});


function deshabilita(codigo) 
{ 
    if(document.getElementById("id"+codigo).checked) 
    { 
        document.getElementById("cantidad"+codigo).disabled=false; 
        document.getElementById("email"+codigo).disabled=false; 
        document.getElementById("txtRol"+codigo).disabled=false;
         document.getElementById("nombres"+codigo).disabled=false;  
       document.getElementById("apellidos"+codigo).disabled=false; 
    } 
    else 
    { 
        document.getElementById("cantidad"+codigo).disabled=true; 
        document.getElementById("email"+codigo).disabled=true; 
        document.getElementById("txtRol"+codigo).disabled=true; 
         document.getElementById("nombres"+codigo).disabled=true; 
          document.getElementById("apellidos"+codigo).disabled=true;


    } 
  }

 function enviar(codigo)
    {
  var valor=document.getElementById("cantidad"+codigo).value; 
  if (valor=='Evaluador')
   {
 document.getElementById("txtRol"+codigo).value="Evaluador";
   }

if (valor=='Coordinador')
   {
 document.getElementById("txtRol"+codigo).value="Coordinador";
   }

    }
</script> 
          <?php
           while($row=sqlsrv_fetch_array($resultado))
          { 
            //obteniendo el codigo de la empresa
            $codigo=$row['CodigoPersonal'];

            ?>
            <tr width=90px, height=35px>
            <td style='text-align:center;'><?php echo $row['CodigoPersonal'];?></td>

              <td style='text-align:center;'><?php echo $row['Nombres'];?></td>
              <td style='text-align:center;'><?php echo $row['Apellidos'];?></td>
     
              <td style='text-align:center;'>
    <input type="checkbox"  name='<?php echo "id".$row['CodigoPersonal'];?>' id='<?php echo "id".$codigo;?>' value="<?php echo $row['CodigoPersonal'];?>" onClick='deshabilita(<?php echo $codigo;?>);'>
     
     <select required onchange='enviar(<?php echo $codigo;?>);'  name='<?php echo "cantidad".$codigo;?>' id='<?php echo "cantidad".$codigo;?>' disabled>
      <option style="text-align: center" value="">Funcion</option>
       <option value="Evaluador">evaluador</option>
      <option value="Coordinador">coordinador</option>

     </select>

      <input type="hidden" name="txtcorreo[]" disabled  value="<?php echo $row['email']; ?>" id='<?php echo "email".$codigo;?>' />
     <input type="hidden" name="txtnombres[]" disabled  value="<?php echo $row['Nombres']; ?>" id='<?php echo "nombres".$codigo;?>' />
     <input type="hidden" name="txtapellidos[]" disabled  value="<?php echo $row['Apellidos']; ?>" id='<?php echo "apellidos".$codigo;?>' />
 
         <input type="hidden" name="txtRol[]"  disabled id='<?php echo "txtRol".$codigo;?>'  />       </td>
            </tr>
            <?php } ?>
        </tbody>
                  
            </table>
            <br>
            <br>
  

            </div>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>
 <center><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:110px; height:35px;" sname="submit" type="submit" value="Registrar" >Modificar</button></center>
</form>



<div id="contenido">
  
</div>

</body>
</html>