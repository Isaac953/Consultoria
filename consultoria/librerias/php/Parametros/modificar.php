<?php
include ('../../../conexion/conexion.php');

//exec spActualizarParametros 1, 'Doctorado', 0.20;

$id=$_POST["txtIdParametro"];
$nombre=$_POST["NParametro"];
$ponderacion=$_POST["ponderacion"];


//para los parametros
//haciendo la consulta para los porcentajes de los parametros
$queryC="select C.Criterio, P.Parametro, P.Ponderacion as pondeP, C.Ponderacion as pondeC,  P.CodigoParametrosCriterios  from Criterios C, ParametrosCriterios P where C.CodigoCriterio=P.CodigoCriterio
and P.CodigoParametrosCriterios = '$id';";

$resultadoC=sqlsrv_query($conexion,$queryC);
while($row=sqlsrv_fetch_array( $resultadoC, SQLSRV_FETCH_ASSOC))
{
	$pondeCrit=$row['pondeC'];
} 

//para la ponderacion
$pon=$ponderacion*$pondeCrit;
$pondeReg=$pon/100;

$params = array(array($id, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN), array($pondeReg, SQLSRV_PARAM_IN));

            $consulta = sqlsrv_query($conexion, '{CALL spActualizarParametros(?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Parametro actualizado";
			}

header("Location:../../../principal.php?p=11");		
?>