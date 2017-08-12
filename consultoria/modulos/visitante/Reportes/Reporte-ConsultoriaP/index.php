<?php 

include("../../../../conexion/conexion.php");

$query="select e.NombreEmpresa, c.NombreConsultoria, p.Producto, p.fechaPlanificada, p.RecibiConforme 
from Contrato co, Consultoria c, EmpresaPersona e, Producto p
where co.Codigoconsultoria=c.Codigoconsultoria and
co.CodigoEmpresa=e.CodigoEmpresa and
c.Codigoconsultoria=p.Codigoconsultoria
";

$resultado=sqlsrv_query($conexion, $query);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>reporte</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.1.3/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.3.2/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/keytable/2.2.0/js/dataTables.keyTable.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.1.3/css/autoFill.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.2.0/css/keyTable.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />

<script type="text/javascript">
$( document ).ready(function() 
{

$('#example').DataTable({
         "processing": true,
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

         "buttons": 
         [
            {
                extend: 'collection',
                text: 'Exportar',
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

<div STYLE=" width: 100%; font-size: 12px; overflow: auto;">

<center><legend><h1 align=center><p style="font-family: Verdana; color:#0072bb"><strong>CONSULTORÍA Y PRODUCTOS</strong></p></h1></legend></center>
<br>
<table  id="example" class="display" cellspacing="0" width="100%" style="text-align: center">
           <thead>
            <tr>
                <th style="background-color:#0072bb; color:white;">Empresa</th>
                <th style="background-color:#0072bb; color:white;">Consultoria</th>
                <th style="background-color:#0072bb; color:white;">Producto</th>
                <th style="background-color:#0072bb; color:white;">Fecha Planificada</th>
                <th style="background-color:#0072bb; color:white;">Fecha Entrega</th>
                <th style="background-color:#0072bb; color:white;">Días de retraso</th>
            </tr>
        </thead>
               

        <tbody>
          <?php
$retraso='';
$diasretraso=0;

           while($row=sqlsrv_fetch_array($resultado))
          { 

        $fechaplani=DATE_FORMAT($row['fechaPlanificada'], 'Y-m-d');
        $fecharecibi=DATE_FORMAT($row['RecibiConforme'], 'Y-m-d');

$retraso='';
$fechaPlanificada = new DateTime($fechaplani);
$fechaEntrega = new DateTime($fecharecibi);
$fechadefault=new DateTime('1900-01-01');
$hoy=DATE('Y-m-d');
$fechahoy=new datetime($hoy);

if ($fechaEntrega == $fechadefault) 
{

$fecharecibi='No Entregado';
//$retraso=$fechahoy;
$intervalo = $fechahoy ->diff($fechaPlanificada);
$retraso= "No entregado con ".$intervalo ->format('%a días')." disponibles";

if ($fechaEntrega == $fechadefault and $fechaPlanificada < $fechahoy) 
{

$fecharecibi='No Entregado';
//$retraso=$fechahoy;
$intervalo = $fechahoy ->diff($fechaPlanificada);
$retraso= "<b style='background-color: #F52C2C'>"."No entregado con ".$intervalo ->format('%a días')." de retraso"."</b>";


}


}



else if ($fechaEntrega > $fechaPlanificada) 
{
$intervalo = $fechaPlanificada ->diff($fechaEntrega);
$retraso = "<b style='background-color: #F52C2C'>".$intervalo ->format('%a días de retraso')."</b>";  
}

else if ($fechaPlanificada > $fechaEntrega) 
{
 $intervalo = $fechaEntrega ->diff($fechaPlanificada);
$retraso = "Entregado a tiempo";  
}

else if ($fechaPlanificada ==  $fechaEntrega) 
{
$retraso = "Entregado a tiempo";  
}
     ?>
          <tr>
          <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
          <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>   
          <td style='text-align:center;'><?php echo $row['Producto'];?></td>   
          <td style='text-align:center;'><?php echo $fechaplani; ?></td>         
          </td>   
         <td style='text-align:center;'><?php echo $fecharecibi?></td>

         <td style='text-align:center;'>
           <?php echo $retraso; ?>
         </td> 
         </tr>
          <?php
        } 
          ?>
        </tbody>
                  
            </table>
            </div>
      <?php} else { 
echo "¡ No se ha encontrado ningún registro !"; 
}    
?>

<div id="contenido">
  
</div>

</body>
</html>