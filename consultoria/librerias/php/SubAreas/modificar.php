<?php
include '../../../conexion/conexion.php';

$id=$_POST["CodigoSubArea"];
$area=$_POST["lsAreas"];
$nombreSub=$_POST["SubArea"];
$params = array( array($id, SQLSRV_PARAM_IN), array($area, SQLSRV_PARAM_IN), array($nombreSub, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarSubAreas(?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Sub Area Actualizada";
			}

header("Location:../../../principal.php?p=13");	

?>