
<?php
include('../../../conexion/conexion.php');

$codOferta=$_POST["codOferta"];
$idParam=$_POST["parametro"];
$puntaje=$_POST["puntaje"];
$codAsignacion=$_POST["codAsignacion"];

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

header("Location:../../../principal.php?p=15");


/*$idParam=$_POST["idparam"];
$puntaje=$_POST["puntaje"];
print_r($idParam);
echo "<br>";
print_r($puntaje);
*/

?>