<?php
include ('../../../conexion/conexion.php');

$id_parametroscriterios=$_POST['id'];
$params = array( array($id_parametroscriterios, SQLSRV_PARAM_IN));
            /* Execute the query.*/
            $consulta = sqlsrv_query($conexion, '{CALL spEliminarParametros(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Parametro Eliminado";
			}

header("Location:../../../principal.php?p=11");		

?>