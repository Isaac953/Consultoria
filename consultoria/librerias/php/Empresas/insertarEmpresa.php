<?php
include '../../../conexion/conexion.php';
$con = new PDO('sqlsrv:server=localhost; Database=PlanSv', 'sa', '123');

 	$nombrempresa=$_POST["nombrempresa"];
 	$direccion=$_POST["direccionEmpresa"];
 	$nitEmpresa=$_POST["nitEmpresa"];
 	$duiEmpresa=$_POST["duiEmpresa"];
 	$tipo=$_POST["tipo"];
 	$estado=1;
 	$regIva=$_POST["regIva"];
 	$nomRep=$_POST["nomRep"];
 	$apellRep=$_POST["apellRep"];
 	$tel=$_POST["tel"];
 	$telMovil=$_POST["telMovil"];
 	$fanPage=$_POST["fanPage"];
 	$email=$_POST["email"];
 	$lsMunic=$_POST["lsMunicEmpresa"];
 	$lsPais=$_POST["lsPais"];

$consulta = "insert into EmpresaPersona
(
NombreEmpresa,
Direccion,
Nit,
Dui,
Tipo,
Estado,
RegistroIva,
NombresRepresentante,
ApellidosRepresentante,
Telefono,
celular,
paginaWeb,
Email,
CodigoMunicipio,
CodigoPais
)

 VALUES 
 (
:P_NombreEmpresa,
:P_Direccion,
:P_Nit,
:P_Dui,
:P_Tipo,
:P_Estado,
:P_RegistroIva,
:P_NombresRepresentante,
:P_ApellidosRepresentante,
:P_Telefono,
:P_celular,
:P_paginaWeb,
:P_Email,
:P_CodigoMunicipio,
:P_CodigoPais
)";

$stmt = $con->prepare($consulta);
$stmt->bindParam(':P_NombreEmpresa', $nombrempresa, PDO::PARAM_INT);
$stmt->bindParam(':P_Direccion', $direccion, PDO::PARAM_INT);
$stmt->bindParam(':P_Nit', $nitEmpresa, PDO::PARAM_INT);
$stmt->bindParam(':P_Dui', $duiEmpresa, PDO::PARAM_INT);
$stmt->bindParam(':P_Tipo', $tipo, PDO::PARAM_INT);
$stmt->bindParam(':P_Estado', $estado, PDO::PARAM_INT);
$stmt->bindParam(':P_RegistroIva', $regIva, PDO::PARAM_INT);
$stmt->bindParam(':P_NombresRepresentante', $nomRep, PDO::PARAM_INT);
$stmt->bindParam(':P_ApellidosRepresentante', $apellRep, PDO::PARAM_INT);
$stmt->bindParam(':P_Telefono', $tel, PDO::PARAM_INT);
$stmt->bindParam(':P_celular', $telMovil, PDO::PARAM_INT);
$stmt->bindParam(':P_paginaWeb', $fanPage, PDO::PARAM_INT);
$stmt->bindParam(':P_Email', $email, PDO::PARAM_INT);
$stmt->bindParam(':P_CodigoMunicipio', $lsMunic, PDO::PARAM_INT);
$stmt->bindParam(':P_CodigoPais', $lsPais, PDO::PARAM_INT);

$stmt->execute();
$lastId = $con->lastInsertId();

//header("Location:../../../principal.php");	


$codSub=$_POST["lsSub"];
$consultaD="";
$contador=0;

foreach	($codSub as $valor)
{

try
{
$params = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valor, SQLSRV_PARAM_IN));
$consultaD = sqlsrv_query($conexion, '{CALL spInsertarDetalleEmpresa(?,?)}', 
	$params);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contador++;

}


$nombreConsult=$_POST["nombre"];
$apellidoConsult=$_POST["apellido"];
$direccionConsultor=$_POST["direccionConsultor"];
$nit=$_POST["nit"];
$dui=$_POST["dui"];
$lsPaisConsult=$_POST["lsPaisConsult"];
$lsMunic=$_POST["lsMunic"];
$nac=$_POST["nac"];
$telefonoConsultor=$_POST["telefonoConsultor"];
$emailConsultor=$_POST["emailConsultor"];
$estadoC=1;

$consultaC="";
$contadorC=0;

foreach	($nombreConsult as $valorC)
{

try
{
$paramsC = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valorC, SQLSRV_PARAM_IN),
array($apellidoConsult[$contadorC], SQLSRV_PARAM_IN),
array($direccionConsultor[$contadorC], SQLSRV_PARAM_IN),
array($nit[$contadorC], SQLSRV_PARAM_IN),
array($dui[$contadorC], SQLSRV_PARAM_IN),
array($lsPaisConsult[$contadorC], SQLSRV_PARAM_IN),
array($lsMunic[$contadorC], SQLSRV_PARAM_IN),
array($nac[$contadorC], SQLSRV_PARAM_IN),
array($telefonoConsultor[$contadorC], SQLSRV_PARAM_IN),
array($emailConsultor[$contadorC], SQLSRV_PARAM_IN),
array($estadoC, SQLSRV_PARAM_IN),);
$consultaC = sqlsrv_query($conexion, '{CALL spInsertarConsultores(?,?,?,?,?,?,?,?,?,?,?,?)}', 
	$paramsC);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorC++;

}

header("Location:../../../principal.php?p=7");		


?>