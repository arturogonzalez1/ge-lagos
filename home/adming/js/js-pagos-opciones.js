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
			$('#frmPagar')[0].reset();
		}
	});
}
function TicketsToPay(){
	var formulario = document.querySelector("#frmPagar");
	var caja_Tickets = document.querySelector("#tickets");
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
}