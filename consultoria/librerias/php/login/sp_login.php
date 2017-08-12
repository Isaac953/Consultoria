<?php 

include '../../../conexion/conexion.php';

$userName = $_POST["user"];
$password = $_POST["password"];

$params = array(
 array($userName, SQLSRV_PARAM_IN),
 array($password, SQLSRV_PARAM_IN));

$params2 = array($userName,$password);

$cursorType = array("Scrollable" => SQLSRV_CURSOR_KEYSET);  

$sql= "{CALL sp_login(?, ?)}";

//$sql = "SELECT * FROM Personal";

$consulta = sqlsrv_query($conexion,$sql,$params);


if( $consulta === false )
            {
             //echo "Error in executing statement 3.\n";
             die( print_r( sqlsrv_errors(), true));
            }     
      else
      {
        
        while($row = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC))
        {
         $nombres = explode(" ", $row['Nombres']);
         $apellidos = explode(" ", $row['Apellidos']);
            //Creamos sesión
         
         session_start();  
            //Almacenamos el nombre de usuario en una variable de sesión usuario
           $_SESSION['nombre'] = $nombres[0]." ".$apellidos[0]; 
           $_SESSION['usuario'] = $row["Username"];  
           $_SESSION['id_usuario'] = $row["CodigoPersonal"];  
           $_SESSION['tipo_usuario'] = $row["CodigoAcceso"]; 
           $_SESSION['clasificacion'] = $row["TituloAcceso"]; 
           $_SESSION['password'] = $row["password"]; 
        }
        
        header("Location:../../../principal.php");
        
        /*
      	while( $row = sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_NUMERIC) ) 
      	{
      		echo $row[0].", ".$row[1]."<br />";
      	}
      	*/
      		
      }
      
      sqlsrv_free_stmt( $consulta);
      //sqlsrv_close();
 ?>