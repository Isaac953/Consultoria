<?php
include ('../../../conexion/conexion.php');

$id_area=$_POST['id'];
$params = array( array($id_area, SQLSRV_PARAM_IN));
            /* Execute the query.*/
            $consulta = sqlsrv_query($conexion, '{CALL spEliminarSubAreas(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Sub Are Eliminada";
			}

header("Location:../../../principal.php?p=13");		

?>