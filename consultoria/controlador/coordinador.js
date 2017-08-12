
//FUNCIONES JAVASCRIPT que sirven para direccionar a las diferentes opciones del menu administrador y mas
function showEvIni(){
	$.ajax({
		url : "modulos/coordinador/Seleccion_Consultoria.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showOfertas(){
	$.ajax({
		url : "modulos/coordinador/Coordinador/Cuadro_Ofer.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function actualizarMonto(codOferta)
{
	var id=codOferta;
	$.ajax({
		url : "modulos/coordinador/Coordinador/Actu_Monto.php",
		data: {id},
		type: "post",
		
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showReportesConsult(){
	$.ajax({
		url : "modulos/coordinador/reportes/Cuadro_Con.php",
		dataType : "text",
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

//Historial de evaluaciones

function showHistorial3(){
	$.ajax({
		url : "modulos/coordinador/reportes/Seleccion_Consultoria2.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function evaluacionfinalhistorial3(valorCaja1,valorCaja2)
{
	 var parametros =
	  {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
       };
       
	$.ajax({
		url : "modulos/coordinador/reportes/evaluacion_ofertas2.php",
		data:  parametros,
		type: "post",
		dataType: "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

