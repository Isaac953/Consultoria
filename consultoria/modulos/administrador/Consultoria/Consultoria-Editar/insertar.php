<?php
//$con = new PDO('sqlsrv:server=PLAN-WSVR2012\SAC; Database=PlanSv', 'Plan', 'Pa$$w0rd'); 
include('conexion.php');
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');
header('Content-Type: text/html; charset=utf-8');
$con = new PDO('sqlsrv:server=AMSVSLVSQL1\CONSULTORIA; Database=PlanSv', 'C0nsult0ri4', '123');

//date_default_timezone_set('Etc/UTC');
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPDebug = 2;
//$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "consultoria.svplan@gmail.com";
$mail->Password = "C0nsult0ria";
$mail->setFrom('consultoria.svplan@gmail.com', 'Sistema de Gestion de Consultoría');


$nomcon=$_POST["Consultoria"];
$codper=$_POST["lsPersonal"];
$fecini=$_POST["FechaIn"];
$fecfin=$_POST["FechaFi"];
//$fecreg=$_POST["FechaRe"];
$pres=$_POST["Presupuesto"];
$forpag=$_POST["FormaPago"];
$tdr="tdr";
$tipcon=$_POST["TipoConsultoria"];
$nivalc=$_POST["NivelAlcance"];
$estado=1;


/*
$proyec=$_POST["txt_Eproyect"];
$concat='';

foreach ($_POST["txt_Eproyect"] as $como) 
{
	$concat.=$como;
	# code...
}
*/


        $sql ="SELECT Codigoconsultoria FROM Consultoria ORDER BY Codigoconsultoria asc";	
		$consultaId = sqlsrv_query($conexion, $sql);

		$id = 1;
		while($rowId=sqlsrv_fetch_array($consultaId) )
		{
		$id = $rowId['Codigoconsultoria'];
		$id++;	
		}


        $dir_destino = 'documentos/';
        $imagen_subida = $dir_destino.$id.basename($_FILES['archivo']['name']);

if(!is_writable($dir_destino))
{
	echo "no tiene permisos";
}
else
{
	if(is_uploaded_file($_FILES['archivo']['tmp_name']))
	{
		
		if (move_uploaded_file($_FILES['archivo']['tmp_name'], $imagen_subida)) 
		{


$consulta = "insert into Consultoria (
NombreConsultoria,
CodigoPersonal, 
FechaInicio,
FechaFinal,
Presupuesto,
FormaPa,
TDR,
TipoConsultoria,
NivelAlcance,
Estado
)

 VALUES 
 (
:P_NombreConsultoria,
:p_CodigoPersonal, 
:P_FechaInicio,
:P_FechaFinal,
:P_Presupuesto,
:P_FormaPago,
:P_TDR,
:P_TipoConsultoria,
:P_NivelAlcance,
:P_Estado
)";

$stmt = $con->prepare($consulta);
$stmt->bindParam(':P_NombreConsultoria', $nomcon, PDO::PARAM_INT);
$stmt->bindParam(':p_CodigoPersonal', $codper, PDO::PARAM_INT);
$stmt->bindParam(':P_FechaInicio', $fecini, PDO::PARAM_INT);
$stmt->bindParam(':P_FechaFinal', $fecfin, PDO::PARAM_INT);
$stmt->bindParam(':P_Presupuesto', $pres, PDO::PARAM_INT);
$stmt->bindParam(':P_FormaPago', $forpag, PDO::PARAM_INT);
$stmt->bindParam(':P_TDR', $imagen_subida, PDO::PARAM_INT);
$stmt->bindParam(':P_TipoConsultoria', $tipcon, PDO::PARAM_INT);
$stmt->bindParam(':P_NivelAlcance', $nivalc, PDO::PARAM_INT);
$stmt->bindParam(':P_Estado', $estado, PDO::PARAM_INT);

$stmt->execute();
$lastId = $con->lastInsertId();
			} 
		else
	    {
			echo "Posible ataque de carga de archivos!\n";
		}
	}
	else
	{
		echo "Posible ataque del archivo subido: ";
		echo "nombre del archivo '". $_FILES['archivo_usuario']['tmp_name'] . "'.";
	}
}
/*HASTA AQUI TERMINA LA LOGICA PARA INSERTAR LAS CONSULTORIAS*/

 $queryConsultoriaE="select c.NombreConsultoria,c.Presupuesto, c.FechaInicio, c.FechaFinal from Consultoria c where c.Codigoconsultoria  = '$lastId';"; 
$resultadoConsultoriaE=sqlsrv_query($conexion,$queryConsultoriaE);
$cons=sqlsrv_fetch_array($resultadoConsultoriaE,SQLSRV_FETCH_ASSOC);
$fechaini=DATE_FORMAT($cons['FechaInicio'], 'Y-m-d');
$fechafin=DATE_FORMAT($cons['FechaFinal'], 'Y-m-d');
$nombreconsul=$cons["NombreConsultoria"];
$presu=number_format($cons["Presupuesto"]);

$query="select p.email from Personal p where p.CodigoAcceso=1";

$resultado=sqlsrv_query($conexion, $query);
while ($rows=sqlsrv_fetch_array($resultado)) 
{
$mail->ClearAddresses();
$mail->addAddress($rows["email"], 'Consultoria');
$mail->Subject = 'Nueva Consultoria';
$mail->msgHTML('<b>Estimado/Estimada</b>,<br>
  Ha sido ingresado una nueva requisición con las siguientes especificaciones:<br>
  Nombre Consultoria: <b>'.$nombreconsul."</b>".'
  <p>Fecha Inicio: '.$fechaini.'</p>
  <p>Fecha Fin: '.$fechafin.'</p>
  <p>Monto Presupuestado: '.$presu.'</p>');
$mail->send();
}







//LOGICA PARA INSERTAR EN DETALLE DE CONSULTORIA

$pep=$_POST["Epep"];
//$codSub=$_POST["lsSub"];
$consultaDConsultoria="";
$contadorDConsultoria=0;

foreach	($pep as $valor2)
{
try
{
$params2 = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valor2, SQLSRV_PARAM_IN));
$consultaDConsultoria = sqlsrv_query($conexion, '{CALL spInsertarPep(?,?)}', $params2);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorDConsultoria++;
}
//FIN DEL INSERT EN DETALLE CONSULTORIA


//PARA INSERTAR LAS AREAS DE LA CONSULTORIA
$codSub=$_POST["lsSub"];
$consultaDConsultoria2="";
$contadorDConsultoria2=0;

foreach	($codSub as $valorA)
{
try
{
$params21 = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valorA, SQLSRV_PARAM_IN));
$consultaDConsultoria2 = sqlsrv_query($conexion, '{CALL spInsertarDConsultoria(?,?)}', $params21);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorDConsultoria2++;
}





//LOGICA PARA INSERTAR LOS PRODUCTOS

$produc=$_POST["txtNombProducto"];
$desemb=$_POST["txtDesembolso"];
$fecPlanif=$_POST["txtFechaPlanificada"];

$consultaProducto="";
$contadorProducto=0;

foreach	($desemb as $valor1)
{
try
{
$params1 = array( 
array($lastId, SQLSRV_PARAM_IN),
array($produc[$contadorProducto], SQLSRV_PARAM_IN),
array($valor1, SQLSRV_PARAM_IN),
array($fecPlanif[$contadorProducto], SQLSRV_PARAM_IN));
$consultaProducto = sqlsrv_query($conexion, '{CALL spInsertarProductoInicio(?,?,?,?)}', $params1);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorProducto++;

}

//LOGICA PARA INSERTAR ZONAS DE TRABAJO


if ($nivalc!="Nacional")
{

$Zmunic=$_POST["lsmunicempresa"];

$consultaZona="";
$contadorZona=0;

foreach	($Zmunic as $valor3)
{

try
{
$params3 = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valor3, SQLSRV_PARAM_IN));
$consultaZona = sqlsrv_query($conexion, '{CALL spInsertarZona(?,?)}', $params3);
}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorZona++;

}




}



//header("Location:Consultoria.php");

     echo "<script>
window.location.replace('../../../principal.php');
     </script>";


?>