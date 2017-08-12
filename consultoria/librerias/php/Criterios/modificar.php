<?php
include ('../../../conexion/conexion.php');

$id=$_POST["txtIdCriterio"];
$nombre=$_POST["CNombre"];
$ponderacion=$_POST["CPonderacion"];
$suma=$_POST["txtsuma"];
$estado=$_POST["lsEstado"];;


$pon=$ponderacion/100;

$params = array( array($id, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN),  array($pon, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarCriterios(?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "criterio actualizado";
			}

header("Location:../../../principal.php?p=6");	

?>