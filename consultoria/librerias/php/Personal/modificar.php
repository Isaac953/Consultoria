<?php
include ('../../../conexion/conexion.php');

        $id=$_POST["CodigoPersonal"];
        $nombre=$_POST["Nombre"];
		$apellido=$_POST["Apellido"];
		$email=$_POST["email"];
		$estado=$_POST["Estado"];
        $oficina=$_POST["lsOficina"];
		$username=$_POST["Username"];
		$password=$_POST["password"];
		$acceso=$_POST["lsAcceso"];
		$cargo=$_POST["Cargo"];

$params = array( array($id, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN), array($apellido, SQLSRV_PARAM_IN), array($email, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN), array($oficina, SQLSRV_PARAM_IN), array($username, SQLSRV_PARAM_IN), array($password, SQLSRV_PARAM_IN), array($acceso, SQLSRV_PARAM_IN), array($cargo, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL spActualizarPersonal(?,?,?,?,?,?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Personal Actualizado";
			}

header("Location:../../../principal.php?p=12");		

 ?>