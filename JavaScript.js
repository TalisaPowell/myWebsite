//Moving Buttons

var startBtn = document.getElementById("createBtn");
startBtn.addEventListener("click", generateBtn);
var numBtn = 0;
var countSum = 0;


function generateBtn(){
	var color = document.getElementById("colors").value;
	var btn = document.createElement("button");
	var buttonArea = document.getElementById("buttonArea");
	buttonArea.appendChild(btn);
	
	btn.innerHTML = Math.floor(Math.random() * 100) + 1;
	btn.style.position = "absolute";
	var x_pos = Math.floor(Math.random() * 85) + 6;
	var y_pos = Math.floor(Math.random() * 65) + 25;
	btn.style.left = x_pos + '%';
	btn.style.top = y_pos + '%';
	btn.style.backgroundColor = color;
	btn.style.color = "black";
	btn.className = "btn btn-secondary";
	btn.id = numBtn++;

	btn.onclick = function(){
		console.log(this.id);
		//this.innerHTML = Math.floor(Math.random() * 100) + 1;
		this.style.backgroundColor = document.getElementById("colors").value;
		countSum += parseInt(this.innerHTML, 10);
		document.getElementById("sumCount").innerHTML = countSum;
		
		
	}
	
}