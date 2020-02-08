'use strict';

//EVENTOS
var inputCliente = document.querySelector("#cliente");
var inputFechaInicial = document.querySelector("#fechaInicial");
var inputFechaFinal = document.querySelector("#fechaFinal");

inputCliente.addEventListener('change', function() {
	if (inputFechaInicial.value != "" && inputFechaFinal.value != "") {
		TicketsToPay();
	}
});

inputFechaInicial.addEventListener('change', function() {
	if (inputCliente.value != "" && inputFechaFinal.value != "") {
		TicketsToPay();
	}
});

inputFechaFinal.addEventListener('change', function() {
	if (inputCliente.value != "" && inputFechaInicial.value != "") {
		TicketsToPay();
	}
});