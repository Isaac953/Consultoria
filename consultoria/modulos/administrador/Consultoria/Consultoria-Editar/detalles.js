




//variable para el contador
var contadorArea=2; 
function incrementar()
 {

if(contadorArea==2) 
document.getElementById('lsAreas2').style.visibility = "visible";
document.getElementById('lsSub2').style.visibility = "visible";
document.getElementById('lsAreas2').disabled=false;
document.getElementById('lsSub2').disabled=false;
document.getElementById('trarea2').style.visibility = "visible";


if(contadorArea==3) 
document.getElementById('lsAreas3').disabled=false;

if(contadorArea==3) 
document.getElementById('trarea3').style.visibility = "visible";


if(contadorArea==3) 
document.getElementById('lsAreas3').style.visibility = "visible";
document.getElementById('lsSub3').disabled=false;

if(contadorArea==3) 
document.getElementById('lsSub3').style.visibility = "visible";

if(contadorArea==4) 
document.getElementById('lsAreas4').disabled=false;

if(contadorArea==4) 
document.getElementById('lsAreas4').style.visibility = "visible";
document.getElementById('lsSub4').disabled=false;

if(contadorArea==4) 
document.getElementById('trarea4').style.visibility = "visible";

if(contadorArea==4) 
document.getElementById('lsSub4').style.visibility = "visible";


if(contadorArea==5) 
document.getElementById('lsAreas5').disabled=false;

if(contadorArea==5) 
document.getElementById('lsAreas5').style.visibility = "visible";
document.getElementById('lsSub5').disabled=false;

if(contadorArea==5) 
document.getElementById('trarea5').style.visibility = "visible";

if(contadorArea==5) 
document.getElementById('lsSub5').style.visibility = "visible";

if(contadorArea==6) 
alert('Maximo permitido alcanzado: 4'); 

else
{
document.operacion.caja.value= contadorArea++; 
}
}

function decrementar()
{ 
if(contadorArea==2) 
{
alert('Almenos debe pertenecer a una ÁREA: 1'); 

}
else 
{ 
document.operacion.caja.value= contadorArea--; 
if(contadorArea==4) 
document.getElementById('lsAreas4').disabled=true;
document.getElementById('lsSub4').disabled=true;
document.getElementById('lsAreas4').style.visibility = "hidden";
document.getElementById('lsSub4').style.visibility = "hidden";
document.getElementById('trarea4').style.visibility = "hidden";


if(contadorArea==3) 
document.getElementById('lsAreas3').disabled=true;
if(contadorArea==3) 
document.getElementById('lsSub3').disabled=true;
if(contadorArea==3) 
document.getElementById('lsAreas3').style.visibility = "hidden";
if(contadorArea==3) 
document.getElementById('lsSub3').style.visibility = "hidden";

if(contadorArea==3) 
document.getElementById('trarea3').style.visibility = "hidden";


if(contadorArea==2) 
document.getElementById('lsAreas2').disabled=true;

if(contadorArea==2) 
document.getElementById('lsSub2').disabled=true;

if(contadorArea==2) 
document.getElementById('lsAreas2').style.visibility = "hidden";

if(contadorArea==2) 
document.getElementById('lsSub2').style.visibility = "hidden";
if(contadorArea==2) 
document.getElementById('trarea2').style.visibility = "hidden";
}
} 




















//CODIGO PARA LA ZONA DE TRABAJO 

var contadorZona=2; 
function incrementarZona()
 {
if(contadorZona==2) 
document.getElementById('lugares2').style.visibility = "visible";
document.getElementById('lsdeptempresa2').style.visibility = "visible";
document.getElementById('lsmunicempresa2').style.visibility = "visible";
document.getElementById('txtNumComuni2').style.visibility = "visible";
document.getElementById('txtNumFami2').style.visibility = "visible";

document.getElementById('lsdeptempresa2').disabled=false;
document.getElementById('lsmunicempresa2').disabled=false;
document.getElementById('txtNumComuni2').disabled=false;
document.getElementById('txtNumFami2').disabled=false;

if(contadorZona==3) 
document.getElementById('lugares3').style.visibility = "visible";
if(contadorZona==3) 
document.getElementById('lsdeptempresa3').style.visibility = "visible";
if(contadorZona==3) 
document.getElementById('lsmunicempresa3').style.visibility = "visible";
if(contadorZona==3) 
document.getElementById('txtNumComuni3').style.visibility = "visible";
if(contadorZona==3) 
document.getElementById('txtNumFami3').style.visibility = "visible";

document.getElementById('lsdeptempresa3').disabled=false;
document.getElementById('lsmunicempresa3').disabled=false;
document.getElementById('txtNumComuni3').disabled=false;
document.getElementById('txtNumFami3').disabled=false;

if(contadorZona==4) 
alert('Maximo permitido alcanzado: 2'); 

else
{
document.operacion.caja4.value= contadorZona++; 
}
}

function decrementarZona()
{ 
if(contadorZona==2) 
{
alert('Almenos debe haber una Zona: 1'); 

}
else 
{ 
document.operacion.caja4.value= contadorZona--; 
if(contadorZona==3) 
document.getElementById('lsdeptempresa3').disabled=true;
document.getElementById('lsmunicempresa3').disabled=true;
document.getElementById('txtNumComuni3').disabled=true;
document.getElementById('txtNumFami3').disabled=true;

document.getElementById('lugares3').style.visibility = "hidden";

document.getElementById('lsdeptempresa3').style.visibility = "hidden";
document.getElementById('lsmunicempresa3').style.visibility = "hidden";
document.getElementById('txtNumComuni3').style.visibility = "hidden";
document.getElementById('txtNumFami3').style.visibility = "hidden";

/*para ocultar si el contador llega a dos*/

if(contadorZona==2) 
  document.getElementById('lugares2').style.visibility = "hidden";
if(contadorZona==2) 
  document.getElementById('lsmunicempresa2').style.visibility = "hidden";
if(contadorZona==2) 
  document.getElementById('lsdeptempresa2').style.visibility = "hidden";
if(contadorZona==2) 
  document.getElementById('txtNumComuni2').style.visibility = "hidden";
if(contadorZona==2) 
  document.getElementById('txtNumFami2').style.visibility = "hidden";
if(contadorZona==2) 
document.getElementById('lsdeptempresa2').disabled=true;
if(contadorZona==2) 
document.getElementById('lsmunicempresa2').disabled=true;
if(contadorZona==2) 
document.getElementById('txtNumComuni2').disabled=true;
if(contadorZona==2) 
document.getElementById('txtNumFami2').disabled=true;

}
} 
