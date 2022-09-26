<!DOCTYPE html>

<!--Sources that helped:
	https://www.geeksforgeeks.org/how-to-call-php-function-on-the-click-of-a-button/ 
	https://stackoverflow.com/questions/21998679/css-how-to-make-scrollable-list
	https://www.w3schools.com/php/php_arrays_sort.asp 
	https://stackoverflow.com/questions/52641153/counting-vowels-in-a-text-file-with-php -->


<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>PHP Program Exam</title>
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
			<h2>Program Exam #2: PHP</h2>
			
			<form method="post">
				<input type="submit" name="button0"
					class="vowelbutton" value="0" />
					
				<input type="submit" name="button1"
					class="vowelbutton" value="1" />
				  
				<input type="submit" name="button2"
					class="vowelbutton" value="2" />
					
				<input type="submit" name="button3"
				class="vowelbutton" value="3" />
					
				<input type="submit" name="button4"
				class="vowelbutton" value="4" />
				
				<input type="submit" name="button5"
				class="vowelbutton" value="5" />
				
				<input type="submit" name="button6"
					class="vowelbutton" value="6" />
			</form>
			<!-- Styling div for scrolling nav bar -->
			<style>
				.vowelNav{
					height:250px;
					width:40%;
					overflow:hidden;
					overflow-y:scroll;
				}
			</style>
			<div class ="vowelNav">
				<?php
					$VOWELS = array("", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u");
					$lines = file("words.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
					
					$vowel_0 = array();
					$vowel_1 = array();
					$vowel_2 = array();
					$vowel_3 = array();
					$vowel_4 = array();
					$vowel_5 = array();
					$vowel_6 = array();
					
					foreach($lines as $line){
						$word = $line;
						$wordLength = strlen($word);
						$count=0;
						for ($i=0; $i < $wordLength; $i++) {
							if (array_search($word[$i], $VOWELS)) {
								$count++;
							}
						}
						if ($count == 0) {
							$vowel_0[] = $word;
						} else if ($count == 1) {
							$vowel_1[] = $word;
						} else if ($count == 2) {
							$vowel_2[] = $word;
						} else if ($count == 3) {
							$vowel_3[] = $word;
						} else if ($count == 4) {
							$vowel_4[] = $word;
						} else if ($count == 5) {
							$vowel_5[] = $word;
						} else if ($count == 6) {
							$vowel_6[] = $word;
						}
					}
					
					usort($vowel_0, function($word1, $word2) {
						return strlen($word1) - strlen($word2);
					});
					usort($vowel_1, function($word1, $word2) {
						return strlen($word1) - strlen($word2);
					});
					usort($vowel_2, function($word1, $word2) {
						return strlen($word1) - strlen($word2);
					});
					usort($vowel_3, function($word1, $word2) {
						return strlen($word1) - strlen($word2);
					});
					usort($vowel_4, function($word1, $word2) {
						return strlen($word1) - strlen($word2);
					});
					usort($vowel_5, function($word1, $word2) {
						return strlen($word1) - strlen($word2);
					});
					usort($vowel_6, function($word1, $word2) {
						return strlen($word1) - strlen($word2);
					});
					
					if(array_key_exists("button0", $_POST)) {
						button0();
					}
					else if(array_key_exists("button1", $_POST)) {
						button1();
					}
					else if(array_key_exists("button2", $_POST)) {
						button2();
					}
					else if(array_key_exists("button3", $_POST)) {
						button3();
					}
					else if(array_key_exists("button4", $_POST)) {
						button4();
					}
					else if(array_key_exists("button5", $_POST)) {
						button5();
					}
					else if(array_key_exists("button6", $_POST)) {
						button6();
					}
					
					function button0() {
						echo "Words containing no vowels<br>";
						global $vowel_0;
						for ($i=0; $i< count($vowel_0); $i++) {
							echo $vowel_0[$i]. "<br>";
						}
					}
					function button1() {
						echo "Words containing 1 vowel<br>";
						global $vowel_1;
						for ($i=0; $i< count($vowel_1); $i++) {
							echo $vowel_1[$i]. "<br>";
						}
					}
					function button2() {
						echo "Words containing 2 vowels<br>";
						global $vowel_2;
						for ($i=0; $i< count($vowel_2); $i++) {
							echo $vowel_2[$i]. "<br>";
						}
					}
					function button3() {
						echo "Words containing 3 vowels<br>";
						global $vowel_3;
						for ($i=0; $i< count($vowel_3); $i++) {
							echo $vowel_3[$i]. "<br>";
						}
					}
					function button4() {
						echo "Words containing 4 vowels<br>";
						global $vowel_4;
						for ($i=0; $i< count($vowel_4); $i++) {
							echo $vowel_4[$i]. "<br>";
						}
					}
					function button5() {
						echo "Words containing 5 vowels<br>";
						global $vowel_5;
						for ($i=0; $i< count($vowel_5); $i++) {
							echo $vowel_5[$i]. "<br>";
						}
					}
					function button6() {
						echo "Words containing 6 vowels<br>";
						global $vowel_6;
						for ($i=0; $i< count($vowel_6); $i++) {
							echo $vowel_6[$i]. "<br>";
						}
					}
				?>
			</div>
		</div>
	</body>
	<footer>
		Copyright &copy; 2022 Talisa K. Powell
	</footer>
</html>
