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


//variable para el contador
var contadorElemento=2; 
function incrementareElemento()
 {
if(contadorElemento==2) 
  document.getElementById('trpep2').style.visibility = "visible";

document.getElementById('txt_Eproyect2').style.visibility = "visible";
document.getElementById('txt_Ecentro').style.visibility = "visible";
document.getElementById('txt_Eprograma').style.visibility = "visible";
document.getElementById('txt_Eproduc').style.visibility = "visible";
document.getElementById('txt_Eactivi').style.visibility = "visible";
document.getElementById('txt_Ecosto').style.visibility = "visible";
document.getElementById('txt_EcuentaMay').style.visibility = "visible";
document.getElementById('txt_Egrupo_art').style.visibility = "visible";


document.getElementById('txt_Eproyect2').disabled=false;
document.getElementById('txt_Ecentro').disabled=false;
document.getElementById('txt_Eprograma').disabled=false;
document.getElementById('txt_Eproduc').disabled=false;
document.getElementById('txt_Eactivi').disabled=false;
document.getElementById('txt_Ecosto').disabled=false;
document.getElementById('txt_EcuentaMay').disabled=false;
document.getElementById('txt_Egrupo_art').disabled=false;

if(contadorElemento==3) 
alert('Maximo permitido alcanzado: 2'); 

else
{
document.operacion.caja2.value= contadorElemento++; 
}
}

function decrementarElemento()
{ 
if(contadorElemento==2) 
{
alert('Almenos debe haber un elemento PEP: 1'); 

}
else 
{ 
document.operacion.caja2.value= contadorElemento--; 
if(contadorElemento==4) 
  //document.getElementById('txt_Eproyect2').disabled=true;
document.getElementById('txt_Ecentro').disabled=true;
document.getElementById('txt_Eprograma').disabled=true;
document.getElementById('txt_Eproduc').disabled=true;
document.getElementById('txt_Eactivi').disabled=true;
document.getElementById('txt_Ecosto').disabled=true;
document.getElementById('txt_EcuentaMay').disabled=true;
document.getElementById('txt_Egrupo_art').disabled=true;

document.getElementById('trpep2').style.visibility = "hidden";
document.getElementById('txt_Eproyect2').style.visibility = "hidden";
document.getElementById('txt_Ecentro').style.visibility = "hidden";
document.getElementById('txt_Eprograma').style.visibility = "hidden";
document.getElementById('txt_Eproduc').style.visibility = "hidden";
document.getElementById('txt_Eactivi').style.visibility = "hidden";
document.getElementById('txt_Ecosto').style.visibility = "hidden";
document.getElementById('txt_EcuentaMay').style.visibility = "hidden";
document.getElementById('txt_Egrupo_art').style.visibility = "hidden";
}
} 

var contadorProducto=2; 
function incrementarProducto()
 {
if(contadorProducto==2) 
document.getElementById('trproducto2').style.visibility = "visible";

document.getElementById('txtNombProducto2').style.visibility = "visible";
document.getElementById('txtDesembolso2').style.visibility = "visible";
document.getElementById('txtFechaPlanificada2').style.visibility = "visible";
document.getElementById('Cdesembolso2').style.visibility = "visible";

document.getElementById('txtNombProducto2').disabled=false;
document.getElementById('txtDesembolso2').disabled=false;
document.getElementById('txtFechaPlanificada2').disabled=false;
document.getElementById('Cdesembolso2').disabled=false;

if(contadorProducto==3) 
document.getElementById('trproducto3').style.visibility = "visible";
if(contadorProducto==3) 
document.getElementById('txtNombProducto3').style.visibility = "visible";
if(contadorProducto==3) 
document.getElementById('txtDesembolso3').style.visibility = "visible";
if(contadorProducto==3) 
document.getElementById('txtFechaPlanificada3').style.visibility = "visible";
if(contadorProducto==3) 
document.getElementById('Cdesembolso3').style.visibility = "visible";
if(contadorProducto==3) 
document.getElementById('txtNombProducto3').disabled=false;
document.getElementById('txtDesembolso3').disabled=false;
document.getElementById('txtFechaPlanificada3').disabled=false;
document.getElementById('Cdesembolso3').disabled=false;

if(contadorProducto==4) 
alert('Maximo permitido alcanzado: 2'); 

else
{
document.operacion.caja3.value= contadorProducto++; 
}
}

function decrementarProducto()
{ 
if(contadorProducto==2) 
{
alert('Almenos debe haber un elemento Producto: 1'); 

}
else 
{ 
document.operacion.caja3.value= contadorProducto--; 
if(contadorProducto==3) 
document.getElementById('txtNombProducto3').disabled=true;
document.getElementById('txtDesembolso3').disabled=true;
document.getElementById('txtFechaPlanificada3').disabled=true;
document.getElementById('Cdesembolso3').disabled=true;

document.getElementById('trproducto3').style.visibility = "hidden";

document.getElementById('txtNombProducto3').style.visibility = "hidden";
document.getElementById('txtDesembolso3').style.visibility = "hidden";
document.getElementById('txtFechaPlanificada3').style.visibility = "hidden";
document.getElementById('Cdesembolso3').style.visibility = "hidden";

if(contadorProducto==2) 
  document.getElementById('trproducto2').style.visibility = "hidden";
if(contadorProducto==2) 
  document.getElementById('txtNombProducto2').disabled=true;
if(contadorProducto==2) 
  document.getElementById('txtDesembolso2').disabled=true;
if(contadorProducto==2) 
  document.getElementById('txtFechaPlanificada2').disabled=true;
if(contadorProducto==2) 
  document.getElementById('Cdesembolso2').disabled=true;

if(contadorProducto==2) 
  document.getElementById('txtNombProducto2').style.visibility = "hidden";
if(contadorProducto==2) 
  document.getElementById('txtDesembolso2').style.visibility = "hidden";
if(contadorProducto==2) 
  document.getElementById('txtFechaPlanificada2').style.visibility = "hidden";
if(contadorProducto==2) 
  document.getElementById('Cdesembolso2').style.visibility = "hidden";
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
