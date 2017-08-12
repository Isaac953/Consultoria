<?php
include '../../../conexion/conexion.php';

    $id=$_POST["CodigoConsultor"];
 	$idEmp=$_POST["CodEmpresa"];

$params = array( array($id, SQLSRV_PARAM_IN), array($idEmp, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_actualizarEmpConsultor(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Consultor Actualizado";
			}

header("Location:../../../principal.php?p=30");		


?>