<html>
<head>
<meta charset="UTF-8">
<title>Personal</title>
<?php

include('../../../conexion/conexion.php');

$id_consultor=$_POST['id'];

$query="select *  from Consultores C, Paises P, Municipios M, EmpresaPersona E where C.CodigoPais=P.CodigoPais and C.CodigoMunicipio=M.CodigoMunicipio and  C.CodigoEmpresa=E.CodigoEmpresa and C.CodigoConsultor=?";

$params = array( array($id_consultor, SQLSRV_PARAM_IN));

$resultado=sqlsrv_query($conexion,$query,$params);
$consu=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);

$consulta="select * from Paises";
$resultado2=sqlsrv_query($conexion,$consulta);

/*para los departamentos*/
   /*para los departamentos para la empresa*/
  $strConsulta = "select * from Departamentos"; 
  $consulta2 = sqlsrv_query($conexion, $strConsulta);
  $opciones = '<option value=""> Elija un Departamento</option>';
  while($fila=sqlsrv_fetch_object($consulta2) )
  {
    $opciones.='<option value="'.$fila->CodigoDepartamento.'">'.$fila->NombreDepartamento.'</option>';
  }

  $consulta3="select * from Municipios";
$resultado3=sqlsrv_query($conexion,$consulta3);

?>

<link rel="stylesheet" href="librerias/css/Tab-Con.css">

<script type="text/javascript" src="municipios.js">
</script>

</head>
<body>
<form class="form-horizontal" accept-charset="utf-8" action="librerias/php/Consultor/modificar.php" method="post">
<input type="hidden" name="CodigoConsultor" value="<?php echo $consu['CodigoConsultor'];?>" />
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONSULTOR</strong></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para registrar un Consultor</strong></center>

<br>
<br>

<div style="display: block; margin:0 auto;" align="center" >
<table  border="1" align="center" class="table table-bordered" style="display:block; width: 90%;"><!-- Lo cambiaremos por CSS -->
<h3><center><p style="font-family: Verdana;"><b>DATOS DEL CONSULTOR</b></p> </center></h3>                 
          <tr>
              <th><p style="font-family: Verdana;">Id Consultor:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana;" required name="CodigoConsultor" disabled value="<?php echo $_POST['id'];?>" class="form-control input-md" size="90"></td>
          </tr> 

              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input required="required" style="font-family: Verdana;" type="text" class="form-control input-md" name="nombrec" value="<?php echo $consu['NombresConsultor'];?>" size="90" /></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input required type="text" style="font-family: Verdana;" name="apellidoc" value="<?php echo $consu['ApellidosConsultor'];?>" class="form-control input-md" size="90"/></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input required type="text" style="font-family: Verdana;" name="direccionConsultor" value="<?php echo $consu['DireccionConsultor'];?>" class="form-control input-md" size="90" /></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input required type="text" name="nit" style="font-family: Verdana;" value="<?php echo $consu['NitC'];?>" class="form-control input-md" size="43"></td>   

              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input required type="text" style="font-family: Verdana;"  class="form-control input-md" name="dui" value="<?php echo $consu['DuiC'];?>" size="20" /></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input required type="text" style="font-family: Verdana;" name="telefonoConsultor" value="<?php echo $consu['Telefono'];?>" class="form-control input-md" size="43" /></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input required type="text" style="font-family: Verdana;" name="nac" value="<?php echo $consu['Nacionalidad'];?>" class="form-control input-md" size="20" /></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" style="font-family: Verdana;" name="emailConsultor" value="<?php echo $consu['Correo'];?>" class="form-control input-md" size="43"/></td>

              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
<select name='lsPaisConsult' id="pais" class='form-control' style="font-family: Verdana;"  required style="width: 200px">
  <option selected value="<?php echo $consu['CodigoPais'];?>"><?php echo $consu['nombre'];?>
    
  </option>
  <?php

  while ($row=sqlsrv_fetch_object($resultado2))
  {
  
  echo "<option   value='$row->CodigoPais'>",$row->nombre,"</option>";
  }
?>
</select>

              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
                <select id="depto" name="deptoConsul[]" class='form-control' required   onClick="depEmpresa1(this)" >
               <?php echo $opciones; ?>
               </select></p>
              <!--<input type="text" name="depto" size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">

  <select name='lsMunic' id="munic" class='form-control' style="font-family: Verdana;"  required style="width: 200px">
  <option selected value="<?php echo $consu['CodigoMunicipio'];?>"><?php echo $consu['NombreMunicipio'];?>
    
  </option>
  <?php

  while ($row2=sqlsrv_fetch_object($resultado3))
  {
  
  echo "<option   value='$row2->CodigoMunicipio'>",$row2->NombreMunicipio,"</option>";
  }
?>
</select>

              </td>
              </tr>

                          <tr>
            <th><p style="font-family:Verdana;">Estado</p></th>
            <td colspan="4"><select id="selectbasic" name="Estado" value="<?php echo $consu['Estado'];?>" style="font-family: Verdana;" class="form-control" required>
      <option value="1">Activo
     </option>
      <option value="0">Inactivo</option>
    </select></td>
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