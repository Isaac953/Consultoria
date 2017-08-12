<?php

   $user = $_POST['user'];

   $password = $_POST['password'];

 

 if (($user == "alfre") AND ($password == "123"))
  {

      header('Location: inicio.php');

   } 

else if (($user == "isaac") AND ($password == "123")) 
{
      header('Location: inicio.php');

}

else if (($user == "walter") AND ($password == "123")) 
{
      header('Location: inicio.php');

}

else if (($user == "evaluador") AND ($password == "123")) 
{
      header('Location: evaluadores.php');

}


   else {

      echo "¡Usuario o contraseña incorrectos!";

      echo '<br><a href="'.$_SERVER['HTTP_REFERER'].'">Volver</a>';

   }

?>
