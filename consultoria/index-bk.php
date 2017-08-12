<!DOCTYPE html>
<html >
<?php
session_start();
session_destroy();
?>

<head>
  <meta charset="UTF-8">
  <title>Bienvenido al Sistema de Consultorias</title>
  
  
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

</head>

<body>

<table align="center">

<tr>
<td><center><img src="librerias/images/header.jpg" width="90%" height="200px"/></center>
</td>
</tr>
      </table>
<center>
    <div style="display: block; margin:0 auto;" class="container" align="center">
      <table class="table table-bordered" style="border: 3px solid #DCDCDC; width: 270px; height: 145px">
      <br>
    <form class="form-signin" action= "librerias/php/login/sp_login.php" method="post">
<tr>
      <th style="background-color: #0072bb"><strong><p style="color: white; font-family: Verdana; font-size: large; text-align: center;">Login</p></strong></th>
      </tr>
      
      <tr>

      <td align="center" style="height: 210px">
      
      <br>

      <input type="text" class="form-control" style="font-family: Verdana; font-weight: bold;" name="user" placeholder="Usuario" required="true" autofocus="" /> 
<br>

      <input type="password" class="form-control" style="font-family: Verdana; font-weight: bold;" name="password" placeholder="Contraseña" required="true"/>
      
      <br>

<center>
      <button class="btn btn-lg btn-primary btn-block" type="submit" style="font-family: Verdana; font: 14px verdana, sans-serif;  width: 50%;" ><strong>Iniciar Sesión</strong></button> </td></center>
      </tr>
      </table>
      <br>  
    </form>
  </div>
</center>  
  
</body>
</html>
