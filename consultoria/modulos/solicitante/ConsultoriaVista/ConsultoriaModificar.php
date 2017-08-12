<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Consultoria</title>
    <?php
     include('conexion.php');
$idconsulto = base64_decode($_REQUEST['idcons']); 
/*para los departamentos*/
   /*para los departamentos para la empresa*/
  $strConsultaE = "select * from Departamentos"; 
  $consultaE = sqlsrv_query($conexion, $strConsultaE);
  $opcionesE = '<option value="" required> Elija un Departamento</option>';
  while($filaE=sqlsrv_fetch_object($consultaE) )
  {
    $opcionesE.='<option value="'.$filaE->CodigoDepartamento.'">'.$filaE->NombreDepartamento.'</option>';
  }

/*para las areas para la empresa*/
  $strConsultaAreaI = "select * from AreaEspecializacion where AreaEspecializacion <> 'Eliminar' "; 
  $consultaAreasI = sqlsrv_query($conexion, $strConsultaAreaI);
  $opcionesAreasI = '<option value="0"> Elija un Área</option>';
  while($filaI=sqlsrv_fetch_object($consultaAreasI) )
  {
    $opcionesAreasI.='<option value="'.$filaI->CodigoArea.'">'.$filaI->AreaEspecializacion.'</option>';
  }

//$id_consultoria=1;

$querycon = "select c.Estado As EstadoC, * from consultoria c, Personal p where p.CodigoPersonal=c.CodigoPersonal and c.Codigoconsultoria= '$idconsulto'";

$params = array( array($idconsulto, SQLSRV_PARAM_IN));

$resultadocon=sqlsrv_query($conexion,$querycon,$params);
$con=sqlsrv_fetch_array($resultadocon,SQLSRV_FETCH_ASSOC);


  ?>   

 <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
 -->
<script type="text/javascript" src="funciones.js"></script> 
<script type="text/javascript" src="java.js"></script>
<script type="text/javascript" src="detalles.js"></script>
<script type="text/javascript" src="detalles_zonas.js"></script>
 
<style type="text/css">
  .selects
  {
    width: 150px;
  }

</style>

<!--Para la insercion de detalle de areas-->

<script type="text/javascript" >
function area11()
{
        $(document).ready(function(){
        $("#lsAreas11").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea11="+$("#lsAreas11").val(),
            success: function(opciones){
              $("#lsSub11").html(opciones);
            }
          })
        });
      });
}

function area22()
{
 $(document).ready(function(){
        $("#lsAreas22").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea22="+$("#lsAreas22").val(),
            success: function(opciones){
              $("#lsSub22").html(opciones);
            }
          })
        });
      });
}


function area33()
{
 $(document).ready(function(){
        $("#lsAreas33").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea33="+$("#lsAreas33").val(),
            success: function(opciones){
              $("#lsSub33").html(opciones);
            }
          })
        });
      });
}



function area44()
{
 $(document).ready(function(){
        $("#lsAreas44").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea44="+$("#lsAreas44").val(),
            success: function(opciones){
              $("#lsSub44").html(opciones);
            }
          })
        });
      });
}


function area55()
{
 $(document).ready(function(){
        $("#lsAreas55").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea55="+$("#lsAreas55").val(),
            success: function(opciones){
              $("#lsSub55").html(opciones);
            }
          })
        });
      });
}


function area66()
{
 $(document).ready(function(){
        $("#lsAreas66").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea66="+$("#lsAreas66").val(),
            success: function(opciones){
              $("#lsSub66").html(opciones);
            }
          })
        });
      });
}


function area77()
{
 $(document).ready(function(){
        $("#lsAreas77").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea77="+$("#lsAreas77").val(),
            success: function(opciones){
              $("#lsSub77").html(opciones);
            }
          })
        });
      });
}


function area88()
{
 $(document).ready(function(){
        $("#lsAreas88").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea88="+$("#lsAreas88").val(),
            success: function(opciones){
              $("#lsSub88").html(opciones);
            }
          })
        });
      });
}

function area99()
{
 $(document).ready(function(){
        $("#lsAreas99").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea99="+$("#lsAreas99").val(),
            success: function(opciones){
              $("#lsSub99").html(opciones);
            }
          })
        });
      });
}

function area101()
{
 $(document).ready(function(){
        $("#lsAreas101").change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea101="+$("#lsAreas101").val(),
            success: function(opciones){
              $("#lsSub101").html(opciones);
            }
          })
        });
      });
}
</script>



<script type="text/javascript" >


function area1(codigo)
{
        $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}

function area2(codigo)
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea2="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}


function area3(codigo)
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea3="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}



function area4(codigo)
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea4="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}


function area5(codigo)
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea5="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}


function area6()
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea6="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}


function area7(codigo)
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea7="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}


function area8(codigo)
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea8="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}

function area9(codigo)
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea9="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}

function area10(codigo)
{
 $(document).ready(function(){
        $("#lsAreas"+codigo).change(function()
        {
          $.ajax({
            url:"procesar.php",
            type: "POST",
            data:"idArea10="+$("#lsAreas"+codigo).val(),
            success: function(opciones){
              $("#lsSub"+codigo).html(opciones);
            }
          })
        });
      });
}
</script>

<script type="text/javascript">
function agregarPep1(codigo)
{

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}

function agregarPep2(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;


}

function agregarPep3(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}

function agregarPep4(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}

function agregarPep5(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}

function agregarPep6(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}

function agregarPep7(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}

function agregarPep8(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}

function agregarPep9(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}

function agregarPep10(codigo)
{
document.getElementById('pep'+codigo).disabled=false;

document.getElementById("pep"+codigo).value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect"+codigo).value+"-"+
document.getElementById("txt_Ecentro"+codigo).value+"-"+
document.getElementById("txt_Eprograma"+codigo).value+"-"+
document.getElementById("txt_Eproduc"+codigo).value+"-"+
document.getElementById("txt_Eactivi"+codigo).value+"-"+
document.getElementById("txt_Ecosto"+codigo).value+"-"+
document.getElementById("txt_EcuentaMay"+codigo).value+"-"+
document.getElementById("txt_Egrupo_art"+codigo).value+"-"+
document.getElementById("txt_Fad"+codigo).value+"-"+
document.getElementById("txt_Subvencion"+codigo).value;
}


function agregarPep11()
{

document.getElementById("pep11").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect11").value+"-"+
document.getElementById("txt_Ecentro11").value+"-"+
document.getElementById("txt_Eprograma11").value+"-"+
document.getElementById("txt_Eproduc11").value+"-"+
document.getElementById("txt_Eactivi11").value+"-"+
document.getElementById("txt_Ecosto11").value+"-"+
document.getElementById("txt_EcuentaMay11").value+"-"+
document.getElementById("txt_Egrupo_art11").value+"-"+
document.getElementById("txt_Fad11").value+"-"+
document.getElementById("txt_Subvencion11").value;
}

function agregarPep22()
{
document.getElementById('pep22').disabled=false;

document.getElementById("pep22").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect22").value+"-"+
document.getElementById("txt_Ecentro22").value+"-"+
document.getElementById("txt_Eprograma22").value+"-"+
document.getElementById("txt_Eproduc22").value+"-"+
document.getElementById("txt_Eactivi22").value+"-"+
document.getElementById("txt_Ecosto22").value+"-"+
document.getElementById("txt_EcuentaMay22").value+"-"+
document.getElementById("txt_Egrupo_art22").value+"-"+
document.getElementById("txt_Fad22").value+"-"+
document.getElementById("txt_Subvencion22").value;


}

function agregarPep33()
{
document.getElementById('pep33').disabled=false;

document.getElementById("pep33").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect33").value+"-"+
document.getElementById("txt_Ecentro33").value+"-"+
document.getElementById("txt_Eprograma33").value+"-"+
document.getElementById("txt_Eproduc33").value+"-"+
document.getElementById("txt_Eactivi33").value+"-"+
document.getElementById("txt_Ecosto33").value+"-"+
document.getElementById("txt_EcuentaMay33").value+"-"+
document.getElementById("txt_Egrupo_art33").value+"-"+
document.getElementById("txt_Fad33").value+"-"+
document.getElementById("txt_Subvencion33").value;
}

function agregarPep44()
{
document.getElementById('pep44').disabled=false;

document.getElementById("pep44").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect44").value+"-"+
document.getElementById("txt_Ecentro44").value+"-"+
document.getElementById("txt_Eprograma44").value+"-"+
document.getElementById("txt_Eproduc44").value+"-"+
document.getElementById("txt_Eactivi44").value+"-"+
document.getElementById("txt_Ecosto44").value+"-"+
document.getElementById("txt_EcuentaMay44").value+"-"+
document.getElementById("txt_Egrupo_art44").value+"-"+
document.getElementById("txt_Fad44").value+"-"+
document.getElementById("txt_Subvencion44").value;
}

function agregarPep55()
{
document.getElementById('pep55').disabled=false;

document.getElementById("pep55").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect55").value+"-"+
document.getElementById("txt_Ecentro55").value+"-"+
document.getElementById("txt_Eprograma55").value+"-"+
document.getElementById("txt_Eproduc55").value+"-"+
document.getElementById("txt_Eactivi55").value+"-"+
document.getElementById("txt_Ecosto55").value+"-"+
document.getElementById("txt_EcuentaMay55").value+"-"+
document.getElementById("txt_Egrupo_art55").value+"-"+
document.getElementById("txt_Fad55").value+"-"+
document.getElementById("txt_Subvencion55").value;
}

</script>


<script type="text/javascript">
var cont2=3;
function incrementareElemento() 
{

if(cont2==3) 
{
document.getElementById('Epep11').style.display = "block";
var nodes = document.getElementById("Epep11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont2==4)
{ 
document.getElementById('Epep22').style.display = "block";
var nodes = document.getElementById("Epep22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont2==5) 
{
document.getElementById('Epep33').style.display = "block";
var nodes = document.getElementById("Epep33").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};


if(cont2==6) 
{
  document.getElementById('Epep44').style.display = "block";

var nodes = document.getElementById("Epep44").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont2==7) 
{
document.getElementById('Epep55').style.display = "block";
var nodes = document.getElementById("Epep55").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont2==8) 
alert('Maximo permitido alcanzado:'); 


else
{
document.operacion.caja2.value= cont2++; 
}
}

function decrementarElemento()
{ 
if(cont2==3) 
{
alert('Almenos debe haber dos Elemento Pep'); 

}
else 
{ 
document.operacion.caja2.value= cont2--;

if(cont2==7) 
{
document.getElementById('Epep55').style.display = "none";
var nodes = document.getElementById("Epep55").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont2==6) 
{
document.getElementById('Epep44').style.display = "none";
var nodes = document.getElementById("Epep44").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont2==5) 
{
document.getElementById('Epep33').style.display = "none";
var nodes = document.getElementById("Epep33").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont2==4) 
{
document.getElementById('Epep22').style.display = "none";
var nodes = document.getElementById("Epep22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont2==3) 
{
document.getElementById('Epep11').style.display = "none";
var nodes = document.getElementById("Epep11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};
}

}
</script>

     <script src="funciones.js">
     </script>  


   <script language="JavaScript">
     var cont=2;
function incrementarArea() 
{

if(cont==2) 
{
document.getElementById('Varea11').style.display = "block";
var nodes = document.getElementById("Varea11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont==3)
{ 
document.getElementById('Varea22').style.display = "block";
var nodes = document.getElementById("Varea22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont==4) 
{
document.getElementById('Varea33').style.display = "block";
var nodes = document.getElementById("Varea33").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};


if(cont==5) 
{
document.getElementById('Varea44').style.display = "block";

var nodes = document.getElementById("Varea44").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==6) 
{
document.getElementById('Varea55').style.display = "block";
var nodes = document.getElementById("Varea55").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==7) 
{
document.getElementById('Varea66').style.display = "block";
var nodes = document.getElementById("Varea66").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==8) 
{
document.getElementById('Varea77').style.display = "block";
var nodes = document.getElementById("Varea77").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==9) 
{
document.getElementById('Varea88').style.display = "block";
var nodes = document.getElementById("Varea88").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==10) 
{
document.getElementById('Varea99').style.display = "block";
var nodes = document.getElementById("Varea99").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==11) 
{
document.getElementById('Varea101').style.display = "block";
var nodes = document.getElementById("Varea101").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==12) 
alert('Maximo permitido alcanzado:'); 


else
{
document.operacion.caja.value= cont++; 
}
}

function decrementarArea()
{ 
if(cont==2) 
{
alert('Almenos debe haber un Area'); 

}
else 
{ 
document.operacion.caja.value= cont--;
if(cont==11) 
{
document.getElementById('Varea101').style.display = "none";
var nodes = document.getElementById("Varea101").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

}; 
if(cont==10) 
{
document.getElementById('Varea99').style.display = "none";
var nodes = document.getElementById("Varea99").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};
if(cont==9) 
{
document.getElementById('Varea88').style.display = "none";
var nodes = document.getElementById("Varea88").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==8) 
{
document.getElementById('Varea77').style.display = "none";
var nodes = document.getElementById("Varea77").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==7) 
{
document.getElementById('Varea66').style.display = "none";
var nodes = document.getElementById("Varea66").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==6) 
{
document.getElementById('Varea55').style.display = "none";
var nodes = document.getElementById("Varea55").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==5) 
{
document.getElementById('Varea44').style.display = "none";
var nodes = document.getElementById("Varea44").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont==4) 
{
document.getElementById('Varea33').style.display = "none";
var nodes = document.getElementById("Varea33").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont==3) 
{
document.getElementById('Varea22').style.display = "none";
var nodes = document.getElementById("Varea22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont==2) 
{
document.getElementById('Varea11').style.display = "none";
var nodes = document.getElementById("Varea11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};


}

}
    </script>

<script type="text/javascript">

/*CALCULO PARA LOS DESEMBOLSOS*/
function calculo1(codigo)
{

/*logica para controlar los porcentajes*/
var suma=document.getElementById("PorcentDesembolso"+codigo).value;
var sumac=parseInt(suma);
sumac= sumac; 

document.getElementById("txtPrueba").value=sumac;

//recuperando el valor del input que acumula la suma
var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso"+codigo).value=0;

 };

if (tot <= 100)
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };


document.getElementById('CalculoDesem1').disabled=false;
var des=parseFloat(document.getElementById("Presupuesto").value);

var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso1").value)/100);

document.getElementById("CalculoDesem1").value=cal;
}


function calculo2(codigo)
{
//para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso"+codigo).value;

var sumt=parseInt(suma1)+parseInt(suma2);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso"+codigo).value=0;

 };

if (tot <= 100)
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };

 

var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso2").value)/100);

document.getElementById("CalculoDesem2").value=cal;
}


function calculo3(codigo)
{
//para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso"+codigo).value;

var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso"+codigo).value=0;

 };

if (tot <= 100 )
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };

 


var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso3").value)/100);

document.getElementById("CalculoDesem3").value=cal;
}

function calculo4(codigo)
{
//para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;
var suma4=document.getElementById("PorcentDesembolso"+codigo).value;


var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso4").value=0;

 };

if (tot <= 100 )
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };





var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso4").value)/100);

document.getElementById("CalculoDesem4").value=cal;
}

function calculo5(codigo)
{
//para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;
var suma4=document.getElementById("PorcentDesembolso4").value;
var suma5=document.getElementById("PorcentDesembolso5").value;



var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso5").value=0;

 };

if (tot <= 100 )
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };


var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso5").value)/100);

document.getElementById("CalculoDesem5").value=cal;
}


function calculo6(codigo)
{

//para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;
var suma4=document.getElementById("PorcentDesembolso4").value;
var suma5=document.getElementById("PorcentDesembolso5").value;
var suma6=document.getElementById("PorcentDesembolso6").value;




var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso6").value=0;

 };

if (tot <= 100 )
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };

var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso6").value)/100);

document.getElementById("CalculoDesem6").value=cal;
}

function calculo7(codigo)
{
  //para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;
var suma4=document.getElementById("PorcentDesembolso4").value;
var suma5=document.getElementById("PorcentDesembolso5").value;
var suma6=document.getElementById("PorcentDesembolso6").value;
var suma7=document.getElementById("PorcentDesembolso7").value;


var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso7").value=0;

 };

if (tot <= 100 )
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };

var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso7").value)/100);

document.getElementById("CalculoDesem7").value=cal;
}

function calculo8()
{
 //para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;
var suma4=document.getElementById("PorcentDesembolso4").value;
var suma5=document.getElementById("PorcentDesembolso5").value;
var suma6=document.getElementById("PorcentDesembolso6").value;
var suma7=document.getElementById("PorcentDesembolso7").value;
var suma8=document.getElementById("PorcentDesembolso8").value;


var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7)+parseInt(suma8);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso8").value=0;

 };

if (tot <= 100 )
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };



var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso8").value)/100);

document.getElementById("CalculoDesem8").value=cal;
}

function calculo9()
{
 //para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;
var suma4=document.getElementById("PorcentDesembolso4").value;
var suma5=document.getElementById("PorcentDesembolso5").value;
var suma6=document.getElementById("PorcentDesembolso6").value;
var suma7=document.getElementById("PorcentDesembolso7").value;
var suma8=document.getElementById("PorcentDesembolso8").value;
var suma9=document.getElementById("PorcentDesembolso9").value;


var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7)+parseInt(suma8)+parseInt(suma9);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso9").value=0;

 };

if (tot <= 100 )
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };


var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso9").value)/100);

document.getElementById("CalculoDesem9").value=cal;
}

function calculo10()
{

 //para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;
var suma4=document.getElementById("PorcentDesembolso4").value;
var suma5=document.getElementById("PorcentDesembolso5").value;
var suma6=document.getElementById("PorcentDesembolso6").value;
var suma7=document.getElementById("PorcentDesembolso7").value;
var suma8=document.getElementById("PorcentDesembolso8").value;
var suma9=document.getElementById("PorcentDesembolso9").value;
var suma10=document.getElementById("PorcentDesembolso10").value;


var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7)+parseInt(suma8)+parseInt(suma9)+parseInt(suma10);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso10").value=0;

 };

if (tot <= 100 )
  {
document.getElementById("btnIncrementar").disabled=false;

 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");

  };


var des=parseFloat(document.getElementById("Presupuesto").value);
var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso10").value)/100);

document.getElementById("CalculoDesem10").value=cal;
}


function calculo11()
{
/*VALIDACIONES PARA LOS PRODUCTOS, NUEVOS Y LOS DINAMICOS*/
var suma1;
var suma2;
var suma3;
var suma4;
var suma5;
var suma6;
var suma7;
var suma8;
var suma9;
var suma10;

if(document.getElementById("PorcentDesembolso1"))
  {suma1=document.getElementById("PorcentDesembolso1").value;}
else
{suma1=0;}

if(document.getElementById("PorcentDesembolso2"))
  {suma2=document.getElementById("PorcentDesembolso2").value;}
else
{suma2=0;}

if(document.getElementById("PorcentDesembolso3"))
  {suma3=document.getElementById("PorcentDesembolso3").value;}
else
{suma3=0;}

if(document.getElementById("PorcentDesembolso4"))
  {suma4=document.getElementById("PorcentDesembolso4").value;}
else
{suma4=0;}

if(document.getElementById("PorcentDesembolso5"))
  {suma5=document.getElementById("PorcentDesembolso5").value;}
else
{suma5=0;}

if(document.getElementById("PorcentDesembolso6"))
  {suma6=document.getElementById("PorcentDesembolso6").value;}
else
{suma6=0;}

if(document.getElementById("PorcentDesembolso7"))
  {suma7=document.getElementById("PorcentDesembolso7").value;}
else
{suma7=0;}

if(document.getElementById("PorcentDesembolso8"))
  {suma8=document.getElementById("PorcentDesembolso8").value;}
else
{suma8=0;}

if(document.getElementById("PorcentDesembolso9"))
  {suma9=document.getElementById("PorcentDesembolso9").value;}
else
{suma9=0;}

if(document.getElementById("PorcentDesembolso10"))
  {suma10=document.getElementById("PorcentDesembolso10").value;}
else
{suma10=0;}

var suma11=document.getElementById("PorcentDesembolso11").value;
var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7)+parseInt(suma8)+parseInt(suma9)+parseInt(suma10)+parseInt(suma11);

//var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma11);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);
//recuperando el valor del input que acumula la suma
var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso11").value=0;
 };

if (tot <= 100)
  {
document.getElementById("btnIncrementar").disabled=false;
 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");
  };


document.getElementById('CalculoDesem11').disabled=false;
var des=parseFloat(document.getElementById("Presupuesto").value);

var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso11").value)/100);

document.getElementById("CalculoDesem11").value=cal;

}



function calculo22()
{
/*VALIDACIONES PARA LOS PRODUCTOS, NUEVOS Y LOS DINAMICOS*/
var suma1;
var suma2;
var suma3;
var suma4;
var suma5;
var suma6;
var suma7;
var suma8;
var suma9;
var suma10;

var suma11=document.getElementById("PorcentDesembolso11").value;
var suma22=document.getElementById("PorcentDesembolso22").value;

if(document.getElementById("PorcentDesembolso1"))
  {suma1=document.getElementById("PorcentDesembolso1").value;}
else
{suma1=0;}

if(document.getElementById("PorcentDesembolso2"))
  {suma2=document.getElementById("PorcentDesembolso2").value;}
else
{suma2=0;}

if(document.getElementById("PorcentDesembolso3"))
  {suma3=document.getElementById("PorcentDesembolso3").value;}
else
{suma3=0;}

if(document.getElementById("PorcentDesembolso4"))
  {suma4=document.getElementById("PorcentDesembolso4").value;}
else
{suma4=0;}

if(document.getElementById("PorcentDesembolso5"))
  {suma5=document.getElementById("PorcentDesembolso5").value;}
else
{suma5=0;}

if(document.getElementById("PorcentDesembolso6"))
  {suma6=document.getElementById("PorcentDesembolso6").value;}
else
{suma6=0;}

if(document.getElementById("PorcentDesembolso7"))
  {suma7=document.getElementById("PorcentDesembolso7").value;}
else
{suma7=0;}

if(document.getElementById("PorcentDesembolso8"))
  {suma8=document.getElementById("PorcentDesembolso8").value;}
else
{suma8=0;}

if(document.getElementById("PorcentDesembolso9"))
  {suma9=document.getElementById("PorcentDesembolso9").value;}
else
{suma9=0;}

if(document.getElementById("PorcentDesembolso10"))
  {suma10=document.getElementById("PorcentDesembolso10").value;}
else
{suma10=0;}

var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7)+parseInt(suma8)+parseInt(suma9)+parseInt(suma10)+parseInt(suma11)+parseInt(suma22);

//var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma11);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);
//recuperando el valor del input que acumula la suma
var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso22").value=0;
 };

if (tot <= 100)
  {
document.getElementById("btnIncrementar").disabled=false;
 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");
  };


document.getElementById('CalculoDesem22').disabled=false;
var des=parseFloat(document.getElementById("Presupuesto").value);

var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso22").value)/100);

document.getElementById("CalculoDesem22").value=cal;

}


function calculo33()
{
/*VALIDACIONES PARA LOS PRODUCTOS, NUEVOS Y LOS DINAMICOS*/
var suma1;
var suma2;
var suma3;
var suma4;
var suma5;
var suma6;
var suma7;
var suma8;
var suma9;
var suma10;

var suma11=document.getElementById("PorcentDesembolso11").value;
var suma22=document.getElementById("PorcentDesembolso22").value;
var suma33=document.getElementById("PorcentDesembolso33").value;


if(document.getElementById("PorcentDesembolso1"))
  {suma1=document.getElementById("PorcentDesembolso1").value;}
else
{suma1=0;}

if(document.getElementById("PorcentDesembolso2"))
  {suma2=document.getElementById("PorcentDesembolso2").value;}
else
{suma2=0;}

if(document.getElementById("PorcentDesembolso3"))
  {suma3=document.getElementById("PorcentDesembolso3").value;}
else
{suma3=0;}

if(document.getElementById("PorcentDesembolso4"))
  {suma4=document.getElementById("PorcentDesembolso4").value;}
else
{suma4=0;}

if(document.getElementById("PorcentDesembolso5"))
  {suma5=document.getElementById("PorcentDesembolso5").value;}
else
{suma5=0;}

if(document.getElementById("PorcentDesembolso6"))
  {suma6=document.getElementById("PorcentDesembolso6").value;}
else
{suma6=0;}

if(document.getElementById("PorcentDesembolso7"))
  {suma7=document.getElementById("PorcentDesembolso7").value;}
else
{suma7=0;}

if(document.getElementById("PorcentDesembolso8"))
  {suma8=document.getElementById("PorcentDesembolso8").value;}
else
{suma8=0;}

if(document.getElementById("PorcentDesembolso9"))
  {suma9=document.getElementById("PorcentDesembolso9").value;}
else
{suma9=0;}

if(document.getElementById("PorcentDesembolso10"))
  {suma10=document.getElementById("PorcentDesembolso10").value;}
else
{suma10=0;}

var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7)+parseInt(suma8)+parseInt(suma9)+parseInt(suma10)+parseInt(suma11)+parseInt(suma22)+parseInt(suma33);

//var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma11);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);
//recuperando el valor del input que acumula la suma
var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso33").value=0;
 };

if (tot <= 100)
  {
document.getElementById("btnIncrementar").disabled=false;
 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");
  };


document.getElementById('CalculoDesem33').disabled=false;
var des=parseFloat(document.getElementById("Presupuesto").value);

var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso33").value)/100);

document.getElementById("CalculoDesem33").value=cal;

}




function calculo44()
{
/*VALIDACIONES PARA LOS PRODUCTOS, NUEVOS Y LOS DINAMICOS*/
var suma1;
var suma2;
var suma3;
var suma4;
var suma5;
var suma6;
var suma7;
var suma8;
var suma9;
var suma10;

var suma11=document.getElementById("PorcentDesembolso11").value;
var suma22=document.getElementById("PorcentDesembolso22").value;
var suma33=document.getElementById("PorcentDesembolso33").value;
var suma44=document.getElementById("PorcentDesembolso44").value;


if(document.getElementById("PorcentDesembolso1"))
  {suma1=document.getElementById("PorcentDesembolso1").value;}
else
{suma1=0;}

if(document.getElementById("PorcentDesembolso2"))
  {suma2=document.getElementById("PorcentDesembolso2").value;}
else
{suma2=0;}

if(document.getElementById("PorcentDesembolso3"))
  {suma3=document.getElementById("PorcentDesembolso3").value;}
else
{suma3=0;}

if(document.getElementById("PorcentDesembolso4"))
  {suma4=document.getElementById("PorcentDesembolso4").value;}
else
{suma4=0;}

if(document.getElementById("PorcentDesembolso5"))
  {suma5=document.getElementById("PorcentDesembolso5").value;}
else
{suma5=0;}

if(document.getElementById("PorcentDesembolso6"))
  {suma6=document.getElementById("PorcentDesembolso6").value;}
else
{suma6=0;}

if(document.getElementById("PorcentDesembolso7"))
  {suma7=document.getElementById("PorcentDesembolso7").value;}
else
{suma7=0;}

if(document.getElementById("PorcentDesembolso8"))
  {suma8=document.getElementById("PorcentDesembolso8").value;}
else
{suma8=0;}

if(document.getElementById("PorcentDesembolso9"))
  {suma9=document.getElementById("PorcentDesembolso9").value;}
else
{suma9=0;}

if(document.getElementById("PorcentDesembolso10"))
  {suma10=document.getElementById("PorcentDesembolso10").value;}
else
{suma10=0;}

var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7)+parseInt(suma8)+parseInt(suma9)+parseInt(suma10)+parseInt(suma11)+parseInt(suma22)+parseInt(suma33)+parseInt(suma44);

//var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma11);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);
//recuperando el valor del input que acumula la suma
var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso44").value=0;
 };

if (tot <= 100)
  {
document.getElementById("btnIncrementar").disabled=false;
 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");
  };


document.getElementById('CalculoDesem44').disabled=false;
var des=parseFloat(document.getElementById("Presupuesto").value);

var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso44").value)/100);

document.getElementById("CalculoDesem44").value=cal;

}




function calculo55()
{
/*VALIDACIONES PARA LOS PRODUCTOS, NUEVOS Y LOS DINAMICOS*/
var suma1;
var suma2;
var suma3;
var suma4;
var suma5;
var suma6;
var suma7;
var suma8;
var suma9;
var suma10;

var suma11=document.getElementById("PorcentDesembolso11").value;
var suma22=document.getElementById("PorcentDesembolso22").value;
var suma33=document.getElementById("PorcentDesembolso33").value;
var suma44=document.getElementById("PorcentDesembolso44").value;
var suma55=document.getElementById("PorcentDesembolso55").value;

if(document.getElementById("PorcentDesembolso1"))
  {suma1=document.getElementById("PorcentDesembolso1").value;}
else
{suma1=0;}

if(document.getElementById("PorcentDesembolso2"))
  {suma2=document.getElementById("PorcentDesembolso2").value;}
else
{suma2=0;}

if(document.getElementById("PorcentDesembolso3"))
  {suma3=document.getElementById("PorcentDesembolso3").value;}
else
{suma3=0;}

if(document.getElementById("PorcentDesembolso4"))
  {suma4=document.getElementById("PorcentDesembolso4").value;}
else
{suma4=0;}

if(document.getElementById("PorcentDesembolso5"))
  {suma5=document.getElementById("PorcentDesembolso5").value;}
else
{suma5=0;}

if(document.getElementById("PorcentDesembolso6"))
  {suma6=document.getElementById("PorcentDesembolso6").value;}
else
{suma6=0;}

if(document.getElementById("PorcentDesembolso7"))
  {suma7=document.getElementById("PorcentDesembolso7").value;}
else
{suma7=0;}

if(document.getElementById("PorcentDesembolso8"))
  {suma8=document.getElementById("PorcentDesembolso8").value;}
else
{suma8=0;}

if(document.getElementById("PorcentDesembolso9"))
  {suma9=document.getElementById("PorcentDesembolso9").value;}
else
{suma9=0;}

if(document.getElementById("PorcentDesembolso10"))
  {suma10=document.getElementById("PorcentDesembolso10").value;}
else
{suma10=0;}

var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4)+parseInt(suma5)+parseInt(suma6)+parseInt(suma7)+parseInt(suma8)+parseInt(suma9)+parseInt(suma10)+parseInt(suma11)+parseInt(suma22)+parseInt(suma33)+parseInt(suma44)+parseInt(suma55);

//var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma11);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);
//recuperando el valor del input que acumula la suma
var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso55").value=0;
 };

if (tot <= 100)
  {
document.getElementById("btnIncrementar").disabled=false;
 };

 if (tot ==100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("productos completados al 100%");
  };


document.getElementById('CalculoDesem55').disabled=false;
var des=parseFloat(document.getElementById("Presupuesto").value);

var cal= parseFloat(document.getElementById("Presupuesto").value)*
(parseFloat(document.getElementById("PorcentDesembolso55").value)/100);

document.getElementById("CalculoDesem55").value=cal;

}






  var cont3=2;
function incrementarProducto() 
{

if(cont3==2) 
{
document.getElementById('Prod11').style.display = "block";
var nodes = document.getElementById("Prod11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont3==3)
{ 
document.getElementById('Prod22').style.display = "block";
var nodes = document.getElementById("Prod22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont3==4)
{ 
document.getElementById('Prod33').style.display = "block";
var nodes = document.getElementById("Prod33").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont3==5)
{ 
document.getElementById('Prod44').style.display = "block";
var nodes = document.getElementById("Prod44").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont3==6)
{ 
document.getElementById('Prod55').style.display = "block";
var nodes = document.getElementById("Prod55").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont3==7) 
alert('Maximo permitido alcanzado:'); 


else
{
document.operacion.caja3.value= cont3++; 
}
}

function decrementarProducto()
{ 
if(cont3==2) 
{
alert('Almenos debe haber un Producto'); 

}
else 
{ 
document.operacion.caja3.value= cont3--;

if(cont3==6) 
{
document.getElementById('Prod55').style.display = "none";
var nodes = document.getElementById("Prod55").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};


if(cont3==5) 
{
document.getElementById('Prod44').style.display = "none";
var nodes = document.getElementById("Prod44").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont3==4) 
{
document.getElementById('Prod33').style.display = "none";
var nodes = document.getElementById("Prod33").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont3==3) 
{
document.getElementById('Prod22').style.display = "none";
var nodes = document.getElementById("Prod22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont3==2) 
{
document.getElementById('Prod11').style.display = "none";
var nodes = document.getElementById("Prod11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};


}

}
</script>

<script type="text/javascript">

function validarZona(a)
 {
  //var nac="Nacional"; 

var d=(a.value|| a.options[a.selectedIndex].value);

if(d=="Nacional")
document.getElementById('zonaTrab').style.display = "none";
if(d=="Nacional")
{
document.getElementById('zona').style.display = "block";
var nodes = document.getElementById("zona").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};



if(d=="Departamental")
document.getElementById('zonaTrab').style.display = "block";
if(d=="Departamental")
{
document.getElementById('zona').style.display = "block";
var nodes = document.getElementById("zona").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(d=="Municipal")
document.getElementById('zonaTrab').style.display = "block";
if(d=="Municipal")
{
document.getElementById('zona').style.display = "block";
var nodes = document.getElementById("zona").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};


if(d=="Comunitario")
document.getElementById('zonaTrab').style.display = "block";
if(d=="Comunitario")
{
document.getElementById('zona').style.display = "block";
var nodes = document.getElementById("zona").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};


}
</script>

<script type="text/javascript">
  var cont4=2;
function incrementarZona() 
{

if(cont4==2) 
{
document.getElementById('zona11').style.display = "block";
var nodes = document.getElementById("zona11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

}

if(cont4==3) 
{
document.getElementById('zona22').style.display = "block";
var nodes = document.getElementById("zona22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

}

if(cont4==4)
{ 
document.getElementById('zona33').style.display = "block";
var nodes = document.getElementById("zona33").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont4==5) 
{
document.getElementById('zona44').style.display = "block";
var nodes = document.getElementById("zona44").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};


if(cont4==6) 
{
  document.getElementById('zona55').style.display = "block";

var nodes = document.getElementById("zona55").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==7) 
{
document.getElementById('zona66').style.display = "block";
var nodes = document.getElementById("zona66").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==8) 
{
document.getElementById('zona77').style.display = "block";
var nodes = document.getElementById("zona77").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==9) 
{
document.getElementById('zona88').style.display = "block";
var nodes = document.getElementById("zona88").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==10) 
{
document.getElementById('zona99').style.display = "block";
var nodes = document.getElementById("zona99").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==11) 
{
document.getElementById('zona101').style.display = "block";
var nodes = document.getElementById("zona101").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==12) 
alert('Maximo permitido alcanzado'); 


else
{
document.operacion.caja4.value= cont4++; 
}
}

function decrementarZona()
{ 
if(cont4==2) 
{
alert('Almenos debe haber una Zona'); 

}
else 
{ 
document.operacion.caja4.value= cont4--;

if(cont4==11) 
{
document.getElementById('zona101').style.display = "none";
var nodes = document.getElementById("zona101").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==10) 
{
document.getElementById('zona99').style.display = "none";
var nodes = document.getElementById("zona99").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};
if(cont4==9) 
{
document.getElementById('zona88').style.display = "none";
var nodes = document.getElementById("zona88").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont4==8) 
{
document.getElementById('zona77').style.display = "none";
var nodes = document.getElementById("zona77").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont4==7) 
{
document.getElementById('zona66').style.display = "none";
var nodes = document.getElementById("zona66").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont4==6) 
{
document.getElementById('zona55').style.display = "none";
var nodes = document.getElementById("zona55").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont4==5) 
{
document.getElementById('zona44').style.display = "none";
var nodes = document.getElementById("zona44").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==4) 
{
document.getElementById('zona33').style.display = "none";
var nodes = document.getElementById("zona33").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==3) 
{
document.getElementById('zona22').style.display = "none";
var nodes = document.getElementById("zona22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==2) 
{
document.getElementById('zona11').style.display = "none";
var nodes = document.getElementById("zona11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

}

}

</script>

<script type="text/javascript">

 function depEmpresa1(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa2(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento2="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa3(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento3="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa4(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento4="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa5(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento5="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

 function depEmpresa6(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento6="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa7(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento7="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa8(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento8="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

 function depEmpresa9(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento9="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa10(codigo)
 {
 $(document).ready(function(){
        $("#lsdeptempresa"+codigo).change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento10="+$("#lsdeptempresa"+codigo).val(),
            success: function(opciones){
              $("#lsmunicempresa"+codigo).html(opciones);
            }
          })
        });
      });
 }

 </script>

 <script type="text/javascript">

  function depEmpresa11()
 {
 $(document).ready(function(){
        $("#lsdeptempresa11").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento111="+$("#lsdeptempresa11").val(),
            success: function(opciones){
              $("#lsmunicempresa11").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa22()
 {
 $(document).ready(function(){
        $("#lsdeptempresa22").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento222="+$("#lsdeptempresa22").val(),
            success: function(opciones){
              $("#lsmunicempresa22").html(opciones);
            }
          })
        });
      });
 }


  function depEmpresa33()
 {
 $(document).ready(function(){
        $("#lsdeptempresa33").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento333="+$("#lsdeptempresa33").val(),
            success: function(opciones){
              $("#lsmunicempresa33").html(opciones);
            }
          })
        });
      });
 }


   function depEmpresa44()
 {
 $(document).ready(function(){
        $("#lsdeptempresa44").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento444="+$("#lsdeptempresa44").val(),
            success: function(opciones){
              $("#lsmunicempresa44").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa55()
 {
 $(document).ready(function(){
        $("#lsdeptempresa55").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento555="+$("#lsdeptempresa55").val(),
            success: function(opciones){
              $("#lsmunicempresa55").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa66()
 {
 $(document).ready(function(){
        $("#lsdeptempresa66").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento666="+$("#lsdeptempresa66").val(),
            success: function(opciones){
              $("#lsmunicempresa66").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa77()
 {
 $(document).ready(function(){
        $("#lsdeptempresa77").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento777="+$("#lsdeptempresa77").val(),
            success: function(opciones){
              $("#lsmunicempresa77").html(opciones);
            }
          })
        });
      });
 }


  function depEmpresa88()
 {
 $(document).ready(function(){
        $("#lsdeptempresa88").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento888="+$("#lsdeptempresa88").val(),
            success: function(opciones){
              $("#lsmunicempresa88").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa99()
 {
 $(document).ready(function(){
        $("#lsdeptempresa99").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento999="+$("#lsdeptempresa99").val(),
            success: function(opciones){
              $("#lsmunicempresa99").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa101()
 {
 $(document).ready(function(){
        $("#lsdeptempresa101").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento1010="+$("#lsdeptempresa101").val(),
            success: function(opciones){
              $("#lsmunicempresa101").html(opciones);
            }
          })
        });
      });
 }

</script>


<script type="text/javascript">
  //esto es para el tipo de consultoria cuando es otros

function validar()
{

var tipo=document.getElementById("TipoConsultoria").value;

if (tipo=="otros")
 {
document.getElementById("txtOtros").style.display='block';
document.getElementById("txtOtros").disabled=false;
tipo.setAttribute("name", "txtno");
 };

 if (tipo=="Sistematización")
 {
document.getElementById("txtOtros").style.display='block';
document.getElementById("txtOtros").disabled=true;
tipo.setAttribute("name", "TipoConsultoria");
 };

 if (tipo=="Línea Base")
 {
document.getElementById("txtOtros").style.display='block';
document.getElementById("txtOtros").disabled=true;
tipo.setAttribute("name", "TipoConsultoria");

 };

 if (tipo=="Evaluación")
 {
document.getElementById("txtOtros").style.display='block';
document.getElementById("txtOtros").disabled=true;
tipo.setAttribute("name", "TipoConsultoria");

 };

 if (tipo=="Estudio CAP")
 {
document.getElementById("txtOtros").style.display='block';
document.getElementById("txtOtros").disabled=true;
tipo.setAttribute("name", "TipoConsultoria");

 };

if (tipo=="Investigación")
 {
document.getElementById("txtOtros").style.display='block';
document.getElementById("txtOtros").disabled=true;
tipo.setAttribute("name", "TipoConsultoria");

 };
 

}

</script>



    <script type="text/javascript">
      function AfechaInicio()
      {

      //obteniendo el valor del date inicial  
      var inicio=document.getElementById("txtFechaInicial").value;
      
      //recuperando el id del date del producto
      var producto1 = document.getElementById("fecha1");
      var producto2 = document.getElementById("fecha2");
      var producto3 = document.getElementById("fecha3");
      var producto4 = document.getElementById("fecha4");
      var producto5 = document.getElementById("fecha5");
      var producto6 = document.getElementById("fecha6");
      var producto7 = document.getElementById("fecha7");
      var producto8 = document.getElementById("fecha8");
      var producto9 = document.getElementById("fecha9");
      var producto10 = document.getElementById("fecha10");


      //asignando valores
      producto1.setAttribute("min", inicio);
      producto2.setAttribute("min", inicio);
      producto3.setAttribute("min", inicio);
      producto4.setAttribute("min", inicio);
      producto5.setAttribute("min", inicio);
      producto6.setAttribute("min", inicio);
      producto7.setAttribute("min", inicio);
      producto8.setAttribute("min", inicio);
      producto9.setAttribute("min", inicio);
      producto10.setAttribute("min", inicio);
      }

      function AfechaFin()
      {
      //recuperando el valor del date final
      var fin=document.getElementById("txtFechaFinal").value;
      
      //recuperando el id del date del producto
      var producto1 = document.getElementById("fecha1");
      var producto2 = document.getElementById("fecha2");
      var producto3 = document.getElementById("fecha3");
      var producto4 = document.getElementById("fecha4");
      var producto5 = document.getElementById("fecha5");
      var producto6 = document.getElementById("fecha6");
      var producto7 = document.getElementById("fecha7");
      var producto8 = document.getElementById("fecha8");
      var producto9 = document.getElementById("fecha9");
      var producto10 = document.getElementById("fecha10");

      //asignando valores
      producto1.setAttribute("max", fin);
      producto2.setAttribute("max", fin);
      producto3.setAttribute("max", fin);
      producto4.setAttribute("max", fin);
      producto5.setAttribute("max", fin);
      producto6.setAttribute("max", fin);
      producto7.setAttribute("max", fin);
      producto8.setAttribute("max", fin);
      producto9.setAttribute("max", fin);
      producto10.setAttribute("max", fin);      
      }
    </script>

<script type="text/javascript">
  function validartdr()
  {
  if(document.getElementById("chksi").checked)
    {
      document.getElementById("file_url").disabled=false;
      document.getElementById("validar").value="sitdr";
      document.getElementById("btnenviar").disabled=false;
      
    }
    
    //alert("seleccionado");
  }

   function validartdr2()
  {
    if(document.getElementById("chkno").checked)
    {
      document.getElementById("file_url").disabled=true;
            document.getElementById("validar").value="notdr";
      document.getElementById("btnenviar").disabled=false;

    }
  }
</script>

<style type="text/css">
  .tamano td
  {
    width: 9%;
  }
</style>


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

<link rel="stylesheet" href="../../../librerias/css/bootstrap.min.css" class="rel">
<link rel="stylesheet" href="../../../librerias/css/bootstrap-theme.min.css" class="href">
<link rel="stylesheet" href="../../../librerias/css/estilo.css">
<link rel="stylesheet" href="Tab-Con.css">
<link rel="stylesheet" href="centrardiv.css">

    </head>

<?php 
//VAMOS A RECUPERAR EL TOTAL DEL PORCENTAJE
  $strConsultaTotal = "select SUM(p.Desembolso) as total from Producto p, Consultoria c
where p.Codigoconsultoria=c.Codigoconsultoria
and c.Codigoconsultoria = '$idconsulto'; "; 
  $consultaTotal = sqlsrv_query($conexion, $strConsultaTotal);
  while($filaT=sqlsrv_fetch_object($consultaTotal) )
  {
    $totalSumado=$filaT->total;
  }
 ?>

    <script type="text/javascript">
      function mostrar()
      {
        if (document.getElementById('txtPrueba').value == 100) 
        {
         document.getElementById('btnIncrementar').disabled= true;
        }
 
 var d=document.getElementById('nivel').value;

if(d=="Nacional")
document.getElementById('zonaTrab').style.display = "none";
if(d=="Nacional")
{
document.getElementById('zona1').style.display = "block";
var nodes = document.getElementById("zona1").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};




if(d=="Departamental")
document.getElementById('zonaTrab').style.display = "block";
if(d=="Departamental")
{
document.getElementById('zona1').style.display = "block";
var nodes = document.getElementById("zona1").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(d=="Municipal")
document.getElementById('zonaTrab').style.display = "block";
if(d=="Municipal")
{
document.getElementById('zona1').style.display = "block";
var nodes = document.getElementById("zona1").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};


      }
    </script>
    <body onLoad="mostrar()">
<header>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="width: 110%">
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
<h1 align="center"><p style="font-family: Verdana; color:#0072bb"><strong>REQUISICIÓN DE SERVICIOS PROFESIONALES</strong></h1>

</div>

<br>

<form accept-charset="utf-8" action="modificar.php" method="post"  name="operacion" enctype="multipart/form-data"> 

<div class="container" align="center">
<table class="table table-bordered" style="width: 65%">
<h3><p style="font-family: Verdana; text-align: center;"><b>DATOS GENERALES</b></p></h3>
<thead>

<input type="hidden" name="txtidconsultoria" value="<?php echo $idconsulto; ?>">
<p align="center" style="color:red">¿Desea volver a subir el TDR?</p>
<center><input type="radio" name="chkop" id="chksi" onclick="validartdr()">&nbsp;Si&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="chkop" id="chkno" onclick="validartdr2()">&nbsp;No</center>
<input type="hidden" name="validar" id="validar">
    <th colspan="3" style='text-align:center;'><p style="font-family: Verdana;">Nombre de Consultoría</p></th>
</tr>
</thead>
<tbody>
<tr>
    <td colspan="3"><p style="font-family: Verdana;"><input type="text" placeholder="escriba" name="NombreCon" class="form-control input-md" value="<?php echo $con['NombreConsultoria']?>" style="" /></p></td>
</tr>
<tr>
    <th style='text-align:center;'><p style="font-family: Verdana;">Responsable</p></th>
    <th style='text-align:center;'><p style="font-family: Verdana;">Tipo de Consultoría</p></th>
	<th style='text-align:center;'><p style="font-family: Verdana;">Nivel de Alcance</p></th>
</tr>
<tr>
<td style="text-align: center; font-family: Verdana;">
<input type="text" style="display:block" disabled name="TipoConsultoria" class='form-control' value="<?php echo $con['Nombres']?> <?php echo $con['Apellidos']?>">

</td>
<td style="text-align: center;"><p style=" font-family: Verdana;">
  <select name="lsTipo" class='form-control' id="TipoConsultoria" onchange="validar()">
  <option value="<?php echo $con['TipoConsultoria'];?>"><?php echo $con['TipoConsultoria'];?></option>

<?php 
$opc='';
if ($con['TipoConsultoria']=='Sistematización')
{
?>
          <option value="Línea Base">Línea Base</option>
          <option value="Evaluación">Evaluación </option>
          <option value="Estudio CAP">Estudio CAP</option>
          <option value="Investigación">Investigación</option>
          <option value="otros">Otros</option>
<?php 
}

if ($con['TipoConsultoria']=='Línea Base')
{
?>
          <option value="Sistematización">Sistematización</option>
          <option value="Evaluación">Evaluación </option>
          <option value="Estudio CAP">Estudio CAP</option>
          <option value="Investigación">Investigación</option>
          <option value="otros">Otros</option>
<?php 
}

if ($con['TipoConsultoria']=='Evaluación')
{
?>
          <option value="Línea Base">Línea Base</option>
          <option value="Sistematización">Sistematización</option>
          <option value="Estudio CAP">Estudio CAP</option>
          <option value="Investigación">Investigación</option>
          <option value="otros">Otros</option>
<?php 
}


if ($con['TipoConsultoria']=='Estudio CAP')
{
?>        <option value="Línea Base">Línea Base</option>
          <option value="Evaluación">Evaluación </option>
          <option value="Sistematización">Sistematización</option>
          <option value="Investigación">Investigación</option>
          <option value="otros">Otros</option>
<?php 
}

if ($con['TipoConsultoria']=='otros')
{
?>      <option value="Línea Base">Línea Base</option>
          <option value="Evaluación">Evaluación </option>
          <option value="Estudio CAP">Estudio CAP</option>

          <option value="Sistematización">Sistematización</option>
          <option value="Investigación">Investigación</option>

<?php 
}


 ?>
         

          </select></p>

        <input type="text" style="display:block" disabled name="lsTipo" class='form-control' id="txtOtros">

</td>
<td style="text-align: center"><p style="font-family: Verdana;">
  <select name="lsAlcance" class='form-control' required id="nivel" onchange="validarZona(this)"> 
  <option value="<?php echo $con['NivelAlcance'];?>"><?php echo $con['NivelAlcance'];?></option>

  <?php 
if ($con['NivelAlcance']=='Nacional')
{
?>
<option value="Departamental"> Departamental </option> 
<option value="Municipal"> Municipal </option> 
<?php 
}
?>
  
  
    <?php 
if ($con['NivelAlcance']=='Departamental')
{
?>
<option value="Nacional"> Nacional</option> 
<option value="Municipal"> Municipal </option> 
<?php 
}
?>  

    <?php 
if ($con['NivelAlcance']=='Municipal')
{
?>
<option value="Nacional"> Nacional</option> 
<option value="Departamental"> Departamental </option> 

<?php 
}
?>           
        </select></p></td>
</tr>
<tr>
		<th style='text-align:center;'><p style="font-family: Verdana;">Fecha de Inicio</p></th>
        <th style='text-align:center;'><p style="font-family: Verdana;">Fecha de Fin</p></th>
		<th align="center" style='text-align:center;'><p style="font-family: Verdana;">TDR</p></th>
		</tr>
<tr>
<td style='text-align:center;'><p style="font-family: Verdana;"><input class='form-control' type="date" required name="FechaIni" id="txtFechaInicial" value="<?php echo DATE_FORMAT($con['FechaInicio'],'Y-m-d');?>" oninput="AfechaInicio()"></p></td>
<td style='text-align:center;'><p style="font-family: Verdana;"><input class='form-control' type="date" required name="FechaFin" id="txtFechaFinal" value="<?php echo DATE_FORMAT($con['FechaFinal'],'Y-m-d');?>" oninput="AfechaFin()"></p></td>	
<td style='text-align:center;'>
<input type="file" id="file_url" disabled accept="application/pdf" name="archivo"  value="subir"  >
</td>
</tr>
     </tbody>
    </table>
</div>


<table align="center" >
<tr>
<td>
<input name="caja" type="hidden" / >
</td>
</tr>
</table>

<center>
<div style="margin:0 auto" class="container">
<table class="table table-bordered" align="center" style="width: 35%" >
<h3><center><p style="font-family: Verdana;"><b>ÁREAS Y SUB-ÁREAS</b></p></center></h3>


<center><div style="margin:0 auto; align:center; " class="container">
  <img src="../../../librerias/images/mas2.png" style="cursor: pointer" width="30" height="30" onclick="incrementarArea()"  />
  <img src="../../../librerias/images/menos2.png" style="cursor: pointer" width="30" height="30" onclick="decrementarArea()" />
</div></center>

<br>

<tr style="display:block;">
<th style="text-align: center; width: 12%; vertical-align:middle;"><p style="font-family: Verdana;">Área</p></th>
<th style="text-align: center; width: 12%; vertical-align:middle;"><p style="font-family: Verdana;">Sub Área</p></th>
</tr>

<?php 
$queryModAreas="select  distinct (A.CodigoArea), A.AreaEspecializacion, S.CodigoSubArea, S.SubArea from Consultoria c, DetalleConsultoria D, AreaEspecializacion A, SubArea S where c.Codigoconsultoria=D.Codigoconsultoria 
and D.CodigoSubArea=S.CodigoSubArea and A.CodigoArea=S.CodigoArea and
 c.Codigoconsultoria = '$idconsulto' and A.CodigoArea <> 8";
 $resultadoModAreas=sqlsrv_query($conexion, $queryModAreas);
?>

<!--LOGICA PARA LAS AREAS RECUPERANDOLAS-->
<?php
  $strConsultaArea = "select A.CodigoArea, A.AreaEspecializacion from AreaEspecializacion A "; 
  $consultaAreas = sqlsrv_query($conexion, $strConsultaArea);
  $opcionesAreas='';
  while($fila=sqlsrv_fetch_object($consultaAreas) )
  {
    $opcionesAreas.='<option value="'.$fila->CodigoArea.'">'.$fila->AreaEspecializacion.'</option>';
  }

$contador=1;
    while($rowModA=sqlsrv_fetch_array($resultadoModAreas))
            {

$idarea=$rowModA["CodigoArea"];
$idsub=$rowModA["CodigoSubArea"];
/*para las areas para la empresa*/
            ?>

<tr id='<?php echo "Varea".$contador;?>' style="display:block;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id='<?php echo "lsAreas".$contador;?>' 
     class='form-control'  style="width:200px" onClick='<?php echo "area".$contador."(".$contador.")";?>'>
       <?php
      echo "<option  value='$idarea'>".$rowModA["AreaEspecializacion"]."</option>";
      echo $opcionesAreas;
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
<select name="lsSub[]"  id='<?php echo "lsSub".$contador;?>' class='form-control'  style="width:200px">
 <?php
      echo "<option value='".$rowModA["CodigoSubArea"]."'".">".$rowModA["SubArea"]."</option>";
  ?>     
</select></p>
       </td>
</tr>
            <?php
            $contador++;
            }
            ?>

<!--para las demas areas, que estaran en blanco-->
  <tr id="Varea11" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas11" class='form-control' required style="width:200px" onClick="area11(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub11" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>


<!--AREA2-->

  <tr id="Varea22" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas22" class='form-control' required style="width:200px" onClick="area22(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]"  disabled id="lsSub22" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>

<!--AREA3-->

  <tr id="Varea33" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas33" class='form-control' required style="width:200px" onClick="area33(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled  id="lsSub33" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>

 <tr id="Varea44" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas44" class='form-control' required style="width:200px" onClick="area44(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled  id="lsSub44" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
  </tr>

<tr id="Varea55" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas55" class='form-control' required style="width:200px" onClick="area55(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]"  disabled id="lsSub55" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>

<tr id="Varea66" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas66" class='form-control' required style="width:200px" onClick="area66(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub66" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>

<tr id="Varea77" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas77" class='form-control' required style="width:200px" onClick="area77(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub77" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>

<tr id="Varea88" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas88" class='form-control' required style="width:200px" onClick="area88(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]"  disabled id="lsSub88" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>


<tr id="Varea99" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas99" class='form-control' required style="width:200px" onClick="area99(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub99" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>

<tr id="Varea101" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas101" class='form-control' required style="width:200px" onClick="area101(this)">
       <?php
       echo $opcionesAreasI;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub101" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
  </tr>

</table>
</div>
</center>

<br>

   <!--PARA LOS ELEMENTOS PEP-->     
	<br>
	<input name="caja2" type="hidden"  >

<!--PEP 1-->
          <center>
          <div style="display: block; margin:0 auto" class="container" align="center" >

          <table class="table table-bordered" align="center" style="width: 85%">
        <h3><center>
        <p style="font-family: Verdana;"><strong>Aplicación Contable (Elementos PEP)</strong></p></center></h3>

<center><div style="margin:0 auto; align:center; " class="container">
        <img src="../../../librerias/images/mas2.png" style="cursor: pointer" width="30" height="30" onclick="incrementareElemento()"  />
<img src="../../../librerias/images/menos2.png" style="cursor: pointer" width="30" height="30" onclick="decrementarElemento()" /></div></center>

<br>

          <tr style="display: block;">
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Proyecto (SV0XXXX):</p></th>
          <th  style="width: 8%" ><p style="font-family: Verdana; text-align: center;">Centro de Beneficio:</p></th>
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Programa:</p></th>
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Producto:</p></th>
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Actividad:</p></th>
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Centro de costo:</p></th>
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Cuenta de mayor:</p></th>
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Grupo de artículo:</p></th>
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Fad:</p></th>
          <th style="width: 8%"><p style="font-family: Verdana; text-align: center;">Sub Vención:</p></th>
          </tr>

<!--pep1-->

<?php
$queryModPep=" select d.ElementoPep from Consultoria c, DetalleConsultoriaPep d where c.Codigoconsultoria=d.CodigoConsultoria 
 and c.Codigoconsultoria = '$idconsulto'";
 $resultadoModPep=sqlsrv_query($conexion, $queryModPep);

$contadorpep=1;
 while($rowModP=sqlsrv_fetch_array($resultadoModPep))
            { 
$elem=$rowModP["ElementoPep"];
$resultadoProyecto = substr($elem, 0, 7);
$resultadoCentro = substr($elem, 8, 4);
$resultadoPrograma = substr($elem, 13, 3);
$resultadoProducto = substr($elem, 17, 4);
$resultadoActividad = substr($elem, 22, 2);
$resultadoCentrocosto = substr($elem, 25, 3);
$resultadoCuentamayor = substr($elem, 29, 6);
$resultadoGrupoarticulo = substr($elem, 36, 4);
$resultadoFad = substr($elem, 41, 9);
$resultadoSubvencion = substr($elem, 51, 4);
?>

<tr style="display:block;">
<style>
  input[type=text] {
    padding:5px; 
    border:2px solid #ccc; 
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

</style>

<td style="width: 8%"><input type="text" name="txt_Eproyect[]" value="<?php echo $resultadoProyecto; ?>" maxlength="7" size="9" id='<?php echo "txt_Eproyect".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>' /></td>

<td style="width: 8%"><input type="text" name="txt_Ecentro[]" value="<?php echo $resultadoCentro; ?>" maxlength="4" size="8" id='<?php echo "txt_Ecentro".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>'/></td>

<td style="width: 8%"><input type="text" name="txt_Eprograma[]" value="<?php echo $resultadoPrograma; ?>" maxlength="3" size="8" id='<?php echo "txt_Eprograma".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>'/></td>

<td style="width: 8%"><input type="text" name="txt_Eproduc[]" value="<?php echo $resultadoProducto; ?>" maxlength="4" size="8" id='<?php echo "txt_Eproduc".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>' /></td>

<td style="width: 8%"><input type="text" name="txt_Eactivi[]" value="<?php echo $resultadoActividad; ?>" maxlength="2" size="8" id='<?php echo "txt_Eactivi".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>'/></td>

<td style="width: 8%"><input type="text" name="txt_Ecosto[]" value="<?php echo $resultadoCentrocosto ; ?>" maxlength="3" size="8" id='<?php echo "txt_Ecosto".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>'/></td>

<td style="width: 8%"><input type="text" name="txt_EcuentaMay[]" value="<?php echo $resultadoCuentamayor; ?>" maxlength="6" size="8" id='<?php echo "txt_EcuentaMay".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>'/></td>

<td style="width: 8%"><input type="text" name="txt_Egrupo_art[]" value="<?php echo $resultadoGrupoarticulo; ?>" maxlength="4" size="8" id='<?php echo "txt_Egrupo_art".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>' /></td>

<td style="width: 8%"><input type="text" name="txt_Ecosto[]" value="<?php echo $resultadoFad; ?>" maxlength="9" size="8" id='<?php echo "txt_Fad".$contadorpep; ?>' onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>'/></td>

<td style="width: 8%"><input type="text" name="txt_Subvencion[]" value="<?php echo $resultadoSubvencion;  ?>" maxlength="4" size="8" onkeyup='<?php echo "agregarPep".$contadorpep."(".$contadorpep.")"; ?>' id='<?php echo "txt_Subvencion".$contadorpep; ?>' /> 
<input type="hidden" name="Epep[]" id='<?php echo "pep".$contadorpep; ?>' size="50"  value="<?php echo $rowModP['ElementoPep']; ?>"/></td>

            <?php
            $contadorpep++;
          }
          ?>


<!--PEP ESTATICOS-->
        <tr style="display:none;" id="Epep11">
          <td  style="width: 8%">
          <input type="text" name="txt_Eproyect[]" id="txt_Eproyect11" disabled placeholder="escriba" onkeyup="agregarPep11()" required  maxlength="7" size="9">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecentro[]" id="txt_Ecentro11" disabled placeholder="escriba" onkeyup="agregarPep11()" required  maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eprograma[]" id="txt_Eprograma11" disabled placeholder="escriba" onkeyup="agregarPep11()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eproduc[]" id="txt_Eproduc11" disabled placeholder="escriba" onkeyup="agregarPep11()" required maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eactivi[]" id="txt_Eactivi11" disabled placeholder="escriba" onkeyup="agregarPep11()" required maxlength="2" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecosto[]" id="txt_Ecosto11" disabled placeholder="escriba" onkeyup="agregarPep11()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_EcuentaMay[]" id="txt_EcuentaMay11" disabled placeholder="escriba" onkeyup="agregarPep11()" required maxlength="6" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Egrupo_art[]" id="txt_Egrupo_art11" disabled placeholder="escriba" onkeyup="agregarPep11()" required maxlength="4" size="8">
         
           </td>
           <td  style="width: 8%">
           <input type="text" name="txt_Fad[]" id="txt_Fad11" disabled placeholder="escriba" onkeyup="agregarPep11()" required maxlength="9" size="8">
           </td>

           <td  style="width: 8%">
           <input type="text" name="txt_Subvencion[]" disabled id="txt_Subvencion11" placeholder="escriba"  onkeyup="agregarPep11()"  required maxlength="4" size="8">
           <input type="hidden" name="Epep[]" id="pep11" disabled size="50" />
           </td>
          </tr>    

<!--ELEMENTO 2 ESTATICO-->

           <tr style="display:none;" id="Epep22">
          <td  style="width: 8%">
          <input type="text" name="txt_Eproyect[]" disabled id="txt_Eproyect22" placeholder="escriba" onkeyup="agregarPep22()" required  maxlength="7" size="9">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecentro[]" disabled id="txt_Ecentro22" placeholder="escriba" onkeyup="agregarPep22()" required  maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eprograma[]" disabled id="txt_Eprograma22" placeholder="escriba" onkeyup="agregarPep22()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eproduc[]" disabled id="txt_Eproduc22" placeholder="escriba" onkeyup="agregarPep22()" required maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eactivi[]" disabled id="txt_Eactivi22" placeholder="escriba" onkeyup="agregarPep22()" required maxlength="2" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecosto[]" disabled id="txt_Ecosto22" placeholder="escriba" onkeyup="agregarPep22()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_EcuentaMay[]" disabled id="txt_EcuentaMay22" placeholder="escriba" onkeyup="agregarPep22()" required maxlength="6" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Egrupo_art[]" disabled id="txt_Egrupo_art22" placeholder="escriba" onkeyup="agregarPep22()" required maxlength="4" size="8">
         
           </td>
           <td  style="width: 8%">
           <input type="text" name="txt_Fad[]" id="txt_Fad22" disabled placeholder="escriba" onkeyup="agregarPep22()" required maxlength="9" size="8">
           </td>

           <td  style="width: 8%">
           <input type="text" name="txt_Subvencion[]" disabled id="txt_Subvencion22" placeholder="escriba"  onkeyup="agregarPep22()"  required maxlength="4" size="8">
           <input type="hidden" name="Epep[]" id="pep22" disabled size="50" />
           </td>
          </tr>   

          <!--ELEMENTO 3 ESTATICO-->

           <tr style="display:none;" id="Epep33">
          <td  style="width: 8%">
          <input type="text" name="txt_Eproyect[]" disabled id="txt_Eproyect33" placeholder="escriba" onkeyup="agregarPep33()" required  maxlength="7" size="9">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecentro[]" disabled id="txt_Ecentro33" placeholder="escriba" onkeyup="agregarPep33()" required  maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eprograma[]" disabled id="txt_Eprograma33" placeholder="escriba" onkeyup="agregarPep33()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eproduc[]" disabled id="txt_Eproduc33" placeholder="escriba" onkeyup="agregarPep33()" required maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eactivi[]" disabled id="txt_Eactivi33" placeholder="escriba" onkeyup="agregarPep33()" required maxlength="2" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecosto[]"  disabled id="txt_Ecosto33" placeholder="escriba" onkeyup="agregarPep33()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_EcuentaMay[]" disabled id="txt_EcuentaMay33" placeholder="escriba" onkeyup="agregarPep33()" required maxlength="6" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Egrupo_art[]" disabled id="txt_Egrupo_art33" placeholder="escriba" onkeyup="agregarPep33()" required maxlength="4" size="8">
         
           </td>
           <td  style="width: 8%">
           <input type="text" name="txt_Fad[]" disabled id="txt_Fad33" placeholder="escriba" onkeyup="agregarPep33()" required maxlength="9" size="8">
           </td>

           <td  style="width: 8%">
           <input type="text" name="txt_Subvencion[]" disabled id="txt_Subvencion33" placeholder="escriba"  onkeyup="agregarPep33()"  required maxlength="4" size="8">
           <input type="hidden" name="Epep[]" id="pep33" disabled size="50" />
           </td>
          </tr> 

          <!--ELEMENTO 2 ESTATICO-->

           <tr style="display:none;" id="Epep44">
          <td  style="width: 8%">
          <input type="text" name="txt_Eproyect[]" disabled id="txt_Eproyect44" placeholder="escriba" onkeyup="agregarPep44()" required  maxlength="7" size="9">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecentro[]" disabled id="txt_Ecentro44" placeholder="escriba" onkeyup="agregarPep44()" required  maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eprograma[]" disabled id="txt_Eprograma44" placeholder="escriba" onkeyup="agregarPep44()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eproduc[]" disabled  id="txt_Eproduc44" placeholder="escriba" onkeyup="agregarPep44()" required maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eactivi[]" disabled id="txt_Eactivi44" placeholder="escriba" onkeyup="agregarPep44()" required maxlength="2" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecosto[]" disabled id="txt_Ecosto44" placeholder="escriba" onkeyup="agregarPep44()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_EcuentaMay[]" disabled id="txt_EcuentaMay44" placeholder="escriba" onkeyup="agregarPep44()" required maxlength="6" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Egrupo_art[]" disabled id="txt_Egrupo_art44" placeholder="escriba" onkeyup="agregarPep44()" required maxlength="4" size="8">
         
           </td>
           <td  style="width: 8%">
           <input type="text" name="txt_Fad[]" disabled id="txt_Fad44" placeholder="escriba" onkeyup="agregarPep44()" required maxlength="9" size="8">
           </td>

           <td  style="width: 8%">
           <input type="text" name="txt_Subvencion[]" disabled id="txt_Subvencion44" placeholder="escriba"  onkeyup="agregarPep44()"  required maxlength="4" size="8">
           <input type="hidden" name="Epep[]" id="pep44" disabled size="50" />
           </td>
          </tr>        

<!--ELEMENTO 5 ESTATICO-->

           <tr style="display:none;" id="Epep55">
          <td  style="width: 8%">
          <input type="text" name="txt_Eproyect[]" disabled id="txt_Eproyect55" placeholder="escriba" onkeyup="agregarPep55()" required  maxlength="7" size="9">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecentro[]" disabled id="txt_Ecentro55" placeholder="escriba" onkeyup="agregarPep55()" required  maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eprograma[]" disabled id="txt_Eprograma55" placeholder="escriba" onkeyup="agregarPep55()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eproduc[]" disabled id="txt_Eproduc55" placeholder="escriba" onkeyup="agregarPep55()" required maxlength="4" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Eactivi[]" disabled id="txt_Eactivi55" placeholder="escriba" onkeyup="agregarPep55()" required maxlength="2" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Ecosto[]" disabled id="txt_Ecosto55" placeholder="escriba" onkeyup="agregarPep55()" required maxlength="3" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_EcuentaMay[]" disabled id="txt_EcuentaMay55" placeholder="escriba" onkeyup="agregarPep55()" required maxlength="6" size="8">
          </td>
          <td  style="width: 8%">
          <input type="text" name="txt_Egrupo_art[]" disabled id="txt_Egrupo_art55" placeholder="escriba" onkeyup="agregarPep55()" required maxlength="4" size="8">
         
           </td>
           <td  style="width: 8%">
           <input type="text" name="txt_Fad[]" disabled id="txt_Fad55" placeholder="escriba" onkeyup="agregarPep55()" required maxlength="9" size="8">
           </td>

           <td  style="width: 8%">
           <input type="text" name="txt_Subvencion[]" disabled id="txt_Subvencion55" placeholder="escriba"  onkeyup="agregarPep55()"  required maxlength="4" size="8">
           <input type="hidden" name="Epep[]" id="pep55" disabled size="50" />
           </td>
                     </tr>    

<!--PEP2-->

</table>
</div>
</center>

<br>

<!--LOGICA PARA LOS PRODUCTOS-->

<script type="text/javascript">
  
  function presu()
  {
var suma=document.getElementById("").value;
  }

</script>

  <input type="hidden" id="txtPrueba"  value="<?php echo $totalSumado; ?>">

	<input name="caja3" type="hidden"  >
		<br>

<center>
<div style="display: block; margin:0 auto" class="container" align="center" >
<table class="table table-bordered" style="width: 65%">
      <h3><center><p style="font-family: Verdana;"><strong>OBJETO DEL CONTRATO</strong></p></center></h3>
              <tr style="display: block;">
              <th colspan="2" style='text-align:center; width: 45%'><p style="font-family: Verdana;">Presupuesto:</p></th>
              <th colspan="2" style='text-align:center; width: 45%'><p style="font-family: Verdana;">Forma de Pago:</p></th>
              <th style="text-align: center; width: 10%"><p style="font-family: Verdana;">Agregar/Quitar</p></th>
              </tr>

  <tr style="display: block;">
          <td colspan="2" style="text-align:center; width: 25%" ><input value="<?php echo $con['Presupuesto']?>" maxlength="255" name="Presupuesto" id="Presupuesto" placeholder="Escriba" class="form-control input-md" type="text" size="50" /><p style="font-family: Verdana;"></p></td>
          <td colspan="2" style="text-align:center; width: 25%"><input value="<?php echo $con['FormaPa']?>" maxlength="255" name="FormaPago" id="FormaPago" placeholder="Escriba" class="form-control input-md" type="text" size="50" /><p style="font-family: Verdana;"></p></td>
          <td style="text-align: center; width: 9%">
          <input type="button" style='background-color: #228B22; color: white; width:60px; font-family: Verdana; font-weight: bold;' value="Mas" onClick="incrementarProducto()" id="btnIncrementar" />
<input type="button" style="background-color: #CF3D0D; color: white; width: 60px;  font-family: Verdana; font-weight: bold;" value="Menos" onClick="decrementarProducto()" id="btnDecrementar" /></td>
          </tr>

          </table>

              <!--LOGICA PARA LOS PRODUCTOS-->
<table style="width: 100%" border="1" class="table-bordered" >
<tr style="display:block;">
  <th  style='text-align:center; width: 3%; font-family: Verdana;'>N°</th>
  
  <th  style='text-align:center; width: 9%; font-family: Verdana;'>
  <input type="text"   placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana; visibility: hidden">
  Producto
  </th>

   <th style='text-align:center; width: 9%; font-family: Verdana;'>
<input type="number"  class="form-control input-md" size="25" style="font-family: Verdana; visibility: hidden">
% Desembolsos
</th>

   </th>
   <th style='text-align:center; width: 9%; font-family: Verdana;'>
<input type="text"  class="form-control input-md" size="25" style="font-family: Verdana; visibility: hidden">
Desembolsos

   </th>
    <th  style='text-align:center; width: 9%'>
<input type="date"  class="form-control input-md" size="25" style="font-family: Verdana; visibility: hidden">
Recibí Conforme
    </th>

     <th  style='text-align:center; width: 9%; font-family: Verdana;'>
     <input type="date"  class="form-control input-md" size="25" style="font-family: Verdana; visibility: hidden">
     Pagado
     </th>
     
     <th style='text-align:center; width: 9%; font-family: Verdana;'>
<input type="text"  class="form-control input-md" size="25" style="font-family: Verdana; visibility: hidden">
Monto Pagado
     </th>
       <th  style='text-align:center; width: 9%; font-family: Verdana;'>
<input type="date"  class="form-control input-md" size="25" style="font-family: Verdana; visibility: hidden">
Fecha planificada
       </th>
       <th  style='text-align:center; width: 15%; font-family: Verdana;'>
<input type="text"  class="form-control input-md" size="25" style="visibility: hidden">
Comentarios
       </th>
</tr>
<?php

//LOGICA PARA LOS PRODUCTOS

$queryModproducto="select * from Producto p, Consultoria c
where c.Codigoconsultoria=p.Codigoconsultoria
and c.Codigoconsultoria = '$idconsulto'; ";
 $resultadoModProd=sqlsrv_query($conexion, $queryModproducto);
$contadorproductos=1;
 while($rowModProd=sqlsrv_fetch_array($resultadoModProd))
            {
  $recibi = $rowModProd['RecibiConforme'];
  $ini=DATE_FORMAT($rowModProd['FechaInicio'],'Y-m-d');
  $pago = $rowModProd['pagado'];


            ?> 

<tr id="Prod1" style="display:block">
<td style='text-align:center; width: 3%'><?php  echo $contadorproductos; ?></td>           
<td style='text-align:center; width: 9%'>
<input type="text" required name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md" size="25" value="<?php echo $rowModProd["Producto"]; ?>">
</td>

<td style='text-align:center; width: 9%'><input type="number"  name="txtDesembolso[]" id='<?php echo "PorcentDesembolso".$contadorproductos; ?>' placeholder="Escriba" class="form-control input-md" size="25" value="<?php echo $rowModProd["Desembolso"]; ?>" min="1" max="100" onkeyup='<?php echo "calculo".$contadorproductos."(".$contadorproductos.")"; ?>'></td>

<td style='text-align:center; width: 9%'><input type="text" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" readonly="readonly" id='<?php echo "CalculoDesem".$contadorproductos; ?>'  size="25"></td>

<!--VALIDACION PARA RECIBI CONFORME Y PARA PAGADO-->
<?php 
$estado='';
$fecha = new DateTime('1900-01-01');
if ($recibi==$fecha)
{
$estado="Producto no Entregado";
}

elseif ($recibi!=$fecha) 
{
 $estado="Producto Entregado";
}
?>

<?php 
if ($estado=="Producto Entregado")
{

echo '<td style="text-align:center; width: 9%"><input id="conforme" name="txtRecibi[]" style="font-family: Verdana;"   min=';?><?php echo $ini." ".' value=';?><?php echo DATE_FORMAT($recibi,'Y-m-d')." ".'class="form-control input-md"  type="date" size="25"></td>';
echo '<td style="text-align:center; width: 9%"><input id="conforme" name="txtpagado[]" style="font-family: Verdana;" min=';?><?php echo $ini." ".' value=';?><?php echo DATE_FORMAT($pago,'Y-m-d')." ".'class="form-control input-md"  type="date" size="25"></td>';
  }

if ($estado=="Producto no Entregado")
 {


  echo '<td style="text-align:center; width: 9%"><input type="date"  name="txtRecibi[]"  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
        <td style="text-align:center; width: 9%"><input type="date"  name="txtpagado[]"  class="form-control input-md" size="25" style="font-family: Verdana;"></td>';

 }
 ?>



<?php 
//echo $estado;
?>
<td style='text-align:center; width: 9%'><input type="text"  name="txtMontoP[]" placeholder="Escriba" class="form-control input-md" size="25" value="<?php echo $rowModProd["MontoPagado"]; ?>" style="font-family: Verdana;"></td>

<td style='text-align:center; width: 9%'><input type="date"  name="txtFechaPlanificada[]" placeholder="Escriba" class="form-control input-md" size="25" value="<?php echo DATE_FORMAT($rowModProd["fechaPlanificada"], 'Y-m-d') ?>" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 15%'><input type="text"  name="txtComentarios[]" placeholder="Escriba" class="form-control input-md" size="25" value="<?php echo $rowModProd["comentarios"]; ?>" style="font-family: Verdana;"></td>
</tr>

          <?php
          $contadorproductos++;
          }

?>


<tr id="Prod11" style="display:none">
<td style='text-align:center; width: 3%'></td>           
<td style='text-align:center; width: 9%'>
<input type="text" required  disabled name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;">
</td>

<td style='text-align:center; width: 9%'><input type="number" required  name="txtDesembolso[]" disabled placeholder="Escriba" class="form-control input-md" size="25" min="1" max="100" onkeyup="calculo11()" id="PorcentDesembolso11" style="font-family: Verdana;"></td>

<td style='text-align:center; width: 9%'><input type="text" name="Cdesembolso[]" placeholder="Escriba" disabled class="form-control input-md" readonly="readonly"  size="25" id="CalculoDesem11" style="font-family: Verdana;"></td>


<td style='text-align:center; width: 9%'><input type="date"   name="txtRecibi[]" placeholder="Escriba" disabled class="form-control input-md" size="25" style="font-family: Verdana;"/></td>


<td style='text-align:center; width: 9%'><input type="date"   name="txtpagado[]" placeholder="Escriba" disabled class="form-control input-md" size="25" style="font-family: Verdana;"></td>


<td style='text-align:center; width: 9%'><input type="text"   name="txtMontoP[]" placeholder="Escriba" disabled class="form-control input-md" size="25" style="font-family: Verdana;"></td>

<td style='text-align:center; width: 9%'><input type="date"   name="txtFechaPlanificada[]" disabled placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 15%'><input type="text"   name="txtComentarios[]" disabled placeholder="Escriba"  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
</tr>




<tr id="Prod22" style="display:none">
<td style='text-align:center; width: 3%'></td>           
<td style='text-align:center; width: 9%'>
<input type="text" required disabled  name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;">
</td>

<td style='text-align:center; width: 9%'><input type="number" required  name="txtDesembolso[]" disabled placeholder="Escriba" class="form-control input-md" size="25" min="1" max="100" onkeyup="calculo22()" id="PorcentDesembolso22" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="text" name="Cdesembolso[]" placeholder="Escriba" disabled class="form-control input-md" readonly="readonly"  size="25" id="CalculoDesem22" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtRecibi[]" placeholder="Escriba"  disabled class="form-control input-md" size="25" style="font-family: Verdana;"/></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtpagado[]" placeholder="Escriba" disabled class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="text"   name="txtMontoP[]" placeholder="Escriba" disabled  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtFechaPlanificada[]" disabled placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 15%'><input type="text"   name="txtComentarios[]" disabled placeholder="Escriba"  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
</tr>


<!--PRODUCTO 33-->
<tr id="Prod33" style="display:none">
<td style='text-align:center; width: 3%'></td>           
<td style='text-align:center; width: 9%'>
<input type="text" required disabled  name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;">
</td>

<td style='text-align:center; width: 9%'><input type="number" required  name="txtDesembolso[]" disabled placeholder="Escriba" class="form-control input-md" size="25" min="1" max="100" onkeyup="calculo33()" id="PorcentDesembolso33" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="text" name="Cdesembolso[]" placeholder="Escriba" disabled class="form-control input-md" readonly="readonly"  size="25" id="CalculoDesem33" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtRecibi[]" placeholder="Escriba"  disabled class="form-control input-md" size="25" style="font-family: Verdana;"/></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtpagado[]" placeholder="Escriba" disabled class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="text"   name="txtMontoP[]" placeholder="Escriba" disabled  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtFechaPlanificada[]" disabled placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 15%'><input type="text"   name="txtComentarios[]" disabled placeholder="Escriba"  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
</tr>


<!--PRODUCTO 44-->
<tr id="Prod44" style="display:none">
<td style='text-align:center; width: 3%'></td>           
<td style='text-align:center; width: 9%'>
<input type="text" required disabled  name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;">
</td>

<td style='text-align:center; width: 9%'><input type="number" required  name="txtDesembolso[]" disabled placeholder="Escriba" class="form-control input-md" size="25" min="1" max="100" onkeyup="calculo44()" id="PorcentDesembolso44" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="text" name="Cdesembolso[]" placeholder="Escriba" disabled class="form-control input-md" readonly="readonly"  size="25" id="CalculoDesem44" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtRecibi[]" placeholder="Escriba"  disabled class="form-control input-md" size="25" style="font-family: Verdana;"/></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtpagado[]" placeholder="Escriba" disabled class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="text"   name="txtMontoP[]" placeholder="Escriba" disabled  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtFechaPlanificada[]" disabled placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 15%'><input type="text"   name="txtComentarios[]" disabled placeholder="Escriba"  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
</tr>


<!--PRODUCTO 55-->
<tr id="Prod55" style="display:none">
<td style='text-align:center; width: 3%'></td>           
<td style='text-align:center; width: 9%'>
<input type="text" required disabled  name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;">
</td>

<td style='text-align:center; width: 9%'><input type="number" required  name="txtDesembolso[]" disabled placeholder="Escriba" class="form-control input-md" size="25" min="1" max="100" onkeyup="calculo55()" id="PorcentDesembolso55" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="text" name="Cdesembolso[]" placeholder="Escriba" disabled class="form-control input-md" readonly="readonly"  size="25" id="CalculoDesem55" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtRecibi[]" placeholder="Escriba"  disabled class="form-control input-md" size="25" style="font-family: Verdana;"/></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtpagado[]" placeholder="Escriba" disabled class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="text"   name="txtMontoP[]" placeholder="Escriba" disabled  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 9%'><input type="date"   name="txtFechaPlanificada[]" disabled placeholder="Escriba" class="form-control input-md" size="25" style="font-family: Verdana;"></td>
<td style='text-align:center; width: 15%'><input type="text"   name="txtComentarios[]" disabled placeholder="Escriba"  class="form-control input-md" size="25" style="font-family: Verdana;"></td>
</tr>

</table>

                   <input name="caja4" type="hidden"  >
  

<!--PARA LAS ZONAS-->
  <center>
  <div id="zonaTrab" style="display: block; margin:0 auto" class="container" align="center" >
                  <table class="table table-bordered" style="width: 35%"> <!-- Lo cambiaremos por CSS -->
              <h3><center>
        <p style="font-family: Verdana;"><strong>DETALLE DEL LUGAR DE TRABAJO</strong></p></center></h3>

        <center><div style="margin:0 auto; align:center; " class="container">
              <img src="../../../librerias/images/mas2.png" style="cursor: pointer" width="30" height="30"  onClick="incrementarZona()" />
              <img src="../../../librerias/images/menos2.png" style="cursor: pointer" width="30" height="30" onClick="decrementarZona()" />
</div></center>

<br>

              <tr style="display:block">
              <th style="text-align: center; width: 15%"><p style="font-family: Verdana;">Departamento</p></th>
              <th style="text-align: center; width: 18%"><p style="font-family: Verdana;">Municipio</p></th>

              <?php 
$queryModZonas="select  distinct (D.CodigoDepartamento), D.NombreDepartamento, M.CodigoMunicipio, M.NombreMunicipio from Consultoria c, ZonaTrabajo Z, Departamentos D, 
 Municipios M  where c.Codigoconsultoria=Z.Codigoconsultoria 
and Z.CodigoMunicipio=M.CodigoMunicipio and D.CodigoDepartamento=M.CodigoDepartamento and
 c.Codigoconsultoria = '$idconsulto' and Z.CodigoMunicipio <> 30";
 $resultadoModZonas=sqlsrv_query($conexion, $queryModZonas);
?>

      <!--LOGICA PARA LAS ZONAS RECUPERANDOLAS-->
<?php
  $strConsulta= " select D.CodigoDepartamento, D.NombreDepartamento from Departamentos D "; 
  $consulta = sqlsrv_query($conexion, $strConsulta);
  $opciones='';
  while($fila=sqlsrv_fetch_object($consulta) )
  {
    $opciones.='<option value="'.$fila->CodigoDepartamento.'">'.$fila->NombreDepartamento.'</option>';
  }

$contador=1;
    while($rowModZ=sqlsrv_fetch_array($resultadoModZonas))
            {

$idDepto=$rowModZ["CodigoDepartamento"];
$idMunic=$rowModZ["CodigoMunicipio"];
/*para las areas para la empresa*/
            ?>

      <tr id='<?php echo "zona".$contador;?>' style="display:block;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsdeptempresa[]" id='<?php echo "lsdeptempresa".$contador;?>' 
     class='form-control'  style="width:250px" onClick='<?php echo "depEmpresa".$contador."(".$contador.")";?>'>
       <?php
      echo "<option  value='$idDepto'>".$rowModZ["NombreDepartamento"]."</option>";
      echo $opciones;
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
<select name="lsmunicempresa[]"  id='<?php echo "lsmunicempresa".$contador;?>' class='form-control'  style="width:250px">
 <?php
      echo "<option value='".$rowModZ["CodigoMunicipio"]."'".">".$rowModZ["NombreMunicipio"]."</option>";
  ?>     
</select></p>
       </td>
</tr>
            <?php
            $contador++;
            }
            ?>

            <!--ZONA1-->

                <tr id="zona11" style="display:none">
                <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
                <select id="lsdeptempresa11" disabled required class="form-control" onClick="depEmpresa11(this)">
                <?php echo $opcionesE; ?>
                </select></p>
                </td>
                
                <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
                <select class="selects, form-control"  id="lsmunicempresa11" required disabled name="lsmunicempresa[]">
                <option value="">Elija un municipio</option>
                </select></p>
                </td>          
                </tr>

 
          <!--ZONA2-->

                <tr id="zona22" style="display:none">
                <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
                <select id="lsdeptempresa22" disabled required class="form-control" onClick="depEmpresa22(this)">
                <?php echo $opcionesE; ?>
                </select></p>
                </td>
                
                <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
                <select class="selects, form-control"  id="lsmunicempresa22" required disabled name="lsmunicempresa[]">
                <option value="">Elija un municipio</option>
                </select></p>
                </td>          
                </tr>

<!---ZONA 3-->

      <tr id="zona33" style="display:none" >
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa33" class="form-control" disabled required onClick="depEmpresa33(this)" >
      <?php echo $opcionesE; ?>
      </select></p>
      </td>
      
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa33" class="selects, form-control" disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      </tr>   
        
        <!---ZONA4-->

      <tr id="zona44" style="display:none">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa44" class="form-control" disabled required onClick="depEmpresa44(this)" >
      <?php echo $opcionesE; ?>
      </select></p>
      </td>
      
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa44" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      </tr>
     
        <!---ZONA 5-->

      <tr id="zona55" style="display:none">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa55" disabled class="form-control" required onClick="depEmpresa55(this)" >
      <?php echo $opcionesE; ?>
      </select></p>
      </td>
      
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa55" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      </tr>
     
        <!---ZONA6-->

      <tr id="zona66" style="display:none">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa66" disabled class="form-control" required onClick="depEmpresa66(this)" >
      <?php echo $opcionesE; ?>
      </select></p>
      </td>
      
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa66" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      </tr>

        <!---ZONA 7-->

      <tr id="zona77" style="display:none">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa77" disabled class="form-control" required onClick="depEmpresa77(this)" >
      <?php echo $opcionesE; ?>
      </select></p>
      </td>
      
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa77" class="selects, form-control" disabled required name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      </tr>

        <!---ZONA 8-->

      <tr id="zona88" style="display:none">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa88" disabled required class="form-control"  onClick="depEmpresa88(this)" >
      <?php echo $opcionesE; ?>
      </select></p>
      </td>
      
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa88" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      </tr>

        <!---ZONA 9-->

      <tr id="zona99" style="display:none">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa99" disabled class="form-control" required onClick="depEmpresa99(this)" >
      <?php echo $opcionesE; ?>
      </select></p>
      </td>
      
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa99" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      </tr>

        <!---ZONA 10-->

      <tr id="zona101" style="display:none">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa101" disabled class="form-control" required onClick="depEmpresa101(this)" >
      <?php echo $opcionesE; ?>
      </select></p>
      </td>
      
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa101" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      </tr>
      </table>
</div>
</center>

<br>
<input type="hidden" name="Estado"  value="<?php echo $con['EstadoC'];?>">

<div class="form-group, container">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4" style="margin: 0 auto" align="center">
    <button disabled class="btn btn-primary" type="submit" id="btnenviar"><strong>Actualizar Consultoría</strong></button>
  </div>
</div>


        </form>
	
   </body>
 </html>

