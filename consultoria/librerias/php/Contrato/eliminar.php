<?php
include ('../../../conexion/conexion.php');

$id_contrato=$_POST['id'];
$params = array( array($id_contrato, SQLSRV_PARAM_IN));
            /* Execute the query.*/
            $consulta = sqlsrv_query($conexion, '{CALL sp_EliminarContrato(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Contrato Eliminada";
			}

header("Location:../../../principal.php?p=5");		

?>