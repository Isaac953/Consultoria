<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Contrato</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


<link rel="stylesheet" href="librerias/css/bootstrap.min.css" >
<link rel="stylesheet" href="librerias/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="librerias/css/estilo.css">
<script type="text/javascript" language="javascript" src="librerias/js/jslistadopaises.js"></script><!--importante!!-->
<link rel="stylesheet" href="librerias/css/font-awesome-4.4.0/css/font-awesome.min.css">


<style>
  input[type=radio]
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
    <body style="padding:15px;">
    
    <?php
    include('../../../conexion/conexion.php');

//$consulta="select * from Consultoria";

/*CONSULTA PARA LA CONSULTORIAS QUE NO TIENEN CONTRATO*/
$consulta="
 select * from Consultoria c where c.Codigoconsultoria not in (select co.Codigoconsultoria from Contrato co join Consultoria c on co.Codigoconsultoria=c.Codigoconsultoria)";
$resultado=sqlsrv_query($conexion,$consulta);
$consulta2="select * from EmpresaPersona";
$resultado2=sqlsrv_query($conexion,$consulta2);
?>

<form accept-charset="utf-8" action="librerias/php/Contrato/insertar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="CodigoContrato"/>
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONTRATO</strong></p></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para registrar un Contrato</strong></center>

<br>
<br>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" style="font-family: Verdana;">Consultoria:</label>  
  <div class="col-md-4">
    <select name='lsConsultoria' style="font-family: Verdana;" class='form-control'>
  <?php
  echo "<option selected value='0'>Seleccione Consultoria</option>";

  while ($row=sqlsrv_fetch_object($resultado))
  {
  
  echo "<option  value='$row->Codigoconsultoria'>",$row->NombreConsultoria,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Fecha de Inicio:</label>  
  <div class="col-md-4">
  <input id="textinput" name="FechaInicio" style="font-family: Verdana;" type="date" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Fecha de Fin:</label>  
  <div class="col-md-4">
  <input id="textinput" name="FechaFin" style="font-family: Verdana;" type="date" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Monto Ofertado:</label>  
  <div class="col-md-4">
  <input id="textinput" name="montoOfertado" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>



<?php 

 $query="select * from EmpresaPersona";
      
$resultado3=sqlsrv_query($conexion,$query);

?>

<br>
<br>

<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">

           <table cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom:0%;" id="tabla_lista_paises">

<legend><h3 align=center><p style="font-family: Verdana; color:#0072bb"><strong>EMPRESAS REGISTRADAS</strong></p></h3></legend>

        <div><a class="myButton" id="myButton" style="box-shadow: 0px 1px 0px 0px rgb(151, 196, 254) inset; background: rgb(61, 148, 246) linear-gradient(to bottom, rgb(61, 148, 246) 5%, rgb(30, 98, 208) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(51, 127, 237); display: inline-block; cursor: pointer; color: rgb(255, 255, 255); font-family: Arial; font-size: 15px; font-weight: bold; padding: 6px 24px; text-decoration: none; text-shadow: 0px 1px 0px rgb(21, 112, 205);" href="modulos/administrador/empresa/Empresa_Consultores.php" >Nueva Empresa</a></div>
        <br>
                <thead>
                    <tr width=90px, height=35px>
            <th style='text-align:center;' width="10%">Id</th>
            <th style='text-align:center;' width="20%">Nombre Empresa</th><!--Estado-->
            <th style='text-align:center;' width="15%">NIT</th>
            <th style='text-align:center;' width="15%">Estado</th><!--Estado-->
            <th style='text-align:center;' width="15%">Telefono</th>
            <th style='text-align:center;' width="15%">Email</th>
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
          <?php while($row3=sqlsrv_fetch_array( $resultado3, SQLSRV_FETCH_ASSOC)){
$esta=$row3["Estado"];
           ?>
            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $row3['CodigoEmpresa'];?></td>
              <td style='text-align:center;'><?php echo $row3['NombreEmpresa'];?></td>
              <td style='text-align:center;'><?php echo $row3['Nit'];?></td>
              
<?php 
if($esta==true)
{
?>
<td style='text-align:center;'>Activa</td>

<?php
}
?>

<?php 
if($esta==false)
{
?>
<td style='text-align:center;'>Inactiva</td>

<?php
}
?>
  
              <td style='text-align:center;'><?php echo $row3['Telefono'];?></td>
              <td style='text-align:center;'><?php echo $row3['Email'];?></td>
            
            <!--INTENTANTO CONTRLAR EL INPUT RADIO -->
              <td style='text-align:center;'>
    <input type="radio"  name='id[]' value="<?php echo $row3['CodigoEmpresa'];?>"/>
</td>

            </tr>
          <?php } ?>
        </tbody>
                  
            </table>
</div>
<br>
<center>
  <input type="submit" value="Registrar" style="font-family: Verdana;" name="singlebutton" class="btn btn-primary"> 
</center>
  </form>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

    </body>
</html>
