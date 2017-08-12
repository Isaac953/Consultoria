<?php 
include ('../../../conexion/conexion.php');


//ID CONTRATO
$codcontr=$_POST["txtIdContrato"];


//obteniendo el id de la consultoria
$query="Select  C.Codigoconsultoria from Contrato C, Consultoria Cs where C.Codigoconsultoria=Cs.Codigoconsultoria and C.CodigoContrato = '$codcontr'";
$resultadoConsultoria=sqlsrv_query($conexion,$query);
$cont=sqlsrv_fetch_array($resultadoConsultoria,SQLSRV_FETCH_ASSOC);


/*echo "codigo contrato: ".$codcontr;
echo "<br>codigo consultoria: ".$idconsultoria;
echo "<br>codigo personal: ".$codper;
echo "<br>comentario: ".$comentario;
*/

//LOGICA PARA LOS COMENTARIOS
$comentario=$_POST["txtcomentario"];
//ID CONSULTORIA
$idconsultoria=$cont["Codigoconsultoria"];
//TIPO
$tipo="Evaluacion Consultores";
$params = array( array($comentario, SQLSRV_PARAM_IN), array($tipo, SQLSRV_PARAM_IN), array($idconsultoria, SQLSRV_PARAM_IN));
$consulta = sqlsrv_query($conexion, '{CALL sp_InsertarComentario(?,?,?)}', $params);
/*TERMINA LOS COMENTARIOS*/


/*LOGICA PARA INSERTAR EVALUACIONES DE CONSULTORES*/
//ID PERSONAL
$codper=$_POST["txtUsuario"];
//ID CONSULTORES
$codconsultor=$_POST["txtIdConsultor"];

//RESULTADO
$result=$_POST["lsresultado"];
$consultaC="";
$contador=0;

foreach ($codconsultor as $valor)
{

try
{
$paramsc = array( 
array($valor, SQLSRV_PARAM_IN),
array($codcontr, SQLSRV_PARAM_IN),
array($result[$contador], SQLSRV_PARAM_IN),
array($codper, SQLSRV_PARAM_IN)
);
$consultaC = sqlsrv_query($conexion, '{CALL spInsertarEvalConsultor(?,?,?,?)}', 
  $paramsc);

}
catch(Exception $e)
{
  throw new $e;
  }

//fin de la insercion
$contador++;

}

header("Location:../../../principal.php?p=22");

 ?>