<html>
<head>
<meta charset="UTF-8">
<title>Personal</title>
<?php

include('../../../conexion/conexion.php');

$idempresa=$_POST['id'];

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

//para la empresa
  $strConsultaE = "select * from EmpresaPersona E where E.CodigoEmpresa = '$idempresa'"; 
  $consulta5 = sqlsrv_query($conexion, $strConsultaE);
 while($fila5=sqlsrv_fetch_object($consulta5) )
  {
  $nombreEm=$fila5->NombreEmpresa;
  }
?>

<link rel="stylesheet" href="librerias/css/Tab-Con.css">

<script type="text/javascript" src="municipios.js">
</script>

<script type="text/javascript">
  
  //Departamento y municipio 1
  function validar1()
{

var tipo=document.getElementById("lspais1").value;

if (tipo==68)
{
document.getElementById("depto").removeAttribute("readonly");
document.getElementById("munic").removeAttribute("readonly");
document.getElementById("depto").style.pointerEvents= "auto";
document.getElementById("munic").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto").setAttribute("readonly", "readonly");
document.getElementById("depto").selectedIndex =0;
document.getElementById("depto").style.pointerEvents= "none";
document.getElementById("munic").setAttribute("readonly", "readonly");
document.getElementById("munic").selectedIndex =0;
document.getElementById("munic").style.pointerEvents= "none";
};
}
</script>

</head>
<body>
<form class="form-horizontal" accept-charset="utf-8" action="librerias/php/Consultor/insertar.php" method="post">
<input type="hidden" name="id" value="<?php echo $idempresa; ?>" />
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
              <th><p style="font-family: Verdana;">Nombre Empresa:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana;" required class="form-control input-md" size="90" value="<?php echo $nombreEm; ?>" readOnly="readOnly"></td>
          </tr> 

              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input required="required" style="font-family: Verdana;" type="text" class="form-control input-md" name="nombrec"  size="90" /></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input required type="text" style="font-family: Verdana;" name="apellidoc" class="form-control input-md" size="90"/></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input required type="text" style="font-family: Verdana;" name="direccionConsultor"  class="form-control input-md" size="90" /></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input required type="text" name="nit" style="font-family: Verdana;"  class="form-control input-md" size="43"></td>   

              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input required type="text" style="font-family: Verdana;"  class="form-control input-md" name="dui"  size="20" /></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input required type="text" style="font-family: Verdana;" name="telefonoConsultor" class="form-control input-md" size="43" /></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input required type="text" style="font-family: Verdana;" name="nac"  class="form-control input-md" size="20" /></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" style="font-family: Verdana;" name="emailConsultor" class="form-control input-md" size="43"/></td>

              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
<select name='lsPaisConsult' id="lspais1" onchange="validar1()" class='form-control' style="font-family: Verdana;"  required style="width: 200px">
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

              <select id="munic" class='form-control' name="lsMunic">
              <option value="277">Elija un municipio</option>
              </select></p>

              </td>
              </tr>

              </table>  
              <br/> 
              </div>         
</center>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"  align="center">
    <button name="singlebutton" class="btn btn-primary" style="font-family: Verdana;" type="submit"><strong>Registrar</strong></button>
  </div>
</div>

</fieldset>
</form>

</body>
</html>