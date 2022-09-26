// create the array

cards = new Array();
var c = 0;
var cardcounter = 0;

function printCard() {
   var nameLine = "<strong>Name: </strong>" + this.name + "<br>";
   var emailLine = "<strong>Email: </strong>" + this.email + "<br>";
   var addressLine = "<strong>Address: </strong>" + this.address + "<br>";
   var phoneLine = "<strong>Phone: </strong>" + this.phone + "<br>";
   var birthdate = "<strong>Birthdate: </strong>" + this.birthdate + "<hr>";
   document.getElementById("displayArea").innerHTML += nameLine + 
		emailLine + addressLine + phoneLine + birthdate;
}

function Card(name,email,address,phone,birthdate) {
   this.name = name;
   this.email = email;
   this.address = address;
   this.phone = phone;
   this.printCard = printCard;
   this.birthdate = birthdate;
}

// Prints all cards
function printAllCards() {
	document.getElementById("displayArea").innerHTML = null;
	for (c in cards) {
		cards[c].printCard();
	}
}

// Prompt for information and create a new card accordingly
function createCard() {
	name = prompt("Enter the name", "");
	email = prompt("Enter the email", "");
	address = prompt("Enter the address", "");
	phone = prompt("Enter the phone number", "");
	birthdate = prompt("Enter the birthdate", "");
	cards[cardcounter++] = new Card(name, email, address, phone, birthdate);
}



