'use strict';

//EVENTOS
var inputCliente = document.querySelector("#cliente");
var inputFechaInicial = document.querySelector("#fechaInicial");
var inputFechaFinal = document.querySelector("#fechaFinal");

var inputClienteP = document.querySelector("#clienteP");
var inputFechaInicialP = document.querySelector("#fechaInicialP");
var inputFechaFinalP = document.querySelector("#fechaFinalP");


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



inputClienteP.addEventListener('change', function() {
	if (inputFechaInicialP.value != "" && inputFechaFinalP.value != "") {
		FacturasToPay();
	}
});

inputFechaInicialP.addEventListener('change', function() {
	if (inputClienteP.value != "" && inputFechaFinalP.value != "") {
		FacturasToPay();
	}
});

inputFechaFinalP.addEventListener('change', function() {
	if (inputClienteP.value != "" && inputFechaInicialP.value != "") {
		FacturasToPay();
	}
});