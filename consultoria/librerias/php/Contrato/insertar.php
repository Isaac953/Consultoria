<?php
include ('../../../conexion/conexion.php');
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');
header('Content-Type: text/html; charset=utf-8');

$con = new PDO('sqlsrv:server=AMSVSLVSQL1\CONSULTORIA; Database=PlanSv', 'sa', 'C0nsult0ri4');

//date_default_timezone_set('Etc/UTC');
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPDebug = 1;
//$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "consultoria.svplan@gmail.com";
$mail->Password = "C0nsult0ria";
$mail->setFrom('consultoria.svplan@gmail.com', 'Sistema de Gestion de Consultoría');

//$empresa=$_POST["lsEmpresa"];
$idempr=$_POST["id"];

$consultoria=$_POST["lsConsultoria"];
$fechainicio=$_POST["FechaInicio"];
$fechafin=$_POST["FechaFin"];
$estatus=1;
$montoofertado=$_POST["montoOfertado"];

$queryConsultoriaE="select p.email, p.Nombres, p.Apellidos, c.NombreConsultoria from Consultoria c, Personal p where c.CodigoPersonal=p.CodigoPersonal
and c.Codigoconsultoria = '$consultoria';"; 
$resultadoConsultoriaE=sqlsrv_query($conexion,$queryConsultoriaE);
$cons=sqlsrv_fetch_array($resultadoConsultoriaE,SQLSRV_FETCH_ASSOC);
$correo=$cons["email"];
$nomb=$cons["Nombres"];
$apelli=$cons["Apellidos"];
$nomcons=$cons["NombreConsultoria"];

$mail->addAddress($correo, 'prueba');
$mail->Subject = 'Nuevo Contrato';
$mail->msgHTML('<b>Estimado/Estimada</b>: <br>
<b>'.$nomb.' '.$apelli.'</b> Se ha Asignado un contrato a la Consultoria '.$nomcons.'');

$mail->send();


$paramsU = array( array($consultoria, SQLSRV_PARAM_IN));
            
$consultaUpdate = sqlsrv_query($conexion, '{CALL spModificarEstadoConsultoria(?)}', $paramsU);
            
			if( $consultaUpdate === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }


$consulta="";
$contador=0;

foreach	($idempr as $valor)
{

try
{
	//echo $valor;
	$params = array( array($valor, SQLSRV_PARAM_IN), array($consultoria, SQLSRV_PARAM_IN), array($fechainicio, SQLSRV_PARAM_IN), array($fechafin, SQLSRV_PARAM_IN), array($estatus, SQLSRV_PARAM_IN), array($montoofertado, SQLSRV_PARAM_IN));
    $consulta = sqlsrv_query($conexion, '{CALL spInsertarContrato(?,?,?,?,?,?)}', $params);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contador++;

}

header("Location:../../../principal.php?p=5");


?>