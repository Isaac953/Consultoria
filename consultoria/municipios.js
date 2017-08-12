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

  function depEmpresa1()
 {
 $(document).ready(function(){
        $("#depto").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento1="+$("#depto").val(),
            success: function(opciones){
              $("#munic").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa2()
 {
 $(document).ready(function(){
        $("#depto2").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento2="+$("#depto2").val(),
            success: function(opciones){
              $("#munic2").html(opciones);
            }
          })
        });
      });
 }

 function depEmpresa3()
 {
 $(document).ready(function(){
        $("#depto3").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento3="+$("#depto3").val(),
            success: function(opciones){
              $("#munic3").html(opciones);
            }
          })
        });
      });
 }

 function depEmpresa4()
 {
 $(document).ready(function(){
        $("#depto4").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento4="+$("#depto4").val(),
            success: function(opciones){
              $("#munic4").html(opciones);
            }
          })
        });
      });
 }

  function depEmpresa5()
 {
 $(document).ready(function(){
        $("#depto5").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento5="+$("#depto5").val(),
            success: function(opciones){
              $("#munic5").html(opciones);
            }
          })
        });
      });
 }


  function depEmpresa6()
 {
 $(document).ready(function(){
        $("#depto6").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento6="+$("#depto6").val(),
            success: function(opciones){
              $("#munic6").html(opciones);
            }
          })
        });
      });
 }


  function depEmpresa7()
 {
 $(document).ready(function(){
        $("#depto7").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento7="+$("#depto7").val(),
            success: function(opciones){
              $("#munic7").html(opciones);
            }
          })
        });
      });
 }


   function depEmpresa8()
 {
 $(document).ready(function(){
        $("#depto8").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento8="+$("#depto8").val(),
            success: function(opciones){
              $("#munic8").html(opciones);
            }
          })
        });
      });
 }

    function depEmpresa9()
 {
 $(document).ready(function(){
        $("#depto9").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento9="+$("#depto9").val(),
            success: function(opciones){
              $("#munic9").html(opciones);
            }
          })
        });
      });
 }

     function depEmpresa10()
 {
 $(document).ready(function(){
        $("#depto10").change(function()
        {
          $.ajax({
            url:"procesaMunicipios.php",
            type: "POST",
            data:"idDepartamento10="+$("#depto10").val(),
            success: function(opciones){
              $("#munic10").html(opciones);
            }
          })
        });
      });
 }