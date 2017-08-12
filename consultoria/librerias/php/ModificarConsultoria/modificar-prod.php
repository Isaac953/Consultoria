<?php
include ('../../../conexion/conexion.php');

$id=$_POST["IdProducto"];
$producto=$_POST["Producto"];
$recibi=$_POST["RecibiConforme"];
$pagado=$_POST["Pagado"];
$fechaplanificada=$_POST["fechaplanificada"];
$comentario=$_POST["comentario"];

$params = array( array($id, SQLSRV_PARAM_IN), array($producto, SQLSRV_PARAM_IN), array($recibi, SQLSRV_PARAM_IN), array($pagado, SQLSRV_PARAM_IN), array($fechaplanificada, SQLSRV_PARAM_IN), array($comentario, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_ActualizarProductoAdmin(?,?,?,?,?,?)}', $params);
            
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