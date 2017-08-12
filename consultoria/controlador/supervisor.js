
//FUNCIONES JAVASCRIPT que sirven para direccionar a las diferentes opciones del menu administrador y mas
function showVerEvaC(){
	$.ajax({
		url : "modulos/supervisor/Evaluacion/cuadro_consultoria_evaluacion.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showHistorial(){
	$.ajax({
		url : "modulos/supervisor/Evaluacion/reporte_evaluaciones.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function evaluacionFinalConsultoriaS(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/supervisor/Evaluacion/evaluacion_consultoria.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function evaluacionfinalhistorial(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/supervisor/Evaluacion/evaluacion_finalizada.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function ShowConsultoresS(){
	$.ajax({
		url : "modulos/supervisor/Evaluacion-Consultores/Cuadro_Consu.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function evaluarConsultoresS(codCon)
{
	var id=codCon;
	$.ajax({
		url : "modulos/supervisor/Evaluacion-Consultores/evaluar_consultores.php",
		data: {id},
		type: "POST",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}