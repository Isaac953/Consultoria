<?php
/* Database connection start */
$usuario='sa';
$pass='C0nsult0ri4';
$servidor='AMSVSLVSQL1\CONSULTORIA';
$basedatos='PlanSv';
 $info = array('Database'=>$basedatos, 'UID'=>$usuario, 'PWD'=>$pass, "CharacterSet"=>"UTF-8");
 $conexion = sqlsrv_connect($servidor, $info);

?>