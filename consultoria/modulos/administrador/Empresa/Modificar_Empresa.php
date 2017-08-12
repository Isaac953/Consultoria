<html>
<head>
<meta charset="UTF-8">
<title>Personal</title>
<?php

include('../../../conexion/conexion.php');

$id_empresa=$_POST['id'];

$query="select *  from EmpresaPersona E, Paises P, Municipios M where E.CodigoPais=P.CodigoPais and E.CodigoMunicipio=M.CodigoMunicipio and  E.CodigoEmpresa= $id_empresa;";

$params = array( array($id_empresa, SQLSRV_PARAM_IN));

$resultado=sqlsrv_query($conexion,$query,$params);
$emp=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);

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
<script type="text/javascript">
  
  //Departamento y municipio 1
  function validar2()
{

var tipo=document.getElementById("lspais2").value;

if (tipo==68)
{
document.getElementById("lsdeptempresa").removeAttribute("readonly");
document.getElementById("lsmunicempresa").removeAttribute("readonly");
document.getElementById("lsdeptempresa").style.pointerEvents= "auto";
document.getElementById("lsmunicempresa").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("lsdeptempresa").setAttribute("readonly", "readonly");
document.getElementById("lsdeptempresa").selectedIndex =0;
document.getElementById("lsdeptempresa").style.pointerEvents= "none";
document.getElementById("lsmunicempresa").setAttribute("readonly", "readonly");
document.getElementById("lsmunicempresa").selectedIndex =0;
document.getElementById("lsmunicempresa").style.pointerEvents= "none";
};
}
</script>

</head>
<body>
<form class="form-horizontal" accept-charset="utf-8" action="librerias/php/Empresas/modificar.php" method="post">
<input type="hidden" name="CodigoEmpresa" value="<?php echo $emp['CodigoEmpresa'];?>" />
<fieldset>

<!-- Form Name -->
<legend><h2 align=center><p style="font-family: Verdana; color:#0072bb"><strong>EMPRESA</strong></h2></legend>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para actualizar una Empresa</strong></center>

<br>
<br>

<div style="display: block; margin:0 auto">
<table border="1" align="center" class="table table-bordered" style="width: 90%"> 
  <p style="font-family: Verdana;">
  <center>
    <h3><p style="font-family: Verdana;"><b>DATOS DE LA EMPRESA</b></p></h3>
    </center>
          <tr>
              <th><p style="font-family: Verdana;">Id Empresa:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana;" required name="CodigoEmpresa" disabled value="<?php echo $emp['CodigoEmpresa'];?>" class="form-control input-md" size="90"></td>
          </tr> 
           <tr>
              <th><p style="font-family: Verdana;">Nombre de la empresa:</p></th>
        <td colspan="4"><input type="text" name="nombrempresa" value="<?php echo $emp['NombreEmpresa'];?>" style="font-family:Verdana;" required class="form-control input-md" size="90"></td>
          </tr>

          <tr>
              <th><p style="font-family: Verdana;">Dirección:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana;" required name="direccionEmpresa" value="<?php echo $emp['Direccion'];?>" class="form-control input-md" size="90"></td>
          </tr>

          <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nitEmpresa" value="<?php echo $emp['Nit'];?>" style="font-family:Verdana;" class="form-control input-md" size="43"></td>

              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" style="font-family:Verdana;" name="duiEmpresa" value="<?php echo $emp['Dui'];?>" class="form-control input-md" size="20"></td>


          </tr>

          <tr>
            <th><p style="font-family:Verdana;">Tipo</p></th>
            <td colspan="4"> <p style=" font-family: Verdana;">
            <select name="tipo" value="<?php echo $emp['Tipo'];?>" class='form-control' style="width: 200px">
              <option value="Persona">Persona Natural</option>
              <option value="Empresa">Empresa</option>

            </select></p>
            </td>
            
          </tr> 

          <tr>
              <th><p style="font-family: Verdana;">Nombre del representante:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana;" required name="nomRep" value="<?php echo $emp['NombresRepresentante'];?>" class="form-control input-md" size="90"></td>
          </tr> 
          <tr>
              <th><p style="font-family: Verdana;">Apellido del representante:</p></th>
              <td colspan="4"><input type="text" style="font-family:Verdana;" required name="apellRep" value="<?php echo $emp['ApellidosRepresentante'];?>" class="form-control input-md" size="90"></td>
          </tr>
          <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="tel" value="<?php echo $emp['Telefono'];?>" style="font-family:Verdana;" required class="form-control input-md" size="43"></td>

              <th><p style="font-family: Verdana;">Telefono Movil:</p></th>
              <td ><input type="text" name="telMovil" value="<?php echo $emp['celular'];?>" style="font-family:Verdana;" class="form-control input-md" size="20"></td>
          </tr>

          <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="email" value="<?php echo $emp['Email'];?>" style="font-family:Verdana;" class="form-control input-md" size="43"></td>
              <th><p style="font-family: Verdana;">FanPage:</p></th>
              <td><input type="text" name="fanPage" value="<?php echo $emp['paginaWeb'];?>" style="font-family:Verdana;" class="form-control input-md" size="20"></td>
          </tr>
          <tr>
              <th><p style="font-family: Verdana;">Pais:</p></th>
              <td><p style=" font-family: Verdana;">
  <select name='lsPaisEmpresa' id="lspais2" onchange="validar2()" class='form-control' style="font-family: Verdana;"  required style="width: 200px">
  <option selected value="<?php echo $emp['CodigoPais'];?>"><?php echo $emp['nombre'];?>
    
  </option>
  <?php

  while ($row=sqlsrv_fetch_object($resultado2))
  {
  
  echo "<option   value='$row->CodigoPais'>",$row->nombre,"</option>";
  }
?>
</select>
              </td>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
      <td><p style=" font-family: Verdana;">
      <select id="lsdeptempresa" style="width: 200px" onClick="depEmpresa(this)" class='form-control'>
      <?php echo $opciones; ?>
      </select></p>
      </td>
    
          </tr>       

           <tr>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
         <td><p style=" font-family: Verdana;">


                 <select required id="lsmunicempresa" class='form-control' style="display:block"   name="lsMunicEmpresa"> 
              <option value="<?php echo $emp['CodigoMunicipio'];?>"><?php echo $emp['NombreMunicipio'];?></option>
              <option value="277">Elija un municipio</option>
              </select></p>

     </td>
            <th><p style="font-family:Verdana;">Registro IVA</p></th>
            <td ><input type="text" name="regIva" style="font-family: Verdana" value="<?php echo $emp['RegistroIva'];?>" class='form-control' size="20"></td></tr>

            <tr>
            <th><p style="font-family:Verdana;">Estado</p></th>
      

      <td ><select id="selectbasic" name="Estado" style="font-family: Verdana;" class="form-control">
   
   <?php 

$estad=$emp['Estado'];
$estaver='';
if ($estad==true)
{
$estaver='Activo';
}

if ($estad==false) 
{
$estaver='Inactivo';
}

   ?>

    <option value="<?php echo $emp['Estado']; ?>"><?php echo $estaver; ?></option>
    <?php 
$esta= $emp['Estado'];

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

    </td>
          </tr>
        </table>
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