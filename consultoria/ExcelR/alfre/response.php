
<?php
	//include connection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'idUsuario',
		1 =>'usuario', 
		2 => 'contrasenia'
	);

	$where = $sqlTot = $sqlRec = "";

	// getting total number records without any search
	$sql = "SELECT * FROM usuarios ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;


 	$sqlRec .=  " ORDER BY usuario";
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
	