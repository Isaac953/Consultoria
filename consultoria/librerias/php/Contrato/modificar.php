<?php
include ('../../../conexion/conexion.php');

$fechainicio=$_POST ["FechaInicio"];
$fechafin=$_POST ["FechaFin"];
$estatus=$_POST["Estatus"];
$montoofertado=$_POST["montoOfertado"];
$expli=$_POST["txtexplicacion"];

$codigo=$_POST["txtCodigo"];



$params = array( array($codigo, SQLSRV_PARAM_IN), array($fechainicio, SQLSRV_PARAM_IN), array($fechafin, SQLSRV_PARAM_IN), array($estatus, SQLSRV_PARAM_IN), array($montoofertado, SQLSRV_PARAM_IN), array($expli, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarContrato(?,?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Contrato registrado";
			}
header("Location:../../../principal.php?p=5");		

?>