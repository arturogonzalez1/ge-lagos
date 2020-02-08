'use strict'


$(document).ready(function(){
			//CARGAR LA TABLA DE VALES VIGENTES
			$('#mainset').load('tabla.cliente.vales.view.php');

			$('#btnAgregarVale').click(function(){
				if (ValidarVale())
				{
					GenerarVale();
					$('#autorizarmodal').modal();
				}
				else {
					return false;
				}
			});

			$('#btnEnviar').click(function(){
				var datos = new FormData();
				var tipoconsumo = document.querySelector('#slcTipoCons').value;

				datos.append('placa', $('#slcVehiculo option:selected').text());
				datos.append('concepto', $('#slcTipoCombustible').prop('value'));
				datos.append('operador', $('#txtChofer').prop('value'));

				if (tipoconsumo == 'Litros') {
					datos.append('litros', $('#txtLitros').prop('value'));
				}
				else if (tipoconsumo == 'Importe') {
					datos.append('importe', $('#txtImporte').prop('value'));
				}
				
				$.ajax({
						url:"php/agregarVale.php",
						type:"POST",
						contentType: false,
						data:datos,
						processData: false,
						cache: false, 
					success:function(r){
						if(r==1){
							$('#addmodal').modal('hide');
							$('#autorizarmodal').modal('hide');
							$('#frmAgrega')[0].reset();
							$('#frmAutoriza')[0].reset();
							$('#mainset').load('tabla.cliente.vales.view.php');
							alertify.success("Vale autorizado.");
						}
						else {
							alertify.alert("ERROR","No se pudo autorizar el vale. " + r);
						}
					}
				});
			});
			$('#btnBorrar').click(function(){
				$('#frmDatosVale')[0].reset();
				$('#autorizarmodal').modal('hide');
				$('#frmAgrega')[0].reset();
				$('#addmodal').modal('hide');
			});
		});