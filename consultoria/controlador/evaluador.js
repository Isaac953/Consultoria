//FUNCIONES JAVASCRIPT que sirven para direccionar a las diferentes opciones del menu administrador y mas
function showEvaluacion(){
	$.ajax({
		url : "modulos/evaluador/Seleccion_Consultoria.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


function showReporte(){
	$.ajax({
		url : "modulos/evaluador/ReporteEvaluacionOfertas.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function EvaluarOferta(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/evaluador/Evaluacion_Ofertas.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showHistorial4(){
	$.ajax({
		url : "modulos/evaluador/Reportes/Seleccion_Consultoria3.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function evaluacionfinalhistorial4(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/evaluador/Reportes/evaluacion_ofertas3.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}



