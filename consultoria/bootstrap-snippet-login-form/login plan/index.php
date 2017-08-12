<!DOCTYPE HTML>

<?php
session_start();
session_destroy();
?>
<html>

   <head>
      <meta charset="utf-8">


      <title>Login</title>

      <link rel="stylesheet" type="text/css" href="librerias/css/disenio/estilos.css">

   </head>

   <body>
      <table align="center">

<tr>
<td><img src="librerias/images/header.jpg" width="100%" height="200px"/>
</td>
</tr>
      </table>

      <div id="login">

         <form action= "librerias/php/login/sp_login.php" method="post">

            <label>Usuario: </label>

            <input type="text" name="user" required="true" /><br>

            <label>Contraseña: </label>

          <input type="password" name="password" required="true" /><br><br>

         <input type="submit" value="Iniciar Sesion"/>

         </form>

      </div>

   </body>

</html>