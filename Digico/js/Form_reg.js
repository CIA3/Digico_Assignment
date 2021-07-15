function calculate1(value){
	
	var p1 = document.getElementById('price1').value * value;
	document.getElementById('pSubTotal1').value = p1;
	
}

function calculate2(value){
	
	var p1 = document.getElementById('price2').value * value;
	document.getElementById('pSubTotal2').value = p1;
	
}

function calculate3(value){
	
	var p1 = document.getElementById('price3').value * value;
	document.getElementById('pSubTotal3').value = p1;
	
}


function enableDisable1(chck){
	
	var tbId = document.getElementById('pQuantity1');
	tbId.disabled = chck.checked ? false : true;
	document.getElementById('pSubTotal1').value = 0;
	document.getElementById('pQuantity1').value = 0;
	
	if(!tbId.disabled){
		tbId.focus();
	}
	
}

function enableDisable2(chck){
	
	var tbId = document.getElementById('pQuantity2');
	tbId.disabled = chck.checked ? false : true;
	document.getElementById('pSubTotal2').value = 0;
	document.getElementById('pQuantity2').value = 0;
	
	if(!tbId.disabled){
		tbId.focus();
		
	}
	
}

function enableDisable3(chck){
	
	var tbId = document.getElementById('pQuantity3');
	document.getElementById('pSubTotal3').value = 0;
	document.getElementById('pQuantity3').value = 0;
	tbId.disabled = chck.checked ? false : true;
	
	if(!tbId.disabled){
		tbId.focus();
		
	}
	
}


function getTot(){
	
	var p1 = parseInt(document.getElementById('pSubTotal1').value);
	var p2 = parseInt(document.getElementById('pSubTotal2').value);
	var p3 = parseInt(document.getElementById('pSubTotal3').value);
	var tot = p1 + p2 + p3;
	
	document.getElementById('tot').value = tot;
}




function checkPassword(){
	if(document.getElementById("pwd").value != document.getElementById("rpwd").value){
		alert("Passwords does not matched!!");
		return false;
	}
	
	else{
		alert("Password maches!!");
		return true;
	}
}

function enableButton(chck){

	var tbId = document.getElementById('bt1');

	tbId.disabled = chck.checked ? false : true;
	
	if(!tbId.disabled){
		tbId.focus();
		
	}
}
