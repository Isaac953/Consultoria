<?php 
include("../../../../conexion/conexion.php");
$idconsulto = base64_decode($_REQUEST['idcons']);

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
 and c.Codigoconsultoria = '$idconsulto'";

$resultado=sqlsrv_query($conexion,$sql);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
      "processing": true,
        dom: 'Bfrtip',
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
      extend: 'print',
      text: '<i class="fa fa-file-pdf-o"></i> Imprimir',
      title: 'Reporte Equipo Consultor',
      exportOptions: 
      {
      columns: ':not(.no-print)'
      },
      footer: true
    }, 
             {
      extend: 'excel',
      text: '<i class="fa fa-file-pdf-o"></i> Excel R',
      title: 'Reporte Equipo Consultor',
      exportOptions: 
      {
      columns: ':not(.no-print)'
      },
      footer: true
    }
        ]
    } );
} );
  </script>
</script>

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

 <body>
	
	<div class="container" style="padding:20px;">
      <div class="">
        <h1 align="center"><p style="font-family: Verdana; color:#0072bb">REPORTE GENERAL</h1>
        <div class="">
		
		<table id="example" class="display" width="100%" cellspacing="0">
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
 <?php while($row=sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC))
 {
?>
  <tr width=90px, height=35px>
  <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
  <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
  <td style='text-align:center;'><?php echo $row['Nombres'];?></td>
  <td style='text-align:center;'><?php echo $row['Criterio'];?></td>
  <td style='text-align:center;'><?php echo $row['Parametro'];?></td>
  <td style='text-align:center;'><?php echo $row['Puntaje'];?></td>

<?php
}
?>

    </table>

    </div>
      </div>

    </div>

 </body>
 </html>