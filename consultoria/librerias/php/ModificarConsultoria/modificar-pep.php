<?php
include ('../../../conexion/conexion.php');

$id=$_POST["IdPep"];
$ElementoPep=$_POST["Pep"];

$params = array( array($id, SQLSRV_PARAM_IN), array($ElementoPep, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_actualizarPep(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Area Actualizada";
			}

header("Location:../../../principal.php");		

?>