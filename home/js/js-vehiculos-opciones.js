'use strict'

//-------------------------------------------- OBTENER DATOS PARA MODIFICAR -------------------------------------------->
function obtenerDatos(placa){
	$.ajax({
		type:"POST",
		data:"placa=" + placa,
		url:"php/obtenerRegistroVehiculo.php",
		success:function(r){
			var datos=jQuery.parseJSON(r);

			$('#placaVM').val(datos['placa']);
			$('#marcaVM').val(datos['marca']);
			$('#modeloVM').val(datos['modelo']);
			$('#unidadVM').val(datos['unidad']);
			$('#motorVM').val(datos['motor']);
		}
	});
}
//---------------------------------------------------------------------------------------------------------------------->