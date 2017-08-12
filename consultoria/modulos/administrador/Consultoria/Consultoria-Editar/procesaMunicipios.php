<?php
include("conexion.php");
if(isset($_POST["idDepartamento"]))
	{
	  		
     	//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
		$opciones = '<option value=""> Elija un Municipio</option>';
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

			if(isset($_POST["idDepartamento11"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento11"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento12"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento12"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento13"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento13"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento14"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento14"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento15"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento15"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento16"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento16"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento17"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento17"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento18"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento18"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento19"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento19"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento20"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento20"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento21"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento21"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento22"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento22"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento23"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento23"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento24"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento24"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento25"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento25"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento26"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento26"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento27"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento27"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento28"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento28"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento29"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento29"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento30"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento30"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento31"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento31"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento32"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento32"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento33"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento33"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento34"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento34"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento35"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento35"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento36"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento36"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento37"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento37"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento38"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento38"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento39"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento39"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}

			if(isset($_POST["idDepartamento40"]))
			{
			//$strConsulta = "select id, modelo from modelo where idmarca ="."'".$cod."'";
			$opciones = '<option value="0"> Elija un Municipio</option>';	
			$strConsulta = "select * from Municipios M, Departamentos D where  M.CodigoDepartamento=D.CodigoDepartamento and D.CodigoDepartamento=".$_POST["idDepartamento40"];
			$consulta = sqlsrv_query($conexion, $strConsulta);
			while ($fila=sqlsrv_fetch_object($consulta))
			{
			$opciones.='<option value="'.$fila->CodigoMunicipio.'">'.$fila->NombreMunicipio.'</option>';
			
			} 
			echo $opciones;  
			}
?>

