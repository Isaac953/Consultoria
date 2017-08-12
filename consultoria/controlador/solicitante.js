
//FUNCIONES JAVASCRIPT que sirven para direccionar a las diferentes opciones del menu administrador y mas
function ShowConsultoria(){
	$.ajax({
		url : "modulos/solicitante/ConsultoriaVista/Consultoria.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function ShowSeguimiento(){
	$.ajax({
		url : "modulos/solicitante/cuadro_Consultoria.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function ShowConsultores(){
	$.ajax({
		url : "modulos/solicitante/Evaluacion-Consultores/Cuadro_Consu.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function ShowEvaluacionFinal(){
	$.ajax({
		url : "modulos/solicitante/Evaluacion-Consultoria/cuadro_consultoria_evaluacion.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}



//FUNCION QUE RECIBE VARIABLE Y LA ENVIA A OTRO FORMULARIO=========OJO==========
function seguimientoConsultoria(codCon)
{
	var id=codCon;
	$.ajax({
		url : "modulos/solicitante/Seguimiento.php",
		data: {id},
		type: "POST",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


function actualizarProd(valorCaja1,valorCaja2)
{


	 var parametros =
	  {
                "codprod" : valorCaja1,
                "codconsultoria" : valorCaja2
       };

	$.ajax({
		url : "modulos/solicitante/EditarProducto.php",
		data:  parametros,
		type: "POST",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}



function evaluacionFinalConsultoria(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/solicitante/Evaluacion-Consultoria/evaluacion_consultoria.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function evaluarConsultores(codCon)
{
	var id=codCon;
	$.ajax({
		url : "modulos/solicitante/evaluar_consultores.php",
		data: {id},
		type: "POST",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showHistorial2(){
	$.ajax({
		url : "modulos/solicitante/Evaluacion-Consultoria/reporte_evaluaciones.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function evaluacionfinalhistorial2(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/solicitante/Evaluacion-Consultoria/evaluacion_finalizada.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}




