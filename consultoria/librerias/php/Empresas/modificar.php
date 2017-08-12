<?php
include '../../../conexion/conexion.php';

    $id=$_POST["CodigoEmpresa"];
 	$nombrempresa=$_POST["nombrempresa"];
 	$direccion=$_POST["direccionEmpresa"];
 	$nitEmpresa=$_POST["nitEmpresa"];
 	$duiEmpresa=$_POST["duiEmpresa"];
 	$tipo=$_POST["tipo"];
    $nomRep=$_POST["nomRep"];
    $apellRep=$_POST["apellRep"];
    $tel=$_POST["tel"];
    $telMovil=$_POST["telMovil"];
    $email=$_POST["email"];
    $fanPage=$_POST["fanPage"];
    $lsPais=$_POST["lsPaisEmpresa"];
    $lsMunic=$_POST["lsMunicEmpresa"];
    $regIva=$_POST["regIva"];
    $estado=$_POST["Estado"];   

$params = array( array($id, SQLSRV_PARAM_IN), array($nombrempresa, SQLSRV_PARAM_IN),
array($direccion, SQLSRV_PARAM_IN), array($nitEmpresa, SQLSRV_PARAM_IN), 
array($duiEmpresa, SQLSRV_PARAM_IN), array($tipo, SQLSRV_PARAM_IN),  
array($nomRep, SQLSRV_PARAM_IN), array($apellRep, SQLSRV_PARAM_IN), 
array($tel, SQLSRV_PARAM_IN), array($telMovil, SQLSRV_PARAM_IN), 
array($email, SQLSRV_PARAM_IN), array($fanPage, SQLSRV_PARAM_IN),
array($lsPais, SQLSRV_PARAM_IN), array($lsMunic, SQLSRV_PARAM_IN), 
array($regIva, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarEmpresa(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Empresa Actualizada";
			}

header("Location:../../../principal.php?p=7");		


?>