<?php
include ('../../../conexion/conexion.php');
		
		$id=$_POST["CodigoOferta"];
		$monto=$_POST["Monto"];

$params = array( array($id, SQLSRV_PARAM_IN), array($monto, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spModificarOfertas(?,?)}', $params);
           
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Oferta actualizada";
			}

header("Location:../../../principal.php?p=14");
?>