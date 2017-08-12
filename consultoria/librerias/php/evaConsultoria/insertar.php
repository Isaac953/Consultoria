
<?php
include('../../../conexion/conexion.php');

$idContrato=$_POST["txtIdContrato"];

//obteniendo el id de la consultoria
$query="Select  C.Codigoconsultoria from Contrato C, Consultoria Cs where C.Codigoconsultoria=Cs.Codigoconsultoria and C.CodigoContrato = '$idContrato'";
$resultadoConsultoria=sqlsrv_query($conexion,$query);
$cont=sqlsrv_fetch_array($resultadoConsultoria,SQLSRV_FETCH_ASSOC);

//LOGICA PARA LOS COMENTARIOS
$comentario=$_POST["txtcomentario"];
//ID CONSULTORIA
$idconsultoria=$cont["Codigoconsultoria"];
//TIPO
$tipo="Evaluacion Consultoria";
$paramsC = array( array($comentario, SQLSRV_PARAM_IN), array($tipo, SQLSRV_PARAM_IN), array($idconsultoria, SQLSRV_PARAM_IN));
$consultaC = sqlsrv_query($conexion, '{CALL sp_InsertarComentario(?,?,?)}', $paramsC);
/*TERMINA LOS COMENTARIOS*/





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

header("Location:../../../principal.php?p=19");


?>