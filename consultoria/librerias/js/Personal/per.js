
//variable para el contador
var contador=2; 

function incrementar()
 {
if(contador==2) 
document.getElementById('tr2').style.display = "block";
document.getElementById('lsAreas2').style.visibility = "visible";
document.getElementById('lsSub2').style.visibility = "visible";
document.getElementById('lsAreas2').disabled=false;
document.getElementById('lsSub2').disabled=false;

if(contador==3) 
document.getElementById('tr3').style.display = "block";
if(contador==3) 
document.getElementById('lsAreas3').disabled=false;

if(contador==3) 
document.getElementById('lsAreas3').style.visibility = "visible";
document.getElementById('lsSub3').disabled=false;

if(contador==3) 
document.getElementById('lsSub3').style.visibility = "visible";

if(contador==4) 
document.getElementById('tr4').style.display = "block";

if(contador==4) 
document.getElementById('lsAreas4').disabled=false;

if(contador==4) 
document.getElementById('lsAreas4').style.visibility = "visible";
document.getElementById('lsSub4').disabled=false;

if(contador==4) 
document.getElementById('lsSub4').style.visibility = "visible";

if(contador==5) 
alert('Maximo permitido alcanzado: 4'); 

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
if(contador==4) 
document.getElementById('lsAreas4').disabled=true;
document.getElementById('lsSub4').disabled=true;
document.getElementById('lsAreas4').style.visibility = "hidden";
document.getElementById('lsSub4').style.visibility = "hidden";


if(contador==3) 
document.getElementById('lsAreas3').disabled=true;
if(contador==3) 
document.getElementById('lsSub3').disabled=true;
if(contador==3) 
document.getElementById('lsAreas3').style.visibility = "hidden";
if(contador==3) 
document.getElementById('lsSub3').style.visibility = "hidden";


if(contador==2) 
document.getElementById('lsAreas2').disabled=true;

if(contador==2) 
document.getElementById('lsSub2').disabled=true;

if(contador==2) 
document.getElementById('lsAreas2').style.visibility = "hidden";

if(contador==2) 
document.getElementById('lsSub2').style.visibility = "hidden";

}

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
