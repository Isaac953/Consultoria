<?php
include ('../../../conexion/conexion.php');
		
		$consultoria=$_POST["lsConsultoria"];
		$nombreempresa=$_POST["NombreEmpresa"];
		$nit=$_POST["Nit"];
		$telefono=$_POST["Telefono"];
		$correo=$_POST["Correo"];

$params = array( array($consultoria, SQLSRV_PARAM_IN),array($nombreempresa, SQLSRV_PARAM_IN), array($nit, SQLSRV_PARAM_IN), array($telefono, SQLSRV_PARAM_IN), array($correo, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spInsertarOfertas(?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Oferta registrada";
			}

header("Location:../../../principal.php?p=17");
?>