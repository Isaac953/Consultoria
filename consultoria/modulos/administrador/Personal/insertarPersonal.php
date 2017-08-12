
<?php
$con = new PDO('sqlsrv:server=AMSVSLVSQL1\CONSULTORIA; Database=PlanSv', 'sa', 'C0nsult0ri4');
include('conexion.php');


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
/*
$stmt = $con->prepare("CALL sp_InsertarPersonal(:P_Nombres,:P_Apellidos,:P_email,:P_Estado,:P_CodigoOficina,:P_Username,:P_password,:P_CodigoAcceso,:P_Car)");
//$sentencia->bindParam(1, $valor_devuleto, PDO::PARAM_STR, 4000); 

//$stmt = $con->prepare($consulta);
$stmt->bindParam(':P_Nombres', $Nombres, PDO::PARAM_INT);
$stmt->bindParam(':P_Apellidos', $Apellidos, PDO::PARAM_INT);
$stmt->bindParam(':P_email', $email, PDO::PARAM_INT);
$stmt->bindParam(':P_Estado', $Estado, PDO::PARAM_INT);
$stmt->bindParam(':P_CodigoOficina', $CodigoOficina, PDO::PARAM_INT);
$stmt->bindParam(':P_Username', $Username, PDO::PARAM_INT);
$stmt->bindParam(':P_password', $password, PDO::PARAM_INT);
$stmt->bindParam(':P_CodigoAcceso', $CodigoAcceso, PDO::PARAM_INT);
$stmt->bindParam(':P_Car', $Cargo, PDO::PARAM_INT);
$stmt->execute();
*/

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
Car
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
:P_Car
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
$stmt->bindParam(':P_Car', $Cargo, PDO::PARAM_INT);
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

header("Location:Personal.php");


?>