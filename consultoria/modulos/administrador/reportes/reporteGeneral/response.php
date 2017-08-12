
<?php
	include_once("connection.php");
	$params = $columns = $totalRecords = $data = array();
	$params = $_REQUEST;
	$where = $sqlTot = $sqlRec = "";

$sql="
select c.NombreConsultoria, o.NombreEmpresa, p.Nombres, cr.Criterio, pa.Parametro, ev.Puntaje from  Consultoria c, Ofertas o, Asignacion a, Personal p,
EvaluacionOfertas ev, Criterios cr, ParametrosCriterios pa
where c.Codigoconsultoria=o.Codigoconsultoria
and a.CodigoConsultoria=c.Codigoconsultoria
and a.CodigoPersonal=p.CodigoPersonal
and ev.CodigoAsignacion = a.CodigoAsignacion
and ev.CodigoOferta=o.CodigoOferta
and cr.CodigoCriterio=pa.CodigoCriterio
and ev.CodigoParametrosCriterios=pa.CodigoParametrosCriterios
 and c.Codigoconsultoria = 1";

	$columns = array( 
		0 => 'NombreConsultoria',
		1 => 'NombreEmpresa', 
		2 => 'Nombres',
		3 => 'Criterio',
		4 => 'Parametro',
		5 => 'Puntaje'

		//5 => $inicio2
				//3 =>'FechaInicio',
		//4 =>'FechaFin', 
		//4 =>'FechaFin', 
		//DATE_FORMAT($row['FechaFin'],'Y-m-d')
		
	);




	$sqlTot .= $sql;
	$sqlRec .= $sql;


 	$sqlRec .=  " order by a.CodigoAsignacion";
    $queryTot=sqlsrv_query($conexion,$sqlTot);
	/*$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));
*/

	$totalRecords = sqlsrv_num_rows($queryTot);

	$queryRecords = sqlsrv_query($conexion, $sqlRec);
	//or die("error to fetch employees data");

	//iterate on results row and create new index array of data
	$i=0;
 while( $row = sqlsrv_fetch_array($queryRecords) ) 
	{ 

		/*$data[] = $row[0];
		$data[] = $row[1];
		$data[] = $row[2];
*/
    $data[$i]= $row;
    $i++;
	}	


/*$i=0;
while( $row = sqlsrv_fetch_object($queryRecords)) 
{ 
    $data->idUsuario = $row->idUsuario;
    $data->usuario = $row->usuario;
    $data->contrasenia = $row->contrasenia;
    //echo json_encode($locations);

    $data[$i]= $data;
    $i++;
}
*/
	$json_data = array(
			"draw"            => 1,   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	