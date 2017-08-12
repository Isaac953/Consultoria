<?php 

include("../../../../conexion/conexion.php");
/*$query="select distinct(A.CodigoArea),E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor, A.AreaEspecializacion
 from EmpresaPersona E, Consultores C, detalleEmpresa D, AreaEspecializacion A, SubArea S
 where E.CodigoEmpresa = C.CodigoEmpresa and E.CodigoEmpresa=D.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and A.CodigoArea=S.CodigoArea ;
";
*/
$query="select co.CodigoContrato, c.Codigoconsultoria, e.NombreEmpresa, c.NombreConsultoria from Consultoria c, Contrato co, EmpresaPersona e
where c.Codigoconsultoria=co.Codigoconsultoria
and co.CodigoEmpresa=e.CodigoEmpresa
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
$( document ).ready(function() {
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

<h1 align="center"><p style="font-family: Verdana; color:#0072bb">EVALUACIONES POR EQUIPO CONSULTOR</h1>
<br>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
            <th style='text-align:center; width: 5%; background-color: rgb(0, 114, 187); color:white;'>Nº</th>
            <th style='text-align:center; width: 25%; background-color: rgb(0, 114, 187); color:white;'>Cosultoria</th>
            <th style='text-align:center; width: 20%; background-color: rgb(0, 114, 187); color:white;'>Empresa</th>
             <th style='text-align:center; width: 35%; background-color: rgb(0, 114, 187); color:white;'>Áreas</th>
             <th style='text-align:center; width: 15%; background-color: rgb(0, 114, 187); color:white;'>Puntaje evaluación</th>


                    </tr>
                </thead>
                
        <tbody>
          <?php

           while($row=sqlsrv_fetch_array($resultado))
          { 
            //obteniendo el codigo de la empresa
            $idconsultoria=$row['Codigoconsultoria'];
            $codcontrato=$row["CodigoContrato"];
            ?>
            <tr width=90px, height=35px>
            <td style='text-align:center;'><?php echo $row['Codigoconsultoria'];?></td>

              <td style='text-align:center;'><?php echo $row['NombreConsultoria'];?></td>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'>

<?php 

$queryArea="
select distinct(A.CodigoArea), A.AreaEspecializacion from Consultoria c, DetalleConsultoria D, AreaEspecializacion A, SubArea S
where c.Codigoconsultoria=D.Codigoconsultoria
and D.CodigoSubArea=S.CodigoSubArea
and S.CodigoArea=A.CodigoArea
and c.Codigoconsultoria = '$idconsultoria' ";

$resultadoArea=sqlsrv_query($conexion, $queryArea);

  while($rowA=sqlsrv_fetch_array($resultadoArea))
          { 

            echo "&nbsp; &nbsp; &nbsp".$rowA['AreaEspecializacion']." ";
          }
 ?>

              </td>
              <?php
//para el promedio de la consultoria
     $querypromedio = "exec promedioConsultoria '$codcontrato';"; // Cambiar el 6 por el codigo de consultoria 
      $resultadopromedio=sqlsrv_query($conexion,$querypromedio);
while($filaPromedio = sqlsrv_fetch_array($resultadopromedio,SQLSRV_FETCH_NUMERIC))
      {
$promedio=$filaPromedio[0];
      }
?>
              <td style='text-align:center;'>
                <?php echo $promedio; ?>
              </td>

            </tr>
            <?php } ?>
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