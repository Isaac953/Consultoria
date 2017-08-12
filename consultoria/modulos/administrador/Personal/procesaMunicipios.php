<?php
include("conexion.php");
if(isset($_POST["idDepartamento"]))
	{
	  		
     	//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';

  } 
  echo $opciones;  

	}


if(isset($_POST["idDepartamento2"]))
	{

     	//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
		$opciones = '<option value="0"> Elija un Municipio</option>';

		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento2"];
		$consulta = sqlsrv_query($conexion, $strConsulta);


	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';

  } 
  echo $opciones;  

	}



if(isset($_POST["idDepartamento3"]))
	{
     	//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
		$opciones = '<option value="0"> Elija un Municipio</option>';

		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento3"];
		$consulta = sqlsrv_query($conexion, $strConsulta);


	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';

  } 
  echo $opciones;  

	}



			if(isset($_POST["idDepartamento4"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';
			
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento4"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			
			
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

if(isset($_POST["idDepartamento5"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';
			
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento5"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			
			
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento6"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';
			
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento6"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			
			
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento7"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';
			
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento7"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			
			
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento8"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';
			
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento8"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			
			
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento9"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';
			
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento9"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			
			
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento10"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';
			
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento10"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			
			
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}
?>

