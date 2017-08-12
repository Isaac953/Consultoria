
function cargarPagina(tipo_usuario){
  
		switch(tipo_usuario){
			case 1:
			       $('#menu').load('modulos/administrador/menu_administrador.php');

			       break;
			case 2:
			       $('#menu').load('modulos/coordinador/menu_coordinador.php'); 
			       break;
			case 3:
			       $('#menu').load('modulos/evaluador/menu_evaluador.php');
			       break;
			case 4: 
	       		$('#menu').load('modulos/recepcion/menu_recepcion.php'); //modificar
				    break;
			case 5:
			       $('#menu').load('modulos/solicitante/menu_solicitante.php'); //modificar
			       break;
		    case 6: 
	       			$('#menu').load('modulos/visitante/menu_visitante.php'); //modificar
				    break;
		    case 7: 
	                $('#menu').load('modulos/supervisor/menu_supervisor.php'); //modificar
				    break;
		} //fin del switch

         $('#contenido').load('home.php');

};

function cargarPaginaPosicionada(tipo_usuario, opcion){

switch(tipo_usuario){
			case 1:
			       $('#menu').load('modulos/administrador/menu_administrador.php');
			       switch(opcion){
						case 1:
							$('#contenido').load("modulos/administrador/Areas/Cuadro_Are.php");
							break;
						case 2:
						    $('#contenido').load("modulos/administrador/Accesos/Cuadro_Acc.php");
						    break;
						case 3:
						    $('#contenido').load("modulos/administrador/Asignacion/Cuadro_Cona.php");
						    break;
						case 4:
						    $('#contenido').load("modulos/administrador/Consultoria/ConsultoriaG.php");
						    break;    
						case 5:
						    $('#contenido').load("modulos/administrador/Contrato/Cuadro_Cont.php");
						    break;
						case 6:
						    $('#contenido').load("modulos/administrador/Criterios/Cuadro_Cri.php");
						    break;
						case 7:
						    $('#contenido').load("modulos/administrador/Empresa/Cuadro_EmpC.php");
						    break; 
						case 8:
						    $('#contenido').load("modulos/administrador/Evaluacion-Consultoria/Cuadro-ConsuA.php");
						    break;
						case 9:
						    $('#contenido').load("modulos/administrador/Evaluacion-Ofertas/Cuadro-OferA.php");
						    break;
						case 10:
						    $('#contenido').load("modulos/administrador/Oficina/Cuadro_Ofi.php");
						    break;
						case 11:
						    $('#contenido').load("modulos/administrador/Parametros/Cuadro_Par.php");
						    break; 
						case 12:
						    $('#contenido').load("modulos/administrador/Personal/Cuadro_Per.php");
						    break;    
						case 13:
						    $('#contenido').load("modulos/administrador/SubAreas/Cuadro_Sub.php");
						    break;
						case 30:
						    $('#contenido').load("modulos/administrador/Consultores/Cuadro_ConsuV2.php");
						    break;         
						   } 
			       break;
			case 2:
			       $('#menu').load('modulos/coordinador/menu_coordinador.php'); 
			       switch(opcion){
						case 14:
							$('#contenido').load("modulos/coordinador/Coordinador/Cuadro_Ofer.php");
							break;
						case 15:
						    $('#contenido').load("modulos/coordinador/Seleccion_Consultoria.php");
						    break;
						   } 
			       break;
			case 3:
			       $('#menu').load('modulos/evaluador/menu_evaluador.php');
			       			       switch(opcion){
						case 16:
							$('#contenido').load("modulos/evaluador/Seleccion_Consultoria.php");
							break;
						   } 
			       break;
			case 4: 
	       		$('#menu').load('modulos/recepcion/menu_recepcion.php'); //modificar
				    switch(opcion){
						case 17:
							$('#contenido').load("modulos/recepcion/Oferta/Cuadro_Ofer.php");
							break;
						   } 
				    break;
			case 5:
			       $('#menu').load('modulos/solicitante/menu_solicitante.php'); //modificar
			       	switch(opcion){
						case 18:
							$('#contenido').load("modulos/solicitante/Evaluacion-Consultores/Cuadro_Consu.php");
							break;
						case 19:
							$('#contenido').load("modulos/solicitante/Evaluacion-Consultoria/cuadro_consultoria_evaluacion.php");
							break;
						case 20:
							$('#contenido').load("modulos/solicitante/Seguimiento.php");
							break;
						   } 
			       break;
		    case 6: 
	       			$('#menu').load('modulos/visitante/menu_visitante.php'); //modificar
				    break;
		    case 7: 
	                $('#menu').load('modulos/supervisor/menu_supervisor.php'); //modificar
				    	switch(opcion){
						case 21:
							$('#contenido').load("modulos/supervisor/Evaluacion/cuadro_consultoria_evaluacion.php");
							break;
						case 22:
							$('#contenido').load("modulos/supervisor/Evaluacion-Consultores/Cuadro_Consu.php");
							break;
						   } 
				    break;
		} //fin del switch


}
