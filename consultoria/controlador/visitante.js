function showReporteConE(){
	$.ajax({
		url : "modulos/visitante/Reportes/reporte1.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showReporteEmpC(){
	$.ajax({
		url : "modulos/visitante/Reportes/reporte2.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showReporteEmpC2(){
	$.ajax({
		url : "modulos/visitante/Reportes/reporte3.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}


