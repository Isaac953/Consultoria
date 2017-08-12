<?php
include '../../../conexion/conexion.php';

$nombre=$_POST["CNombre"];
$tipo=$_POST["lsCriterios"];
$ponderacion=$_POST["CPonderacion"];
$estado=1;
//validacion para los criterios
$tipo=$_POST["lsCriterios"]; //inicial o evaluacion ofertas

$consultaCriterios="select round(((1-sum(Ponderacion))*100), 3) as maximo from Criterios where  TipoCriterio='$tipo' and Estadoc = 1;";
$resultadoCriterios=sqlsrv_query($conexion,$consultaCriterios);
$cont=sqlsrv_fetch_array($resultadoCriterios,SQLSRV_FETCH_ASSOC);
$maxc=$cont['maximo'];

//condiciones para insertar

if (is_null($maxc)) 
{
$pon=$ponderacion/100;
$params = array( array($nombre, SQLSRV_PARAM_IN), array($tipo, SQLSRV_PARAM_IN), array($pon, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));

            $consulta = sqlsrv_query($conexion, '{CALL spInsertarCriterios(?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Criterio registrado";
			}
//echo "adelante inserte";
			header("Location:../../../principal.php");

}

else
{
if ($ponderacion > $maxc) 
{
	header("Location:../../../principal.php");
	//echo "la ponderacion es mayor a lo restante";
}

elseif ($ponderacion <= $maxc) 
{

$pon=$ponderacion/100;
$params = array( array($nombre, SQLSRV_PARAM_IN), array($tipo, SQLSRV_PARAM_IN), array($pon, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));

            $consulta = sqlsrv_query($conexion, '{CALL spInsertarCriterios(?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Criterio registrado";
			}
//echo "adelante inserte";
			header("Location:../../../principal.php?p=6");
}
}

?>