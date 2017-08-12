<?php
//$con = new PDO('sqlsrv:server=PLAN-WSVR2012\SAC; Database=PlanSv', 'Plan', 'Pa$$w0rd'); 
include('conexion.php');
$con = new PDO('sqlsrv:server=AMSVSLVSQL1\CONSULTORIA; Database=PlanSv', 'sa', 'C0nsult0ri4');
$subareas=$_POST["lsSub"];
$pep=$_POST["Epep"];
//print_r($pep);

//ide de la consultoria
$idconsulto=$_POST["txtidconsultoria"];
echo "id consultoria: ".$idconsulto;
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
echo "<br><br>si actualzare el tdr";
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


echo "Recibi: ".$valor." "." Pagado: ".$pag[$contadorProducto]."<br>";
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


}


else if ($vali=="notdr") 
{
echo "<br><br>no actualzare el tdr";
}

/*$fecini=$_POST["FechaIn"];
$fecfin=$_POST["FechaFi"];
//$fecreg=$_POST["FechaRe"];
$pres=$_POST["Presupuesto"];
$forpag=$_POST["FormaPago"];
$tdr="tdr";
$tipcon=$_POST["TipoConsultoria"];
$nivalc=$_POST["NivelAlcance"];
$estado=1;


/*
$proyec=$_POST["txt_Eproyect"];
$concat='';

foreach ($_POST["txt_Eproyect"] as $como) 
{
	$concat.=$como;
	# code...
}
*/

/*
        $sql ="SELECT Codigoconsultoria FROM Consultoria ORDER BY Codigoconsultoria asc";	
		$consultaId = sqlsrv_query($conexion, $sql);

		$id = 1;
		while($rowId=sqlsrv_fetch_array($consultaId) )
		{
		$id = $rowId['Codigoconsultoria'];
		$id++;	
		}


        $dir_destino = 'documentos/';
        $imagen_subida = $dir_destino.$id.basename($_FILES['archivo']['name']);

if(!is_writable($dir_destino))
{
	echo "no tiene permisos";
}
else
{
	if(is_uploaded_file($_FILES['archivo']['tmp_name']))
	{
		
		if (move_uploaded_file($_FILES['archivo']['tmp_name'], $imagen_subida)) 
		{


$consulta = "insert into Consultoria (
NombreConsultoria,
CodigoPersonal, 
FechaInicio,
FechaFinal,
Presupuesto,
FormaPa,
TDR,
TipoConsultoria,
NivelAlcance,
Estado
)

 VALUES 
 (
:P_NombreConsultoria,
:p_CodigoPersonal, 
:P_FechaInicio,
:P_FechaFinal,
:P_Presupuesto,
:P_FormaPago,
:P_TDR,
:P_TipoConsultoria,
:P_NivelAlcance,
:P_Estado
)";

$stmt = $con->prepare($consulta);
$stmt->bindParam(':P_NombreConsultoria', $nomcon, PDO::PARAM_INT);
$stmt->bindParam(':p_CodigoPersonal', $codper, PDO::PARAM_INT);
$stmt->bindParam(':P_FechaInicio', $fecini, PDO::PARAM_INT);
$stmt->bindParam(':P_FechaFinal', $fecfin, PDO::PARAM_INT);
$stmt->bindParam(':P_Presupuesto', $pres, PDO::PARAM_INT);
$stmt->bindParam(':P_FormaPago', $forpag, PDO::PARAM_INT);
$stmt->bindParam(':P_TDR', $imagen_subida, PDO::PARAM_INT);
$stmt->bindParam(':P_TipoConsultoria', $tipcon, PDO::PARAM_INT);
$stmt->bindParam(':P_NivelAlcance', $nivalc, PDO::PARAM_INT);
$stmt->bindParam(':P_Estado', $estado, PDO::PARAM_INT);

$stmt->execute();
$lastId = $con->lastInsertId();
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


//LOGICA PARA INSERTAR EN DETALLE DE CONSULTORIA

$pep=$_POST["Epep"];
//$codSub=$_POST["lsSub"];
$consultaDConsultoria="";
$contadorDConsultoria=0;

foreach	($pep as $valor2)
{
try
{
$params2 = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valor2, SQLSRV_PARAM_IN));
$consultaDConsultoria = sqlsrv_query($conexion, '{CALL spInsertarPep(?,?)}', $params2);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorDConsultoria++;
}
//FIN DEL INSERT EN DETALLE CONSULTORIA


//PARA INSERTAR LAS AREAS DE LA CONSULTORIA
$codSub=$_POST["lsSub"];
$consultaDConsultoria2="";
$contadorDConsultoria2=0;

foreach	($codSub as $valorA)
{
try
{
$params21 = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valorA, SQLSRV_PARAM_IN));
$consultaDConsultoria2 = sqlsrv_query($conexion, '{CALL spInsertarDConsultoria(?,?)}', $params21);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorDConsultoria2++;
}





//LOGICA PARA INSERTAR LOS PRODUCTOS

$produc=$_POST["txtNombProducto"];
$desemb=$_POST["txtDesembolso"];
$fecPlanif=$_POST["txtFechaPlanificada"];

$consultaProducto="";
$contadorProducto=0;

foreach	($desemb as $valor1)
{
try
{
$params1 = array( 
array($lastId, SQLSRV_PARAM_IN),
array($produc[$contadorProducto], SQLSRV_PARAM_IN),
array($valor1, SQLSRV_PARAM_IN),
array($fecPlanif[$contadorProducto], SQLSRV_PARAM_IN));
$consultaProducto = sqlsrv_query($conexion, '{CALL spInsertarProductoInicio(?,?,?,?)}', $params1);

}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorProducto++;

}

//LOGICA PARA INSERTAR ZONAS DE TRABAJO


if ($nivalc!="Nacional")
{

$Zmunic=$_POST["lsmunicempresa"];

$consultaZona="";
$contadorZona=0;

foreach	($Zmunic as $valor3)
{

try
{
$params3 = array( 
array($lastId, SQLSRV_PARAM_IN),
array($valor3, SQLSRV_PARAM_IN));
$consultaZona = sqlsrv_query($conexion, '{CALL spInsertarZona(?,?)}', $params3);
}
catch(Exception $e)
{
	throw new $e;
	}

//fin de la insercion
$contadorZona++;

}




}



//header("Location:Consultoria.php");

     echo "<script>
window.location.replace('../../../principal.php');
     </script>";

*/

?>