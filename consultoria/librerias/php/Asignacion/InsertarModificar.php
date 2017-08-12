<?php
//Añade un nuevo beneficiario
include('../../../conexion/conexion.php');
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');
header('Content-Type: text/html; charset=utf-8');

//$con = new PDO('sqlsrv:server=localhost; Database=PlanSv', 'sa', '123');
$con = new PDO('sqlsrv:server=AMSVSLVSQL1\CONSULTORIA; Database=PlanSv', 'sa', 'C0nsult0ri4');

date_default_timezone_set('America/El_Salvador');

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPDebug = 2;
//$mail->Debugoutput = 'html';
$mail->Host = 'smtp.office365.com';
$mail->Port = 587;
$mail->SMTPSecure = 'STARTTLS';
$mail->SMTPAuth = true;
$mail->Username = "consultoria.sv@plan-international.org";
$mail->Password = "C0nsult0ri4";
$mail->setFrom('consultoria.sv@plan-international.org', 'Sistema de Gestion de Consultoría');

$correorec=$_POST["txtcorreo"];
$nombreconsultoria=$_POST["txtNombreConsultoria"];
$roles=$_POST["txtRol"];
$nombres=$_POST["txtnombres"];
$apell=$_POST["txtapellidos"];
$comentario=$_POST["explicacion"];

$idconsultoria = $_POST['id'];
 $queryConsultoriaE="select c.FechaInicio, c.FechaFinal from Consultoria c where c.Codigoconsultoria = '$idconsultoria';"; 
$resultadoConsultoriaE=sqlsrv_query($conexion,$queryConsultoriaE);
$cons=sqlsrv_fetch_array($resultadoConsultoriaE,SQLSRV_FETCH_ASSOC);
$fechaini=DATE_FORMAT($cons['FechaInicio'], 'd-m-Y');
$fechafin=DATE_FORMAT($cons['FechaFinal'], 'd-m-Y');

$contador=0;
foreach ($correorec as $email) 
{

$envio='';
$contador1=0;
foreach ($nombres as $nom) 
{
$envio.='<tr><td>'.$nom.' '.$apell[$contador1].'</td><td>'.$roles[$contador1].'</td></tr>';
$contador1++;
}

$mail->ClearAddresses();
$mail->addAddress($email, 'prueba');
$mail->Subject = 'Actualización de asignación del comité de evaluadores';
$mail->msgHTML('<b>Estimado/Estimada,</b><br>Usted ha sido asignado/asignada como parte del comité para la consultoría que se detalla a continuación: <br><br>

 <center>Nombre de consultoría: <b>'.$nombreconsultoria.'</b></center>
 <center>Fecha inicio: <b>'.$fechaini.'</b></center>
 <center>Fecha fin: <b>'.$fechafin.'</b></center>
<table align="center">
<tr>
<th style="background-color:#0072bb; color:white; font-weight: bold;" colspan="2" >Comité Evaluador</th>
</tr>
<tr>
<th style="background-color:#0072bb; color:white; font-weight: bold;">Nombres</th>
<th style="background-color:#0072bb; color:white; font-weight: bold;">Función</th>
</tr>'.
$envio.'
</table>
<br>
<br>
Se agradece a la persona seleccionada como Coordinador, convoque a los demas miembros de este equipo para realizar el proceso de selección; y comparta los resultados con el área de administración.
<br>
<br>
<b>Esta notificación ha sido enviada automáticamente, por lo que responder a través de este correo electrónico no es posible.</b>
<br>
<br>

Nota: '.$comentario.'
<br>
');

$mail->send();


$contador++;
}

//EMPIEZA LA LOGICA PARA LA ELIMINACION DE LA ASIGNACION ANTERIOR
$consultaUpdateAsig= "delete from asignacion where CodigoConsultoria = :P_CodigoConsultoria;
";
$stmtUpdateAsig = $con->prepare($consultaUpdateAsig);
$stmtUpdateAsig->bindParam(':P_CodigoConsultoria', $idconsultoria, PDO::PARAM_INT);
$stmtUpdateAsig->execute();
//TERMINA LA ELIMINACION 



$var=1;
$query = ("SELECT * FROM Personal");
$resultado=sqlsrv_query($conexion, $query);


while ($rows=sqlsrv_fetch_array($resultado)) 
{
$cod = $rows['CodigoPersonal'];
}

while($var <= $cod)
{
  if(isset( $_REQUEST["id".$var]))
    {
  $iduser = $_REQUEST["id".$var];
  $opcion= $_REQUEST["cantidad".$var];

$vali='';
$idper=0;
if ($opcion=="Coordinador") 
{
  //$vali=" este es el coodinador";
  $idper=2;
}

if ($opcion=="Evaluador") 
{
//$vali="este es evaluador";
$idper=3;
}

//EMPIEZA LA LOGICA PARA ACTUALIZAR EL ACCESO O ROL PARA EL COORDINADOR//
$consultaCUpdate = "
update Personal set CodigoAcceso = :P_idacceso where CodigoPersonal = :P_CodigoPersonal;
";

$stmtCupdate = $con->prepare($consultaCUpdate);
$stmtCupdate->bindParam(':P_CodigoPersonal', $iduser, PDO::PARAM_INT);
$stmtCupdate->bindParam(':P_idacceso', $idper, PDO::PARAM_INT);


$stmtCupdate->execute();
//TERMINA LA LOGICA PARA ACTUALIZAR EL COORDINADOR//



//echo "id Usuario: ".$iduser." funcion: ".$opcion." ".$vali." id ".$idper."<br>";

$consulta = "insert into Asignacion
(
CodigoPersonal,
CodigoConsultoria,
funcion
)

 VALUES 
 (
:P_CodigoPersonal,
:P_CodigoConsultoria,
:P_funcion
)";

$stmt = $con->prepare($consulta);
$stmt->bindParam(':P_CodigoPersonal', $iduser, PDO::PARAM_INT);
$stmt->bindParam(':P_CodigoConsultoria', $idconsultoria, PDO::PARAM_INT);
$stmt->bindParam(':P_funcion', $opcion, PDO::PARAM_INT);

$stmt->execute();


}
   $var = $var +1;
}


      //echo "Query: Un error ha occurido.\n";
//header("Location:../../../principal.php");
     
          echo "<script>
window.location.replace('../../../principal.php?p=3');
     </script>";


?>
