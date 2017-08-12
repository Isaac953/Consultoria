<?php
include ('../../../conexion/conexion.php');

        $nombre=$_POST["Nombre"];
		$apellido=$_POST["Apellido"];
		$email=$_POST["email"];
		$estado=1;
        $oficina=$_POST["lsOficina"];
		$username=$_POST["Username"];
		$password=$_POST["password"];
		$acceso=$_POST["lsAcceso"];
		$cargo=$_POST["Cargo"];

$params = array( array($nombre, SQLSRV_PARAM_IN), array($apellido, SQLSRV_PARAM_IN), array($email, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN), array($oficina, SQLSRV_PARAM_IN), array($username, SQLSRV_PARAM_IN), array($password, SQLSRV_PARAM_IN), array($acceso, SQLSRV_PARAM_IN), array($cargo, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spInsertarPersonal(?,?,?,?,?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Personal registrado";
			}

header("Location:../../../principal.php");

?>