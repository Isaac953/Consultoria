<?php
include ('../../../conexion/conexion.php');

$id_oficina=$_POST['id'];
$params = array( array($id_oficina, SQLSRV_PARAM_IN));
            /* Execute the query.*/
            $consulta = sqlsrv_query($conexion, '{CALL sp_eliminarOficinas(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Oficina Eliminada";
			}

header("Location:../../../principal.php?p=10");		

?>