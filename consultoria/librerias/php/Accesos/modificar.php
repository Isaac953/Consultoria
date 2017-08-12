<?php
include ('../../../conexion/conexion.php');

        $id=$_POST["idAcceso"];
		$nombre=$_POST["nombreAcceso"];

$params = array( array($id, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_actualizarAccesos(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Acceso Actualizado";
			}

header("Location:../../../principal.php?p=2");
?>