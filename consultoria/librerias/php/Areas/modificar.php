<?php
include ('../../../conexion/conexion.php');

$id=$_POST["CodigoArea"];
$nombre=$_POST["AreaEspecializacion"];

$params = array( array($id, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarAreas(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Area Actualizada";
			}

header("Location:../../../principal.php?p=1");		

?>