<?php
include '../../../conexion/conexion.php';

$nombre=$_POST["NParametro"];
$ponderacion=$_POST["ponderacion"];
$idCrterio=$_POST["lsVerCriterios"];

//haciendo la consulta para los porcentajes de los parametros

/*$consultaParametros="select ((c.Ponderacion - sum(p.Ponderacion))*100) as maximo, c.Ponderacion as pondeC from ParametrosCriterios p, criterios c where p.CodigoCriterio=c.CodigoCriterio and c.CodigoCriterio
= '$idCrterio' group by C.Ponderacion;";
*/

$consultaParametros="
select ((c.Ponderacion - sum(p.Ponderacion))*100) as maximo, c.Ponderacion as pondeC from 
ParametrosCriterios p  right join criterios c on p.CodigoCriterio=c.CodigoCriterio where c.CodigoCriterio
= '$idCrterio' group by C.CodigoCriterio, c.Ponderacion;
 ";

$resultadoParametros=sqlsrv_query($conexion,$consultaParametros);
$cont=sqlsrv_fetch_array($resultadoParametros,SQLSRV_FETCH_ASSOC);
$pondeC=$cont['pondeC'];
$maxp=$cont['maximo'];

$poncomprobar=0;
$ponF=0;

if ($maxp==0)
{
$ponF=($ponderacion*$pondeC)/(100);
/*echo "ponderacion del criterio = ".$pondeC;
echo "<br>su maximo es : 100%";
echo "<br>ponderacion convertida = ".$ponF;
*/

$params = array(array($idCrterio, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN), array($ponF, SQLSRV_PARAM_IN));
            $consulta = sqlsrv_query($conexion, '{CALL spInsertarParametros(?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Parametro registrado";
			}

header("Location:../../../principal.php");	

}



elseif ($maxp!=0)
{
$poncomprobar=($maxp/$pondeC);
if ($ponderacion > $poncomprobar) 
{
	header("Location:../../../principal.php");		
//echo "la ponderacion es mayor";
}

if ($ponderacion <= $poncomprobar || $ponderacion = $poncomprobar) 
{
$ponF=($ponderacion*$pondeC)/(100);

$params = array(array($idCrterio, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN), array($ponF, SQLSRV_PARAM_IN));
            $consulta = sqlsrv_query($conexion, '{CALL spInsertarParametros(?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Parametro registrado";
			}

header("Location:../../../principal.php?p=11");	
/*
echo "<br>exito listo para enviar";
echo "<br>ponderacion maxima convertida: ".$poncomprobar;
echo "<br>la cantidad convertida es: ".$ponF;
*/
}
}



/*if ($ponderacion > $ponF) 
{
//	header("Location:../../../principal.php");		
echo "la ponderacion es mayor";
}

if ($ponderacion <= $ponF) 
{
$podeEnv=($ponderacion*$pondeC)/(100);

echo "la ponderacion es menor";
//echo $podeEnv;
/*$params = array(array($idCrterio, SQLSRV_PARAM_IN), array($nombre, SQLSRV_PARAM_IN), array($podeEnv, SQLSRV_PARAM_IN));
            $consulta = sqlsrv_query($conexion, '{CALL spInsertarParametros(?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Parametro registrado";
			}

header("Location:../../../principal.php");	

}
*/


?>