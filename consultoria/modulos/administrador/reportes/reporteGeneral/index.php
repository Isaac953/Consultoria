<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte General</title>
<link rel="stylesheet" type="text/css" href="datatables.min.css"/>
 
<script type="text/javascript" src="datatables2.min.js"></script>
	
	<div class="container" style="padding:20px;">
      <div class="">
        <h1 align="center"><p style="font-family: Verdana; color:#0072bb">REPORTE GENERAL</h1>
        <div class="">
		<table id="employee_grid" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="background-color:#0072bb; color:white;">Consultoria</th>
                <th style="background-color:#0072bb; color:white;">Empresa</th>
                <th style="background-color:#0072bb; color:white;">Nombre</th>

                <th style="background-color:#0072bb; color:white;">Criterio</th>

                <th style="background-color:#0072bb; color:white;">Parametro</th>
                <th style="background-color:#0072bb; color:white;">Puntaje</th>



            </tr>



        </thead>
        <tbody></tbody>

<tfoot>
    <tr>
<th>Nombre:</th>
<th>Firma</th>
<th>Fecha:</th>

    </tr>

</tfoot>
    </table>

    </div>
      </div>

    </div>

<script type="text/javascript">
$( document ).ready(function() 
{

$('#employee_grid').DataTable({
         "processing": true,
         "sAjaxSource":"response.php",
         "dom": 'lBfrtip',

         "buttons": 
         [
            {
                extend: 'collection',
                text: 'Export',
                buttons: 
                [
      {
      extend: 'excel',
      text: '<i class="fa fa-file-pdf-o"></i> Excel',
      title: 'Reporte Excel',
      exportOptions: {
      columns: ':not(.no-print)'
      },
      footer: true
    },
      
      {
      extend: 'print',
      text: '<i class="fa fa-file-pdf-o"></i> Imprimir',
      title: 'Imprimir Reporte',
      exportOptions: 
      {
      columns: ':not(.no-print)'
      },
      footer: true
    } 
                
                ]
            }
        ]
});
});
</script>