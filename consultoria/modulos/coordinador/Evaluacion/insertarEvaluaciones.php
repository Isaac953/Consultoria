
<?php
include('conexion.php');
/*
para las fechas
*/
date_default_timezone_set('America/El_Salvador');
$fech = date("Y:m:d  H:i:s");

$codOferta=$_POST["codOferta"];
$idParam=$_POST["parametro"];
$puntaje=$_POST["puntaje"];
//$fecha="";
$codAsignacion=$_POST["codAsignacion"];

$consulta="";
$contador=0;

foreach	($idParam as $valor)
{

try
{
$params = array( 
array($codOferta, SQLSRV_PARAM_IN),
array($valor, SQLSRV_PARAM_IN),
array($puntaje[$contador], SQLSRV_PARAM_IN),
array($codAsignacion, SQLSRV_PARAM_IN));
$consulta = sqlsrv_query($conexion, '{CALL spInsertarEvalOfertas(?,?,?,?)}', 
	$params);

}
catch(Exception $e)
{
	throw new $e;
}

//fin de la insercion
$contador++;

}

header("Location:evaluacion_ofertas.php");


?>