<?php

//CONEXION
$usuario='sa';
$pass='123';
$servidor='localhost';
$basedatos='PlanSv';
 $info = array('Database'=>$basedatos, 'UID'=>$usuario, 'PWD'=>$pass, "CharacterSet"=>"UTF-8");
 $conexion = sqlsrv_connect($servidor, $info);

//FIN DE CONEXION

?>
