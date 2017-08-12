<?php
include ('../../../conexion/conexion.php');

$id_personal=$_POST['CodigoPersonal'];
$estado=$_POST["txtverificar"];

if ($estado=="Activar")
{
$estado=1;
$params = array( array($id_personal, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));
            
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarEstadoPersonal(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Personal estado";
			}

header("Location:../../../principal.php");	
}


if ($estado=="Desactivar")
{
$estado=0;
$params = array( array($id_personal, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));
            
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarEstadoPersonal(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Personal estado";
			}

header("Location:../../../principal.php");	

}
	
?>