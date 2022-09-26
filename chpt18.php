<!-- https://github.com/upstate-csci-450-master/chap18-php-sql -->
<!DOCTYPE html>

<?php
$records = "";
if(isset($_POST['submit'])){
	$mysqli = mysqli_connect("sql105.epizy.com", "epiz_31874127", "yzkAC85Hbb5I", "epiz_31874127_records");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	} else {
		$firstname = mysqli_real_escape_string($mysqli, $_POST['first']);
		$lastname = mysqli_real_escape_string($mysqli, $_POST['last']);
		$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		$sql = "INSERT INTO person (firstname, lastname, email) VALUES ('".$firstname."', '".$lastname."', '".$email."')";
		$res = mysqli_query($mysqli, $sql);

		mysqli_close($mysqli);
	}
}
if(array_key_exists("allRecords", $_POST)) {
	allRecords();
}
function allRecords() {
	global $records;
	$mysqli = mysqli_connect("sql105.epizy.com", "epiz_31874127", "yzkAC85Hbb5I", "epiz_31874127_records");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	} 
	else {				
		$sql = "SELECT * FROM person ORDER BY lastname";
		$res = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($res) > 0) {
			while($row = mysqli_fetch_assoc($res)) {
				$records .= "Name: " . $row["firstname"]. " " . $row["lastname"]. " <br> Email: " . $row["email"]."<br><br>";
			}
		} else {
			$records = "No records to display";
		}

		mysqli_close($mysqli);
	}
}
?>




<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>Record Insertion Form</title>
	  <link rel="stylesheet" href="barStyle.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	</head>
	<body>
		<div class="wrapper">
			<nav>
				<input type="checkbox" id="show-search">
				<input type="checkbox" id="show-menu">
				<label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
				<div class="content">
					<div class="logo"><a href="index.html">Powell's Website</a></div>
						<ul class="links">
							<li><a href="index.html">Home</a></li>
							<li><a href="aboutme.html">About</a></li>
							<li>
							<a href="#" class="desktop-link">Assignments</a>
							<input type="checkbox" id="show-features">
							<label for="show-features">Assignments</label>
								<ul style="height: 700%; overflow: auto">
									<li><a href="layout.html">ACME Widgets</a></li>
									<li><a href="chapter04.html">JavaScript Events</a></li>
									<li><a href="helloworld.php">Hello World!</a></li>
									<li><a href="MovingButtons.html">Moving Buttons</a></li>
									<li><a href="cards.html">Cards Demo</a></li>
									<li><a href="loops.html">Dynamic Card Demo</a></li>
									<li><a href="keyPress.html">Key Press</a></li>
									<li><a href="jQuery10.html">jQuery Demo</a></li>
									<li><a href="project1.html">Audio Changer</a></li>
									<li><a href="prime.html">Prime Numbers</a></li>
									<li><a href="livesearch.html">AJAX Live Search</a></li>
									<li><a href="programExam2.php">PHP Program Exam</a></li>
									<li><a href="chpt18.php">Record Insertion Form</a></li>
								</ul>
							</li>
							<li><a href="seestore.php">Store</a></li>
							<li><a href="contactme.html">Contact</a></li>
						</ul>
				</div>
				<label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
				<form action="#" class="search-box">
				<input type="text" placeholder="Type Something to Search..." required>
				<button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
				</form>
			</nav>
		</div>
		<div class="dummy-text">
			<h2>Record Insertion Form</h2>
			<form method="POST">
				<p><label for="first">First Name:</label>
				<input type="text" id="first" name="first" size="30" style="margin-right: 5%;">
				
				<label for="last">Last Name:</label> 
				<input type="text" id="last" name="last" size="30"></p><br>
				
				<p><label for="email">Email:</label>
				<input type="text" id="email" name="email" size="30"></p><br>
				
				<button type="submit" id="addTitle" name="submit" value="insert">Insert Record</button>
				
			</form>
			
			<form method="POST"><button type="submit" id="addTitle" name="allRecords">Retrieve Records</button><br>
			<?php echo $records; ?>
			</form>
		</div>
	</body>
</html>
