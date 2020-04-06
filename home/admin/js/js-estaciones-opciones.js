'use strict'

function obtenerDatos(numEstacion){
	$.ajax({
		type:"POST",
		data:"numEstacion=" + numEstacion,
		url:"consultas/obtenerEstacion.php",
		success:function(r){
			var datos = jQuery.parseJSON(r);
			$('#idEM').val(datos['id']);
			$('#numEM').val(datos['num']);
			$('#nombreEM').val(datos['nombre']);
			$('#rfcEM').val(datos['rfc']);
			$('#estadoEM').val(datos['estado']);
			$('#razonsEM').val(datos['razons']);
			$('#regimenEM').val(datos['regimen']);
			$('#emailEM').val(datos['email']);
			$('#empresaEM').val(datos['razons']);
			$('#idEmpresaEM').val(datos['idEmpresa']);
			$('#updatemodal').modal();
		}
	});
}