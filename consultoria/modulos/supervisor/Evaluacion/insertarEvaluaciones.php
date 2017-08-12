
<?php
include('conexion.php');

echo "holaa";

/*
$idContrato=$_POST["txtIdContrato"];
$idParam=$_POST["parametro"];
$puntaje=$_POST["puntaje"];
//$fecha="";
$idUser=$_POST["txtIdUsuario"];

$consulta="";
$contador=0;

foreach	($idParam as $valor)
{

try
{
$params = array( 
array($idContrato, SQLSRV_PARAM_IN),
array($valor, SQLSRV_PARAM_IN),
array($puntaje[$contador], SQLSRV_PARAM_IN),
array($idUser, SQLSRV_PARAM_IN));
$consulta = sqlsrv_query($conexion, '{CALL spInsertarEvalConsultoria(?,?,?,?)}', 
	$params);

}
catch(Exception $e)
{
	throw new $e;
}

//fin de la insercion
$contador++;

}

header("Location:../../../principal.php");
*/

?>