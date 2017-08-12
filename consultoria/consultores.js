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