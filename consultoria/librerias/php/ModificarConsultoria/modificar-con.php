<?php
include ('../../../conexion/conexion.php');

$id=$_POST["IdConsultoria"];
$nombrecon=$_POST["Nombre"];
$fechain=$_POST["FechaIni"];
$fechafin=$_POST["FechaFin"];
$tipo=$_POST["lsTipo"];
$estado=$_POST["Estado"];

$params = array( array($id, SQLSRV_PARAM_IN), array($nombrecon, SQLSRV_PARAM_IN), array($fechain, SQLSRV_PARAM_IN), array($fechafin, SQLSRV_PARAM_IN), array($tipo, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_actualizarConsultoria(?,?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Consultoria Actualizada";
			}

header("Location:../../../principal.php");		

?>