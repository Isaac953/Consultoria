<?php
include ('../../../conexion/conexion.php');


if ($_POST['insertar'])
 {

$nombre=$_POST["nombreArea"];

$params = array( array($nombre, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spInsertarAreas(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Area registrada";
			}

header("Location:../../../principal.php");		

 }


if ($_POST['modificar'])
 {
$id=$_POST["idArea"];
$nombre=$_POST["nombreArea"];

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

header("Location:../../../principal.php");		

 }


if ($_POST['eliminar'])
 {
$id=$_POST["idArea"];
$params = array( array($id, SQLSRV_PARAM_IN));
            /* Execute the query.*/
            $consulta = sqlsrv_query($conexion, '{CALL spEliminarAreas(?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Area Eliminada";
			}

header("Location:../../../principal.php");		

 }
 


?>