function verReportesOfertas(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/reportes/Promedio.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


function verReportesOfertasC(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/reportes/Promedio.php",
		data: {id},
		type: "post"
	});
}
//showReportesConsult
function showReportesConsult(){
	$.ajax({
		url : "modulos/administrador/reportes/Cuadro_Con.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

//FUNCIONES JAVASCRIPT que sirven para direccionar a las diferentes opciones del menu administrador y mas
function showAreas(){
	$.ajax({
		url : "modulos/administrador/Areas/Cuadro_Are.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewAreas(){
	$.ajax({
		url : "modulos/administrador/Areas/Inser_Are.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showSubAreas(){
	$.ajax({
		url : "modulos/administrador/SubAreas/Cuadro_Sub.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewSubAreas(){
	$.ajax({
		url : "modulos/administrador/SubAreas/Inser_Sub.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showContrato(){
	$.ajax({
		url : "modulos/administrador/Contrato/Cuadro_Cont.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewContrato(){
	$.ajax({
		url : "modulos/administrador/Contrato/Inser_Cont.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showConsultores(){
	$.ajax({
		url : "modulos/administrador/ConsultoR/Cuadro_Consultores.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showCriterios(){
	$.ajax({
		url : "modulos/administrador/Criterios/Cuadro_Cri.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewCriterios(){
	$.ajax({
		url : "modulos/administrador/Criterios/Inser_Cri.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showParametros(){
	$.ajax({
		url : "modulos/administrador/Parametros/Cuadro_Par.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewParametros(){
	$.ajax({
		url : "modulos/administrador/Parametros/Inser_Par.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showEmpresa(){
	$.ajax({
		url : "modulos/administrador/Empresa/Cuadro_EmpC.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showAccesos(){
	$.ajax({
		url : "modulos/administrador/Accesos/Cuadro_Acc.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewAccesos(){
	$.ajax({
		url : "modulos/administrador/Accesos/Inser_Acc.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


function showPersonal(){
	$.ajax({
		url : "modulos/administrador/Personal/Cuadro_Per.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


function showNewPersonal(){
	$.ajax({
		url : "modulos/administrador/Personal/Inser_Per.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showOficina(){
	$.ajax({
		url : "modulos/administrador/Oficina/Cuadro_Ofi.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewOficina(){
	$.ajax({
		url : "modulos/administrador/Oficina/Inser_Ofi.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showReporte(){
	$.ajax({
		url : "modulos/administrador/ReporteEvaluacionOfertas.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}




//FUNCION QUE RECIBE VARIABLE Y LA ENVIA A OTRO FORMULARIO=========OJO==========
function actualizarUsuario(idusuario)
{
	var id=idusuario;
	$.ajax({
		url : "modulos/administrador/modificarUsuario.php",
		data: {id},
		type: "POST",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarPersonal(codPersonal)
{
	var id=codPersonal;
	$.ajax({
		url : "modulos/administrador/Personal/Actu_Per.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarOficina(codOficina)
{
	var id=codOficina;
	$.ajax({
		url : "modulos/administrador/Oficina/Actu_Ofi.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarAreas(codArea)
{
	var id=codArea;
	$.ajax({
		url : "modulos/administrador/Areas/Actu_Are.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function eliminarAreas(codArea)
{
	var id=codArea;
	$.ajax({
		url : "modulos/administrador/Areas/Eli_Are.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarSubAreas(codArea)
{
	var id=codArea;
	$.ajax({
		url : "modulos/administrador/SubAreas/Actu_Sub.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function eliminarSubAreas(codArea)
{
	var id=codArea;
	$.ajax({
		url : "modulos/administrador/SubAreas/Eli_Sub.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function eliminarOficinas(codOficina)
{
	var id=codOficina;
	$.ajax({
		url : "modulos/administrador/Oficina/Eli_Ofi.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function eliminarPersonal(codPersonal, estado)
{
	 var parametros =
	  {
                "id" : codPersonal,
                "es" : estado
      };
       
	$.ajax({
		url : "modulos/administrador/Personal/Eli_Per.php",
		data: parametros,
		type: "post",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function eliminarCriterios(codCriterio)
{
	var id=codCriterio;
	$.ajax({
		url : "modulos/administrador/Criterios/Eli_Cri.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarCriterios(codCriterio)
{
	var id=codCriterio;
	$.ajax({
		url : "modulos/administrador/Criterios/Actu_Cri.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarParametros(codParametrosCriterios)
{
	var id=codParametrosCriterios;
	$.ajax({
		url : "modulos/administrador/Parametros/Actu_Par.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


function actualizarAccesos(codAcceso)
{
	var id=codAcceso;
	$.ajax({
		url : "modulos/administrador/Accesos/Actu_Acc.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarContrato(codContrato)
{
	var id=codContrato;
	$.ajax({
		url : "modulos/administrador/Contrato/Actu_Cont.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewEmpresa(){
	$.ajax({
		url : "modulos/administrador/Empresa_Consultores.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarEmpresa(codEmpresa)
{
	var id=codEmpresa;
	$.ajax({
		url : "modulos/administrador/Empresa/Modificar_Empresa.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarConsultor(codConsultor)
{
	var id=codConsultor;
	$.ajax({
		url : "modulos/administrador/Empresa/Modificar_Consultor.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function insertarConsultor(codConsultor)
{
	var id=codConsultor;
	$.ajax({
		url : "modulos/administrador/Empresa/Registrar_Consultor.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showEmpresaReg(){
	$.ajax({
		url : "modulos/administrador/Cuadro_Emp.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showConsultoriaReg(){
	$.ajax({
		url : "modulos/administrador/Reportes-Consultoria/Cuadro_Con.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showAsignacion(){
	$.ajax({
		url : "modulos/administrador/Asignacion/Cuadro_Cona.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewAsignacion(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/Asignacion/Asignacion.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function eliminarParametros(codParametrosCriterios)
{
	var id=codParametrosCriterios;
	$.ajax({
		url : "modulos/administrador/Parametros/Eli_Par.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function eliminarAccesos(codAcceso)
{
	var id=codAcceso;
	$.ajax({
		url : "modulos/administrador/Accesos/Eli_Acc.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function eliminarContrato(codContrato)
{
	var id=codContrato;
	$.ajax({
		url : "modulos/administrador/Contrato/Eli_Cont.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


//Consultores Controladores

function verConsultor(codEmpresa)
{
	var id=codEmpresa;
	$.ajax({
		url : "modulos/administrador/Contrato/Cuadro_Consu.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showReportesConsult2(){
	$.ajax({
		url : "modulos/administrador/reportes/Cuadro_Con.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


function showReportesConsult3(){
	$.ajax({
		url : "modulos/administrador/reportes/Cuadro_ConRG.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


function verReporteC(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
        type: "POST",
		url : "modulos/administrador/Reportes-Consultoria/reporte.php",
        data: {id},
        success: function (data) 
        {
          //data es la respuesta del php
          if(data)
          {
          	window.open('modulos/administrador/Reportes-Consultoria/reporte.php?id='+id, '_self')
          }

      }
});
}

function editarConsultoria(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/Consultoria/ConsultoriaG.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function editarConsultoria2(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/Consultoria/Consultoria-Editar/Consultoria.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showAsignacionModificar()
{
	$.ajax({
		url : "modulos/administrador/Asignacion/Cuadro_Modificar.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showNewAsignacionModificar(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/Asignacion/AsignacionModificar.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showEvaluacionModificar()
{
	$.ajax({
		url : "modulos/administrador/Evaluacion-Ofertas/Cuadro-OferA.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showVerOfertas(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/Evaluacion-Ofertas/Cuadro-OferB.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function EvaluacionOfertaA(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/administrador/Evaluacion-Ofertas/Edi-Eva.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showVerConsultorias(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/Evaluacion-Consultoria/Cuadro-ConsuA.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showVerConsultorias2(codConsultoria)
{
	var id=codConsultoria;
	$.ajax({
		url : "modulos/administrador/Evaluacion-Consultoria/Cuadro-ConsuB.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function EvaluacionConsultoriaA(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/administrador/Evaluacion-Consultoria/Edi-Eva.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showConsultoresV(codConsultor){
	var id=codConsultor;
	$.ajax({
		url : "modulos/administrador/Consultores/Cuadro_ConsuV.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showConsultoresV2(codConsultor)
{
	var id=codConsultor;
	$.ajax({
		url : "modulos/administrador/Consultores/Emp_Consu.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showConsultoresVG(){
	$.ajax({
		url : "modulos/administrador/Consultores/Cuadro_ConsuVG.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showConsultoresV3(){
	$.ajax({
		url : "modulos/administrador/Consultores/Cuadro_ConsuV2.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}