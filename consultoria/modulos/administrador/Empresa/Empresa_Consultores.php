<!DOCTYPE html>
    <?php

     include('conexion.php');
/*para los departamentos*/
   /*para los departamentos para la empresa*/
  $strConsulta = "select * from Departamentos"; 
  $consulta = sqlsrv_query($conexion, $strConsulta);
  $opciones = '<option value=""> Elija un Departamento</option>';
  while($fila=sqlsrv_fetch_object($consulta) )
  {
    $opciones.='<option value="'.$fila->CodigoDepartamento.'">'.$fila->NombreDepartamento.'</option>';
  }

/*para los paises*/
  $strConsultaPais = "select * from Paises"; 
  $consultaPais = sqlsrv_query($conexion, $strConsultaPais);
  $opcionesPais = '<option value=""> Elija un Pais</option>';
  while($filaPais=sqlsrv_fetch_object($consultaPais) )
  {
    $opcionesPais.='<option value="'.$filaPais->CodigoPais.'">'.$filaPais->nombre.'</option>';
  }


/*para las areas para la empresa*/
  $strConsultaArea = "select * from AreaEspecializacion"; 
  $consultaAreas = sqlsrv_query($conexion, $strConsultaArea);
  $opcionesAreas = '<option value="0"> Elija un Área</option>';
  while($fila=sqlsrv_fetch_object($consultaAreas) )
  {
    $opcionesAreas.='<option value="'.$fila->CodigoArea.'">'.$fila->AreaEspecializacion.'</option>';
  }

?>
<html>

    <head>
<meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Empresa y Consultores</title>

     <script type="text/javascript" src="java.js"></script>

     <script src="funciones.js">
     </script>  

<script type="text/javascript" src="municipios.js">
</script>

<script type="text/javascript" src="consultores.js"> 
</script> 



<script type="text/javascript" >


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


<!--PARA LOS CONSULTORES-->

     <script language="JavaScript">
     var cont=2;
function incrementarConsultor() 
{

if(cont==2) 
{
document.getElementById('consultor2').style.display = "block";
var nodes = document.getElementById("consultor2").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont==3)
{ 
document.getElementById('consultor3').style.display = "block";
var nodes = document.getElementById("consultor3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont==4) 
{
document.getElementById('consultor4').style.display = "block";
var nodes = document.getElementById("consultor4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};


if(cont==5) 
{
  document.getElementById('consultor5').style.display = "block";

var nodes = document.getElementById("consultor5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==6) 
{
document.getElementById('consultor6').style.display = "block";
var nodes = document.getElementById("consultor6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==7) 
{
document.getElementById('consultor7').style.display = "block";
var nodes = document.getElementById("consultor7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==8) 
{
document.getElementById('consultor8').style.display = "block";
var nodes = document.getElementById("consultor8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==9) 
{
document.getElementById('consultor9').style.display = "block";
var nodes = document.getElementById("consultor9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==10) 
{
document.getElementById('consultor10').style.display = "block";
var nodes = document.getElementById("consultor10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};
if(cont==11) 
alert('Maximo permitido alcanzado: 10'); 


else
{
document.operacion.cajaconsultor.value= cont++; 
}
}

function decrementarConsultor()
{ 
if(cont==2) 
{
alert('Al menos debe haber un consultor'); 

}
else 
{ 
document.operacion.cajaconsultor.value= cont--;
if(cont==10) 
{
document.getElementById('consultor10').style.display = "none";
var nodes = document.getElementById("consultor10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

}; 
if(cont==9) 
{
document.getElementById('consultor9').style.display = "none";
var nodes = document.getElementById("consultor9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};
if(cont==8) 
{
document.getElementById('consultor8').style.display = "none";
var nodes = document.getElementById("consultor8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==7) 
{
document.getElementById('consultor7').style.display = "none";
var nodes = document.getElementById("consultor7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==6) 
{
document.getElementById('consultor6').style.display = "none";
var nodes = document.getElementById("consultor6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==5) 
{
document.getElementById('consultor5').style.display = "none";
var nodes = document.getElementById("consultor5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==4) 
{
document.getElementById('consultor4').style.display = "none";
var nodes = document.getElementById("consultor4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont==3) 
{
document.getElementById('consultor3').style.display = "none";
var nodes = document.getElementById("consultor3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont==2) 
{
document.getElementById('consultor2').style.display = "none";
var nodes = document.getElementById("consultor2").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};
}

}

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

//Departamento y municipio 2

  function validar2()
{

var tipo=document.getElementById("lspais2").value;

if (tipo==68)
{
document.getElementById("depto2").removeAttribute("readonly");
document.getElementById("munic2").removeAttribute("readonly");
document.getElementById("depto2").style.pointerEvents= "auto";
document.getElementById("munic2").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto2").setAttribute("readonly", "readonly");
document.getElementById("depto2").selectedIndex =0;
document.getElementById("depto2").style.pointerEvents= "none";
document.getElementById("munic2").setAttribute("readonly", "readonly");
document.getElementById("munic2").selectedIndex =0;
document.getElementById("munic2").style.pointerEvents= "none";
};
}

//Departamento y municipio 3

  function validar3()
{

var tipo=document.getElementById("lspais3").value;

if (tipo==68)
{
document.getElementById("depto3").removeAttribute("readonly");
document.getElementById("munic3").removeAttribute("readonly");
document.getElementById("depto3").style.pointerEvents= "auto";
document.getElementById("munic3").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto3").setAttribute("readonly", "readonly");
document.getElementById("depto3").selectedIndex =0;
document.getElementById("depto3").style.pointerEvents= "none";
document.getElementById("munic3").setAttribute("readonly", "readonly");
document.getElementById("munic3").selectedIndex =0;
document.getElementById("munic3").style.pointerEvents= "none";
};
}

//Departamento y municipio 4

  function validar4()
{

var tipo=document.getElementById("lspais4").value;

if (tipo==68)
{
document.getElementById("depto4").removeAttribute("readonly");
document.getElementById("munic4").removeAttribute("readonly");
document.getElementById("depto4").style.pointerEvents= "auto";
document.getElementById("munic4").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto4").setAttribute("readonly", "readonly");
document.getElementById("depto4").selectedIndex =0;
document.getElementById("depto4").style.pointerEvents= "none";
document.getElementById("munic4").setAttribute("readonly", "readonly");
document.getElementById("munic4").selectedIndex =0;
document.getElementById("munic4").style.pointerEvents= "none";
};
}

//Departamento y municipio 5

  function validar5()
{

var tipo=document.getElementById("lspais5").value;

if (tipo==68)
{
document.getElementById("depto5").removeAttribute("readonly");
document.getElementById("munic5").removeAttribute("readonly");
document.getElementById("depto5").style.pointerEvents= "auto";
document.getElementById("munic5").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto5").setAttribute("readonly", "readonly");
document.getElementById("depto5").selectedIndex =0;
document.getElementById("depto5").style.pointerEvents= "none";
document.getElementById("munic5").setAttribute("readonly", "readonly");
document.getElementById("munic5").selectedIndex =0;
document.getElementById("munic5").style.pointerEvents= "none";
};
}

//Departamento y municipio 6

  function validar6()
{

var tipo=document.getElementById("lspais6").value;

if (tipo==68)
{
document.getElementById("depto6").removeAttribute("readonly");
document.getElementById("munic6").removeAttribute("readonly");
document.getElementById("depto6").style.pointerEvents= "auto";
document.getElementById("munic6").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto6").setAttribute("readonly", "readonly");
document.getElementById("depto6").selectedIndex =0;
document.getElementById("depto6").style.pointerEvents= "none";
document.getElementById("munic6").setAttribute("readonly", "readonly");
document.getElementById("munic6").selectedIndex =0;
document.getElementById("munic6").style.pointerEvents= "none";
};
}

//Departamento y municipio 7

  function validar7()
{

var tipo=document.getElementById("lspais7").value;

if (tipo==68)
{
document.getElementById("depto7").removeAttribute("readonly");
document.getElementById("munic7").removeAttribute("readonly");
document.getElementById("depto7").style.pointerEvents= "auto";
document.getElementById("munic7").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto7").setAttribute("readonly", "readonly");
document.getElementById("depto7").selectedIndex =0;
document.getElementById("depto7").style.pointerEvents= "none";
document.getElementById("munic7").setAttribute("readonly", "readonly");
document.getElementById("munic7").selectedIndex =0;
document.getElementById("munic7").style.pointerEvents= "none";
};
}

//Departamento y municipio 8

  function validar8()
{

var tipo=document.getElementById("lspais8").value;

if (tipo==68)
{
document.getElementById("depto8").removeAttribute("readonly");
document.getElementById("munic8").removeAttribute("readonly");
document.getElementById("depto8").style.pointerEvents= "auto";
document.getElementById("munic8").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto8").setAttribute("readonly", "readonly");
document.getElementById("depto8").selectedIndex =0;
document.getElementById("depto8").style.pointerEvents= "none";
document.getElementById("munic8").setAttribute("readonly", "readonly");
document.getElementById("munic8").selectedIndex =0;
document.getElementById("munic8").style.pointerEvents= "none";
};
}

//Departamento y municipio 9

  function validar9()
{

var tipo=document.getElementById("lspais9").value;

if (tipo==68)
{
document.getElementById("depto9").removeAttribute("readonly");
document.getElementById("munic9").removeAttribute("readonly");
document.getElementById("depto9").style.pointerEvents= "auto";
document.getElementById("munic9").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto9").setAttribute("readonly", "readonly");
document.getElementById("depto9").selectedIndex =0;
document.getElementById("depto9").style.pointerEvents= "none";
document.getElementById("munic9").setAttribute("readonly", "readonly");
document.getElementById("munic9").selectedIndex =0;
document.getElementById("munic9").style.pointerEvents= "none";
};
}

//Departamento y municipio 10

  function validar10()
{

var tipo=document.getElementById("lspais10").value;

if (tipo==68)
{
document.getElementById("depto10").removeAttribute("readonly");
document.getElementById("munic10").removeAttribute("readonly");
document.getElementById("depto10").style.pointerEvents= "auto";
document.getElementById("munic10").style.pointerEvents= "auto";
};

if (tipo!=68) 
{
document.getElementById("depto10").setAttribute("readonly", "readonly");
document.getElementById("depto10").selectedIndex =0;
document.getElementById("depto10").style.pointerEvents= "none";
document.getElementById("munic10").setAttribute("readonly", "readonly");
document.getElementById("munic10").selectedIndex =0;
document.getElementById("munic10").style.pointerEvents= "none";
};
}

  function validar11()
{

var tipo=document.getElementById("lspais11").value;

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
<link rel="stylesheet" href="../../../librerias/css/bootstrap.min.css" class="rel">
<link rel="stylesheet" href="../../../librerias/css/bootstrap-theme.min.css" class="href">
<link rel="stylesheet" href="../../../librerias/css/estilo.css">
<link rel="stylesheet" href="Tab-Con.css">
<link rel="stylesheet" href="centrardiv.css">

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
          <a href="../../../principal.php" target="" class="navbar-brand"><strong>Regresar a Inicio</strong></a>
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

<div class="container">    
<h1 align=center><p style="font-family: Verdana; color:#0072bb"><strong>REGISTRO DE EMPRESA Y CONSULTORES</strong></h1>
</div>

<br>

<form action="insertarEmpresa.php" method="post" name="operacion">

<div style="display: block; margin:0 auto" class="container" align="center" >
<table border="1" align="center" class="table table-bordered" style="width: 70%"> 
	<p style="font-family: Verdana;">
  <center>
    <h3><p style="font-family: Verdana;"><b>DATOS DE LA EMPRESA</b></p></h3>
    </center>
           <tr>
              <th><p style="font-family: Verdana;">Nombre de la empresa:</p></th>
			  <td colspan="4"><input type="text" name="nombrempresa" style="font-family:Verdana;" required class="form-control input-md" size="90"></td>
          </tr>

          <tr>
              <th><p style="font-family: Verdana;">Dirección:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana;"  name="direccionEmpresa" class="form-control input-md" size="90"></td>
          </tr>

          <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nitEmpresa" style="font-family:Verdana;" required class="form-control input-md" size="43"></td>

			        <th><p style="font-family: Verdana;">DUI Responsable:</p></th>
              <td  colspan="3"><input type="text" style="font-family:Verdana;"  name="duiEmpresa" class="form-control input-md" size="20"></td>


          </tr>

          <tr>
            <th><p style="font-family:Verdana;">Tipo</p></th>
            <td colspan="4"> <p style=" font-family: Verdana;">
            <select name="tipo" class='form-control' style="width: 200px">
              <option value="Persona">Persona Natural</option>
              <option value="Empresa">Empresa</option>

            </select></p>
            </td>
            
          </tr> 

          <tr>
              <th><p style="font-family: Verdana;">Nombre del representante:</p></th>
              <td  colspan="4"><input type="text" style="font-family:Verdana;"  name="nomRep" class="form-control input-md" size="90"></td>
          </tr> 
          <tr>
              <th><p style="font-family: Verdana;">Apellido del representante:</p></th>
              <td colspan="4"><input type="text" style="font-family:Verdana;"  name="apellRep" class="form-control input-md" size="90"></td>
          </tr>
          <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="tel" style="font-family:Verdana;"  class="form-control input-md" size="43"></td>

              <th><p style="font-family: Verdana;">Telefono Movil:</p></th>
              <td ><input type="text" name="telMovil" style="font-family:Verdana;"  class="form-control input-md" size="20"></td>
          </tr>

          <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="email" style="font-family:Verdana;"  class="form-control input-md" size="43"></td>
              <th><p style="font-family: Verdana;">FanPage:</p></th>
              <td><input type="text" name="fanPage" style="font-family:Verdana;"  class="form-control input-md" size="20"></td>
          </tr>
          <tr>
              <th><p style="font-family: Verdana;">Pais:</p></th>
              <td><p style=" font-family: Verdana;">
              <select name="lsPais" id="lspais11" class='form-control' onchange="validar11()" required style="width: 200px">
              <?php echo $opcionesPais ?>    
              </select></p>
              </td>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
      <td><p style=" font-family: Verdana;">
      <select id="lsdeptempresa"  style="width: 200px" onClick="depEmpresa(this)" class='form-control'>
      <?php echo $opciones; ?>
      </select></p>
      </td>
    
          </tr> 		  

           <tr>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
         <td><p style=" font-family: Verdana;">
  <select id="lsmunicempresa"  style="width: 200px" name="lsMunicEmpresa" class='form-control'>
  <option value="277">Elija un municipio</option>
  </select></p>
     </td>
            <th><p style="font-family:Verdana;">Registro IVA</p></th>
            <td ><input type="text" style="font-family: Verdana;" name="regIva" class='form-control' size="20"></td>
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

<div style="display: block; margin:0 auto" class="container" align="center" >
<table  border="1" align="center" class="table table-bordered" style="width: 45%">
        <center>
    <h3><p style="font-family: Verdana;"><b>ÁREAS Y SUB ÁREAS</b></p></h3>
    </center>
<tr style="display:block;">
<th style="width: 20%; text-align: center; font-family: Verdana">Área</th>
<th style="width: 20%; text-align: center; font-family: Verdana">Sub Área</th>
<th style="width: 2%; text-align: center; font-family: Verdana">Agregar/Quitar</th>
</tr>
<tr style="display:block;">
<td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
 <select name="lsAreas[]" id="lsAreas" required style="width:200px" class='form-control' onClick="area1(this)">
  <?php
echo $opcionesAreas;   
  ?>  
 </select></p>
</td>

 <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
 <select name="lsSub[]" id="lsSub" required style="width:200px" class='form-control' >
  <option value="0">Elija una Sub Área</option>
 </select></p>
</td>

  <td style="width: 20%; text-align: center">
<img src="mas2.png" style="cursor: pointer" width="30" height="30"  onClick="incrementar()" />
<img src="menos2.png" style="cursor: pointer" width="30" height="30" onClick="decrementar()" />

</td>
          </tr> 
             
             <!--aqui se generaran mas areas-->  

<!--AREA 2-->

<tr id="tr2" style="display:none; ">
<td align="center" width="30%"><p style="font-family: Verdana;">
             <select name="lsAreas[]" id="lsAreas2" disabled style=" width:200px" class='form-control' onClick="area2(this)">
  <?php
echo $opcionesAreas;   
  ?>  
 </select></p>
</td>

 <td align="center" width="30%"><p style="font-family: Verdana;">
<select name="lsSub[]" id="lsSub2" disabled style=" width:200px" class='form-control'>
<option value="0">Elija una Sub Área</option>
</select></p>
    </td>
<td align="center" width="20%"></td>
</tr>    

<!--AREA 3-->

<tr id="tr3"  style="display:none; ">
<td align="center" width="30%"><p style="font-family: Verdana;">
 <select name="lsAreas[]" id="lsAreas3" disabled style="width:200px" class='form-control' onClick="area3(this)">
  <?php
echo $opcionesAreas;   
  ?>  
 </select></p>
</td>

<td align="center" width="30%"><p style="font-family: Verdana;">
<select name="lsSub[]" id="lsSub3" class='form-control' disabled style="width:200px">
<option value="0">Elija una Sub Área</option>
</select></p>
    </td>
    <td align="center" width="20%"></td>
    </tr>   

    <!--AREA 4-->
       <tr id="tr4"  style="display:none; "><p style="font-family: Verdana;">
<td align="center" width="30%">
       <select name="lsAreas[]" id="lsAreas4" disabled style=" width:200px" class='form-control' onClick="area4(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></td>
       </td>
       
<td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsSub[]" id="lsSub4" class='form-control' disabled style="width:200px">
       <option value="0">Elija una Sub Área</option>
       </select></p>
       </td>
       <td align="center" width="20%"></td>
       </tr>    

                <!--AREA 5-->
       <tr id="tr5"  style="display:none; ">
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas5" class='form-control' disabled style=" width:200px" onClick="area5(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>
       
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsSub[]" id="lsSub5" class='form-control' disabled style="width:200px">
       <option value="0">Elija una Sub Área</option>
       </select></p>
       </td>
       <td align="center" width="20%"></td>
       </tr>  
        

  <!--AREA 6-->
 <tr id="tr6"  style="display:none; ">
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas6" class='form-control' disabled style=" width:200px" onClick="area6(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>
       
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsSub[]" id="lsSub6" class='form-control' disabled style="width:200px">
       <option value="0">Elija una Sub Área</option>
       </select></p>
       </td>
       <td align="center" width="20%"></td>
       </tr> 


        <!--AREA 7-->
       <tr id="tr7"  style="display:none; ">
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas7" class='form-control' disabled style=" width:200px" onClick="area7(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>
       
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsSub[]" id="lsSub7" class='form-control' disabled style="width:200px">
       <option value="0">Elija una Sub Área</option>
       </select></p>
       </td>
       <td align="center" width="20%"></td>
       </tr> 


<!--AREA 8-->
       <tr id="tr8"  style="display:none; ">
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas8" class='form-control' disabled style=" width:200px" onClick="area8(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>
       
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsSub[]" id="lsSub8" class='form-control' disabled style="width:200px">
       <option value="0">Elija una Sub Área</option>
       </select></p>
       </td>
       <td align="center" width="20%"></td>
       </tr> 


<!--AREA 9-->
       <tr id="tr9"  style="display:none; ">
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas9" class='form-control' disabled style=" width:200px" onClick="area9(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>
       
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsSub[]" id="lsSub9" class='form-control' disabled style="width:200px">
       <option value="0">Elija una Sub Área</option>
       </select></p>
       </td>
       <td align="center" width="20%"></td>
       </tr> 


       <!--AREA 10-->
       <tr id="tr10"  style="display:none; ">
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas10" class='form-control' disabled style=" width:200px" onClick="area10(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>
       
       <td align="center" width="30%"><p style="font-family: Verdana;">
       <select name="lsSub[]" id="lsSub10" class='form-control' disabled style="width:200px">
       <option value="0">Elija una Sub Área</option>
       </select></p>
       </td>
       <td align="center" width="20%"></td>
       </tr> 
        </table>

    <div id="contenedorAreas"></div>    
    </div>     
	<br>

<div class="container">
</div>


<!--CONSULTOR 1-->
<center>
<div style="display: block; margin:0 auto;" class="container" align="center" >
<table  border="1" align="center" class="table table-bordered" style="display:block; width: 70%;"><!-- Lo cambiaremos por CSS -->
<h3><center><p style="font-family: Verdana;"><b>DATOS DEL EQUIPO CONSULTOR</b></p> </center></h3>
              
              <tr>
              <th><p style="font-family: Verdana;">Agregar/Quitar:</p></th>
              <td style="text-align: center;" colspan="4"><input type="hidden"  name="cajaconsultor">
<img src="mas2.png" style="cursor: pointer" width="30" height="30"   onClick="incrementarConsultor()" />
<img src="menos2.png" style="cursor: pointer" width="30" height="30" onClick="decrementarConsultor()" /></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input required="required" type="text" class="form-control input-md" name="nombre[]" size="90" /></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input required type="text" name="apellido[]" class="form-control input-md" size="90"/></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input  type="text" name="direccionConsultor[]" class="form-control input-md" size="90" /></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input  type="text" name="nit[]" class="form-control input-md" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input  type="text" class="form-control input-md" name="dui[]" size="20" /></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input  type="text" name="telefonoConsultor[]" class="form-control input-md" size="43" /></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input  type="text" name="nac[]" class="form-control input-md" size="20" /></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text"  name="emailConsultor[]" class="form-control input-md" size="43"/></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              
              <script type="text/javascript">
/*function ver()
{
  var texto= document.getElementById("lspais1").value;
  alert(texto);
}
*/
              </script>

              <select name="lsPaisConsult[]" class='form-control'  id="lspais1" onchange="validar1()">
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              
              <!--<input type="text" name="pais" size="20">-->
              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
                <select id="depto" name="deptoConsul[]" class='form-control'   style="display:block"   onClick="depEmpresa1(this)" >
               <?php echo $opciones; ?>
               </select></p>
              <!--<input type="text" name="depto" size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
               <select  id="munic" class='form-control' style="display:block"   name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>
              </td>
              </tr>

              </table>  
              <br/> 
              </div>         
</center>

<!--CONSULTOR 2-->

<center>
<div id="consultor2" style="background-color: white; display:none; margin:0 auto;" class="container" align="center">
              <table border="1" align="center" style="display:block ;width: 70%;" class="table table-bordered"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled  class="form-control input-md" type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input type="text"  disabled name="apellido[]" class="form-control input-md" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input type="text" disabled name="direccionConsultor[]" class="form-control input-md" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" disabled  name="nit[]" class="form-control input-md" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" disabled  name="dui[]" class="form-control input-md" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" class="form-control input-md" disabled  size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]" disabled class="form-control input-md" size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="emailConsultor[]" class="form-control input-md" disabled  size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select disabled name="lsPaisConsult[]" class='form-control' id="lspais2" onchange="validar2()" >
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              <!--<input type="text" name="pais" disabled id="pais2" size="20">-->
              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
             
      <select id="depto2" disabled class='form-control' onClick="depEmpresa2(this)" >
      <?php echo $opciones; ?>
      </select></p>
      
              <!--<input type="text" name="depto" disabled id="depto2" size="43">-->

              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
              <!--<input type="text" name="munic" disabled id="munic2" size="20">
              </td>
              -->
              <select id="munic2" class='form-control' disabled name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>
              </td>
              </tr>

              </table> 
              <br>  
    </div>           
</center>

<center>

<div id="consultor3" style="display:none; margin:0 auto;" class="container" align="center">
              <table border="1" align="center" style="display:block; width: 70%;" class="table table-bordered"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled id="nombre3"  class="form-control input-md" type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input type="text" id="apellido3" class="form-control input-md" disabled name="apellido[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input type="text" class="form-control input-md" disabled name="direccionConsultor[]" id="direccion3" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nit[]" class="form-control input-md"  disabled id="nit3" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" class="form-control input-md" name="dui[]" disabled id="dui3" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" class="form-control input-md" disabled id="tel3" size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]" disabled id="nac3" class="form-control input-md" size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="emailConsultor[]" class="form-control input-md" disabled id="email3" size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select name="lsPaisConsult[]" class='form-control' disabled id="lspais3" onchange="validar3()">
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              <!--<input type="text" name="pais" disabled id="pais3" size="20">-->
              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
               <select id="depto3" class='form-control' disabled  onClick="depEmpresa3(this)" >
               <?php echo $opciones; ?>
               </select></p>
              <!--<input type="text" name="depto" disabled id="depto3" size="43">
              --></td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
              <!---<input type="text" name="munic"  disabled id="munic3" size="20">-->
              <select id="munic3" class='form-control' disabled name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>

              </td>
              </tr>

              </table>  
               <br>
              </div>           
</center>


<!--CONSULTOR 4-->
<center>
<div id="consultor4" style="display:none; margin:0 auto;" class="container" align="center">
              <table border="1" align="center" style="display:block; width: 70%;" class="table table-bordered"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled id="nombre4"  class="form-control input-md" type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input id="apellido4" disabled  type="text" class="form-control input-md" name="apellido[]"size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input type="text" id="direccion4" class="form-control input-md" disabled name="direccionConsultor[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nit[]" class="form-control input-md" disabled id="nit4" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" class="form-control input-md" name="dui[]" disabled id="dui4" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" class="form-control input-md" disabled id="tel4" size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]"  disabled id="nac4" class="form-control input-md" size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="emailConsultor[]" disabled id="email4" class="form-control input-md" size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select name="lsPaisConsult[]" class='form-control' disabled id="lspais4" onchange="validar4()">
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              <!--<input type="text" name="pais" disabled id="pais4"  size="20">-->
              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
              <select id="depto4"  class='form-control' disabled onClick="depEmpresa4(this)" >
              <?php echo $opciones; ?>
              </select></p>

              <!--<input type="text" name="depto" disabled id="depto4"  size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
               <select id="munic4" class='form-control' disabled name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>

              <!--<input type="text" name="munic" disabled id="munic4"  size="20">-->
              </td>
              </tr>

              </table>
               <br>             
</div>
</center>

<!--CONSULTOR 5-->
<center>
<div id="consultor5" style="display:none; margin:0 auto;" class="container" align="center">
              <table border="1" align="center" style="display:block; width: 70%;" class="table table-bordered"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled id="nombre5"  class="form-control input-md" type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input type="text" id="apellido5" disabled class="form-control input-md" name="apellido[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input type="text" id="direccion5" disabled class="form-control input-md" name="direccionConsultor[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" disabled id="nit5" name="nit[]" class="form-control input-md" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" disabled id="dui5" class="form-control input-md" name="dui[]" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" disabled id="tel5" class="form-control input-md" size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]"  disabled id="nac5" class="form-control input-md" size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="emailConsultor[]" disabled id="email5" class="form-control input-md" size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select name="lsPaisConsult[]" class='form-control' disabled id="lspais5" onchange="validar5()">
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              <!--<input type="text" name="pais" disabled id="pais5" size="20">-->
              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
               <select id="depto5" class='form-control' disabled onClick="depEmpresa5(this)" >
               <?php echo $opciones; ?>
               </select></p>

              <!--<input type="text" name="depto" disabled id="depto5"  size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
              <select id="munic5" class='form-control' disabled name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>

              <!--<input type="text" name="munic" disabled id="munic5" size="20">-->
              </td>
              </tr>

              </table>
               <br>
              </div>             
</center>



<!--CONSULTOR 6-->
<center>     
<div id="consultor6" style="display:none; margin:0 auto;" class="container" align="center">
              <table border="1" align="center" style="display:block; width: 70%;" class="table table-bordered"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled id="nombre6" required="required" class="form-control input-md" type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input type="text" id="apellido6" disabled name="apellido[]" class="form-control input-md" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input type="text" id="direccion6" disabled name="direccionConsultor[]" class="form-control input-md" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nit[]" disabled id="nit6" class="form-control input-md" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" disabled id="dui6" class="form-control input-md" name="dui[]" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" disabled id="tel6" class="form-control input-md" size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]" disabled id="nac6" class="form-control input-md"  size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="emailConsultor[]" class="form-control input-md"  disabled id="email6" size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select name="lsPaisConsult[]" class='form-control' disabled id="lspais6" onchange="validar6()">
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              <!--<input type="text" name="pais" disabled id="pais6" size="20">-->

              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
               <select id="depto6" class='form-control' disabled onClick="depEmpresa6(this)" >
               <?php echo $opciones; ?>
               </select></p>

            <!--  <input type="text" name="depto" disabled id="depto6" size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
               <select id="munic6" class='form-control' disabled name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>

              <!--<input type="text" name="munic" disabled id="munic6"  size="20">-->
              </td>
              </tr>

              </table> 
               <br>
              </div>            
</center>


<!--CONSULTOR 7-->
<center>  
<div id="consultor7" style="display:none; margin:0 auto;" class="container" align="center"> 
              <table border="1" align="center" style="display:block; width: 70%;" class="table table-bordered" width="45%"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled id="nombre7" class="form-control input-md" type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input type="text" disabled id="apellido7" class="form-control input-md"  name="apellido[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input type="text" disabled id="direccion7" class="form-control input-md"  name="direccionConsultor[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nit[]" disabled id="nit7" class="form-control input-md" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" name="dui[]" class="form-control input-md" disabled id="dui7" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" class="form-control input-md" disabled id="tel7" size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]" class="form-control input-md" disabled id="nac7" size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="emailConsultor[]" class="form-control input-md" disabled id="email7" size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select name="lsPaisConsult[]" class='form-control' disabled id="lspais7" onchange="validar7()">
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              <!--<input type="text" name="pais" disabled id="pais7" size="20">-->
              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
                <select id="depto7" class='form-control' disabled onClick="depEmpresa7(this)" >
               <?php echo $opciones; ?>
               </select></p>

              <!--<input type="text" name="depto" disabled id="depto7" size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
              <select id="munic7" class='form-control' disabled name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>

              <!--<input type="text" name="munic" disabled id="munic7"  size="20">-->
              </td>
              </tr>

              </table>
               <br> 
              </div>            
</center>


<!--CONSULTOR 8-->
<center>      
<div id="consultor8" style="display:none; margin:0 auto;" class="container" align="center"> 
              <table border="1" align="center" style="display:block; width: 70%;" class="table table-bordered"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled id="nombre8" class="form-control input-md" required="required" type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input type="text" class="form-control input-md" disabled id="apellido8" name="apellido[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input type="text" class="form-control input-md" disabled id="direccion8" name="direccionConsultor[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nit[]" class="form-control input-md" disabled id="nit8" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" class="form-control input-md" disabled id="dui8" name="dui[]" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" class="form-control input-md" disabled id="tel8" size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]" class="form-control input-md" disabled id="nac8" size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="emailConsultor[]" class="form-control input-md" disabled id="email8" size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select name="lsPaisConsult[]" class='form-control' disabled id="lspais8" onchange="validar8()">
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              <!--<input type="text" name="pais" disabled id="pais8" size="20">--></td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
                <select id="depto8" class='form-control' disabled onClick="depEmpresa8(this)" >
               <?php echo $opciones; ?>
               </select></p>

              <!--<input type="text" name="depto"  disabled id="depto8" size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
               <select id="munic8" class='form-control' disabled name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>
              <!--<input type="text" name="munic" disabled id="munic8" size="20">-->
              </td>
              </tr>

              </table>
               <br>  
              </div>           
</center>

<!--CONSULTOR 9-->
<center>              
<div id="consultor9" style="display:none; margin:0 auto;" class="container" align="center"> 
<table border="1" align="center" style="display:block; width: 70%" class="table table-bordered"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled id="nombre9" class="form-control input-md"  type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input disabled id="apellido9" class="form-control input-md" type="text" name="apellido[]"size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input disabled id="direccion9" class="form-control input-md" type="text" name="direccionConsultor[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nit[]" disabled id="nit9" class="form-control input-md" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text" disabled id="dui9" class="form-control input-md" name="dui[]" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" disabled id="tel9" class="form-control input-md" size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]" disabled id="nac9" class="form-control input-md" size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="emailConsultor[]" disabled id="email9" class="form-control input-md" size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select name="lsPaisConsult[]" class='form-control' disabled id="lspais9" onchange="validar9()">
              <option>Seleccione un pais</option> 
              <?php echo $opcionesPais ?>    
              </select></p>
              <!--<input type="text" name="pais" disabled id="pais9" size="20">--></td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
                <select id="depto9" class='form-control' disabled onClick="depEmpresa9(this)" >
               <?php echo $opciones; ?>
               </select></p>

              <!--<input type="text" name="depto" disabled id="depto9" size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
              <select id="munic9" class='form-control' disabled name="lsMunic[]">
              <option value="277">Elija un municipio</option>
              </select></p>
              <!--<input type="text" name="munic" disabled id="munic9" size="20">-->
              </td>
              </tr>

              </table> 
               <br> 
              </div>           
</center>

<!--CONSULTOR 10-->
<center>      
<div id="consultor10" style="display:none; margin:0 auto;" class="container" align="center" > 
       <table border="1" align="center" style="display:block; width: 70%;" class="table table-bordered"> <!-- Lo cambiaremos por CSS -->
              
              <tr>
              <th><p style="font-family: Verdana;">Nombre:</p></th>
              <td colspan="4"><input disabled id="nombre10"  class="form-control input-md" type="text" name="nombre[]" size="90"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Apellido:</p></th>
              <td  colspan="4"><input disabled id="apellido10" type="text" class="form-control input-md" name="apellido[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">Direccion:</p></th>
              <td colspan="4"><input disabled id="direccion10" type="text" class="form-control input-md" name="direccionConsultor[]" size="90"></td>
              </tr>

              <tr>
              <th><p style="font-family: Verdana;">NIT:</p></th>
              <td><input type="text" name="nit[]" disabled id="nit10" class="form-control input-md" size="43"></td>            
              <th><p style="font-family: Verdana;">DUI:</p></th>
              <td  colspan="3"><input type="text"  disabled id="dui10" class="form-control input-md" name="dui[]" size="20"></td>             
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Telefono:</p></th>
              <td><input type="text" name="telefonoConsultor[]" disabled id="tel10" class="form-control input-md" size="43"></td>             
              <th><p style="font-family: Verdana;">Nacionalidad:</p></th>
              <td ><input type="text" name="nac[]" disabled id="nac10" class="form-control input-md" size="20"></td>
              </tr>
              
              <tr>
              <th><p style="font-family: Verdana;">Email:</p></th>
              <td><input type="text" name="email" disabled id="email10" class="form-control input-md" size="43"></td>
              <th><p style="font-family: Verdana;">País:</p></th>
              <td><p style="font-family: Verdana;">
              <select name="lsPaisConsult" class='form-control' disabled id="lspais10" onchange="validar10()"><option>Seleccione un pais</option><?php echo $opcionesPais ?></select></p>
              <!--<input type="text" name="pais" disabled id="pais10" size="20">-->
              </td>
              </tr> 
              
              <tr>
              <th><p style="font-family: Verdana;">Departamento:</p></th>
              <td><p style="font-family: Verdana;">
                <select id="depto10" class='form-control' disabled  onClick="depEmpresa10(this)" >
               <?php echo $opciones; ?>
               </select></p>

              <!--<input type="text" name="depto" disabled id="depto10" size="43">-->
              </td>
              <th><p style="font-family: Verdana;">Municipio:</p></th>
              <td><p style="font-family: Verdana;">
               <select id="munic10" class='form-control' disabled  name="lsMunic">
              <option value="277">Elija un municipio</option>
              </select></p>
              <!--<input type="text" name="munic" disabled id="munic10" size="20">-->
              </td>
              </tr>

              </table> 
               <br> 
              </div>           
</center>
  
        </table>
        
<!-- Button -->
<div class="form-group, container">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4" style="margin: 0 auto" align="center">
    <button name="singlebutton" class="btn btn-primary" type="submit"><strong>Registrar Empresa</strong></button>
  </div>
</div>
	   </form>

    </body>
</html>