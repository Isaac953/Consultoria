<?php
include ('../../../conexion/conexion.php');
		
		$nombre=$_POST["NombreOficina"];

$params = array( array($nombre, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_registrarOficinas(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Oficina registrada";
			}

header("Location:../../../principal.php?p=10");
?>