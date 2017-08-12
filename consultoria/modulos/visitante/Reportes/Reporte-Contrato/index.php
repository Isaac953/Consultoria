<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contratos</title>
<link rel="stylesheet" type="text/css" href="../../../../librerias/css/datatables.min.css"/>
 
<script type="text/javascript" src="../../../../librerias/js/datatables2.min.js"></script>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #101010;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color:  #333333;
}
</style>
</head>

<div class="container">
<ul>
  <li><a class="active" href="../../../../principal.php" style="font-family: Verdana; font-weight: bold;">Regresar a Inicio</a></li>
</ul>
</div>
        
<script type="text/javascript" src="datatables2.min.js"></script>

<br>

    <div class="container">
      <div>
        <img width="200px" style="position:absolute; margin-right:11%; margin-left:2%; margin-bottom: 5%;" src="../../../../librerias/images/logo.png"/>
        <br>
        </div>
      </div>
	
	<div class="container" style="padding:20px;">
      <div class="">
        <h1 align="center"><p style="font-family: Verdana; color:#0072bb">REPORTE DE CONTRATOS</h1>
        <div class="">
		<table id="employee_grid" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="background-color:#0072bb; color:white;">N° Contrato</th>
                <th style="background-color:#0072bb; color:white;">Consultoria</th>
                <th style="background-color:#0072bb; color:white;">Empresa</th>

                <th style="background-color:#0072bb; color:white;">Estatus</th>

                <th style="background-color:#0072bb; color:white;">Monto Ofertado</th>

                <th style="background-color:#0072bb; color:white;">Fecha Inicio</th>
                <th style="background-color:#0072bb; color:white;">Fecha Fin</th>


            </tr>

        </thead>
 
      
    </table>

    </div>
      </div>

    </div>

<script type="text/javascript">
$( document ).ready(function() {
$('#employee_grid').DataTable({
         "processing": true,
         "sAjaxSource":"response.php",
         "dom": 'lBfrtip',
         "language": {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
},
         "buttons": [
            {
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'excel',
                    'print'
                ]
            }
        ]
        });
});
</script>