<html>
<head>
	<title></title>
<?php

include('../../../conexion/conexion.php');


$consulta="select * from Oficinas";
$resultado=sqlsrv_query($conexion,$consulta);
$consulta2="select * from Accesos";
$resultado2=sqlsrv_query($conexion,$consulta2);

/*para las areas para la empresa*/
  $strConsultaArea = "select * from AreaEspecializacion"; 
  $consultaAreas = sqlsrv_query($conexion, $strConsultaArea);
  $opcionesAreas = '<option value="0"> Elija un Area</option>';
  while($fila=sqlsrv_fetch_object($consultaAreas) )
  {
    $opcionesAreas.='<option value="'.$fila->CodigoArea.'">'.$fila->AreaEspecializacion.'</option>';
  }

?>
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
-->
      <script type="text/javascript" src="java.js"></script>

<script language="JavaScript"> 
//variable para el contador
var contador=2; 
function incrementar()
 {
if(contador==2) 
{
document.getElementById('tr2').style.display = "block";
document.getElementById('lsAreas2').disabled=false;
document.getElementById('lsSub2').disabled=false;
};

if(contador==3)
{ 
document.getElementById('tr3').style.display = "block";
document.getElementById('lsAreas3').disabled=false;
document.getElementById('lsSub3').disabled=false;
};

if(contador==4) 
{
document.getElementById('tr4').style.display = "block";
document.getElementById('lsAreas4').disabled=false;
document.getElementById('lsSub4').disabled=false;

};

if(contador==5) 
{
document.getElementById('tr5').style.display = "block";
document.getElementById('lsAreas5').disabled=false;
document.getElementById('lsSub5').disabled=false;
};

if(contador==6) 
{
document.getElementById('tr6').style.display = "block";
document.getElementById('lsAreas6').disabled=false;
document.getElementById('lsSub6').disabled=false;
};

if(contador==7) 
{
document.getElementById('tr7').style.display = "block";
document.getElementById('lsAreas7').disabled=false;
document.getElementById('lsSub7').disabled=false;
};

if(contador==8) 
{
document.getElementById('tr8').style.display = "block";
document.getElementById('lsAreas8').disabled=false;
document.getElementById('lsSub8').disabled=false;
};

if(contador==9) 
{
document.getElementById('tr9').style.display = "block";
document.getElementById('lsAreas9').disabled=false;
document.getElementById('lsSub9').disabled=false;
};

if(contador==10) 
{
document.getElementById('tr10').style.display = "block";
document.getElementById('lsAreas10').disabled=false;
document.getElementById('lsSub10').disabled=false;
};
if(contador==11) 
alert('Maximo permitido alcanzado: 10'); 


else
{
document.operacion.caja.value= contador++; 
}
}

function decrementar()
{ 
if(contador==2) 
{
alert('Almenos debe pertenecer a una ÁREA: 1'); 

}
else 
{ 
document.operacion.caja.value= contador--;
if(contador==10) 
{
document.getElementById('tr10').style.display = "none";
document.getElementById('lsAreas10').disabled=true;
document.getElementById('lsSub10').disabled=true;
}; 
if(contador==9) 
{
document.getElementById('tr9').style.display = "none";
document.getElementById('lsAreas9').disabled=true;
document.getElementById('lsSub9').disabled=true;
};
if(contador==8) 
{
document.getElementById('tr8').style.display = "none";
document.getElementById('lsAreas8').disabled=true;
document.getElementById('lsSub8').disabled=true;
};

if(contador==7) 
{
document.getElementById('tr7').style.display = "none";
document.getElementById('lsAreas7').disabled=true;
document.getElementById('lsSub7').disabled=true;
};

if(contador==6) 
{
document.getElementById('tr6').style.display = "none";
document.getElementById('lsAreas6').disabled=true;
document.getElementById('lsSub6').disabled=true;
};

if(contador==5) 
{
document.getElementById('tr5').style.display = "none";
document.getElementById('lsAreas5').disabled=true;
document.getElementById('lsSub5').disabled=true;
};

if(contador==4) 
{
document.getElementById('tr4').style.display = "none";
document.getElementById('lsAreas4').disabled=true;
document.getElementById('lsSub4').disabled=true;
};

if(contador==3) 
   {
document.getElementById('tr3').style.display = "none";
document.getElementById('lsAreas3').disabled=true;
document.getElementById('lsSub3').disabled=true;
};

if(contador==2) 
{
document.getElementById('tr2').style.display = "none";
document.getElementById('lsAreas2').disabled=true;
document.getElementById('lsSub2').disabled=true;
};
}

} 
</script> 

<script type="text/javascript">

function area1()
{
        $(document).ready(function(){
        $("#lsAreas").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea="+$("#lsAreas").val(),
            success: function(opciones){
              $("#lsSub").html(opciones);
            }
          })
        });
      });
}

function area2()
{
 $(document).ready(function(){
        $("#lsAreas2").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea2="+$("#lsAreas2").val(),
            success: function(opciones){
              $("#lsSub2").html(opciones);
            }
          })
        });
      });
}


function area3()
{
 $(document).ready(function(){
        $("#lsAreas3").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea3="+$("#lsAreas3").val(),
            success: function(opciones){
              $("#lsSub3").html(opciones);
            }
          })
        });
      });
}



function area4()
{
 $(document).ready(function(){
        $("#lsAreas4").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea4="+$("#lsAreas4").val(),
            success: function(opciones){
              $("#lsSub4").html(opciones);
            }
          })
        });
      });
}


function area5()
{
 $(document).ready(function(){
        $("#lsAreas5").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea5="+$("#lsAreas5").val(),
            success: function(opciones){
              $("#lsSub5").html(opciones);
            }
          })
        });
      });
}


function area6()
{
 $(document).ready(function(){
        $("#lsAreas6").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea6="+$("#lsAreas6").val(),
            success: function(opciones){
              $("#lsSub6").html(opciones);
            }
          })
        });
      });
}


function area7()
{
 $(document).ready(function(){
        $("#lsAreas7").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea7="+$("#lsAreas7").val(),
            success: function(opciones){
              $("#lsSub7").html(opciones);
            }
          })
        });
      });
}


function area8()
{
 $(document).ready(function(){
        $("#lsAreas8").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea8="+$("#lsAreas8").val(),
            success: function(opciones){
              $("#lsSub8").html(opciones);
            }
          })
        });
      });
}

function area9()
{
 $(document).ready(function(){
        $("#lsAreas9").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea9="+$("#lsAreas9").val(),
            success: function(opciones){
              $("#lsSub9").html(opciones);
            }
          })
        });
      });
}

function area10()
{
 $(document).ready(function(){
        $("#lsAreas10").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea10="+$("#lsAreas10").val(),
            success: function(opciones){
              $("#lsSub10").html(opciones);
            }
          })
        });
      });
}
</script>
<!--HASTA AQUI TERMINA LO DEL JAVASCRIPT-->

<link rel="stylesheet" href="../../../librerias/css/bootstrap.min.css" class="rel">
<link rel="stylesheet" href="../../../librerias/css/bootstrap-theme.min.css" class="href">
<link rel="stylesheet" href="../../../librerias/css/estilo.css">


</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
          
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="../../../principal.php" target="" class="navbar-brand" style="font-family: Verdana"><strong>Regresar a Inicio</strong></a>
        </div>
        <!-- Inicia Menu -->
        <div class="collapse navbar-collapse" id="navegacion-fm">
          <ul class="nav navbar-nav">
            <!-- !!!!!!!!!!!!!!1  -->
          </ul>
        
        </div>
      </div>
    </nav>
  </header>

<link rel="stylesheet" href="Tab-Con.css">
<link rel="stylesheet" href="div.css">

</head>
<body>

<form action="insertarPersonal.php" accept-charset="utf-8" method="post" name="operacion">

<div style="display: block; margin:0 auto" class="container" align="center" >
<table border="1" align="center" class="table table-bordered" style="width: 35%"> 
  <p style="font-family: Verdana;">
  <center>
<h1 align=center><p style="font-family: Verdana; color:#0072bb"><strong>PERSONAL</strong></p></h1>

<center><strong style="font-family: Verdana;">Llenar los siguientes campos para registrar un Personal</strong></center>

<br>
<br>

  <h3><p class="text-center" style="font-family: Verdana;"><strong>REGISTRO DE PERSONAL</strong></p></h3>

           <tr>
              <th><p style="font-family: Verdana;">Nombres:</p></th>
        <td><input name="txtNombre" type="text" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md" required></td>
        </tr>

        <tr>
              <th><p style="font-family: Verdana;">Apellidos:</p></th>
        <td><input name="txtApellido" type="text" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md" required></td>
          </tr>

         <tr>
              <th><p style="font-family: Verdana;">E-Mail:</p></th>
        <td><input name="txtEmail" type="text" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md" required></td>
        </tr>
        <tr>
              <th><p style="font-family: Verdana;">Oficina:</p></th>
        <td>
        <select name='lsOficina' style="font-family: Verdana;" class='form-control' required>
  <?php
  echo "<option selected value='0'>Seleccione Oficina</option>";

  while ($row=sqlsrv_fetch_object($resultado))
  {
  
  echo "<option  value='$row->CodigoOficina'>",$row->NombreOficina,"</option>";
  }

?>
</select>
</td>
          </tr>

         <tr>
              <th><p style="font-family: Verdana;">Username:</p></th>
        <td><input name="txtUsername" type="text" placeholder="Escriba" style="font-family: Verdana;" class="form-control input-md" required></td>
        </tr>
        <tr>
              <th><p style="font-family: Verdana;">Password:</p></th>
        <td><input name="txtPassword" type="password" placeholder="Escriba" style="font-family: Verdana;" class="form-control input-md" required></td>
          </tr>

         <tr>
              <th><p style="font-family: Verdana;">Acceso:</p></th>
        <td>
        <select name='lsAcceso' style="font-family: Verdana;" class='form-control' required>
  <?php
  echo "<option selected value='0'>Seleccione un Acceso</option>";

  while ($row2=sqlsrv_fetch_object($resultado2))
  {
  
  echo "<option  value='$row2->CodigoAcceso'>",$row2->TituloAcceso,"</option>";
  }
?>
</select>
</td>
</tr>

<tr>
              <th><p style="font-family: Verdana;">Cargo:</p></th>
        <td><input name="txtCargo" type="text" style="font-family: Verdana;" placeholder="Escriba" class="form-control input-md" required></td>
          </tr>
</table>
</div>

<br>

      <table align="center">
    <tr>
<input name="caja" type="hidden"  >
</td>
</tr>
</table>

</table>    

<div class="container">
<table  border="1" align="center" class="table table-bordered" style="width: 50%">
        <center>
    <h3><p style="font-family: Verdana;"><strong>DETALLE DE PERSONAL</strong></p></h3>
    </center>
<tr style="display:block;">
<th style="width: 15%; text-align: center; font-family: Verdana;">Área</th>
<th style="width: 15%; text-align: center; font-family: Verdana;">Sub Área</th>
<th style="width: 3%; text-align: center; font-family: Verdana;">Agregar/Quitar</th>
</tr>
<tr style="display:block;">
<td style="width: 30%; text-align: center">
 <select name="lsAreas[]" id="lsAreas" required style="width:200px; font-family: Verdana;" class='form-control' onClick="area1(this)">
  <?php
echo $opcionesAreas;   
  ?>  
 </select>
</td>

 <td style="width: 30%; text-align: center">
 <select name="lsSub[]" id="lsSub" required style="width:200px; font-family: Verdana;" class='form-control' >
  <option value="0">Elija una Sub Área</option>
 </select>
</td>

  <td style="width: 22%; text-align: center">
<img src="mas2.png" style="cursor: pointer" width="30" height="30"  onClick="incrementar()" />
<img src="menos2.png" style="cursor: pointer" width="30" height="30" onClick="decrementar()" />

</td>
          </tr> 
             
             <!--aqui se generaran mas areas-->  
<tr id="tr2" style="display:none; ">
<td align="center" width="30%">
             <select name="lsAreas[]" id="lsAreas2" disabled style=" width:200px; font-family: Verdana;" class='form-control' onClick="area2(this)">
  <?php
echo $opcionesAreas;   
  ?>  
 </select>
</td>

 <td align="center" width="30%">
<select name="lsSub[]" id="lsSub2" disabled style=" width:200px; font-family: Verdana;" class='form-control'>
<option value="0">Elija una Sub Área</option>
</select>
    </td>
<td align="center" width="22%"></td>
</tr>    

<tr id="tr3"  style="display:none; ">
<td align="center" width="30%">
 <select name="lsAreas[]" id="lsAreas3" disabled style="width:200px; font-family: Verdana;"  class='form-control' onClick="area3(this)">
  <?php
echo $opcionesAreas;   
  ?>  
 </select>
</td>

<td align="center" width="30%">
<select name="lsSub[]" id="lsSub3" class='form-control' disabled style="width:200px; font-family: Verdana;">
<option value="0">Elija una Sub Área</option>
</select>
    </td>
    <td align="center" width="22%"></td>
    </tr>   

    <!--AREA 4-->
       <tr id="tr4"  style="display:none; ">
<td align="center" width="30%">
       <select name="lsAreas[]" id="lsAreas4" disabled style=" width:200px; font-family: Verdana;" class='form-control' onClick="area4(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select>
       </td>
       
<td align="center" width="30%">
       <select name="lsSub[]" id="lsSub4" class='form-control' disabled style="width:200px; font-family: Verdana;">
       <option value="0">Elija una Sub Área</option>
       </select>
       </td>
       <td align="center" width="22%"></td>
       </tr>    

                <!--AREA 5-->
       <tr id="tr5"  style="display:none; ">
       <td align="center" width="30%">
       <select name="lsAreas[]" id="lsAreas5" class='form-control' disabled style=" width:200px; font-family: Verdana;" onClick="area5(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select>
       </td>
       
       <td align="center" width="30%">
       <select name="lsSub[]" id="lsSub5" class='form-control' disabled style="width:200px; font-family: Verdana;">
       <option value="0">Elija una Sub Área</option>
       </select>
       </td>
       <td align="center" width="22%"></td>
       </tr>  
        

  <!--AREA 6-->
 <tr id="tr6"  style="display:none; ">
       <td align="center" width="30%">
       <select name="lsAreas[]" id="lsAreas6" class='form-control' disabled style=" width:200px; font-family: Verdana;" onClick="area6(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select>
       </td>
       
       <td align="center" width="30%">
       <select name="lsSub[]" id="lsSub6" class='form-control' disabled style="width:200px; font-family: Verdana;">
       <option value="0">Elija una Sub Área</option>
       </select>
       </td>
       <td align="center" width="22%"></td>
       </tr> 


        <!--AREA 7-->
       <tr id="tr7"  style="display:none; ">
       <td align="center" width="30%">
       <select name="lsAreas[]" id="lsAreas7" class='form-control' disabled style=" width:200px; font-family: Verdana;" onClick="area7(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select>
       </td>
       
       <td align="center" width="30%">
       <select name="lsSub[]" id="lsSub7" class='form-control' disabled style="width:200px; font-family: Verdana;">
       <option value="0">Elija una Sub Área</option>
       </select>
       </td>
       <td align="center" width="22%"></td>
       </tr> 


<!--AREA 8-->
       <tr id="tr8"  style="display:none; ">
       <td align="center" width="30%">
       <select name="lsAreas[]" id="lsAreas8" class='form-control' disabled style=" width:200px; font-family: Verdana;" onClick="area8(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select>
       </td>
       
       <td align="center" width="30%">
       <select name="lsSub[]" id="lsSub8" class='form-control' disabled style="width:200px; font-family: Verdana;">
       <option value="0">Elija una Sub Área</option>
       </select>
       </td>
       <td align="center" width="22%"></td>
       </tr> 


<!--AREA 9-->
       <tr id="tr9"  style="display:none; ">
       <td align="center" width="30%">
       <select name="lsAreas[]" id="lsAreas9" class='form-control' disabled style=" width:200px; font-family: Verdana;" onClick="area9(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select>
       </td>
       
       <td align="center" width="30%">
       <select name="lsSub[]" id="lsSub9" class='form-control' disabled style="width:200px; font-family: Verdana;">
       <option value="0">Elija una Sub Área</option>
       </select>
       </td>
       <td align="center" width="22%"></td>
       </tr> 


       <!--AREA 10-->
       <tr id="tr10"  style="display:none; ">
       <td align="center" width="30%">
       <select name="lsAreas[]" id="lsAreas10" class='form-control' disabled style=" width:200px; font-family: Verdana;" onClick="area10(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select>
       </td>
       
       <td align="center" width="30%">
       <select name="lsSub[]" id="lsSub10" class='form-control' disabled style="width:200px; font-family: Verdana;">
       <option value="0">Elija una Sub Área</option>
       </select>
       </td>
       <td align="center" width="22%"></td>
       </tr> 
        </table>

    <div id="contenedorAreas"></div>    
    </div>
         
  <br>

<!-- Button -->
<div class="form-group, container">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4" align="center">
    <button name="singlebutton" class="btn btn-primary" style="font-family: Verdana;" type="submit"><strong>Guardar</strong></button>
  </div>
</div>
    </form>

</body>
</html>