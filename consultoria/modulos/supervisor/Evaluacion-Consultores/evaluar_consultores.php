<?php 

include("../../../conexion/conexion.php");

session_start();

$idconsul=$_POST["id"];
//echo $idconsul;
$query="
select * from Consultores c, EmpresaPersona e, Consultoria cc, Contrato ct where c.CodigoEmpresa=e.CodigoEmpresa
and e.CodigoEmpresa = ct.CodigoEmpresa and ct.Codigoconsultoria =cc.Codigoconsultoria
and cc.Codigoconsultoria = '$idconsul';";
$resultado=sqlsrv_query($conexion, $query);



?>

<html lang="en">
<head>
<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->

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

</head>

<body>
<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">
<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONSULTORES</strong></p></h3></legend>
    <form method="post" action="librerias/php/consultores/registrar2.php" autocomplete="off" >

            <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">
             <br>

                <thead>
             <tr width=90px, height=35px>
            <th style='text-align:center;' width="5%">N°</th>

            <th style='text-align:center;' width="20%">Nombre</th>
            <th style='text-align:center;' width="20%">Apellidos</th><!--Estado-->
            <th style='text-align:center;' width="20%">Direccion</th>
            <th style='text-align:center;' width="10%">Nit</th>
            <th style='text-align:center;' width="10%">Dui</th>
            <th style='text-align:center;' width="20%">Resultado</th>
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
$contC=1;
           while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC)){ ?>
            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $contC;?></td>
              <td style='text-align:center;'><?php echo $row['NombresConsultor'];?></td>
              <td style='text-align:center;'><?php echo $row['ApellidosConsultor'];?></td>
              <td style='text-align:center;'><?php echo $row['DireccionConsultor'];?></td>
              <td style='text-align:center;'><?php echo $row['NitC'];?></td>
              <td style='text-align:center;'><?php echo $row['DuiC'];?></td>
              <td style='text-align:center;'>  

            
              <select class="form-control" style="font-family: Arial; font-size: 12px" name="lsresultado[]" required>
              <option value="">
                Seleccione
              </option>

              <option value="Recomendado">
                Recomendado
              </option>
                
                <option value="No Recomendado">
                No Recomendado
              </option>

              </select>
              <input type="hidden" name="txtIdContrato" value="<?php echo $row['CodigoContrato']; ?>">
              <input type="hidden" name="txtIdConsultor[]" value="<?php echo $row['CodigoConsultor']; ?>">
              <input type="hidden" name="txtUsuario" value="<?php echo   $_SESSION['id_usuario']; ?>">

              </td>
       
             <?php  
             $aux=$row['CodigoConsultor']; 
              //echo "<input type='hidden' value='$aux2' id='valor2'/>";
              ?>
 </tr>

          <?php 

          $contC++;
          } ?>
        </tbody>
                  
            </table>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>
<br>
<br>
   <br>

<center><h2 style="text-align: center;">Comentarios</h2></center>

<center>
<textarea name="txtcomentario" style="font-family: Verdana;" class='form-control input-md'></textarea></center>
   
   <br>  

          <center><button class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(202, 239, 171) inset; background: rgb(76, 158, 5) linear-gradient(to bottom, rgb(76, 158, 5) 5%, rgb(92, 184, 17) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(38, 138, 22); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(170, 222, 124); width:110px; height:35px;" sname="submit" type="submit" value="Registrar" >Registrar</button></center>
</form>
</body>
</html>