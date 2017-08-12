
<?php
	//include connection file 
	include_once("../../../../conexion/conexion.php");

	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

//bucle while

	//define index of column

	$where = $sqlTot = $sqlRec = "";


/*$sql="
select e.NombreEmpresa, c.NombreConsultoria, p.Producto,

convert(varchar(25), p.fechaPlanificada, 120) as fecha,
  convert(varchar(25), p.RecibiConforme, 120) as fecha2

 from Contrato co, Consultoria c, EmpresaPersona e, Producto p
where co.Codigoconsultoria=c.Codigoconsultoria and
co.CodigoEmpresa=e.CodigoEmpresa and
c.Codigoconsultoria=p.Codigoconsultoria

";
*/

$sql="

select e.NombreEmpresa, c.NombreConsultoria, p.Producto,
convert(varchar(25), p.fechaPlanificada, 120) as fechaplani,
CASE 
      WHEN  p.RecibiConforme = '1900-01-01'  THEN 'no pagado' 
      else  convert(varchar(25), p.RecibiConforme , 120)
END as recibi

from Contrato co, Consultoria c, EmpresaPersona e, Producto p
where co.Codigoconsultoria=c.Codigoconsultoria and
co.CodigoEmpresa=e.CodigoEmpresa and
c.Codigoconsultoria=p.Codigoconsultoria";

	$columns = array( 
		0 => 'NombreEmpresa',
		1 => 'NombreConsultoria', 
		2 => 'Producto',
		3 => 'fechaplani',
		4 => 'recibi'

		//5 => $inicio2
				//3 =>'FechaInicio',
		//4 =>'FechaFin', 
		//4 =>'FechaFin', 
		//DATE_FORMAT($row['FechaFin'],'Y-m-d')
		
	);
	$sqlTot .= $sql;
	$sqlRec .= $sql;


 	$sqlRec .=  " ORDER BY 	NombreConsultoria";
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
	