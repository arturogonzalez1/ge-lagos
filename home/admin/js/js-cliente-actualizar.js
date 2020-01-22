'use strict'

$(buscar_datos());

function buscar_datos(consulta){
	var datos = new FormData();
	datos.append('consulta', consulta);
	$.ajax({
			url: 'consultas/buscarCliente.php',
			type: 'POST',
			contentType: false,
			data: datos,
			dataType: 'html',
			processData: false,
			cache: false, 
		success:function(r){
			$("#mainset").html(r);
		}
	})
}

$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "")
	{
		buscar_datos(valor);
	}
	else
	{
		buscar_datos();
	}
});