<?php
if(isset($_POST["idArea"]))
	{
	
		$usuario='sa';
		$pass='123';
		$servidor='localhost';
		$basedatos='PlanSv';
		$info = array('Database'=>$basedatos, 'UID'=>$usuario, 'PWD'=>$pass, "CharacterSet"=>"UTF-8");
		$conexion = sqlsrv_connect($servidor, $info);

     	//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea"];
		$consulta = sqlsrv_query($conexion, $strConsulta);


	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';

  } 
  echo $opciones;  

	}

?>
