<?php
include '../../../conexion/conexion.php';

    $id=$_POST["CodigoConsultor"];
 	$nombre=$_POST["nombrec"];
 	$apellido=$_POST["apellidoc"];
 	$direccion=$_POST["direccionConsultor"];
 	$nit=$_POST["nit"];
 	$dui=$_POST["dui"];
    $pais=$_POST["lsPaisConsult"];
    $municipio=$_POST["lsMunic"];
    $nacionalidad=$_POST["nac"];
    $telefono=$_POST["telefonoConsultor"];	
 	$email=$_POST["emailConsultor"];
    $estado=$_POST["Estado"];  

$params = array( array($id, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN),array($apellido, SQLSRV_PARAM_IN), array($direccion, SQLSRV_PARAM_IN), array($nit, SQLSRV_PARAM_IN), array($dui, SQLSRV_PARAM_IN), array($pais, SQLSRV_PARAM_IN), array($municipio, SQLSRV_PARAM_IN), array($nacionalidad, SQLSRV_PARAM_IN), array($telefono, SQLSRV_PARAM_IN), array($email, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_actualizarConsultor(?,?,?,?,?,?,?,?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Consultor Actualizado";
			}

header("Location:../../../principal.php?p=7");		


?>