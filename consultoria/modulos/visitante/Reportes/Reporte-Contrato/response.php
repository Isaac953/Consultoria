<?php
	//include connection file 
	include_once("../../../../conexion/conexion.php");
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$params = $_REQUEST;

//bucle while
	//define index of column
	$where = $sqlTot = $sqlRec = "";
	// getting total number records without any search
	/*$sql = "select Co.CodigoContrato, Ca.NombreConsultoria, E.NombreEmpresa, Co.Estatus, Co.montoOfertado, Co.FechaInicio from 
Contrato Co, Consultoria Ca, EmpresaPersona E where 
Co.Codigoconsultoria=Ca.Codigoconsultoria and Co.CodigoEmpresa=E.CodigoEmpresa ";
*/

$sql="
select Co.CodigoContrato, Ca.NombreConsultoria, E.NombreEmpresa,
 CASE

    WHEN Co.Estatus = 1

     THEN 'Activo'

     ELSE 'Inactivo'

     END AS estado , REPLACE(convert(varchar(128), CAST(Co.montoOfertado as money), 1), '.00', '') as monto,
  convert(varchar(25), Co.FechaInicio, 120) as fecha,
  convert(varchar(25), Co.FechaFin, 120) as fecha2  from 
Contrato Co, Consultoria Ca, EmpresaPersona E where 
Co.Codigoconsultoria=Ca.Codigoconsultoria and Co.CodigoEmpresa=E.CodigoEmpresa
";

$resultado3=sqlsrv_query($conexion,$sql);
$cont=sqlsrv_fetch_array($resultado3,SQLSRV_FETCH_ASSOC);
//$inicio=$cont['FechaInicio'];
$con=$cont["CodigoContrato"];
$emp=$cont["NombreEmpresa"];
$consul=$cont["NombreConsultoria"];
$esta=$cont["estado"];
$monto=$cont["monto"];
//$fecha='f';
//$fecha.=DATE_FORMAT($cont["FechaInicio"], 'Y-m-d');
$fecha=$cont["fecha"];
$fechaf=$cont["fecha2"];
//$inicio2= DATE_FORMAT($inicio,'Y-m-d')

	$columns = array( 
		0 => $con,
		1 => $emp, 
		2 => $consul,
		3 => $esta,
		4 => $monto,
		5 => $fecha,
		6 => $fechaf
		//5 => $inicio2
				//3 =>'FechaInicio',
		//4 =>'FechaFin', 
		//4 =>'FechaFin', 
		//DATE_FORMAT($row['FechaFin'],'Y-m-d')	
	);

	$sqlTot .= $sql;
	$sqlRec .= $sql;


 	$sqlRec .=  " ORDER BY 	NombreEmpresa";
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
	