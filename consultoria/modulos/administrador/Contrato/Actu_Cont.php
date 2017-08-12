     <?php
    include('../../../conexion/conexion.php');
$consulta="select * from Consultoria";
$resultado=sqlsrv_query($conexion,$consulta);

$id_contrato=$_POST['id'];
$query="select * from Contrato C where C.CodigoContrato = ?";
$params = array( array($id_contrato, SQLSRV_PARAM_IN));

$resultado3=sqlsrv_query($conexion,$query,$params);
$cont=sqlsrv_fetch_array($resultado3,SQLSRV_FETCH_ASSOC);

/*consulta para las modificaciones del contrato*/
$queryContrato="SELECT * FROM Contrato c, bitacora_contrato b
where c.CodigoContrato=b.CodigoContrato and c.CodigoContrato = '$id_contrato'";
$resultadoContrato=sqlsrv_query($conexion,$queryContrato);


$queryConsultoria=" select co.Codigoconsultoria, c.montoOfertado from Contrato c, Consultoria co
 where c.Codigoconsultoria=co.Codigoconsultoria
 and c.CodigoContrato = '$id_contrato'";
$resultadoObtenConsul=sqlsrv_query($conexion,$queryConsultoria);

$contObte=sqlsrv_fetch_array($resultadoObtenConsul,SQLSRV_FETCH_ASSOC);

$idconsultoria=$contObte["Codigoconsultoria"];

$montocontrato=$contObte["montoOfertado"];
//echo $montocontrato;
//echo "Id Consultoria para la bitacora: ".$idconsultoria;

/*para los productos vejos*/
$querybitacoraViejos="select b.Producto, b.Desembolso, b.fechaPlanificada, b.fechaModificacion, b.explicacion from BitacoraProductoViejo b, Consultoria c
where c.Codigoconsultoria=b.Codigoconsultoria
and c.Codigoconsultoria = '$idconsultoria'; ";
$resultadobitacoraViejos=sqlsrv_query($conexion,$querybitacoraViejos);



?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Contrato</title>


  <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  box-sizing: border-box;
}

.tablap {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #38678f;
  background: white;
}
th {
  background: steelblue;
  height: 10px;
  font-weight: lighter;
  text-shadow: 0 1px 0 #38678f;
  color: white;
  border: 1px solid #38678f;
  box-shadow: inset 0px 1px 2px #568ebd;
  transition: all 0.2s;
  text-align: center;
}
tr {
  border-bottom: 1px solid #cccccc;
}
tr:last-child 
{
  border-bottom: 0px;
}
td 
{
    height: 10px;
text-align: center;
  border-right: 1px solid #cccccc;
  padding: 5px;
  transition: all 0.2s;
}

    </style>
  </head>
    <body style="padding:15px;">
    


<form accept-charset="utf-8" action="librerias/php/Contrato/modificar.php" method="post" class="form-horizontal" style="margin-bottom:30px;">
<input type="hidden" name="txtCodigo" value="<?php echo $cont['CodigoContrato'];?>"/>
<fieldset>

<!-- Form Name -->

<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONTRATO</strong></p></h2></legend>


<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar un Contrato</strong></center>

<br>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Id de Contrato:</label>  
  <div class="col-md-4">
  <input id="textinput" name="CodigoContrato" style="font-family: Verdana;" value="<?php echo $_POST['id'];?>" type="text" placeholder="Escriba" class="form-control input-md" disabled>
  </div>
</div>

<!-- Text input-->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Fecha de Inicio:</label>  
  <div class="col-md-4">
  <input id="textinput" name="FechaInicio" style="font-family: Verdana;" value="<?php echo DATE_FORMAT($cont['FechaInicio'],'Y-m-d');?>" type="date" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Fecha de Fin:</label>  
  <div class="col-md-4">
  <input id="textinput" name="FechaFin" style="font-family: Verdana;" value="<?php echo DATE_FORMAT($cont['FechaFin'],'Y-m-d');?>" type="date" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Estatus:</label>  
  <div class="col-md-4">

<select name="Estatus" style="font-family: Verdana;" class="form-control input-md">
  
  <?php 
$estadover='';
$esta=$cont['Estatus'];
if ($esta==true) 
{
  $estadover='Activo';
}

if ($esta==false)
 {
 $estadover='Inactivo';
}
?>
  <option value="<?php echo $cont['Estatus']; ?>"><?php echo $estadover; ?></option>

<?php
 if ($esta==true)
 {
 ?>
<option value="0">Inactivo</option>
<?php
}
?>

<?php
 if ($esta==false)
 {
 ?>
<option value="1">Activo</option>
<?php
}
?>

</select>


  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Monto Ofertado:</label>  
  <div class="col-md-4">
  <input id="textinput" name="montoOfertado" style="font-family: Verdana;" value="<?php echo $cont['montoOfertado'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="textinput">Explicacion:</label>  
  <div class="col-md-4">
  <input id="textinput" name="txtexplicacion" style="font-family: Verdana;" value="<?php echo $cont['explicacion'];?>" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4" align="center">
    <button id="singlebutton" type="submit" style="font-family: Verdana;" name="singlebutton" class="btn btn-primary"><Strong>Actualizar</Strong></button>
  </div>
</div>

<br><br><center><b style="color:red">Historial de modificaciones de contrato</b></center>


<table  class="tablap " align="center">
  <tr>
    <th>Nº</th>
    <th>Fecha Inicio Anterior</th>
    <th>Fecha Fin Anterior</th>
    <th>Monto Anterior</th>
    <th>Fecha Inicio Nueva</th>
    <th>Fecha Fin Nueva</th>
    <th>Monto Nuevo</th>
    <th>Descripcion</th>
    <th>Fecha Modificacion</th>
  </tr>

<?php 
$contadorcontr=1;
while($rowC=sqlsrv_fetch_array( $resultadoContrato, SQLSRV_FETCH_ASSOC))
{ 
?>
<tr>
<td style='text-align:center;'><?php echo $contadorcontr; ?></td>

<td style='text-align:center;'><?php echo DATE_FORMAT($rowC['FechaInicioA'], 'd-m-Y');?></td>
<td style='text-align:center;'><?php echo DATE_FORMAT($rowC['FechaFinA'], 'd-m-Y');?></td>
<td style='text-align:center;'><?php echo "$".number_format($rowC['montoOfertadoA']);?></td>
<td style='text-align:center;'><?php echo DATE_FORMAT($rowC['FechaInicioN'], 'd-m-Y');?></td>
<td style='text-align:center;'><?php echo DATE_FORMAT($rowC['FechaFinN'], 'd-m-Y');?></td>
<td style='text-align:center;'><?php echo "$".number_format($rowC['montoOfertadoN']);?></td>
<td style='text-align:center;'><?php echo $rowC['Descripcion'];?></td>
<td style='text-align:center;'><?php echo DATE_FORMAT($rowC['fechaModificacion'], 'd-m-Y H:i');?></td>
</tr>

<?php 
$contadorcontr++;
}
?>

</table>


<br><center><b style="color:red">Historial de modificaciones de producto</b></center>
<table  class="tablap " align="center">
  <tr>
    <th>Nº</th>
    <th>Nombre producto</th>
    <th>% Desembolso</th>
    <th>Fecha planificada</th>
    <th>Monto a pagar</th>
    <th>Fecha de Registro</th>
    <th>Descripcion</th>

    </tr>

<?php 
$contadorproduV=1;
while($rowProd=sqlsrv_fetch_array( $resultadobitacoraViejos, SQLSRV_FETCH_ASSOC))
{ 
?>
<tr>
<td style='text-align:center;'><?php echo $contadorproduV;?></td>

<td style='text-align:center;'><?php echo $rowProd['Producto'];?></td>
<td style='text-align:center;'><?php echo $rowProd['Desembolso'];?></td>
<td style='text-align:center;'><?php echo DATE_FORMAT($rowProd['fechaPlanificada'], 'd-m-Y');?></td>
<td style='text-align:center;'><?php echo "$".number_format(($rowProd['Desembolso']/100)*$montocontrato);?></td>
<td style='text-align:center;'><?php echo DATE_FORMAT($rowProd['fechaModificacion'], 'd-m-Y H:i');?></td>
<td style='text-align:center;'><?php echo $rowProd['explicacion'];?></td>

</tr>

<?php 
$contadorproduV++;
}
?>

</table>

<?php

$queryP="select * from Producto P, Contrato C where P.Codigoconsultoria=C.Codigoconsultoria and C.Codigoconsultoria= '$idconsultoria';";
$resultadoP=sqlsrv_query($conexion,$queryP);

?>

<br><br><center><b style="color:red">Productos Registrados</b></center>

<table  class="tablap " align="center">
  <tr>
    <th>Nº</th>
    <th>Producto</th>
    <th>Desembolso</th>
    <th>Recibí Conforme</th>
    <th>Pagado</th>
    <th>Monto Pagado</th>
    <th>Fecha Planificada</th>
    <th>Comentarios</th>
  </tr>

<?php 
$contadorp=1;
$recibiMsg='';
  $pagoMsg='';
  $pago='';
  $fecha = new DateTime('1900-01-01');
while($rowp=sqlsrv_fetch_array( $resultadoP, SQLSRV_FETCH_ASSOC))
{ 
//logica para los productos y las fechas de recibi y la fecha de pago
$recibi=$rowp['RecibiConforme'];
if ($recibi==$fecha) 
{
  $recibiMsg="Aun no Recibido";
  $pagoMsg='Aun no Pagado';
}

elseif ($recibi!=$fecha) 
{
$recibiMsg=DATE_FORMAT($rowp['RecibiConforme'], 'd-m-Y');
$pagoMsg=DATE_FORMAT($rowp['pagado'], 'd-m-Y');

}
?>
<tr>
<td style='text-align:center;'><?php echo $contadorp; ?></td>

<td style='text-align:center;'><?php echo $rowp['Producto'];?></td>
<td style='text-align:center;'><?php echo $rowp['Desembolso'];?></td>
<td style='text-align:center;'><?php echo $recibiMsg;?></td>
<td style='text-align:center;'><?php echo $pagoMsg;?></td>
<td style='text-align:center;'><?php echo "$".number_format($rowp['MontoPagado']);?></td>
<td style='text-align:center;'><?php echo DATE_FORMAT($rowp['fechaPlanificada'], 'd-m-Y');?></td>
<td style='text-align:center;'><?php echo $rowp['comentarios'];?></td>
</tr>

<?php 
$contadorp++;
}
?>

</table>

    </body>
</html>