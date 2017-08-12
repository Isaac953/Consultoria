<html>
<head>
<meta charset="UTF-8">
<title>Personal</title>
<?php

include('../../../conexion/conexion.php');

$id_personal=$_POST['id'];

$query="select *  from Personal P, Oficinas O, Accesos A where P.CodigoOficina=O.CodigoOficina and P.CodigoAcceso=A.CodigoAcceso and P.CodigoPersonal = ?";

$params = array( array($id_personal, SQLSRV_PARAM_IN));

$resultado3=sqlsrv_query($conexion,$query,$params);
$per=sqlsrv_fetch_array($resultado3,SQLSRV_FETCH_ASSOC);


/*para las areas*/
  $strConsultaArea = "select * from AreaEspecializacion"; 
  $consultaAreas = sqlsrv_query($conexion, $strConsultaArea);
  $opcionesAreas = '<option value="0"> Elija un Area</option>';
  while($fila=sqlsrv_fetch_object($consultaAreas) )
  {
    $opcionesAreas.='<option value="'.$fila->CodigoArea.'">'.$fila->AreaEspecializacion.'</option>';
  }

  $consulta="select * from Oficinas";
$resultado=sqlsrv_query($conexion,$consulta);
$consulta2="select * from Accesos";
$resultado2=sqlsrv_query($conexion,$consulta2);

?>

</head>
<body>
<form class="form-horizontal" accept-charset="utf-8" action="librerias/php/Personal/modificar.php" method="post">
<input type="hidden" name="CodigoPersonal" value="<?php echo $per['CodigoPersonal'];?>" />
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>PERSONAL</strong></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar un Personal</strong></center>

<br>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Id de Personal:</label>  
  <div class="col-md-4">
  <input name="CodigoPersonal" value="<?php echo $_POST['id'];?>" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required disabled>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Nombres:</label>  
  <div class="col-md-4">
  <input name="Nombre" value="<?php echo $per['Nombres'];?>" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Apellidos:</label>  
  <div class="col-md-4">
  <input name="Apellido" value="<?php echo $per['Apellidos'];?>" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Email:</label>  
  <div class="col-md-4">
  <input name="email" value="<?php echo $per['email'];?>" type="text" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Oficina:</label>
  <div class="col-md-4">
  <select name='lsOficina' style="font-family: Verdana;" required class='form-control'>
  <option selected value="<?php echo $per['CodigoOficina'];?>"><?php echo $per['NombreOficina'];?>
    
  </option>
  <?php

  while ($row=sqlsrv_fetch_object($resultado))
  {
  
  echo "<option   value='$row->CodigoOficina'>",$row->NombreOficina,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Username:</label>  
  <div class="col-md-4">
  <input name="Username" readonly value="<?php echo $per['Username'];?>" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Password:</label>  
  <div class="col-md-4">
  <input name="password" value="<?php echo $per['password'];?>" style="font-family: Verdana;" type="password" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Acceso:</label>
  <div class="col-md-4">
  <select name='lsAcceso' style="font-family: Verdana;" required class='form-control'>
  <option selected value="<?php echo $per['CodigoAcceso'];?>"><?php echo $per['TituloAcceso'];?>
    
  </option>
  <?php

  while ($row2=sqlsrv_fetch_object($resultado2))
  {
  
  echo "<option   value='$row2->CodigoAcceso'>",$row2->TituloAcceso,"</option>";
  }
?>
</select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Cargo:</label>  
  <div class="col-md-4">
  <input name="Cargo" value="<?php echo $per['Car'];?>" style="font-family: Verdana;" type="text" placeholder="Escriba" class="form-control input-md" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" style="font-family: Verdana;">Estado:</label>
  <div class="col-md-4">

    <select id="selectbasic" name="Estado" style="font-family: Verdana;" class="form-control" required>
      <option value="1">Activo
     </option>
      <option value="0">Inactivo</option>
    </select>
  </div>
</div>

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