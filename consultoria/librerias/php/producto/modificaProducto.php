<?php

include ('../../../conexion/conexion.php');

$varid = $_POST['id'];
$conforme = $_POST['conforme']; //fecha
$pagado = $_POST['pago']; //fecha
$monto = $_POST['monto'];  //numero
$coment = $_POST['comentario'];  //numero


$params = array( 
	array($varid, SQLSRV_PARAM_IN), 
	array($conforme, SQLSRV_PARAM_IN), 
	array($pagado, SQLSRV_PARAM_IN),
	array($monto, SQLSRV_PARAM_IN),
	array($coment, SQLSRV_PARAM_IN));

 $consulta = sqlsrv_query($conexion, '{CALL spModificarProucto(?,?,?,?,?)}', $params);


					if( $consulta === false )
					{
					echo "Error in executing statement 3.\n";
					die( print_r( sqlsrv_errors(), true));
					}
					
					else
					{
					echo "Producto Actualizado";
					}


header("Location:../../../principal.php?p=20");	

 ?>