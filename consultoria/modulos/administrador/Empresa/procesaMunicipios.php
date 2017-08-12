<?php
		include('conexion.php');
		
		if(isset($_POST["idDepartamento"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

		if(isset($_POST["idDepartamento1"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento1"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}


		//MUNICIPIO 2
		if(isset($_POST["idDepartamento2"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento2"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

		//MUNICIPIO 3
		if(isset($_POST["idDepartamento3"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento3"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

//MUNICIPIO 4
		if(isset($_POST["idDepartamento4"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento4"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

		//MUNICIPIO 5
		if(isset($_POST["idDepartamento5"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento5"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

		//MUNICIPIO 6
		if(isset($_POST["idDepartamento6"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento6"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

		//MUNICIPIO 3
		if(isset($_POST["idDepartamento7"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento7"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

		//MUNICIPIO 8
		if(isset($_POST["idDepartamento8"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento8"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

		//MUNICIPIO 9
		if(isset($_POST["idDepartamento9"]))
		{
		$opciones = '<option value="0"> Elija un Municipio</option>';
		$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento9"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
		while ($fila=sqlsrv_fetch_object($consulta))
		{
		$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
		
		} 
		echo $opciones;  
		}

		//MUNICIPIO 10
		if(isset($_POST["idDepartamento10"]))
		{
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
