'use strict'

//--------------------------------------------- OBTENER DATOS PARA MODIFICAR --------------------------------------------
function obtenerDatos(usr){
	$.ajax({
		type:"POST",
		data:"usr=" + usr,
		url:"consultas/obtenerADM.php",
		success:function(r){
			var datos = jQuery.parseJSON(r);

			$('#idADMM').val(datos['id']);
			$('#nombreADMM').val(datos['nombre']);
			$('#rfcADMM').val(datos['rfc']);
			$('#domicilioADMM').val(datos['domicilio']);
			$('#ciudadADMM').val(datos['ciudad']);
			$('#estadoADMM').val(datos['estado']);
			$('#telefonoADMM').val(datos['telefono']);
			$('#estacionADMM').val(datos['estacion']);
			$('#updatemodal').modal();
		}
	});
}