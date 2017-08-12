<?php
include ('../../../conexion/conexion.php');

$id=$_POST["CodigoOficina"];
$nombre=$_POST["NombreOficina"];

$params = array( array($id, SQLSRV_PARAM_IN),array($nombre, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_actualizarOficinas(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Oficina Actualizada";
			}

header("Location:../../../principal.php?p=10");		

 ?>