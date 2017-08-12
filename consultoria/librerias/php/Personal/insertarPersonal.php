
<?php
$con = new PDO('sqlsrv:server=localhost; Database=PlanSv', 'sa', '123');
include('../../../conexion/conexion.php');


$Nombres=$_POST["txtNombre"];
$Apellidos=$_POST["txtApellido"];
$email=$_POST["txtEmail"];
$Estado=1;
$CodigoOficina=$_POST["lsOficina"];
$Username=$_POST["txtUsername"];
$password=$_POST["txtPassword"];
$CodigoAcceso=$_POST["lsAcceso"];
$Cargo=$_POST["txtCargo"];

$codSub=$_POST["lsSub"];
$consulta = "insert into Personal
(
Nombres,
Apellidos,
email,
Estado,
CodigoOficina,
Username,
password,
CodigoAcceso,
Cargo
)

 VALUES 
 (
:P_Nombres,
:P_Apellidos,
:P_email,
:P_Estado,
:P_CodigoOficina,
:P_Username,
:P_password,
:P_CodigoAcceso,
:P_Cargo
)";

$stmt = $con->prepare($consulta);
$stmt->bindParam(':P_Nombres', $Nombres, PDO::PARAM_INT);
$stmt->bindParam(':P_Apellidos', $Apellidos, PDO::PARAM_INT);
$stmt->bindParam(':P_email', $email, PDO::PARAM_INT);
$stmt->bindParam(':P_Estado', $Estado, PDO::PARAM_INT);
$stmt->bindParam(':P_CodigoOficina', $CodigoOficina, PDO::PARAM_INT);
$stmt->bindParam(':P_Username', $Username, PDO::PARAM_INT);
$stmt->bindParam(':P_password', $password, PDO::PARAM_INT);
$stmt->bindParam(':P_CodigoAcceso', $CodigoAcceso, PDO::PARAM_INT);
$stmt->bindParam(':P_Cargo', $Cargo, PDO::PARAM_INT);
$stmt->execute();	

//obteniendo el id
$lastId = $con->lastInsertId();


//registrando en detalle de empresa

$codSub=$_POST["lsSub"];
print_r($codSub);
$consulta="";
$contador=0;

foreach	($codSub as $valor)
{

try
{
$params = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valor, SQLSRV_PARAM_IN));
$consulta = sqlsrv_query($conexion, '{CALL spInsertarDPersonal(?,?)}', 
	$params);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contador++;

}

header("Location:../../../principal.php?p=12");		

?>