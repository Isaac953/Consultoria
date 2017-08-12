<?php 
include("../../../../conexion/conexion.php");
$idconsulto = base64_decode($_REQUEST['idcons']); 
echo $idconsulto;

$query="
select c.NombreConsultoria, o.NombreEmpresa, p.Nombres, cr.Criterio, pa.Parametro, ev.Puntaje from  Consultoria c, Ofertas o, Asignacion a, Personal p,
EvaluacionOfertas ev, Criterios cr, ParametrosCriterios pa
where c.Codigoconsultoria=o.Codigoconsultoria
and a.CodigoConsultoria=c.Codigoconsultoria
and a.CodigoPersonal=p.CodigoPersonal
and ev.CodigoAsignacion = a.CodigoAsignacion
and ev.CodigoOferta=o.CodigoOferta
and cr.CodigoCriterio=pa.CodigoCriterio
and ev.CodigoParametrosCriterios=pa.CodigoParametrosCriterios
 and c.Codigoconsultoria = '$idconsulto '
 order by a.CodigoAsignacion; ";

 $resultado=sqlsrv_query($conexion,$query);

?>