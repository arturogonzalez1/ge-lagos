'use strict'


$(document).ready(function(){
			//CARGAR LA TABLA DE VALES VIGENTES
			$('#mainset').load('tabla.cliente.vales.view.php');

			$('#btnAgregarVale').click(function(){
				if(validarFormVacio('frmAgrega') > 0){
					alertify.alert("Error","Debes llenar todos los campos.");
					return false;
				}
				if (ValidarVale())
				{
					GenerarVale();
					$('#autorizarmodal').modal();
				}
			});

			$('#btnEnviar').click(function(){
				var datos = $('#frmAutoriza').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"php/agregarVale.php",
					success:function(r){
						if(r==1){
							$('#addmodal').modal('hide');
							$('#autorizarmodal').modal('hide');
							$('#frmAgrega')[0].reset();
							$('#frmAutoriza')[0].reset();
							$('#mainset').load('tabla.cliente.vales.view.php');
							alertify.success("Vale autorizado.");
						}
						else if (r==2){
							alertify.error("Vehiculo no corresponde al cliente.");
						}
						else if (r==3){
							alertify.error("Saldo Insuficiente para autorizar el vale.");
						}
						else if (r==4){
							alertify.error("No se pudo autorizar. Su cuenta no esta activa.");
						}
						else{
							alertify.error("No se pudo autorizar.");
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