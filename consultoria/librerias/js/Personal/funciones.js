
function area1()
{
        $(document).ready(function(){
        $("#lsAreas").change(function()
        {
          $.ajax({
            url:"librerias/php/Personal/procesar.php",
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
            url:"librerias/php/Personal/procesar.php",
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
            url:"librerias/php/Personal/procesar.php",
            type: "POST",
            data:"idArea3="+$("#lsAreas3").val(),
            success: function(opciones){
              $("#lsSub3").html(opciones);
            }
          })
        });
      });
}



/*
 EJEMPLO CONTROLANDO EL CHECKBOX
//para mostrar las areas
function mostrarArea2()
 {
if(document.getElementById('chkArea2').checked) {
document.getElementById('lsSub2').style.visibility = "visible";
document.getElementById('lsSub2').disabled=false;

} 
else 
{
document.getElementById('lsSub2').style.visibility = "hidden";
}
}
*/


