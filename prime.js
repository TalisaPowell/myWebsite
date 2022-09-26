// Talisa Powell
// 06/14/2022
// CSCI 450
// test 1 
// A Grade


//Creating Arrays
var primeArr = new Array();
var nonPrimeArr = new Array();
var primeIndex = 0;
var nonPrimeIndex = 0;
var colorIndex = 0;

setInterval(colorSwitch, 5000);

function sortNumbers(){
	var input = document.theform.newNumber.value;
	primeArr = new Array();
	nonPrimeArr = new Array();
	primeIndex = 0;
	nonPrimeIndex = 0;
	
	for(var index = 1; index <= input; index++){
		
		if(isPrime(index)){
			primeArr[primeIndex++] = index;
		}
		else{
			nonPrimeArr[nonPrimeIndex++] = index;
		}
	}
	for(var i = 0; i < nonPrimeArr.length; i++){
		if (i == 0){
			document.getElementById("leftHold").innerHTML = nonPrimeArr[i]+"<br>";
			document.getElementById("leftsum").innerHTML = null;
		} else{
			document.getElementById("leftHold").innerHTML += nonPrimeArr[i]+"<br>";
		}
	}
	for(var i = 0; i < primeArr.length; i++){
		if (i == 0){
			document.getElementById("rightHold").innerHTML = nonPrimeArr[i]+"<br>";
			document.getElementById("rightsum").innerHTML = null;
		} else{
			document.getElementById("rightHold").innerHTML += primeArr[i]+"<br>";
		}
	}
}

function colorSwitch(){
	var colors = ["#db9f12", "#47cc7f", "#be67e6", "#24008f", "#e075b2", "#db2a4d"];
	document.getElementById("rightHold").style.background = colors[colorIndex];
	document.getElementById("leftHold").style.background = colors[colorIndex];
	colorIndex = (colorIndex + 1) % colors.length;
}


function isPrime(n){
    // Corner case
    if (n <= 1)
        return false;
 
    // Check from 2 to n-1
    for (var i = 2; i < n; i++)
        if (n % i == 0)
            return false;
 
    return true;
}

function primeSum(){
	var sum = 0;
	for( var i=0; i < primeArr.length; i++){
		sum += primeArr[i];
	}
	document.getElementById("rightsum").innerHTML = sum;
}

function nonPrimeSum(){
	var sum = 0;
	for( var i=0; i < nonPrimeArr.length; i++){
		sum += nonPrimeArr[i];
	}
	document.getElementById("leftsum").innerHTML = sum;
}