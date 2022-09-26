// define the functions
function printCard() {
   var nameLine = "<strong>Name: </strong>" + this.name + "<br>";
   var emailLine = "<strong>Email: </strong>" + this.email + "<br>";
   var addressLine = "<strong>Address: </strong>" + this.address + "<br>";
   var phoneLine = "<strong>Phone: </strong>" + this.phone + "<br>";
   var birthdate = "<strong>Birthdate: </strong>" + this.birthdate + "<hr>";
   document.write(nameLine, emailLine, addressLine, phoneLine, birthdate);
}
// Card includes birthdate.
function Card(name,email,address,phone,birthdate) {
   this.name = name;
   this.email = email;
   this.address = address;
   this.phone = phone;
   this.printCard = printCard;
   this.birthdate = birthdate;
}

// Create the objects
// Random birthdates added
var sue = new Card("Sue Suthers", "sue@suthers.com", "123 Elm Street, Yourtown ST 99999", "555-555-9876", "6/12/1987");
var fred = new Card("Fred Fanboy", "fred@fanboy.com", "233 Oak Lane, Sometown ST 99399", "555-555-4444", "4/30/1982");
var jimbo = new Card("Jimbo Jones", "jimbo@jones.com", "233 Walnut Circle, Anotherville ST 88999", "555-555-1344", "10/07/1977");

// Now print them
sue.printCard();
fred.printCard();
jimbo.printCard();