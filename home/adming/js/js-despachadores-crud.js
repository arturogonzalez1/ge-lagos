'use strict'


//VALIDAR FORMULARIO AGREGAR NUEVA ESTACION
$(document).ready(function(){
	$('#mainset').load('tabla.admine.gasolineros.php');
	$('#btnAgregarg').click(function(){
		
		if(validarFormVacio('frmAgregar') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		if (!validarNuevoDespachador()){
			alertify.alert("Error","Las contraseñas no coinciden");
			return false;
		}
		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('nombreGAS', $('#nombreGAS').prop('value'));
		paqueteDeDatos.append('domicilioGAS', $('#domicilioGAS').prop('value'));
		paqueteDeDatos.append('ciudadGAS', $('#ciudadGAS').prop('value'));
		paqueteDeDatos.append('estadoGAS', $('#estadoGAS').prop('value'))
		paqueteDeDatos.append('telefonoGAS', $('#telefonoGAS').prop('value'));
		paqueteDeDatos.append('usrGAS', $('#usrGAS').prop('value'));
		paqueteDeDatos.append('pswGAS', $('#pswGAS').prop('value'));
		paqueteDeDatos.append('pswcGAS', $('#pswcGAS').prop('value'));
		paqueteDeDatos.append('fotoGAS', $('#fotoGAS')[0].files[0]);

		$.ajax({
				url: 'consultas/agregarDespachador.php',
				type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
				contentType: false,
				data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
				processData: false,
				cache: false, 
			success:function(r){
				if(r==1){
					$('#mainset').load('tabla.admine.gasolineros.php');
					$('#addmodal').modal('hide');
					$('#frmAgregar')[0].reset();
					alertify.success("Despachador agregado con exito.");
				}
				else{
					alertify.alert("No se pudo agregar: " + r);
				}
			}
		});

	});
});

//VALIDAR FORMULARIO ACTUALIZAR ESTACION
$(document).ready(function(){
	$('#btnModificar').click(function(){
		if(validarFormVacio('frmActualiza') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		if (!validarModificacionDespachador()){
			alertify.alert("Error","Las contraseñas no coinciden");
			return false;
		}

		var data = new FormData();

		data.append('idGAS', $('#idGASM').prop('value'));
		data.append('nombreGAS', $('#nombreGASM').prop('value'));
		data.append('domicilioGAS', $('#domicilioGASM').prop('value'));
		data.append('ciudadGAS', $('#ciudadGASM').prop('value'));
		data.append('estadoGAS', $('#estadoGASM').prop('value'))
		data.append('telefonoGAS', $('#telefonoGASM').prop('value'));
		data.append('usrGAS', $('#usrGASM').prop('value'));
		data.append('pswGAS', $('#pswGASM').prop('value'));
		data.append('pswcGAS', $('#pswcGASM').prop('value'));
		data.append('foto', $('#fotoGASM')[0].files[0]);

		//data=$('#frmActualiza').serialize();
		$.ajax({
			url: 'consultas/modificarDespachador.php',
			type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
			contentType: false,
			data: data, // Al atributo data se le asigna el objeto FormData.
			processData: false,
			cache: false, 
			success:function(r){
				if(r==1){
					$('#mainset').load('tabla.admine.gasolineros.php');
					$('#updatemodal').modal('hide');
					$('#frmActualiza')[0].reset();
					alertify.success("El usuario se ha actualizado con exito");
				}
				else{
					alertify.alert("ERROR",  r);
				}
			}
		});
	});
});

//ELIMINAR DESPACHADOR
function eliminarDespachador(usr){
alertify.confirm('BAJA DESPACHADOR', '<CENTER>¿ESTA SEGURO DE BORRAR EL DESPACHADOR? <br><br> <FONT style="color:red;">SE PERDERAN TODOS LOS REGISTROS EN RELACION<FONT></CENTER>', 
		function(){ 
			$.ajax({
				type:"POST",
				data:"usr=" + usr,
				url:"consultas/borrarDespachador.php",
				success:function(r){
					if(r==1){     
						$('#mainset').load('tabla.admine.gasolineros.php');
						alertify.success("El despachador ha sido eliminado con exito");
					}else{
						alertify.alert("ERROR", r);
					}
				}
			});
		}
		,function(){ 
			alertify.error('OPERACION CANCELADA')
		});
}