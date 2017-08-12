<?php
include('conexion.php');

if(isset($_POST["idArea"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}

if(isset($_POST["idArea2"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea2"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}


if(isset($_POST["idArea3"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea3"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}


if(isset($_POST["idArea4"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea4"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}


if(isset($_POST["idArea5"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea5"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}


if(isset($_POST["idArea6"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea6"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}


if(isset($_POST["idArea7"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea7"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}

if(isset($_POST["idArea8"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea8"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}

if(isset($_POST["idArea9"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea9"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}

if(isset($_POST["idArea10"]))
{
		$opciones = '<option value="0"> Elija una Sub Area</option>';
		$strConsulta = "select * from AreaEspecializacion A, SubArea S where A.CodigoArea=S.CodigoArea and A.CodigoArea=".$_POST["idArea10"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoSubArea.'">'.$fila->SubArea.'</option>';
  } 
  echo $opciones;  
}

?>
