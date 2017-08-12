<?php
include ('../../../conexion/conexion.php');

$id_criterio=$_POST['id'];

$params = array( array($id_criterio, SQLSRV_PARAM_IN));
            /* Execute the query.*/
            $consulta = sqlsrv_query($conexion, '{CALL spEliminarCriterios(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Criterio Eliminado";
			}

header("Location:../../../principal.php?p=6");		

?>