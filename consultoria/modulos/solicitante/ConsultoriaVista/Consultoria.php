  <?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Consultoria</title>
    <?php
     include('conexion.php');
     $id=$_SESSION['id_usuario'];
     $consulta="select * from Personal where CodigoPersonal = '$id' ";
     $resultado=sqlsrv_query($conexion,$consulta);

/*para los departamentos*/
   /*para los departamentos para la empresa*/
  $strConsulta = "select * from Departamentos"; 
  $consulta = sqlsrv_query($conexion, $strConsulta);
  $opciones = '<option value="" required> Elija un Departamento</option>';
  while($fila=sqlsrv_fetch_object($consulta) )
  {
    $opciones.='<option value="'.$fila->CodigoDepartamento.'">'.$fila->NombreDepartamento.'</option>';
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

<script type="text/javascript">
function agregarPep1()
{

document.getElementById("pep1").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect").value+"-"+
document.getElementById("txt_Ecentro").value+"-"+
document.getElementById("txt_Eprograma").value+"-"+
document.getElementById("txt_Eproduc").value+"-"+
document.getElementById("txt_Eactivi").value+"-"+
document.getElementById("txt_Ecosto").value+"-"+
document.getElementById("txt_EcuentaMay").value+"-"+
document.getElementById("txt_Egrupo_art").value+"-"+
document.getElementById("txt_Fad").value+"-"+
document.getElementById("txt_Subvencion").value;
}

function agregarPep2()
{
document.getElementById('pep2').disabled=false;

document.getElementById("pep2").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect2").value+"-"+
document.getElementById("txt_Ecentro2").value+"-"+
document.getElementById("txt_Eprograma2").value+"-"+
document.getElementById("txt_Eproduc2").value+"-"+
document.getElementById("txt_Eactivi2").value+"-"+
document.getElementById("txt_Ecosto2").value+"-"+
document.getElementById("txt_EcuentaMay2").value+"-"+
document.getElementById("txt_Egrupo_art2").value+"-"+
document.getElementById("txt_Fad2").value+"-"+
document.getElementById("txt_Subvencion2").value;


}

function agregarPep3()
{
document.getElementById('pep3').disabled=false;

document.getElementById("pep3").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect3").value+"-"+
document.getElementById("txt_Ecentro3").value+"-"+
document.getElementById("txt_Eprograma3").value+"-"+
document.getElementById("txt_Eproduc3").value+"-"+
document.getElementById("txt_Eactivi3").value+"-"+
document.getElementById("txt_Ecosto3").value+"-"+
document.getElementById("txt_EcuentaMay3").value+"-"+
document.getElementById("txt_Egrupo_art3").value+"-"+
document.getElementById("txt_Fad3").value+"-"+
document.getElementById("txt_Subvencion3").value;
}

function agregarPep4()
{
document.getElementById('pep4').disabled=false;

document.getElementById("pep4").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect4").value+"-"+
document.getElementById("txt_Ecentro4").value+"-"+
document.getElementById("txt_Eprograma4").value+"-"+
document.getElementById("txt_Eproduc4").value+"-"+
document.getElementById("txt_Eactivi4").value+"-"+
document.getElementById("txt_Ecosto4").value+"-"+
document.getElementById("txt_EcuentaMay4").value+"-"+
document.getElementById("txt_Egrupo_art4").value+"-"+
document.getElementById("txt_Fad4").value+"-"+
document.getElementById("txt_Subvencion4").value;
}

function agregarPep5()
{
document.getElementById('pep5').disabled=false;

document.getElementById("pep5").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect5").value+"-"+
document.getElementById("txt_Ecentro5").value+"-"+
document.getElementById("txt_Eprograma5").value+"-"+
document.getElementById("txt_Eproduc5").value+"-"+
document.getElementById("txt_Eactivi5").value+"-"+
document.getElementById("txt_Ecosto5").value+"-"+
document.getElementById("txt_EcuentaMay5").value+"-"+
document.getElementById("txt_Egrupo_art5").value+"-"+
document.getElementById("txt_Fad5").value+"-"+
document.getElementById("txt_Subvencion5").value;
}

function agregarPep6()
{
document.getElementById('pep6').disabled=false;

document.getElementById("pep6").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect6").value+"-"+
document.getElementById("txt_Ecentro6").value+"-"+
document.getElementById("txt_Eprograma6").value+"-"+
document.getElementById("txt_Eproduc6").value+"-"+
document.getElementById("txt_Eactivi6").value+"-"+
document.getElementById("txt_Ecosto6").value+"-"+
document.getElementById("txt_EcuentaMay6").value+"-"+
document.getElementById("txt_Egrupo_art6").value+"-"+
document.getElementById("txt_Fad6").value+"-"+
document.getElementById("txt_Subvencion6").value;
}

function agregarPep7()
{
document.getElementById('pep7').disabled=false;

document.getElementById("pep7").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect7").value+"-"+
document.getElementById("txt_Ecentro7").value+"-"+
document.getElementById("txt_Eprograma7").value+"-"+
document.getElementById("txt_Eproduc7").value+"-"+
document.getElementById("txt_Eactivi7").value+"-"+
document.getElementById("txt_Ecosto7").value+"-"+
document.getElementById("txt_EcuentaMay7").value+"-"+
document.getElementById("txt_Egrupo_art7").value+"-"+
document.getElementById("txt_Fad7").value+"-"+
document.getElementById("txt_Subvencion7").value;
}

function agregarPep8()
{
document.getElementById('pep8').disabled=false;

document.getElementById("pep8").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect8").value+"-"+
document.getElementById("txt_Ecentro8").value+"-"+
document.getElementById("txt_Eprograma8").value+"-"+
document.getElementById("txt_Eproduc8").value+"-"+
document.getElementById("txt_Eactivi8").value+"-"+
document.getElementById("txt_Ecosto8").value+"-"+
document.getElementById("txt_EcuentaMay8").value+"-"+
document.getElementById("txt_Egrupo_art8").value+"-"+
document.getElementById("txt_Fad8").value+"-"+
document.getElementById("txt_Subvencion8").value;
}

function agregarPep9()
{
document.getElementById('pep9').disabled=false;

document.getElementById("pep9").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect9").value+"-"+
document.getElementById("txt_Ecentro9").value+"-"+
document.getElementById("txt_Eprograma9").value+"-"+
document.getElementById("txt_Eproduc9").value+"-"+
document.getElementById("txt_Eactivi9").value+"-"+
document.getElementById("txt_Ecosto9").value+"-"+
document.getElementById("txt_EcuentaMay9").value+"-"+
document.getElementById("txt_Egrupo_art9").value+"-"+
document.getElementById("txt_Fad9").value+"-"+
document.getElementById("txt_Subvencion9").value;
}

function agregarPep10()
{
document.getElementById('pep10').disabled=false;

document.getElementById("pep10").value=
/*tomara la concatenacion de los valores siguientes*/
document.getElementById("txt_Eproyect10").value+"-"+
document.getElementById("txt_Ecentro10").value+"-"+
document.getElementById("txt_Eprograma10").value+"-"+
document.getElementById("txt_Eproduc10").value+"-"+
document.getElementById("txt_Eactivi10").value+"-"+
document.getElementById("txt_Ecosto10").value+"-"+
document.getElementById("txt_EcuentaMay10").value+"-"+
document.getElementById("txt_Egrupo_art10").value+"-"+
document.getElementById("txt_Fad10").value+"-"+
document.getElementById("txt_Subvencion10").value;
}
</script>


<script type="text/javascript">
var cont2=2;
function incrementareElemento() 
{

if(cont2==2)
{ 
document.getElementById('Epep3').style.display = "block";
var nodes = document.getElementById("Epep3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont2==3) 
{
document.getElementById('Epep4').style.display = "block";
var nodes = document.getElementById("Epep4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};


if(cont2==4) 
{
  document.getElementById('Epep5').style.display = "block";

var nodes = document.getElementById("Epep5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont2==5) 
{
document.getElementById('Epep6').style.display = "block";
var nodes = document.getElementById("Epep6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont2==6) 
{
document.getElementById('Epep7').style.display = "block";
var nodes = document.getElementById("Epep7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont2==7) 
{
document.getElementById('Epep8').style.display = "block";
var nodes = document.getElementById("Epep8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont2==8) 
{
document.getElementById('Epep9').style.display = "block";
var nodes = document.getElementById("Epep9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont2==9) 
{
document.getElementById('Epep10').style.display = "block";
var nodes = document.getElementById("Epep10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};
if(cont2==10) 
alert('Maximo permitido alcanzado: 10'); 


else
{
document.operacion.caja2.value= cont2++; 
}
}

function decrementarElemento()
{ 
if(cont2==2) 
{
alert('Almenos debe haber un Elemento Pep'); 

}
else 
{ 
document.operacion.caja2.value= cont2--;
if(cont2==9) 
{
document.getElementById('Epep10').style.display = "none";
var nodes = document.getElementById("Epep10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

}; 
if(cont2==8) 
{
document.getElementById('Epep9').style.display = "none";
var nodes = document.getElementById("Epep9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};
if(cont2==7) 
{
document.getElementById('Epep8').style.display = "none";
var nodes = document.getElementById("Epep8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont2==6) 
{
document.getElementById('Epep7').style.display = "none";
var nodes = document.getElementById("Epep7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont2==5) 
{
document.getElementById('Epep6').style.display = "none";
var nodes = document.getElementById("Epep6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont2==4) 
{
document.getElementById('Epep5').style.display = "none";
var nodes = document.getElementById("Epep5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont2==3) 
{
document.getElementById('Epep4').style.display = "none";
var nodes = document.getElementById("Epep4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont2==2) 
{
document.getElementById('Epep3').style.display = "none";
var nodes = document.getElementById("Epep3").getElementsByTagName('*');
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
document.getElementById('Varea2').style.display = "block";
var nodes = document.getElementById("Varea2").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont==3)
{ 
document.getElementById('Varea3').style.display = "block";
var nodes = document.getElementById("Varea3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont==4) 
{
document.getElementById('Varea4').style.display = "block";
var nodes = document.getElementById("Varea4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};


if(cont==5) 
{
document.getElementById('Varea5').style.display = "block";

var nodes = document.getElementById("Varea5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==6) 
{
document.getElementById('Varea6').style.display = "block";
var nodes = document.getElementById("Varea6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==7) 
{
document.getElementById('Varea7').style.display = "block";
var nodes = document.getElementById("Varea7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==8) 
{
document.getElementById('Varea8').style.display = "block";
var nodes = document.getElementById("Varea8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==9) 
{
document.getElementById('Varea9').style.display = "block";
var nodes = document.getElementById("Varea9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont==10) 
{
document.getElementById('Varea10').style.display = "block";
var nodes = document.getElementById("Varea10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};
if(cont==11) 
alert('Maximo permitido alcanzado: 10'); 


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
if(cont==10) 
{
document.getElementById('Varea10').style.display = "none";
var nodes = document.getElementById("Varea10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

}; 
if(cont==9) 
{
document.getElementById('Varea9').style.display = "none";
var nodes = document.getElementById("Varea9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};
if(cont==8) 
{
document.getElementById('Varea8').style.display = "none";
var nodes = document.getElementById("Varea8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==7) 
{
document.getElementById('Varea7').style.display = "none";
var nodes = document.getElementById("Varea7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==6) 
{
document.getElementById('Varea6').style.display = "none";
var nodes = document.getElementById("Varea6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==5) 
{
document.getElementById('Varea5').style.display = "none";
var nodes = document.getElementById("Varea5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont==4) 
{
document.getElementById('Varea4').style.display = "none";
var nodes = document.getElementById("Varea4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont==3) 
{
document.getElementById('Varea3').style.display = "none";
var nodes = document.getElementById("Varea3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont==2) 
{
document.getElementById('Varea2').style.display = "none";
var nodes = document.getElementById("Varea2").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};
}

}
    </script>

<script type="text/javascript">

/*CALCULO PARA LOS DESEMBOLSOS*/
function calculo1()
{

/*logica para controlar los porcentajes*/
var suma=document.getElementById("PorcentDesembolso1").value;
var sumac=parseInt(suma);






document.getElementById("txtPrueba").value=sumac;

//recuperando el valor del input que acumula la suma
var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso1").value=0;

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

function calculo2()
{
//para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;

var sumt=parseInt(suma1)+parseInt(suma2);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100)
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso2").value=0;

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


function calculo3()
{
//para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;

var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso3").value=0;

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

function calculo4()
{
//para ir sumando los porcentajes
var suma1=document.getElementById("PorcentDesembolso1").value;
var suma2=document.getElementById("PorcentDesembolso2").value;
var suma3=document.getElementById("PorcentDesembolso3").value;
var suma4=document.getElementById("PorcentDesembolso4").value;


var sumt=parseInt(suma1)+parseInt(suma2)+parseInt(suma3)+parseInt(suma4);
document.getElementById("txtPrueba").value=sumt;

var total=document.getElementById("txtPrueba").value;
var tot=parseInt(total);

if (tot > 100 )
  {
document.getElementById("btnIncrementar").disabled=true;
alert("El porcentaje de desembolso supero el 100%");
var total=document.getElementById("PorcentDesembolso3").value=0;

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

function calculo5()
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
var total=document.getElementById("PorcentDesembolso3").value=0;

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


function calculo6()
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
var total=document.getElementById("PorcentDesembolso3").value=0;

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

function calculo7()
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
var total=document.getElementById("PorcentDesembolso3").value=0;

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
var total=document.getElementById("PorcentDesembolso3").value=0;

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
var total=document.getElementById("PorcentDesembolso3").value=0;

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
var total=document.getElementById("PorcentDesembolso3").value=0;

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

  var cont3=2;
function incrementarProducto() 
{

if(cont3==2) 
{
document.getElementById('Prod2').style.display = "block";
var nodes = document.getElementById("Prod2").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont3==3)
{ 
document.getElementById('Prod3').style.display = "block";
var nodes = document.getElementById("Prod3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont3==4) 
{
document.getElementById('Prod4').style.display = "block";
var nodes = document.getElementById("Prod4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};


if(cont3==5) 
{
  document.getElementById('Prod5').style.display = "block";

var nodes = document.getElementById("Prod5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont3==6) 
{
document.getElementById('Prod6').style.display = "block";
var nodes = document.getElementById("Prod6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont3==7) 
{
document.getElementById('Prod7').style.display = "block";
var nodes = document.getElementById("Prod7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont3==8) 
{
document.getElementById('Prod8').style.display = "block";
var nodes = document.getElementById("Prod8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont3==9) 
{
document.getElementById('Prod9').style.display = "block";
var nodes = document.getElementById("Prod9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont3==10) 
{
document.getElementById('Prod10').style.display = "block";
var nodes = document.getElementById("Prod10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};
if(cont3==11) 
alert('Maximo permitido alcanzado: 10'); 


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
if(cont3==10) 
{
document.getElementById('Prod10').style.display = "none";
var nodes = document.getElementById("Prod10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

}; 
if(cont3==9) 
{
document.getElementById('Prod9').style.display = "none";
var nodes = document.getElementById("Prod9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};
if(cont3==8) 
{
document.getElementById('Prod8').style.display = "none";
var nodes = document.getElementById("Prod8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont3==7) 
{
document.getElementById('Prod7').style.display = "none";
var nodes = document.getElementById("Prod7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont3==6) 
{
document.getElementById('Prod6').style.display = "none";
var nodes = document.getElementById("Prod6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont3==5) 
{
document.getElementById('Prod5').style.display = "none";
var nodes = document.getElementById("Prod5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont3==4) 
{
document.getElementById('Prod4').style.display = "none";
var nodes = document.getElementById("Prod4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont3==3) 
{
document.getElementById('Prod3').style.display = "none";
var nodes = document.getElementById("Prod3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont3==2) 
{
document.getElementById('Prod2').style.display = "none";
var nodes = document.getElementById("Prod2").getElementsByTagName('*');
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


if(d=="Comunitario")
document.getElementById('zonaTrab').style.display = "block";
if(d=="Comunitario")
{
document.getElementById('zona1').style.display = "block";
var nodes = document.getElementById("zona1").getElementsByTagName('*');
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
document.getElementById('zona2').style.display = "block";
var nodes = document.getElementById("zona2").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

}

if(cont4==3)
{ 
document.getElementById('zona3').style.display = "block";
var nodes = document.getElementById("zona3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};

if(cont4==4) 
{
document.getElementById('zona4').style.display = "block";
var nodes = document.getElementById("zona4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}

};


if(cont4==5) 
{
  document.getElementById('zona5').style.display = "block";

var nodes = document.getElementById("zona5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==6) 
{
document.getElementById('zona6').style.display = "block";
var nodes = document.getElementById("zona6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==7) 
{
document.getElementById('zona7').style.display = "block";
var nodes = document.getElementById("zona7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==8) 
{
document.getElementById('zona8').style.display = "block";
var nodes = document.getElementById("zona8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==9) 
{
document.getElementById('zona9').style.display = "block";
var nodes = document.getElementById("zona9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==10) 
{
document.getElementById('zona10').style.display = "block";
var nodes = document.getElementById("zona10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==11) 
{
document.getElementById('zona11').style.display = "block";
var nodes = document.getElementById("zona11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==12) 
{
document.getElementById('zona12').style.display = "block";
var nodes = document.getElementById("zona12").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==13) 
{
document.getElementById('zona13').style.display = "block";
var nodes = document.getElementById("zona13").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};


if(cont4==14) 
{
document.getElementById('zona14').style.display = "block";
var nodes = document.getElementById("zona14").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==15) 
{
document.getElementById('zona15').style.display = "block";
var nodes = document.getElementById("zona15").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==16) 
{
document.getElementById('zona16').style.display = "block";
var nodes = document.getElementById("zona16").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==17) 
{
document.getElementById('zona17').style.display = "block";
var nodes = document.getElementById("zona17").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};


if(cont4==18) 
{
document.getElementById('zona18').style.display = "block";
var nodes = document.getElementById("zona18").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==19) 
{
document.getElementById('zona19').style.display = "block";
var nodes = document.getElementById("zona19").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==20) 
{
document.getElementById('zona20').style.display = "block";
var nodes = document.getElementById("zona20").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==21) 
{
document.getElementById('zona21').style.display = "block";
var nodes = document.getElementById("zona21").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==22) 
{
document.getElementById('zona22').style.display = "block";
var nodes = document.getElementById("zona22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==23) 
{
document.getElementById('zona23').style.display = "block";
var nodes = document.getElementById("zona23").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==24) 
{
document.getElementById('zona24').style.display = "block";
var nodes = document.getElementById("zona24").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==25) 
{
document.getElementById('zona25').style.display = "block";
var nodes = document.getElementById("zona25").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==26) 
{
document.getElementById('zona26').style.display = "block";
var nodes = document.getElementById("zona26").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==27) 
{
document.getElementById('zona27').style.display = "block";
var nodes = document.getElementById("zona27").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==28) 
{
document.getElementById('zona28').style.display = "block";
var nodes = document.getElementById("zona28").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==29) 
{
document.getElementById('zona29').style.display = "block";
var nodes = document.getElementById("zona29").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};

if(cont4==30) 
{
document.getElementById('zona30').style.display = "block";
var nodes = document.getElementById("zona30").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = false;}
};


if(cont4==31) 
alert('Maximo permitido alcanzado: 30'); 


else
{
document.operacion.caja4.value= cont4++; 
}
}

function decrementarZona()
{ 
if(cont4==2) 
{
alert('Almenos debe haber un consultor'); 

}
else 
{ 
document.operacion.caja4.value= cont4--;
if(cont4==30) 
{
document.getElementById('zona30').style.display = "none";
var nodes = document.getElementById("zona30").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==29) 
{
document.getElementById('zona29').style.display = "none";
var nodes = document.getElementById("zona29").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};


if(cont4==28) 
{
document.getElementById('zona28').style.display = "none";
var nodes = document.getElementById("zona28").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==27) 
{
document.getElementById('zona27').style.display = "none";
var nodes = document.getElementById("zona27").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==26) 
{
document.getElementById('zona26').style.display = "none";
var nodes = document.getElementById("zona26").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==25) 
{
document.getElementById('zona25').style.display = "none";
var nodes = document.getElementById("zona25").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==24) 
{
document.getElementById('zona24').style.display = "none";
var nodes = document.getElementById("zona24").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==23) 
{
document.getElementById('zona23').style.display = "none";
var nodes = document.getElementById("zona23").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==22) 
{
document.getElementById('zona22').style.display = "none";
var nodes = document.getElementById("zona22").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==21) 
{
document.getElementById('zona21').style.display = "none";
var nodes = document.getElementById("zona21").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==20) 
{
document.getElementById('zona20').style.display = "none";
var nodes = document.getElementById("zona20").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==19) 
{
document.getElementById('zona19').style.display = "none";
var nodes = document.getElementById("zona19").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==18) 
{
document.getElementById('zona18').style.display = "none";
var nodes = document.getElementById("zona18").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==17) 
{
document.getElementById('zona17').style.display = "none";
var nodes = document.getElementById("zona17").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};


if(cont4==16) 
{
document.getElementById('zona16').style.display = "none";
var nodes = document.getElementById("zona16").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==15) 
{
document.getElementById('zona15').style.display = "none";
var nodes = document.getElementById("zona15").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==14) 
{
document.getElementById('zona14').style.display = "none";
var nodes = document.getElementById("zona14").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==13) 
{
document.getElementById('zona13').style.display = "none";
var nodes = document.getElementById("zona13").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==12) 
{
document.getElementById('zona12').style.display = "none";
var nodes = document.getElementById("zona12").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==11) 
{
document.getElementById('zona11').style.display = "none";
var nodes = document.getElementById("zona11").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==10) 
{
document.getElementById('zona10').style.display = "none";
var nodes = document.getElementById("zona10").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==9) 
{
document.getElementById('zona9').style.display = "none";
var nodes = document.getElementById("zona9").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};
if(cont4==8) 
{
document.getElementById('zona8').style.display = "none";
var nodes = document.getElementById("zona8").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont4==7) 
{
document.getElementById('zona7').style.display = "none";
var nodes = document.getElementById("zona7").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont4==6) 
{
document.getElementById('zona6').style.display = "none";
var nodes = document.getElementById("zona6").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont4==5) 
{
document.getElementById('zona5').style.display = "none";
var nodes = document.getElementById("zona5").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}

};

if(cont4==4) 
{
document.getElementById('zona4').style.display = "none";
var nodes = document.getElementById("zona4").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==3) 
{
document.getElementById('zona3').style.display = "none";
var nodes = document.getElementById("zona3").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};

if(cont4==2) 
{
document.getElementById('zona2').style.display = "none";
var nodes = document.getElementById("zona2").getElementsByTagName('*');
for(var i = 0; i < nodes.length; i++)
{nodes[i].disabled = true;}
};
}

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
            data:"idDepartamento11="+$("#lsdeptempresa11").val(),
            success: function(opciones){
              $("#lsmunicempresa11").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa12()
 {
 $(document).ready(function(){
        $("#lsdeptempresa12").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento12="+$("#lsdeptempresa12").val(),
            success: function(opciones){
              $("#lsmunicempresa12").html(opciones);
            }
          })
        });
      });
 }


  function depEmpresa13()
 {
 $(document).ready(function(){
        $("#lsdeptempresa13").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento13="+$("#lsdeptempresa13").val(),
            success: function(opciones){
              $("#lsmunicempresa13").html(opciones);
            }
          })
        });
      });
 }


   function depEmpresa14()
 {
 $(document).ready(function(){
        $("#lsdeptempresa14").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento14="+$("#lsdeptempresa14").val(),
            success: function(opciones){
              $("#lsmunicempresa14").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa15()
 {
 $(document).ready(function(){
        $("#lsdeptempresa15").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento15="+$("#lsdeptempresa15").val(),
            success: function(opciones){
              $("#lsmunicempresa15").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa16()
 {
 $(document).ready(function(){
        $("#lsdeptempresa16").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento16="+$("#lsdeptempresa16").val(),
            success: function(opciones){
              $("#lsmunicempresa16").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa17()
 {
 $(document).ready(function(){
        $("#lsdeptempresa17").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento17="+$("#lsdeptempresa17").val(),
            success: function(opciones){
              $("#lsmunicempresa17").html(opciones);
            }
          })
        });
      });
 }


  function depEmpresa18()
 {
 $(document).ready(function(){
        $("#lsdeptempresa18").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento18="+$("#lsdeptempresa18").val(),
            success: function(opciones){
              $("#lsmunicempresa18").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa19()
 {
 $(document).ready(function(){
        $("#lsdeptempresa19").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento19="+$("#lsdeptempresa19").val(),
            success: function(opciones){
              $("#lsmunicempresa19").html(opciones);
            }
          })
        });
      });
 }

   function depEmpresa20()
 {
 $(document).ready(function(){
        $("#lsdeptempresa20").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento20="+$("#lsdeptempresa20").val(),
            success: function(opciones){
              $("#lsmunicempresa20").html(opciones);
            }
          })
        });
      });
 }


 function depEmpresa21()
 {
 $(document).ready(function(){
        $("#lsdeptempresa21").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento21="+$("#lsdeptempresa21").val(),
            success: function(opciones){
              $("#lsmunicempresa21").html(opciones);
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
            data:"idDepartamento22="+$("#lsdeptempresa22").val(),
            success: function(opciones){
              $("#lsmunicempresa22").html(opciones);
            }
          })
        });
      });
 }


 function depEmpresa23()
 {
 $(document).ready(function(){
        $("#lsdeptempresa23").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento23="+$("#lsdeptempresa23").val(),
            success: function(opciones){
              $("#lsmunicempresa23").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa24()
 {
 $(document).ready(function(){
        $("#lsdeptempresa24").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento24="+$("#lsdeptempresa24").val(),
            success: function(opciones){
              $("#lsmunicempresa24").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa25()
 {
 $(document).ready(function(){
        $("#lsdeptempresa25").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento25="+$("#lsdeptempresa25").val(),
            success: function(opciones){
              $("#lsmunicempresa25").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa26()
 {
 $(document).ready(function(){
        $("#lsdeptempresa26").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento26="+$("#lsdeptempresa26").val(),
            success: function(opciones){
              $("#lsmunicempresa26").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa27()
 {
 $(document).ready(function(){
        $("#lsdeptempresa27").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento27="+$("#lsdeptempresa27").val(),
            success: function(opciones){
              $("#lsmunicempresa27").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa28()
 {
 $(document).ready(function(){
        $("#lsdeptempresa28").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento28="+$("#lsdeptempresa28").val(),
            success: function(opciones){
              $("#lsmunicempresa28").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa29()
 {
 $(document).ready(function(){
        $("#lsdeptempresa29").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento29="+$("#lsdeptempresa29").val(),
            success: function(opciones){
              $("#lsmunicempresa29").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa30()
 {
 $(document).ready(function(){
        $("#lsdeptempresa30").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento30="+$("#lsdeptempresa30").val(),
            success: function(opciones){
              $("#lsmunicempresa30").html(opciones);
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


<style type="text/css">
  .tamano td
  {
    width: 9%;
  }
</style>

<link rel="stylesheet" href="../../../librerias/css/bootstrap.min.css" class="rel">
<link rel="stylesheet" href="../../../librerias/css/bootstrap-theme.min.css" class="href">
<link rel="stylesheet" href="../../../librerias/css/estilo.css">
<link rel="stylesheet" href="Tab-Con.css">
<link rel="stylesheet" href="centrardiv.css">

    </head>
    <body>
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

<br>

<h3><a style="text-decoration: none" href="Formato TdR (Actualizado-sep16).docm" align="center"><p style="text-align: center; font-family: Verdana; color:#0072bb"><strong>Descargar formato TDR</strong></a></h3>
</div>

<br>

<form accept-charset="utf-8" action="insertar.php" method="post"  name="operacion" enctype="multipart/form-data"> 

<div class="container" align="center">
<table class="table table-bordered" style="width: 65%">
<h3><p style="font-family: Verdana; text-align: center;"><b>DATOS GENERALES</b></p></h3>
<thead>
<tr>
    <th colspan="3" style='text-align:center;'><p style="font-family: Verdana;">Nombre de Consultoría</p></th>
</tr>
</thead>
<tbody>
<tr>
    <td colspan="3"><p style="font-family: Verdana;"><input type="text" placeholder="escriba" name="Consultoria" class="form-control input-md" required value="" style="" /></p></td>
</tr>
<tr>
    <th style='text-align:center;'><p style="font-family: Verdana;">Responsable</p></th>
    <th style='text-align:center;'><p style="font-family: Verdana;">Tipo de Consultoría</p></th>
	<th style='text-align:center;'><p style="font-family: Verdana;">Nivel de Alcance</p></th>
</tr>
<tr>
<td style="text-align: center; font-family: Verdana;">
<?php
  //imprimo el nombre del personal solicitante  
  while ($row=sqlsrv_fetch_object($resultado))
  {
  
   echo "<b>".$row->Nombres."</b>";
  // echo "<input type='text' value='".$row->Nombres,"'"."/>";
   echo "<input type='hidden' name='lsPersonal' value='".$row->CodigoPersonal,"'"."/>";
  }
?>
</td>
<td style="text-align: center;"><p style=" font-family: Verdana;">
  <select name="TipoConsultoria" class='form-control' id="TipoConsultoria" onchange="validar()">
          <option value="Sistematización">Sistematización</option>
          <option value="Línea Base">Línea Base</option>
          <option value="Evaluación">Evaluación </option>
          <option value="Estudio CAP">Estudio CAP</option>
          <option value="Investigación">Investigación</option>
          <option value="otros">Otros</option>

          </select></p>

        <input type="text" style="display:block" disabled name="TipoConsultoria" class='form-control' id="txtOtros">

</td>
<td style="text-align: center"><p style="font-family: Verdana;">
  <select name="NivelAlcance" class='form-control' required id="nivel" required onchange="validarZona(this)"> 
                <option selected value='' > Elija una Opción</option>";
                <option value="Nacional"> Nacional</option> 
                <option value="Departamental"> Departamental </option> 
                <option value="Municipal"> Municipal </option> 
        </select></p></td>
</tr>
<tr>
		<th style='text-align:center;'><p style="font-family: Verdana;">Fecha de Inicio</p></th>
        <th style='text-align:center;'><p style="font-family: Verdana;">Fecha de Fin</p></th>
		<th align="center" style='text-align:center;'><p style="font-family: Verdana;">TDR</p></th>
		</tr>
<tr>
<td style='text-align:center;'><p style="font-family: Verdana;"><input type="date" required name="FechaIn" id="txtFechaInicial" oninput="AfechaInicio()"></p></td>
<td style='text-align:center;'><p style="font-family: Verdana;"><input type="date" required name="FechaFi" id="txtFechaFinal" oninput="AfechaFin()"></p></td>	
<td style='text-align:center;'>
<input type="file" id="file_url" accept="application/pdf" name="archivo"  value="subir"  >
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
<table class="table table-bordered" align="center" style="width: 45%" >
<h3><center><p style="font-family: Verdana;"><b>ÁREAS Y SUB-ÁREAS</b></p></center></h3>
<tr style="display:block;">
<th style="text-align: center; width: 15%"><p style="font-family: Verdana;">Área</p></th>
<th style="text-align: center; width: 15%"><p style="font-family: Verdana;">Sub Área</p></th>
<th style="text-align: center; width: 3%"><p style="font-family: Verdana;">Agregar/Quitar </p></th>
</tr>

<!--AREA1-->

<tr id="Varea1" style="display:block;">
<td style="width: 30%; text-align: center;"><p style="font-family: Verdana;">
      <select name="lsAreas[]"  required id="lsAreas" class='form-control' style="width:200px" onClick="area1(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
    </td>

    <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
      <select name="lsSub[]" id="lsSub" required class='form-control' style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
    </td>
    <td style="width: 23%; text-align: center">
    <img src="../../../librerias/images/mas2.png" style="cursor: pointer" width="30" height="30" onclick="incrementarArea()"  />
<img src="../../../librerias/images/menos2.png" style="cursor: pointer" width="30" height="30" onclick="decrementarArea()" /></td>
  </tr>

<!--AREA2-->

  <tr id="Varea2" style="display: none;">
      <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas2" class='form-control' required style="width:200px" onClick="area2(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub2" class='form-control' required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
  </tr>

<!--AREA3-->

  <tr id="Varea3" style="display:none">
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas3" class="form-control" required style="width:200px" onClick="area3(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub3" class="form-control" required  style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
  </tr>

<!--AREA4-->

  <tr id="Varea4" style="display:none">
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas4" class='form-control' required style="width:200px" onClick="area4(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub4" class='form-control' required  style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
  </tr>

<!--AREA5-->

  <tr id="Varea5" style="display:none">
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas5" class="form-control" required  style="width:200px" onClick="area5(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub5" class="form-control" required  style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
  </tr>

<!--AREA6-->

  <tr id="Varea6" style="display:none">
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas6" class="form-control" required style="width:200px" onClick="area6(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub6" class="form-control" required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
  </tr>

<!--AREA7-->

  <tr id="Varea7" style="display:none">
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas7" class="form-control" required style="width:200px" onClick="area7(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub7" class="form-control" required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
  </tr>

<!--AREA8-->

  <tr id="Varea8" style="display:none">
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas8" class="form-control" required style="width:200px" onClick="area8(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub8" class="form-control" required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
  </tr>

<!--AREA9-->

  <tr id="Varea9" style="display:none">
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas9" class="form-control" required style="width:200px" onClick="area9(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub9" class="form-control" required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
  </tr>

<!--AREA10-->

  <tr id="Varea10" style="display:none">
       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsAreas[]" id="lsAreas10" class="form-control" required style="width:200px" onClick="area10(this)">
       <?php
       echo $opcionesAreas;   
       ?>  
       </select></p>
       </td>

       <td style="width: 30%; text-align: center"><p style="font-family: Verdana;">
       <select name="lsSub[]" disabled id="lsSub10" class="form-control" required style="width:200px">
       <option value="">Elija una Sub Área</option>
       </select></p>
       </td>
       <td style="width: 23%; text-align: center"></td>
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
          <table class="table table-bordered" align="center" style="width: 90%">
        <h3><center>
        <p style="font-family: Verdana;"><strong>Aplicación Contable (Elementos PEP)</strong></p></center></h3>
          <tr style="display: block;">
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Proyecto (SV0XXXX):</p></th>
          <th  style="width: 9%" ><p style="font-family: Verdana; text-align: center;">Centro de Beneficio:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Programa:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Producto:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Actividad:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Centro de costo:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Cuenta de mayor:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Grupo de artículo:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Fad:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Sub Vencion:</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;">Agregar / Quitar</p></th>
          <th style="width: 9%"><p style="font-family: Verdana; text-align: center;"><input type="text" style="visibility: hidden;" size="6"></p></th>
          </tr>

<!--pep1-->

<script type="text/javascript">
function comp()
{
d
}
  </script>

        <tr style="display:block;" id="Epep1">
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" id="txt_Eproyect" placeholder="escriba" class="form-control input-md" required  maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" id="txt_Ecentro" placeholder="escriba" class="form-control input-md" required  maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" id="txt_Eprograma" placeholder="escriba" class="form-control input-md" required maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]" id="txt_Eproduc" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" id="txt_Eactivi" placeholder="escriba" class="form-control input-md" required maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" id="txt_Ecosto" placeholder="escriba" class="form-control input-md" required maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" id="txt_EcuentaMay" placeholder="escriba" class="form-control input-md" required maxlength="6" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" id="txt_Egrupo_art" placeholder="escriba" class="form-control input-md"  required maxlength="4" size="10"></p>
         
           </td>
           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad" placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Subvencion[]" id="txt_Subvencion" placeholder="escriba" class="form-control input-md" onkeyup="agregarPep1()"  required maxlength="4" size="10">
           <input type="hidden" name="Epep[]" id="pep1" size="50" /></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <img src="../../../librerias/images/mas2.png" style="cursor: pointer" width="30" height="30"  onClick="incrementareElemento()" />
          <img src="../../../librerias/images/menos2.png" style="cursor: pointer" width="30" height="30" onClick="decrementarElemento()" /></p>
          </td> 
          <td style="width: 9%; font-family: Verdana; text-align: center;">Honorarios</td>
          </tr>    

<!--PEP2-->

       <tr style="display:block" id="Epep2" >
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" placeholder="escriba" class="form-control input-md" required id="txt_Eproyect2"   maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" placeholder="escriba" class="form-control input-md" required id="txt_Ecentro2"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" placeholder="escriba" class="form-control input-md" required id="txt_Eprograma2"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]" placeholder="escriba" class="form-control input-md" required id="txt_Eproduc2"   maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" placeholder="escriba" class="form-control input-md" required id="txt_Eactivi2"  maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" placeholder="escriba" class="form-control input-md" required id="txt_Ecosto2"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay2"    maxlength="6" size="10"></p>
          </td>
          
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art2"   maxlength="4" size="10"></p>
          </td>

           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad2"   placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion2" onkeyup="agregarPep2()"  placeholder="escriba" class="form-control input-md" required maxlength="4" size="10"></p>
          <input type="hidden" disabled name="Epep[]"   id="pep2" size="50" />
          </td>

           <td  style="width: 9%">
          </td>
          <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td>
          </tr>


<!--PEP 3-->

       <tr style="display:none" id="Epep3">
           <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproyect3"   maxlength="7" size="10"></p>
          </td>
           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecentro3"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eprograma3"   maxlength="3" size="10"></p>
          </td>
           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]"  disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproduc3"   maxlength="4" size="10"></p>
          </td>
           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eactivi3"  maxlength="2" size="10"></p>
          </td>
           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecosto3"   maxlength="3" size="10"></p>
          </td>
           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay3"    maxlength="6" size="10"></p>
          </td>

           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art3"   maxlength="4" size="10"></p>
          </td>

            <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad3" disabled placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion3" disabled onkeyup="agregarPep3()" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10"></p>
          <input type="hidden" disabled name="Epep[]"   id="pep3" size="50" />
          </td>

            <td  style="width: 9%"></td>
            <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td>
          </tr>

<!--PEP 4-->

       <tr style="display:none" id="Epep4">
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproyect4"   maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecentro4"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eprograma4"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproduc4"   maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eactivi4"  maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecosto4"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay4"    maxlength="6" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art4"   maxlength="4" size="10"></p>
          </td>
           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad4" disabled placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion4" disabled onkeyup="agregarPep4()" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10"></p>
          <input type="hidden" disabled name="Epep[]"   id="pep4" size="50" />
          </td>

           <td  style="width: 9%">
          </td> 
          <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td>
          </tr>

<!--PEP 5-->

       <tr style="display:none" id="Epep5">
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproyect5"   maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecentro5"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eprograma5"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]"  disabled placeholder="escriba" class="form-control input-md" placeholder="escriba" class="form-control input-md" required id="txt_Eproduc5"   maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eactivi5"  maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecosto5"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay5"    maxlength="6" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art5"   maxlength="4" size="10"></p>
          </td>
           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad5" disabled placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion5" disabled onkeyup="agregarPep5()" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10"></p>
          <input type="hidden" disabled name="Epep[]"   id="pep5" size="50" />
          </td>

           <td  style="width: 9%">

          </td> 
          <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td>
          </tr>

<!--PEP 6-->

       <tr style="display:none" id="Epep6">
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproyect6"   maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecentro6"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eprograma6"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]"  disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproduc6"   maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eactivi6"  maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecosto6"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay6"    maxlength="6" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art6"  maxlength="4" size="10"></p>
          </td>


           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad6" disabled placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion6" disabled onkeyup="agregarPep6()" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10">
          <input type="hidden" disabled name="Epep[]"   id="pep6" size="50" /></p>
          </td>

           <td  style="width: 9%">
           <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td>
          </td> 
          </tr>

<!--PEP 7-->

       <tr style="display:none" id="Epep7">
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproyect7"   maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecentro7"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eprograma7"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]"  disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproduc7"   maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eactivi7"  maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecosto7"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay7"    maxlength="6" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art7"   maxlength="4" size="10"></p>
          </td>


           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad7"  disabled placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion7" disabled onkeyup="agregarPep7()" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10">
          <input type="hidden" disabled name="Epep[]"   id="pep7" size="50" /></p>
          </td>

           <td  style="width: 9%">

          </td>

          <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td> 
          </tr>

<!--PEP 8-->

       <tr style="display:none" id="Epep8">
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproyect8"   maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecentro8"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eprograma8"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproduc8"   maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eactivi8"  maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecosto8"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay8"    maxlength="6" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art8"  maxlength="4" size="10"></p>
          </td>


           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad8"  disabled placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion8" disabled onkeyup="agregarPep8()" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10">
          <input type="hidden" disabled name="Epep[]"   id="pep8" size="50" /></p>
          </td>

          <td  style="width: 9%">

          </td>
          <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td> 
          </tr>

<!--PEP 9-->

       <tr style="display:none" id="Epep9">
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproyect9"   maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecentro9"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eprograma9"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]"  disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproduc9"   maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eactivi9"  maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecosto9"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay9"    maxlength="6" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art9"   maxlength="4" size="10"></p>
          </td>


           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad9" disabled placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion9" disabled onkeyup="agregarPep9()" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10">
          <input type="hidden" disabled name="Epep[]"   id="pep9" size="50" /></p>
          </td>
           <td  style="width: 9%">

          </td> 
          <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td>
          </tr>

<!--PEP 10-->

       <tr style="display:none" id="Epep10">
          <td  style="width: 10%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproyect[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproyect10"   maxlength="7" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecentro[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecentro10"   maxlength="9" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eprograma[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eprograma10"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eproduc[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eproduc10"   maxlength="4" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Eactivi[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Eactivi10"  maxlength="2" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Ecosto[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Ecosto10"   maxlength="3" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_EcuentaMay[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_EcuentaMay10"    maxlength="6" size="10"></p>
          </td>
          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Egrupo_art[]" disabled placeholder="escriba" class="form-control input-md" required id="txt_Egrupo_art10"   maxlength="4" size="10"></p>
          </td>


           <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
           <input type="text" name="txt_Fad[]" id="txt_Fad10" disabled placeholder="escriba" class="form-control input-md" required maxlength="9" size="10"></p>
           </td>

          <td  style="width: 9%"><p style="font-family: Verdana; text-align: center;">
          <input type="text" name="txt_Subvencion[]" id="txt_Subvencion10" disabled onkeyup="agregarPep10()" placeholder="escriba" class="form-control input-md" required maxlength="4" size="10">
          <input type="hidden" disabled name="Epep[]"   id="pep10" size="50" /></p>
          </td>

           <td  style="width: 9%">

          </td> 
          <td style="width: 9%"><input type="text" style="visibility: hidden;" size="6"></td>
          </tr>
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

<!--input para controlar el presupuesto-->
  <input type="hidden" id="txtPrueba">


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
          <td colspan="2" style="text-align:center; width: 25%" ><input required="required" maxlength="255" name="Presupuesto" id="Presupuesto" placeholder="Escriba" class="form-control input-md" type="text" size="50" /><p style="font-family: Verdana;"></p></td>
          <td colspan="2" style="text-align:center; width: 25%"><input required="required" maxlength="255" name="FormaPago" id="FormaPago" placeholder="Escriba" class="form-control input-md" type="text" size="50" /><p style="font-family: Verdana;"></p></td>
          <td style="text-align: center; width: 9%">
          <input type="button" style='background-color: #228B22; color: white; width:60px; font-family: Verdana; font-weight: bold;' value="Mas" onClick="incrementarProducto()" id="btnIncrementar" />
<input type="button" style="background-color: #CF3D0D; color: white; width: 60px;  font-family: Verdana; font-weight: bold;" value="Menos" onClick="decrementarProducto()" id="btnDecrementar" /></td>
          </tr>

            <tr style="display: block;">
		    <th style='text-align:center; width: 20%'><p style="font-family: Verdana;">Nombre Producto:</p></th>
			  <th style='text-align:center; width: 20%'><p style="font-family: Verdana;">% Desembolsos:</p></th>
			  <th style='text-align:center; width: 20% '><p style="font-family: Verdana;">Desembolsos:</p></th>
			  <th style='text-align:center; width: 20% '><p style="font-family: Verdana;">Fecha entrega del producto:</p></th>
          </tr>

<!--PRODUCTO 1-->

          <tr id="Prod1" style="display:block">
		      <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" required name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
		      <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="number" min="1" max="100" required name="txtDesembolso[]" placeholder="Escriba" class="form-control input-md"onkeyup="calculo1()" id="PorcentDesembolso1" size="25"></p></td>
		      <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" required name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" readonly="readonly"  id="CalculoDesem1" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" required name="txtFechaPlanificada[]" placeholder="Escriba" class="form-control input-md" size="25" id="fecha1" ></p></td>  
          </tr>

<!--PRODUCTO 2-->

<tr id="Prod2" style="display:none">
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" disabled name="txtDesembolso[]" placeholder="Escriba" class="form-control input-md" id="PorcentDesembolso2" onkeyup="calculo2()"  size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" readonly="readonly" id="CalculoDesem2" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]" placeholder="Escriba" class="form-control input-md" size="25" id="fecha2"></p></td>  
</tr>

<!--PRODUCTO 3-->

<tr id="Prod3" style="display:none">
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md"  size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" id="PorcentDesembolso3" disabled name="txtDesembolso[]" placeholder="Escriba" class="form-control input-md" onkeyup="calculo3()"  size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" readonly="readonly" id="CalculoDesem3" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md"  size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]" placeholder="Escriba" class="form-control input-md" size="25" id="fecha3"></p></td>  
</tr>

<!--PRODUCTO 4-->

<tr id="Prod4" style="display:none">
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]"  placeholder="Escriba" class="form-control input-md"  size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" id="PorcentDesembolso4" disabled name="txtDesembolso[]" placeholder="Escriba" class="form-control input-md" onkeyup="calculo4()"  size="25"><p style="font-family: Verdana;"></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" readonly="readonly" id="CalculoDesem4" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]"  placeholder="Escriba" class="form-control input-md"  size="25" id="fecha4"></p></td>  
 </tr>

<!--PRODUCTO 5-->

<tr id="Prod5" style="display:none">
         <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]"  placeholder="Escriba" class="form-control input-md"  size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" disabled name="txtDesembolso[]" id="PorcentDesembolso5" placeholder="Escriba" class="form-control input-md"    onkeyup="calculo5()" size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" readonly="readonly" id="CalculoDesem5" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]"  placeholder="Escriba" class="form-control input-md"  size="25" id="fecha5"></p></td>  
</tr>

<!--PRODUCTO 6-->

<tr id="Prod6" style="display:none">
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]"  placeholder="Escriba" class="form-control input-md"  size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" disabled name="txtDesembolso[]" placeholder="Escriba" class="form-control input-md"  id="PorcentDesembolso6"  onkeyup="calculo6()" size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" readonly="readonly" id="CalculoDesem6" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]" placeholder="Escriba" class="form-control input-md"   size="25" id="fecha6"><p style="font-family: Verdana;"></p></td>  
</tr>

<!--PRODUCTO 7-->

<tr id="Prod7" style="display:none">
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md"   size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" disabled name="txtDesembolso[]" placeholder="Escriba" class="form-control input-md" id="PorcentDesembolso7"   onkeyup="calculo7()" size="25"></p></td>
         <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" readonly="readonly" id="CalculoDesem7" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]" placeholder="Escriba" class="form-control input-md" size="25" id="fecha7"></p></td>  
</tr>

<!--PRODUCTO 8-->

<tr id="Prod8" style="display:none">
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]"  placeholder="Escriba" class="form-control input-md"  size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" disabled name="txtDesembolso[]" placeholder="Escriba" class="form-control input-md"  id="PorcentDesembolso8"  onkeyup="calculo8()" size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" readonly="readonly" id="CalculoDesem8" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]"  placeholder="Escriba" class="form-control input-md"  size="25" id="fecha8"></p></td>  
</tr>

<!--PRODUCTO 9-->

<tr id="Prod9" style="display:none">
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md"   size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" disabledname="txtDesembolso[]" placeholder="Escriba" class="form-control input-md"  id="PorcentDesembolso9"  onkeyup="calculo9()" size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" readonly="readonly" id="CalculoDesem9" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]"  placeholder="Escriba" class="form-control input-md"  size="25" id="fecha9"></p></td>  
</tr>

<!--PRODUCTO 10-->

<tr id="Prod10" style="display:none">
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" disabled name="txtNombProducto[]" placeholder="Escriba" class="form-control input-md"   size="25"></p></td>
          <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input  type="number" min="1" max="100" disabled name="txtDesembolso[]" placeholder="Escriba" class="form-control input-md" id="PorcentDesembolso10"   onkeyup="calculo10()" size="25"></p></td>
         <td style='text-align:center; width: 20%'><p style="font-family: Verdana;"><input type="text" readonly="readonly" id="CalculoDesem10" name="Cdesembolso[]" placeholder="Escriba" class="form-control input-md" size="25"></p></td>
          <td style='text-align:center; width: 10%'><p style="font-family: Verdana;"><input type="date" disabled name="txtFechaPlanificada[]" placeholder="Escriba" class="form-control input-md" size="25" id="fecha10"></p></td>  
</tr>
</table>
</div>
</center>

<br>

                   <input name="caja4" type="hidden"  >
	

<!--PARA LAS ZONAS-->
  <center>
  <div id="zonaTrab" style="display: none; margin:0 auto" class="container" align="center" >
                  <table class="table table-bordered" style="width: 45%"> <!-- Lo cambiaremos por CSS -->
              <h3><center>
        <p style="font-family: Verdana;"><strong>DETALLE DEL LUGAR DE TRABAJO</strong></p></center></h3>
              <tr style="display:block">
              <th style="text-align: center; width: 15%"><p style="font-family: Verdana;">Departamento</p></th>
              <th style="text-align: center; width: 15%"><p style="font-family: Verdana;">Municipio</p></th>
              <th style="text-align: center; width: 3%"><p style="font-family: Verdana;">Agregar/Quitar</p></th>         
              </tr>

              <tr id="zona1" style="display: block;">
              <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
              <select id="lsdeptempresa" disabled required class="form-control" onClick="depEmpresa(this)" >
              <?php echo $opciones; ?>
              </select></p>
              </td>
              
              <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
              <select class="selects, form-control" id="lsmunicempresa" required disabled name="lsmunicempresa[]">
              <option value="">Elija un municipio</option>
              </select></p>
              </td>
              
              <td style="width: 11%; text-align: center">
              <img src="../../../librerias/images/mas2.png" style="cursor: pointer" width="30" height="30"  onClick="incrementarZona()" />
              <img src="../../../librerias/images/menos2.png" style="cursor: pointer" width="30" height="30" onClick="decrementarZona()" />
              </td> 
              </tr> 
 
          <!--ZONA2-->

                <tr id="zona2" style="display:none">
                <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
                <select id="lsdeptempresa2" disabled required class="form-control" onClick="depEmpresa2(this)">
                <?php echo $opciones; ?>
                </select></p>
                </td>
                
                <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
                <select class="selects, form-control"  id="lsmunicempresa2" required disabled name="lsmunicempresa[]">
                <option value="">Elija un municipio</option>
                </select></p>
                </td>
                
                
                <td style="width: 11%; text-align: center"></td>
                </tr>

<!---ZONA 3-->

      <tr id="zona3" style="display:none" >
       <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa3" class="form-control" disabled required onClick="depEmpresa3(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
       <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa3" class="selects, form-control" disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>   
        
        <!---ZONA4-->

      <tr id="zona4" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa4" class="form-control" disabled required onClick="depEmpresa4(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa4" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>
     
        <!---ZONA 5-->

      <tr id="zona5" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa5" disabled class="form-control" required onClick="depEmpresa5(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa5" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>
     
        <!---ZONA6-->

      <tr id="zona6" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa6" disabled class="form-control" required onClick="depEmpresa6(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa6" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 7-->

      <tr id="zona7" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa7" disabled class="form-control" required onClick="depEmpresa7(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa7" class="selects, form-control" disabled required name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 8-->

      <tr id="zona8" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa8" disabled required class="form-control"  onClick="depEmpresa8(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa8" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 9-->

      <tr id="zona9" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa9" disabled class="form-control" required onClick="depEmpresa9(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa9" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 10-->

      <tr id="zona10" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa10" disabled class="form-control" required onClick="depEmpresa10(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa10" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 11-->

      <tr id="zona11" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa11"  required class="form-control" disabled onClick="depEmpresa11(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa11" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 12-->

      <tr id="zona12" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa12" required class="form-control" disabled onClick="depEmpresa12(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa12" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value=" ">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 13-->

      <tr id="zona13" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa13" disabled class="form-control" required onClick="depEmpresa13(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa13" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 14-->

      <tr id="zona14" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa14"  required class="form-control" disabled onClick="depEmpresa14(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa14" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 15-->

      <tr id="zona15" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa15" required class="form-control" disabled onClick="depEmpresa15(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
     <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa15" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 16-->

      <tr id="zona16" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa16" required class="form-control" disabled onClick="depEmpresa16(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa16" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 17-->

      <tr id="zona17" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa17" disabled class="form-control" required onClick="depEmpresa17(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa17" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 18-->

      <tr id="zona18" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa18" required class="form-control" disabled onClick="depEmpresa18(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa18" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 19-->

      <tr id="zona19" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa19" disabled class="form-control" required onClick="depEmpresa19(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa19" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 20-->

      <tr id="zona20" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa20" disabled class="form-control" required onClick="depEmpresa20(this)" >
      <?php echo $opciones; ?>
      </select>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa20" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 21-->

      <tr id="zona21" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa21" disabled class="form-control" required onClick="depEmpresa21(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa21" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 22-->

      <tr id="zona22" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa22" required class="form-control" disabled onClick="depEmpresa22(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa22" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 23-->

      <tr id="zona23" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa23" required class="form-control" disabled onClick="depEmpresa23(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa23" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 24-->

      <tr id="zona24" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa24"  required class="form-control" disabled onClick="depEmpresa24(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa24" class="selects, form-control"  required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 25-->

      <tr id="zona25" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa25" disabled class="form-control" required onClick="depEmpresa25(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa25" class="selects, form-control"  required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 26-->

      <tr id="zona26" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa26" required class="form-control" disabled onClick="depEmpresa26(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa26" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 27-->

      <tr id="zona27" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa27" required class="form-control" disabled onClick="depEmpresa27(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa27" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 28-->

      <tr id="zona28" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa28" required class="form-control" disabled onClick="depEmpresa28(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa28" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 29-->

      <tr id="zona29" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa29" disabled class="form-control" required onClick="depEmpresa29(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa29" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select></p>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>

        <!---ZONA 30-->

      <tr id="zona30" style="display:none">
      <td style="width: 17%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsdeptempresa30" required class="form-control" disabled onClick="depEmpresa30(this)" >
      <?php echo $opciones; ?>
      </select></p>
      </td>
      
      <td style="width: 15%; text-align: center"><p style="font-family: Verdana;">
      <select id="lsmunicempresa30" class="selects, form-control" required disabled name="lsmunicempresa[]" >
      <option value="">Elija un municipio</option>
      </select>
      </td>
      
      <td style="width: 11%; text-align: center"></td>
      </tr>
      </table>
</div>
</center>

<br>

<!-- Button -->
<div class="form-group, container">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4" style="margin: 0 auto" align="center">
    <button name="singlebutton" class="btn btn-primary" type="submit"><strong>Registrar Consultoria</strong></button>
  </div>
</div>

        </form>
	
   </body>
 </html>

