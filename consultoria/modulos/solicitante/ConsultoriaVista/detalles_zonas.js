
function depEmpresa()
 {
 $(document).ready(function(){
        $("#lsdeptempresa").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento="+$("#lsdeptempresa").val(),
            success: function(opciones){
              $("#lsmunicempresa").html(opciones);
            }
          })
        });
      });
 }

function depEmpresa2()
 {
 $(document).ready(function(){
        $("#lsdeptempresa2").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento2="+$("#lsdeptempresa2").val(),
            success: function(opciones){
              $("#lsmunicempresa2").html(opciones);
            }
          })
        });
      });
 }

function depEmpresa3()
 {
 $(document).ready(function(){
        $("#lsdeptempresa3").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento3="+$("#lsdeptempresa3").val(),
            success: function(opciones){
              $("#lsmunicempresa3").html(opciones);
            }
          })
        });
      });
 }


 function depEmpresa4()
 {
 $(document).ready(function(){
        $("#lsdeptempresa4").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento4="+$("#lsdeptempresa4").val(),
            success: function(opciones){
              $("#lsmunicempresa4").html(opciones);
            }
          })
        });
      });
 }

function depEmpresa5()
 {
 $(document).ready(function(){
        $("#lsdeptempresa5").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento5="+$("#lsdeptempresa5").val(),
            success: function(opciones){
              $("#lsmunicempresa5").html(opciones);
            }
          })
        });
      });
 }

 function depEmpresa6()
 {
 $(document).ready(function(){
        $("#lsdeptempresa6").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento6="+$("#lsdeptempresa6").val(),
            success: function(opciones){
              $("#lsmunicempresa6").html(opciones);
            }
          })
        });
      });
 }

 function depEmpresa7()
 {
 $(document).ready(function(){
        $("#lsdeptempresa7").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento7="+$("#lsdeptempresa7").val(),
            success: function(opciones){
              $("#lsmunicempresa7").html(opciones);
            }
          })
        });
      });
 }


 function depEmpresa8()
 {
 $(document).ready(function(){
        $("#lsdeptempresa8").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento8="+$("#lsdeptempresa8").val(),
            success: function(opciones){
              $("#lsmunicempresa8").html(opciones);
            }
          })
        });
      });
 }

 function depEmpresa9()
 {
 $(document).ready(function(){
        $("#lsdeptempresa9").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento9="+$("#lsdeptempresa9").val(),
            success: function(opciones){
              $("#lsmunicempresa9").html(opciones);
            }
          })
        });
      });
 }

 function depEmpresa10()
 {
 $(document).ready(function(){
        $("#lsdeptempresa10").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento10="+$("#lsdeptempresa10").val(),
            success: function(opciones){
              $("#lsmunicempresa10").html(opciones);
            }
          })
        });
      });
 }
