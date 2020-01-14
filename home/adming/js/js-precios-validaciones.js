'use strict'

var txtDiesel = document.querySelector("#diesel");
var txtMagna = document.querySelector("#magna");
var txtPremium = document.querySelector("#premium");

var txtDieselM = document.querySelector("#dieselm");
var txtMagnaM = document.querySelector("#magnam");
var txtPremiumM = document.querySelector("#premiumm");

txtDiesel.addEventListener('keypress', function(event){
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
});

txtMagna.addEventListener('keypress', function(event){
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
});

txtPremium.addEventListener('keypress', function(event){
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
});

txtDieselM.addEventListener('keypress', function(event){
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
});

txtMagnaM.addEventListener('keypress', function(event){
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
});

txtPremiumM.addEventListener('keypress', function(event){
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
});