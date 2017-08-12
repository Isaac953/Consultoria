<?php
include('conexion/conexion.php');

if(isset($_POST["idPersonal"]))
{
		$opciones = '<option value="0"> Elija porfavor</option>';
		$strConsulta = "SELECT * FROM personal p WHERE p.CodigoPersonal <> ".$_POST["idPersonal"];
		$consulta = sqlsrv_query($conexion, $strConsulta);
	   while ($fila=sqlsrv_fetch_object($consulta))
  {
  $opciones.='<option value="'.$fila->CodigoPersonal.'">'.$fila->Nombres.'</option>';
  } 
  echo $opciones;  
}
?>
