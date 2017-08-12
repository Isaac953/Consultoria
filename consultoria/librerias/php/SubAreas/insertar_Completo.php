<?php
include '../../../conexion/conexion.php';

if ($_POST['insertar'])
 {
$area=$_POST["lsAreas"];
$nombreSub=$_POST["nombreSubArea"];

$params = array( array($area, SQLSRV_PARAM_IN), array($nombreSub, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spInsertarSubAreas(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Sub Area registrada";
			}

header("Location:../../../principal.php");	
}

if ($_POST['modificar'])
 {

$id=$_POST["idSub"];
$nombreSub=$_POST["nombreSubArea"];
$params = array( array($id, SQLSRV_PARAM_IN), array($nombreSub, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarSubAreas(?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Sub Area Actualizada";
			}

header("Location:../../../principal.php");	
 }	

if ($_POST['eliminar'])
 {

$id=$_POST["idSub"];
$params = array( array($id, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spEliminarSubAreas(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Sub Area Eliminada";
			}

header("Location:../../../principal.php");	
 }	

?>