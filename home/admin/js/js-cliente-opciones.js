'use strict'


//ACTIVAR CLIENTE
function activarCliente(idcliente){
alertify.confirm('ACTIVAR CLIENTE', '<CENTER>¿ESTA SEGURO DE ACTIVAR ESTE CLIENTE? <br><br> <FONT style="color:red;"><FONT></CENTER>', 
		function(){ 
			$.ajax({
				type:"POST",
				data:"usr=" + idcliente,
				url:"consultas/activarCliente.php",
				success:function(r){
					if(r==1){     
						buscar_datos();
						alertify.success("Cliente activo");
					}else{
						alertify.error("No se pudo activar"+r);
					}
				}
			});
		}
		,function(){ 
			alertify.error('OPERACION CANCELADA')
		});
}
//SUSPENDER CLIENTE
function suspenderCliente(idcliente){
	alertify.confirm('SUSPENDER CLIENTE', '<CENTER>¿ESTA SEGURO DE SUSPENDER ESTE CLIENTE? <br><br> <FONT style="color:red;"><FONT></CENTER>', 
		function(){ 
			$.ajax({
				type:"POST",
				data:"usr=" + idcliente,
				url:"consultas/suspenderCliente.php",
				success:function(r){
					if(r==1){    
						buscar_datos();
						alertify.success("Cliente suspendido");
					}else{
						alertify.error("No se pudo suspender"+r);
					}
				}
			});
		}
		,function(){ 
			alertify.error('OPERACION CANCELADA')
		});
}

//VER ESTADO DE CUENTA DEL CLIENTE
function estadoCuenta(idcliente, year, month){
	var datos = new FormData();
	datos.append('idcliente', idcliente);
	datos.append('anio', year);
	datos.append('mes', month);

	$.ajax({
		url: 'consultas/verEstadoCuenta.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$('#mainset').html(r);
		}
	});
}
//MODIFICAR TICKET
function modificarTicket(user, numvale, importe){
	var datos = new FormData();
	datos.append('usuario', user);
	datos.append('numvale', numvale);
	datos.append('importe', importe);

	$.ajax({
		url: 'consultas/verHistorial.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$('#mainset').html(r);
		}
	});
}
//VER HISTORIAL DEL CLIENTE
function verHistorial(idcliente, f1, f2){
	var datos = new FormData();
	datos.append('idcliente', idcliente);
	datos.append('filtro1', f1);
	datos.append('filtro2', f2);

	$.ajax({
		url: 'consultas/verHistorial.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$('#mainset').html(r);
		}
	});
}
//OBTENER DATOS PARA MODIFICAR
function obtenerDatos(id){
	$.ajax({
		type:"POST",
		data:"id=" + id,
		url:"consultas/obtenerCliente.php",
		success:function(r){
			var datos = jQuery.parseJSON(r);

			$('#idClienteM').val(datos['id']);
			$('#limiteCM').val(datos['limite']);
			$('#diasPagoCM').val(datos['diasPago']);
			$('#diasLimiteCM').val(datos['diasLimite']);
			$('#paCM').val(datos['pa']);
			$('#nombreCM').val(datos['nombre']);
			$('#rfcCM').val(datos['rfc']);
			$('#modalidadCM').val(datos['modalidad']);
			$('#updatemodal').modal();
		}
	});
}

