<?php
include ('../../../conexion/conexion.php');

$id=$_POST["idAcceso"];
$params = array( array($id, SQLSRV_PARAM_IN));
            /* Execute the query.*/
            $consulta = sqlsrv_query($conexion, '{CALL sp_eliminarAccesos(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Acceso Eliminado";
			}

header("Location:../../../principal.php?p=2");	

?>