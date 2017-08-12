<?php
session_start();
include("../../conexion/conexion.php");

$cod= $_POST['codprod'];
$consult=$_POST["codconsultoria"];

$queryMonto = "
select co.montoOfertado from Consultoria c, Contrato co
where co.Codigoconsultoria=c.Codigoconsultoria
and c.Codigoconsultoria='$consult';";

$resultadoMonto=sqlsrv_query($conexion, $queryMonto);
while($rowMon=sqlsrv_fetch_array( $resultadoMonto, SQLSRV_FETCH_ASSOC))
{
  $montoOfer = $rowMon['montoOfertado'];
  $montoconv=number_format($montoOfer);

}


//consulta para controlar los porcentajes
$queryProductos="
select (co.montoOfertado*(p.Desembolso/100)) as pago from Consultoria c, Producto p, Contrato co
 where c.Codigoconsultoria=p.Codigoconsultoria and
 co.Codigoconsultoria=c.Codigoconsultoria and
c.Codigoconsultoria = '$consult'  and p.CodigoProducto = '$cod';";
$resultadoProd=sqlsrv_query($conexion, $queryProductos);

while($rowProd=sqlsrv_fetch_array( $resultadoProd, SQLSRV_FETCH_ASSOC))
{
    $pagoP = $rowProd['pago'];
}


//consultas para obtener algunos datos de la consultoria
$queryConsultoria="select c.NombreConsultoria, c.Presupuesto from Consultoria c where c.Codigoconsultoria = '$consult';";
$resultadoConsultoria=sqlsrv_query($conexion, $queryConsultoria);

while($rowConsultoria=sqlsrv_fetch_array( $resultadoConsultoria, SQLSRV_FETCH_ASSOC))
{
    $NombConsult = $rowConsultoria['NombreConsultoria'];
    $presupuestoConsult=$rowConsultoria['Presupuesto'];
    $presuconv=number_format($presupuestoConsult);
}


//$query = "SELECT * FROM  Producto WHERE CodigoProducto = '$cod';";
$query="SELECT * FROM  Producto p, Consultoria c WHERE p.Codigoconsultoria=c.Codigoconsultoria and p.CodigoProducto = '$cod';";
$resultado=sqlsrv_query($conexion, $query);

$estado="";
$vali="";

while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC)){
  $nombre = $row['Producto'];
  $Desem = $row['Desembolso'];
  $FechaPlan = $row['fechaPlanificada'];
  $recibi = $row['RecibiConforme'];
  $pago = $row['pagado'];
  $monto = $row['MontoPagado'];
  $com = $row['comentarios'];
  $ini=DATE_FORMAT($row['FechaInicio'],'Y-m-d');

//validacion para los productos 
$estado='';
$fecha = new DateTime('1900-01-01');
if ($recibi==$fecha)
{
$vali="fecha no modificada";
$estado="Producto no Entregado";
}

elseif ($recibi!=$fecha) 
{
 $vali="fecha modificada";
 $estado="Producto Entregado";


}


}

?>
<form class="form-horizontal" action="librerias/php/producto/modificaProducto.php" method="post">

<input id="id" name="id" type="hidden" value="<?php echo $cod;?>"/>

<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>EDITAR PRODUCTO</strong></p></h2>

<center><strong style="font-family: Verdana; font-size: 14px">Llenar los siguientes campos para actualizar un Producto</strong></center>
</legend>

<h3 align="center" style="font-family: Verdana; font-weight: bold;">Consultoria: <?php echo $NombConsult; ?></h3>
<h3 align="center" style="color:red; font-family: Verdana; font-weight: bold;">Monto Ofertado: <?php echo "$".$montoconv; ?></h3>

<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="number" style="font-family: Verdana;">Producto</label>  
  <div class="col-md-5">
  <input readOnly="true" id="number" name="number" style="font-family: Verdana;" placeholder="" value="<?php echo $nombre;?>" class="form-control input-md" type="text" ><?php echo "<b style='color:red'>".$estado."</b>"; ?>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;" for="desembolso">Desembolso</label>  
  <div class="col-md-2">
  <input value="<?php echo $Desem.'%';?>" style="font-family: Verdana;" readonly="readonly" id="desembolso" id="desembolso" name="desembolso" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="plan" style="font-family: Verdana;">Fecha de planificacion</label>  
  <div class="col-md-4">
  <div class="input-group">
   <span class="input-group-addon" style="font-family: Verdana;">Fecha</span>
  <input readonly="readonly" style="font-family: Verdana;" value="<?php echo DATE_FORMAT($FechaPlan,'d/m/Y');?>" id="plan" name="plan" placeholder="" class="form-control input-md" type="text">
    </div>
  </div>
</div>

<?php 

if ($estado=="Producto Entregado")
{
 //echo "<input type='text' placeholder='registrado'>";
  echo '<div class="form-group">
  <label class="col-md-4 control-label" for="conforme" style="font-family: Verdana;">Recibi conforme</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" style="font-family: Verdana;">Fecha</span>
      <input id="conforme" name="conforme" style="font-family: Verdana; pointer-events:none"  readOnly="true" min=';?><?php echo $ini." ".' value=';?><?php echo DATE_FORMAT($recibi,'Y-m-d')." ".'class="form-control"  type="date">
    </div>
    
  </div>
</div>';

  echo '<div class="form-group">
  <label class="col-md-4 control-label" for="pago" style="font-family: Verdana;">Pago</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" style="font-family: Verdana;">Fecha</span>
      <input id="conforme" name="pago" readOnly="true" style="font-family: Verdana;" min=';?><?php echo $ini." ".' value=';?><?php echo DATE_FORMAT($pago,'Y-m-d')." ".'class="form-control"  type="date">
    </div>
    
  </div>
</div>';
}

if ($estado=="Producto no Entregado")
 {

 //echo "<input type='text' placeholder='no registrado'>";
  echo '<div class="form-group">
  <label class="col-md-4 control-label" for="conforme" style="font-family: Verdana;">Recibi conforme</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" style="font-family: Verdana;">Fecha</span>
      <input id="conforme" name="conforme" style="font-family: Verdana; " min=';?><?php echo $ini." ".' required class="form-control"  type="date">
    </div>
    
  </div>
</div>';


  echo '<div class="form-group">
  <label class="col-md-4 control-label" for="pago" style="font-family: Verdana;">Pago</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" style="font-family: Verdana;">Fecha</span>
      <input id="conforme" name="pago" style="font-family: Verdana;" min=';?><?php echo $ini." ".'class="form-control"  type="date">
    </div>
    
  </div>
</div>';

 }
 ?>



<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="monto" style="font-family: Verdana;">Monto de pago</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" style="font-family: Verdana;">$</span>
      <input id="monto" name="monto" readonly="readonly" class="form-control" placeholder="" min="<?php echo $pagoP; ?>" max="<?php echo $pagoP; ?>" style="font-family: Verdana;" value="<?php echo $pagoP; ?>"  type="number">
    </div>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="monto" style="font-family: Verdana;">Comentarios</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">C</span>
<textarea name="comentario" id="txtComentarios" style="font-family: Verdana;" class="form-control" >
  <?php echo $com; ?>
</textarea>
    </div>
    
  </div>
</div>


<center>
    <input id="aceptar" name="aceptar" style="font-family: Verdana; font-weight: bold;" value="Aceptar" type="submit" class="btn btn-success" />


</center>

</fieldset>
</form>
