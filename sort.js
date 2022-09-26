// Sorting array example
// initialize the counter and the array

var numbernames=0;
var names = new Array();


function SortNames() {
	
	// Get the name from the text field
	thename=document.theform.newname.value;

	// Add the name to the array
	names[numbernames]=thename.toUpperCase();

	// Increment the counter
	numbernames++;

	// Sorting the array
	names.sort(function(a, b) {
		var element_A = /[A-Z]+/.exec(a);
		var element_B = /[A-Z]+/.exec(b);
		if(element_A && element_B){
			return element_A[0].localeCompare(element_B[0]);
			
		} else 
			
		{
				return a - b
		}
	});
	
	for (var m = 0; m < names.length; m++) {
		names[m] = names[m].replace(/[^a-z ]/gi, "");
	}
	
	for (var m = 0; m < names.length; m++) {
		names[m] = m + 1 + ")" + names[m];
	}
	
	document.theform.sorted.value=names.join("\n");
}