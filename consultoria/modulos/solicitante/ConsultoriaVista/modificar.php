<?php
//$con = new PDO('sqlsrv:server=PLAN-WSVR2012\SAC; Database=PlanSv', 'Plan', 'Pa$$w0rd'); 
include('conexion.php');
$con = new PDO('sqlsrv:server=AMSVSLVSQL1\CONSULTORIA; Database=PlanSv', 'sa', 'C0nsult0ri4');
//$con = new PDO('sqlsrv:server=ALL-IN-ONE; Database=PlanSv', 'sa', '123');
$subareas=$_POST["lsSub"];
$pep=$_POST["Epep"];

$zonas=$_POST["lsmunicempresa"];
//print_r($pep);

//ide de la consultoria
$idconsulto=$_POST["txtidconsultoria"];
//echo "id consultoria: ".$idconsulto;
$nombrecon=$_POST["NombreCon"];
$tipo=$_POST["lsTipo"];
$alcance=$_POST["lsAlcance"];
$fechain=$_POST["FechaIni"];
$fechafin=$_POST["FechaFin"];
//$tdr='tdr';
$presupuesto=$_POST["Presupuesto"];
$formapago=$_POST["FormaPago"];
$estado=$_POST["Estado"];



//VALIDACION SI ACTUALIZA O NO EL TDR
$vali=$_POST["validar"];

//OBTENIENDO DATOS DE LOS PRODUCTOS

//print_r($comenta);

$fecha='1900-01-01';
/*$contador=0;
foreach	($rec as $valor)
{
try
{
	if ($valor=="")
	{
   $valor=$fecha;
	}

	if ($pag[$contador]=="")
	{
  $pag[$contador]=$fecha;
	}

echo "Recibi: ".$valor." "." Pagado: ".$pag[$contador]."<br>";
}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contador++;
}
*/

if ($vali=="sitdr") 
{
//echo "<br><br>si actualzare el tdr";
//primero voy a eliminar las areas 

/*logica para el TDR*/

        $sql ="SELECT Codigoconsultoria FROM Consultoria where Codigoconsultoria = '$idconsulto'";	
		$consultaId = sqlsrv_query($conexion, $sql);

		while($rowId=sqlsrv_fetch_array($consultaId) )
		{
		$id = $rowId['Codigoconsultoria'];
		}

        $dir_destino = 'documentos/';
        $imagen_subida = $dir_destino.$id.basename($_FILES['archivo']['name']);

if(!is_writable($dir_destino))
{
	echo "<br>no tiene permisos";
}

else
{
	if(is_uploaded_file($_FILES['archivo']['tmp_name']))
	{
		
		if (move_uploaded_file($_FILES['archivo']['tmp_name'], $imagen_subida)) 
		{

$params = array( array($idconsulto, SQLSRV_PARAM_IN), array($nombrecon, SQLSRV_PARAM_IN), array($tipo, SQLSRV_PARAM_IN), array($alcance, SQLSRV_PARAM_IN), array($fechain, SQLSRV_PARAM_IN), array($fechafin, SQLSRV_PARAM_IN), array($imagen_subida, SQLSRV_PARAM_IN), array($presupuesto, SQLSRV_PARAM_IN), array($formapago, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_actualizarConsultoria(?,?,?,?,?,?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Consultoria Actualizada";
			}

		} 
		else
	    {
			echo "Posible ataque de carga de archivos!\n";
		}
	}
	else
	{
		echo "Posible ataque del archivo subido: ";
		echo "nombre del archivo '". $_FILES['archivo_usuario']['tmp_name'] . "'.";
	}
}




$consulta = "delete from DetalleConsultoria where Codigoconsultoria = :P_idcons";
$stmt = $con->prepare($consulta);
$stmt->bindParam(':P_idcons', $idconsulto, PDO::PARAM_INT);
$stmt->execute();

//ahora insertare las nuevas areas
$consultaS="";
$contadorDConsultoria=0;
foreach	($subareas as $valorA)
{
try
{
$params21 = array( 
array($idconsulto, SQLSRV_PARAM_IN),
array($valorA, SQLSRV_PARAM_IN));
$consultaS = sqlsrv_query($conexion, '{CALL spInsertarDConsultoria(?,?)}', $params21);
}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorDConsultoria++;
}

//eliminando los elementos pep
$consultap = "delete from DetalleConsultoriaPep where Codigoconsultoria = :P_idconsp";
$stmtp = $con->prepare($consultap);
$stmtp->bindParam(':P_idconsp', $idconsulto, PDO::PARAM_INT);
$stmtp->execute();

//ahora insertare los nuevos elementos pep
//$codSub=$_POST["lsSub"];
$consultaDConsultoria="";
$contadorDConsultoria=0;

foreach	($pep as $valor2)
{
try
{
$paramspep = array( 
array($idconsulto, SQLSRV_PARAM_IN),
array($valor2, SQLSRV_PARAM_IN));
$consultaDConsultoria = sqlsrv_query($conexion, '{CALL spInsertarPep(?,?)}', $paramspep);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorDConsultoria++;
}
//FIN DEL INSERT EN DETALLE CONSULTORIA


//Ahora eliminare los productos viejo
$consultapr = "delete from Producto where Codigoconsultoria = :P_idcons";
$stmtpr = $con->prepare($consultapr);
$stmtpr->bindParam(':P_idcons', $idconsulto, PDO::PARAM_INT);
$stmtpr->execute();


//AHHORA INSERTARE LOS NUEVOS PRODUCTOS
$produc=$_POST["txtNombProducto"];
$desem=$_POST["txtDesembolso"];
$rec=$_POST["txtRecibi"];
$pag=$_POST["txtpagado"];
$montop=$_POST["txtMontoP"];
$fechaplani=$_POST["txtFechaPlanificada"];
$comenta=$_POST["txtComentarios"];


$consultaProducto="";
$contadorProducto=0;
$fecha='1900-01-01';
foreach	($rec as $valor)
{
try
{
	if ($valor=="")
	{
   $valor=$fecha;
	}

	if ($pag[$contadorProducto]=="")
	{
  $pag[$contadorProducto]=$fecha;
	}


//echo "Recibi: ".$valor." "." Pagado: ".$pag[$contadorProducto]."<br>";
//LOGICA PARA LOS PARAMETROS
$paramsproda = array( 
array($idconsulto, SQLSRV_PARAM_IN),
array($produc[$contadorProducto], SQLSRV_PARAM_IN),
array($desem[$contadorProducto], SQLSRV_PARAM_IN),
array($valor, SQLSRV_PARAM_IN),
array($pag[$contadorProducto], SQLSRV_PARAM_IN),
array($montop[$contadorProducto], SQLSRV_PARAM_IN),
array($fechaplani[$contadorProducto], SQLSRV_PARAM_IN),
array($comenta[$contadorProducto], SQLSRV_PARAM_IN));
$consultaProducto = sqlsrv_query($conexion, '{CALL spInsertarProductoAdmin(?,?,?,?,?,?,?,?)}', $paramsproda);


}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorProducto++;
}

$consultaZ = "delete from ZonaTrabajo where Codigoconsultoria = :P_idcons";
$stmt = $con->prepare($consultaZ);
$stmt->bindParam(':P_idcons', $idconsulto, PDO::PARAM_INT);
$stmt->execute();

//ahora insertare las nuevas areas
$consultaS="";
$contadorZonas=0;
foreach	($zonas as $valorz)
{
try
{
$params21 = array( 
array($idconsulto, SQLSRV_PARAM_IN),
array($valorz, SQLSRV_PARAM_IN));
$consultaS = sqlsrv_query($conexion, '{CALL spInsertarZona(?,?)}', $params21);
}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorZonas++;
}
}


else if ($vali=="notdr") 
{
//echo "<br><br>no actualzare el tdr";
$params = array( array($idconsulto, SQLSRV_PARAM_IN), array($nombrecon, SQLSRV_PARAM_IN), array($tipo, SQLSRV_PARAM_IN), array($alcance, SQLSRV_PARAM_IN), array($fechain, SQLSRV_PARAM_IN), array($fechafin, SQLSRV_PARAM_IN),  array($presupuesto, SQLSRV_PARAM_IN), array($formapago, SQLSRV_PARAM_IN), array($estado, SQLSRV_PARAM_IN));
            /* Execute the query. */
            $consulta = sqlsrv_query($conexion, '{CALL sp_actualizarConsultorianotdr(?,?,?,?,?,?,?,?,?)}', $params);
            
			if( $consulta === false )
            {
                 echo "Error in executing statement 3.\n";
                 die( print_r( sqlsrv_errors(), true));
            }
			
			else
			{
				echo "Consultoria Actualizada";
			}



$consulta = "delete from DetalleConsultoria where Codigoconsultoria = :P_idcons";
$stmt = $con->prepare($consulta);
$stmt->bindParam(':P_idcons', $idconsulto, PDO::PARAM_INT);
$stmt->execute();

//ahora insertare las nuevas areas
$consultaS="";
$contadorDConsultoria=0;
foreach	($subareas as $valorA)
{
try
{
$params21 = array( 
array($idconsulto, SQLSRV_PARAM_IN),
array($valorA, SQLSRV_PARAM_IN));
$consultaS = sqlsrv_query($conexion, '{CALL spInsertarDConsultoria(?,?)}', $params21);
}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorDConsultoria++;
}

//eliminando los elementos pep
$consultap = "delete from DetalleConsultoriaPep where Codigoconsultoria = :P_idconsp";
$stmtp = $con->prepare($consultap);
$stmtp->bindParam(':P_idconsp', $idconsulto, PDO::PARAM_INT);
$stmtp->execute();

//ahora insertare los nuevos elementos pep
//$codSub=$_POST["lsSub"];
$consultaDConsultoria="";
$contadorDConsultoria=0;

foreach	($pep as $valor2)
{
try
{
$paramspep = array( 
array($idconsulto, SQLSRV_PARAM_IN),
array($valor2, SQLSRV_PARAM_IN));
$consultaDConsultoria = sqlsrv_query($conexion, '{CALL spInsertarPep(?,?)}', $paramspep);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorDConsultoria++;
}
//FIN DEL INSERT EN DETALLE CONSULTORIA


//Ahora eliminare los productos viejo
$consultapr = "delete from Producto where Codigoconsultoria = :P_idcons";
$stmtpr = $con->prepare($consultapr);
$stmtpr->bindParam(':P_idcons', $idconsulto, PDO::PARAM_INT);
$stmtpr->execute();


//AHHORA INSERTARE LOS NUEVOS PRODUCTOS
$produc=$_POST["txtNombProducto"];
$desem=$_POST["txtDesembolso"];
$rec=$_POST["txtRecibi"];
$pag=$_POST["txtpagado"];
$montop=$_POST["txtMontoP"];
$fechaplani=$_POST["txtFechaPlanificada"];
$comenta=$_POST["txtComentarios"];


$consultaProducto="";
$contadorProducto=0;
$fecha='1900-01-01';
foreach	($rec as $valor)
{
try
{
	if ($valor=="")
	{
   $valor=$fecha;
	}

	if ($pag[$contadorProducto]=="")
	{
  $pag[$contadorProducto]=$fecha;
	}


//echo "Recibi: ".$valor." "." Pagado: ".$pag[$contadorProducto]."<br>";
//LOGICA PARA LOS PARAMETROS
$paramsproda = array( 
array($idconsulto, SQLSRV_PARAM_IN),
array($produc[$contadorProducto], SQLSRV_PARAM_IN),
array($desem[$contadorProducto], SQLSRV_PARAM_IN),
array($valor, SQLSRV_PARAM_IN),
array($pag[$contadorProducto], SQLSRV_PARAM_IN),
array($montop[$contadorProducto], SQLSRV_PARAM_IN),
array($fechaplani[$contadorProducto], SQLSRV_PARAM_IN),
array($comenta[$contadorProducto], SQLSRV_PARAM_IN));
$consultaProducto = sqlsrv_query($conexion, '{CALL spInsertarProductoAdmin(?,?,?,?,?,?,?,?)}', $paramsproda);


}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorProducto++;
}

$consultaZ = "delete from ZonaTrabajo where Codigoconsultoria = :P_idcons";
$stmt = $con->prepare($consultaZ);
$stmt->bindParam(':P_idcons', $idconsulto, PDO::PARAM_INT);
$stmt->execute();

//ahora insertare las nuevas areas
$consultaS="";
$contadorZonas=0;
foreach	($zonas as $valorz)
{
try
{
$params21 = array( 
array($idconsulto, SQLSRV_PARAM_IN),
array($valorz, SQLSRV_PARAM_IN));
$consultaS = sqlsrv_query($conexion, '{CALL spInsertarZona(?,?)}', $params21);
}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorZonas++;
}

}



//header("Location:Consultoria.php");

     echo "<script>
window.location.replace('../../../principal.php?p=4');
     </script>";

?>