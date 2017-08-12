
//FUNCIONES JAVASCRIPT que sirven para direccionar a las diferentes opciones del menu administrador y mas
function showOferta(){
	$.ajax({
		url : "modulos/recepcion/Oferta/Inser_Ofer.php",
		dataType : "text",
		success : function(data) {
			$("#contenido").html(data);
			//Id del contenedor para mostrar el archivo
		}
	});
}

function showVerOferta(){
	$.ajax({
		url : "modulos/recepcion/Oferta/Cuadro_Ofer.php",
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



