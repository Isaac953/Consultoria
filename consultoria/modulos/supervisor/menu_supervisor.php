<div id="wrapper">
<div class="list-group">
<ul class="nav nav-pills nav-stacked">

    <ul class="menu2">
        <li class="item1"><a href="#" class="list-group-item"><i class="fa fa-user"><span style="font-family: Arial; font-weight: bold;"> Evaluación de Consultoria</i></span></a>
            <ul>
            <li class="subitem1"><a href="#" class="list-group-item" onclick="ShowConsultoresS();"><i class="fa fa-user-plus"><span style="font-family: Arial;"> Evaluar Consultores </i></span></a></li>  
                <li class="subitem1"><a href="#" class="list-group-item" onclick="showVerEvaC();"><i class="fa fa-user-plus"><span style="font-family: Arial;"> Evaluar Consultoria</i></span></a></li>
                <li class="subitem1"><a href="#" class="list-group-item" onclick="showHistorial();"><i class="fa fa-user-plus"><span style="font-family: Arial;"> Historial de Evaluaciones </i></span></a></li>
            </ul>

                    <li class="item1"><a href="#" class="list-group-item"><i class="fa fa-user"><span style="font-family: Arial; font-weight: bold;"> Requisición </i></span></a>
            <ul>
                <li class="subitem1"><a href="modulos/solicitante/ConsultoriaVista/Consultoria.php" class="list-group-item" ><i class="fa fa-user-plus"><span style="font-family: Arial;"> Consultoría</i></span></a></li>
                <li class="subitem1"><a href="#" class="list-group-item" onclick="ShowSeguimiento();"><i class="fa fa-user-plus"><span style="font-family: Arial;"> Seguimiento </i></span></a></li>
            </ul>
        </li>

        <li class="item1"><a href="#" class="list-group-item"><i class="fa fa-user"><span style="font-family: Arial; font-weight: bold;"> Reportes </i></span></a>
            <ul>
<li class="subitem1"><a href="modulos/visitante/Reportes/Reporte-Consultores/reporte1.php" class="list-group-item"><i class="fa fa-user-plus"><span style="font-family: Arial;"> Empresa Consultores</i></span></a></li>
            <li class="subitem1"><a href="modulos/visitante/Reportes/Reporte-EvaConsultoria/reporte2.php" class="list-group-item"><i class="fa fa-user-plus"><span style="font-family: Arial;"> Consultoria Empresa</i></span></a></li>
            <li class="subitem1"><a href="modulos/visitante/Reportes/Reporte-ConsultoriaP/index.php" class="list-group-item"><i class="fa fa-user-plus"><span style="font-family: Arial;"> Consultoria Productos</i></span></a></li>
            <li class="subitem1"><a href="modulos/visitante/Reportes/Reporte-Contrato/index.php" class="list-group-item"><i class="fa fa-user-plus"><span style="font-family: Arial;"> Contratos Registrados</i></span></a></li>
            </ul>    </ul>

    </ul>
 </div>
</div>

<script type="text/javascript">
$(function() {

    var menu_ul = $('.menu2 > li > ul'),
        menu_a  = $('.menu2 > li > a');
    
    menu_ul.hide();

    menu_a.click(function(e) {
        e.preventDefault();
        if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
        }
    });

});
</script>
