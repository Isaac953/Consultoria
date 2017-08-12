<html>
<head>
<meta charset="UTF-8">
<title>Personal</title>
<?php

include('../../../conexion/conexion.php');

$id_consultor=$_POST['id'];

$query="select *  from Consultores C where C.CodigoConsultor=$id_consultor;";

$params = array( array($id_consultor, SQLSRV_PARAM_IN));

$resultado=sqlsrv_query($conexion,$query,$params);
$consu=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);

?>

</head>
<body>
<form class="form-horizontal" accept-charset="utf-8" action="librerias/php/Consultor/modificar2.php" method="post">
<input type="hidden" name="CodigoConsultor" value="<?php echo $consu['CodigoConsultor'];?>" />
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONSULTOR</strong></h2></legend>

<center><strong style="font-family: Verdana;">Llenar el siguiente campo para agregar una empresa a un Consultor</strong></center>

<br>
<br>

<div style="display: block; margin:0 auto;" align="center" >
<table  border="1" align="center" class="table table-bordered" style="display:block; width: 90%;"><!-- Lo cambiaremos por CSS -->
<h3><center><p style="font-family: Verdana;"><b>DATOS DEL CONSULTOR</b></p> </center></h3> 
          <tr>
              <th><p style="font-family: Verdana;">Código de Empresa:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana;" required class="form-control input-md" name='CodEmpresa' size="90" value=""></td>
          </tr>                 
          <tr>
              <th><p style="font-family: Verdana;">Id Consultor:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana; pointer-events: none;" required name="CodigoConsultor" readonly value="<?php echo $id_consultor ?>" class="form-control input-md" size="90"></td>
          </tr> 

              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input required style="font-family: Verdana; pointer-events: none;" type="text" class="form-control input-md" readonly value="<?php echo $consu['NombresConsultor'];?>" size="90" /></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input type="text" style="font-family: Verdana; pointer-events: none;" readonly value="<?php echo $consu['ApellidosConsultor'];?>" class="form-control input-md" size="90"/></td>
              </tr>

              </table>  
              <br/> 
              </div>         
</center>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"  align="center">
    <button name="singlebutton" class="btn btn-primary" style="font-family: Verdana;" type="submit"><strong>Actualizar</strong></button>
  </div>
</div>

</fieldset>
</form>

</body>
</html>