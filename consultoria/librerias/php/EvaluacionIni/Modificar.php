
<?php
include('../../../conexion/conexion.php');

$codEvalIni=$_POST["codEvalIni"];
//$idParam=$_POST["parametro"];
$puntaje=$_POST["puntaje"];

/*
echo $codOferta;
echo "<br>";
print_r($idParam);
echo "<br>";
print_r($puntaje);
echo "<br>";
echo $fecha;
echo "<br>";
echo $codAsignacion;
*/
$consulta="";
$contador=0;

foreach	($codEvalIni as $valor)
{

try
{
$params = array( 
array($valor, SQLSRV_PARAM_IN),
array($puntaje[$contador], SQLSRV_PARAM_IN));
$consulta = sqlsrv_query($conexion, '{CALL sp_ModificarEvalOfertas(?,?)}', 
	$params);

}
catch(Exception $e)
{
	throw new $e;
}

//fin de la insercion
$contador++;

}

header("Location:../../../principal.php?p=9");


/*$idParam=$_POST["idparam"];
$puntaje=$_POST["puntaje"];
print_r($idParam);
echo "<br>";
print_r($puntaje);
*/

?>