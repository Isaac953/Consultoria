<?php 

include("../../../../conexion/conexion.php");
/*$query="select distinct(A.CodigoArea),E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor, A.AreaEspecializacion
 from EmpresaPersona E, Consultores C, detalleEmpresa D, AreaEspecializacion A, SubArea S
 where E.CodigoEmpresa = C.CodigoEmpresa and E.CodigoEmpresa=D.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and A.CodigoArea=S.CodigoArea ;
";
*/

$query="select  C.CodigoConsultor, E.CodigoEmpresa, E.NombreEmpresa, C.NombresConsultor, C.ApellidosConsultor
 from EmpresaPersona E, Consultores C
 where E.CodigoEmpresa = C.CodigoEmpresa;
";

$resultado=sqlsrv_query($conexion, $query);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>reporte</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

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

<center><legend><h1 align=center><p style="font-family: Verdana; color:#0072bb"><strong>EMPRESA EQUIPO CONSULTOR</strong></p></h1></legend></center>
<br>
            <table  id="example" class="display" cellspacing="0" width="100%" style="text-align: center">
                <thead>
                    <tr>
          
            <th style='text-align:center; width: 30%; background-color: rgb(0, 114, 187); color:white;'>Empresa</th>
            <th style='text-align:center; width: 20%; background-color: rgb(0, 114, 187); color: white;'>Áreas Especialización</th>
            <th style='text-align:center; width: 30%; background-color: rgb(0, 114, 187); color: white;'>Nombre Consultor</th>
             <th style='text-align:center; width: 10%; background-color: rgb(0, 114, 187); color: white;'>Recomendaciones</th>
             <th style='text-align:center; width: 10%; background-color: rgb(0, 114, 187); color: white;'>No Recomendaciones</th>


                    </tr>
                </thead>
                
        <tbody>
          <?php

           while($row=sqlsrv_fetch_array($resultado))
          { 
            //obteniendo el codigo de la empresa
            $idempresa=$row['CodigoEmpresa'];
            $idconsultor=$row["CodigoConsultor"];
            ?>
            <tr width=90px, height=35px>
              <td style='text-align:center;'><?php echo $row['NombreEmpresa'];?></td>
              <td style='text-align:center;'>

<?php 

$queryArea="
 select distinct(A.CodigoArea), A.AreaEspecializacion from detalleEmpresa D, EmpresaPersona E, AreaEspecializacion A, SubArea S
 where D.CodigoEmpresa=E.CodigoEmpresa
 and D.CodigoSubArea=S.CodigoSubArea
 and S.CodigoArea=A.CodigoArea and E.CodigoEmpresa = '$idempresa';";

$resultadoArea=sqlsrv_query($conexion, $queryArea);

  while($rowA=sqlsrv_fetch_array($resultadoArea))
          { 

            echo "&nbsp; &nbsp; &nbsp".$rowA['AreaEspecializacion']." ";
          }
 ?>

              </td>
              <td style='text-align:center;'><?php echo $row['NombresConsultor']." ".$row['ApellidosConsultor'] ;?></td>

      <td style='text-align:center;'>
        
        <?php 

$queryRecomendado=" select c.NombresConsultor,  COUNT(*) as recomendaciones from Consultores c, EvaluacionFinalConsultores e
 where c.CodigoConsultor = e.CodigoConsultor and c.CodigoConsultor = '$idconsultor'
 and e.resultado = 'Recomendado' group by c.NombresConsultor, c.CodigoConsultor;";

$resultadoR=sqlsrv_query($conexion, $queryRecomendado);

  while($rowR=sqlsrv_fetch_array($resultadoR))
          { 

            echo $rowR['recomendaciones'];
          }
 ?>


      </td>
      <td style='text-align:center;'>
        
                <?php 

$queryNoRecomendado=" select c.NombresConsultor,  COUNT(*) as recomendaciones from Consultores c, EvaluacionFinalConsultores e
 where c.CodigoConsultor = e.CodigoConsultor and c.CodigoConsultor = '$idconsultor'
 and e.resultado = 'No Recomendado' group by c.NombresConsultor, c.CodigoConsultor;";

$resultadoNoR=sqlsrv_query($conexion, $queryNoRecomendado);

  while($rowN=sqlsrv_fetch_array($resultadoNoR))
          { 

            echo $rowN['recomendaciones'];
          }
 ?>

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