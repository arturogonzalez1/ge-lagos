'use strict'

//OBTENER DATOS PARA MODIFICAR
function obtenerDatos(usr){
	$.ajax({
	type:"POST",
	data:"usr=" + usr,
	url:"consultas/obtenerDespachador.php",
	success:function(r){
		var datos=jQuery.parseJSON(r);

		$('#idGASM').val(datos['idGas']);
		$('#nombreGASM').val(datos['nombre']);
		$('#domicilioGASM').val(datos['domicilio']);
		$('#ciudadGASM').val(datos['ciudad']);
		$('#estadoGASM').val(datos['estado']);
		$('#telefonoGASM').val(datos['telefono']);
		$('#usrGASM').val(datos['usr']);
	}
	});
}

//GENERAR GAFETE
function GenerarGAFETE(usr){
	$.ajax({
		type:"POST",
		data:"usuario=" + usr,
		url:"gafete/generarGafete.php",
		success:function(r){
			if(r==1){    
			  window.open("admine.gafete.view.php","_blank");
			}
			else{
			   alert("Error al exportar PDF"+r);
			}
		}
	});
}