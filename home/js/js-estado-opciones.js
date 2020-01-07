'use strict'

$(document).ready(function(){
	var fecha = new Date();
	var ano = fecha.getFullYear();
	var month = fecha.getMonth()+1;
	var datos = new FormData();

	datos.append('anio', ano);
	datos.append('mes', month);
	$.ajax({
			url: 'php/filtrarEstado.php',
			type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
			contentType: false,
			data: datos, // Al atributo data se le asigna el objeto FormData.
			dataType: 'html',
			processData: false,
			cache: false, 
		success:function(r){
			$('#modalFiltroMes').modal('hide');
			$('#frmFiltroMes')[0].reset();
			$('#mainset').html(r).fadeIn();
		}
	});

	//------------------------------------------------------- FILTRAR MES ---------------------------------------------------------->
	$('#btnFiltrarMes').click(function(){
		var datos = new FormData();
		datos.append('anio', $('#selectAnio').prop('value'));
		datos.append('mes', $('#selectMes').prop('value'));
		$.ajax({
				url: 'php/filtrarEstado.php',
				type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
				contentType: false,
				data: datos, // Al atributo data se le asigna el objeto FormData.
				dataType: 'html',
				processData: false,
				cache: false, 
			success:function(r){
				$('#modalFiltroMes').modal('hide');
				$('#mainset').html(r).fadeIn();
			}
		});
	});
});