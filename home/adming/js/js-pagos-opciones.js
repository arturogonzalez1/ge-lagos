'use strict'

$(ActualizarPagos());

function ActualizarPagos(){
	var datos = new FormData();
	datos.append('i', 0);
	$.ajax({
		url: 'consultas/verPagos.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$('#mainset').html(r);
			$('#updatemodal').modal('hide');
			$('#frmFacturar')[0].reset();
		}
	});
}
function TicketsToPay(){
	var formulario = document.querySelector("#frmFacturar");
	var datos = new FormData(formulario);
	var value = $('#cliente').val();
	datos.append('id', $('#listaClientes [value="' + value + '"]').data('value'));
	$.ajax({
		url: 'consultas/verTickets.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$("#tickets").html(r);
		}
	});
	$.ajax({
		url: 'consultas/totalTickets.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$("#total").html(r);
		}
	});
}
function FacturasToPay(){
	var formulario = document.querySelector("#frmPagar");
	var datos = new FormData(formulario);
	var value = $('#clienteP').val();
	datos.append('idP', $('#listaClientesP [value="' + value + '"]').data('value'));
	$.ajax({
		url: 'consultas/verFacturas.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$("#facturas").html(r);
		}
	});
	$.ajax({
		url: 'consultas/totalFacturas.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$("#totalFacturas").html(r);
		}
	});
}