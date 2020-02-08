'use strict'

$(document).ready(function(){
	ImagenV();
	var combobox = document.getElementById("slcVehiculo");
	var comboboxTipoCombustible = document.getElementById("slcTipoCombustible");
	var comboboxTipoCons = document.getElementById("slcTipoCons");

	combobox.addEventListener('change', function(){
		ImagenV();
	});
	comboboxTipoCombustible.addEventListener('change', function(){
		 ControlPorTipoCombustible();
	});
	comboboxTipoCons.addEventListener('change', function(){
		 ControlPorTipoConsumo();
	});
});

//---------------------------------------------------- CONTROLAR TEXT INPUTS -------------------------------------------------------------->
function ControlPorTipoConsumo()
{
	var litros = document.getElementById("txtLitros");
	var importe = document.getElementById("txtImporte");
	var combobox = document.getElementById("slcTipoCons");

	if (combobox.value == "Litros"){
		importe.value = "";litros.disabled = false;
		importe.disabled = true;
	}
	if (combobox.value == "Importe"){
		litros.disabled = true;
		litros.value = "";importe.disabled = false;
	}
}

function ControlPorTipoCombustible(){
	var litros = document.getElementById("txtLitros");
	var importe = document.getElementById("txtImporte");
	var comboboxTipoCombustible = document.getElementById("slcTipoCombustible");
	var comboboxTipoConsumo = document.getElementById("slcTipoCons");

	if (comboboxTipoCombustible.value == "LUBRICANTE"){
		comboboxTipoConsumo.disabled = true;
		litros.value = "";litros.disabled = true;
		importe.disabled = false; 
	}
	else{
		comboboxTipoConsumo.disabled = false;
		if (comboboxTipoConsumo.value == "Litros"){
			importe.value = "";litros.disabled = false; 
			importe.disabled = true;
		}
		if (comboboxTipoConsumo.value == "Importe"){
			litros.disabled = true;
			litros.value = "";importe.disabled = false; 
		}
	}
}
//------------------------------------------------------------------------------------------------------------------------------------------>

//---------------------------------------------------- MOSTRAR IMAGEN VEHICULO ------------------------------------------------------------->
function ImagenV()
{
	GetImage();
	// var combobox = document.getElementById("slcVehiculo"); 
	// var placa = combobox.options[combobox.selectedIndex].text;
	// var fvehiculo = document.getElementById("imgFotoVehiculo");
	// var numplaca = document.getElementById("lblPlaca");
	// fvehiculo.src = "images/imgVeh/"+placa+".jpg";
	// fvehiculo.style.visibility = "visible";
	// fvehiculo.width = 240;
	// fvehiculo.height = 150;
	// numplaca.innerHTML = placa;
}
function GetImage(placa) {
	var combobox = document.getElementById("slcVehiculo"); 
	var placa = combobox.options[combobox.selectedIndex].text;

	var datos = new FormData();
	
	datos.append('placa', placa);

	$.ajax({
			url: 'php/getimage.php',
			type: 'POST', 
			contentType: false,
			data: datos, 
			dataType: 'html',
			processData: false,
			cache: false, 
		success:function(r){
			BorrarEtiquetaImagen();
			$('#imagebox').html(r);
		}
	});
}

function BorrarEtiquetaImagen() {
	if (document.getElementById("imagen")) {
		var imagen = document.getElementById("imagen");
		imagen.src = "";
	}
}
//----------------------------------------------------------------------------------------------------------------------------------------->

//---------------------------------------------------- GENERAR VALE ----------------------------------------------------------------------->

function GenerarVale()
{
	var comboboxPlaca = document.getElementById("slcVehiculo"); 
	var placa = comboboxPlaca.options[comboboxPlaca.selectedIndex].text;

	var comboboxTipoComb = document.getElementById("slcTipoCombustible");
	var tipoComb = comboboxTipoComb.options[comboboxTipoComb.selectedIndex].text;

	var comboboxTipoCons = document.getElementById("slcTipoCons").value;
	var choferAutorizado = document.getElementById("txtChofer").value;
	var litros = document.getElementById("txtLitros").value;
	var importe = document.getElementById("txtImporte").value;



	var lblPlacaA = document.getElementById("lblPlacaAutorizada");
	var lblTipoComb  = document.getElementById("lblTipoCombustible");
	var lblFechaHora = document.getElementById("lblFechaHora");
	var lblChoferAutorizado = document.getElementById("lblChoferAutorizado");
	var lblPorLitros = document.getElementById("lblPorLitros");
	var lblPorImporte = document.getElementById("lblPorImporte");

	if (tipoComb != "LUBRICANTE")
	{
		if (comboboxTipoCons == "Litros")
		{
			lblPorLitros.value = litros;
			lblPorImporte.value = "NA";
		}
		else if (comboboxTipoCons == "Importe")
		{
			lblPorImporte.value = importe;
			lblPorLitros.value = "NA";
		}
	}
	else
	{
		lblPorImporte.value = importe;
		lblPorLitros.value = "NA";
	}
	
	lblPlacaA.value = placa;
	lblTipoComb.value = tipoComb;
	lblChoferAutorizado.value = choferAutorizado;
	var fecha = new Date();
	lblFechaHora.value = fecha.getDate()+"/"+fecha.getMonth()+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes();

}
//------------------------------------------------------------------------------------------------------------------------------------------>

//---------------------------------------------------- CONFIRMAR VALE ----------------------------------------------------------------------->
function ConfirmarVale()
{
	var lblPlacaA = document.getElementById("lblPlacaAutorizada").value;
	var lblTipoC  = document.getElementById("lblTipoCombustible").value;
	var lblChoferA = document.getElementById("lblChoferAutorizado").value;
	var lblPorL = document.getElementById("lblPorLitros").value;
	var lblPorI = document.getElementById("lblPorImporte").value;

	if (lblPlacaA != "" && lblTipoC != "" && lblChoferA != "")
	{
		
		if (lblPorL != "" || lblPorI != "")
		{
			alertify.confirm('AUTORIZACION DE VALE', '¿DESEA AUTORIZAR EL VALE?', 
			function(){ 
				document.frmDatosVale.submit()
			}
			,function(){ 
			});
		}
		else
		{
			alert("ERROR AL AUTORIZAR VALE LITROS O IMPORTE");
		}
	}
	else
	{
		alertify.error("NO HA AUTORIZADO EL VALE")
	}
}
//------------------------------------------------------------------------------------------------------------------------------------------>

//---------------------------------------------------- EXPORTAR VALE A PDF ----------------------------------------------------------------->
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
//----------------------------------------------------------------------------------------------------------------------------------------->

//---------------------------------------------------- CANCELAR VALE ----------------------------------------------------------------->
function cancelar(numVale)
{
	alertify.confirm('Cancelar Vale', '¿Desea cancelar el vale?', 
      function(){ 
          $.ajax({
             type:"POST",
              data:"numVale=" + numVale,
              url:"php/cancelar.php",
              success:function(r){
                  if(r==1){     
                      window.location="vales.php";
                      alertify.success("EL VALE SE HA CANCELADO");
                  }else{
                       alertify.error("NO SE PUDO CANCELAR EL VALE");
                  }
              }
          });
      }
      ,function(){ 
        alertify.error('Operacion Cancelada')
      });
}	
//----------------------------------------------------------------------------------------------------------------------------------------->

//---------------------------------------------------- ENVIAR A WHATSAPP ----------------------------------------------------------------->
function EnviarWhatsapp(){
	window.open("https://web.whatsapp.com/", "_blank");
}
//----------------------------------------------------------------------------------------------------------------------------------------->