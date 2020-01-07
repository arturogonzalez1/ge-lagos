'use strict'

$(document).ready(function(){
	var defaultData = new FormData();
	defaultData.append('tpFiltro', 3);
	$.ajax({
				url: 'php/filtrarHistorial.php',
				type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
				contentType: false,
				data: defaultData, // Al atributo data se le asigna el objeto FormData.
				dataType: 'html',
				processData: false,
				cache: false, 
			success:function(r){
				$('#modalFiltroMes').modal('hide');
				$('#frmFiltroMes')[0].reset();
				$('#mainset').html(r);
				var f = new Date();
				var date = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
				document.getElementById('lblFecha').innerHTML= date;
			}
		})
	$('#btnFiltrarMes').click(function(){
		var paquedeDeDatos = new FormData();
		paquedeDeDatos.append('selectAnio', $('#selectAnio').prop('value'));
		paquedeDeDatos.append('selectMes', $('#selectMes').prop('value'));
		paquedeDeDatos.append('tpFiltro', 1);
		$.ajax({
				url: 'php/filtrarHistorial.php',
				type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
				contentType: false,
				data: paquedeDeDatos, // Al atributo data se le asigna el objeto FormData.
				dataType: 'html',
				processData: false,
				cache: false, 
			success:function(r){
				$('#modalFiltroMes').modal('hide');
				$('#frmFiltroMes')[0].reset();
				$('#mainset').html(r);
				document.getElementById('lblFecha').innerHTML = $('#selectAnio').prop('value')+"/"+$('#selectMes').prop('value');
			}
		});

	});
	$('#btnFiltrarDia').click(function(){
		var datosPorDia = new FormData();
		datosPorDia.append('dtpFechaInicio', $('#dtpFechaInicio').prop('value'));
		datosPorDia.append('dtpHoraInicio', $('#dtpHoraInicio').prop('value'));
		datosPorDia.append('dtpFechaFin', $('#dtpFechaFin').prop('value'));
		datosPorDia.append('dtpHoraFin', $('#dtpHoraFin').prop('value'));
		datosPorDia.append('tpFiltro', 2);
		$.ajax({
				url: 'php/filtrarHistorial.php',
				type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
				contentType: false,
				data: datosPorDia, // Al atributo data se le asigna el objeto FormData.
				dataType: 'html',
				processData: false,
				cache: false, 
			success:function(r){
				$('#modalFiltroDia').modal('hide');
				document.getElementById('lblFecha').innerHTML = $('#dtpFechaInicio').prop('value')+
				" "+$('#dtpHoraInicio').prop('value')+ " - " + $('#dtpFechaFin').prop('value') + " "+ $('#dtpHoraFin').prop('value');
				$('#frmFiltroDia')[0].reset();
				$('#mainset').html(r);
			}
		});
	});
});

function exportar(numVale)
{
	$.ajax({
	 type:"POST",
	  data:"numVale=" + numVale,
	  url:"php/exportar_pdf.php",
	  success:function(r){
	      if(r==1){     
	          window.open("view_pdf.php","_blank");
	      }else{
	           alertify.error("Error al exportar PDF");
	      }
	  }
	});
}