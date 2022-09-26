<?php
//connect to database
$mysqli = mysqli_connect("sql105.epizy.com", "epiz_31874127", "yzkAC85Hbb5I", "epiz_31874127_mydatabase");

$display_block = "<h1 style=\"padding-bottom: .5%;\">My Store</h1>
<br>
<table id=\"storetable\" style=\"width: 80%; margin: auto;\">
<tbody style=\"height:100%; margin: auto;\">";

//show categories first
$get_cats_sql = "SELECT id, cat_title, cat_desc FROM store_categories ORDER BY cat_title";
$get_cats_res =  mysqli_query($mysqli, $get_cats_sql) or die(mysqli_error($mysqli));
$counter = 0;

if (mysqli_num_rows($get_cats_res) < 1) {
   $display_block = "<p><em>Sorry, no items to view.</em></p>";
} else {
   while ($cats = mysqli_fetch_array($get_cats_res)) {
        $cat_id  = $cats['id'];
        $cat_title = strtoupper(stripslashes($cats['cat_title']));
        $cat_desc = stripslashes($cats['cat_desc']);        

        if (isset($_GET['cat_id']) && ($_GET['cat_id'] == $cat_id)) {

			//create safe value for use
  			$safe_cat_id = mysqli_real_escape_string($mysqli, $_GET['cat_id']);

			//get items
			$get_items_sql = "SELECT id, item_title, item_price FROM store_items WHERE cat_id = '".$safe_cat_id."' ORDER BY item_title";
			$get_items_res = mysqli_query($mysqli, $get_items_sql) or die(mysqli_error($mysqli));

			if (mysqli_num_rows($get_items_res) < 1) {
				$display_block = "<p><em>Sorry, no items in this category.</em></p>";
            } else {
               $display_block .= "<table id=\"itemtable\" style=\"width: 80%; margin: auto;\"><tbody style=\"height:100%; margin: auto;\">";

               while ($items = mysqli_fetch_array($get_items_res)) {
					$item_id  = $items['id'];
					$item_title = stripslashes($items['item_title']);
					$item_price = $items['item_price'];
					$item_title_nospace = str_replace(' ', '', $item_title);
					
					if ($counter == 0) {
						// Start new row and inc counter
						$display_block .= "<tr><td style=\"background-image: URL(Pictures/".$item_title_nospace.".jpg); background-size: 80%; background-repeat: no-repeat; background-position: center; color: white; height:200px; width: 26%; text-align: center;\"><a style=\"color: white;\" href=\"showitem.php?item_id=".$item_id."\">".$item_title."</a></td>";
						$counter += 1;
					} else if ($counter == 1) {
						// Add table data and inc counter
						$display_block .= "<td style=\"background-image: URL(Pictures/".$item_title_nospace.".jpg); background-size: 80%; background-repeat: no-repeat; background-position: center; color: white; height:200px; width: 26%; text-align: center;\"><a style=\"color: white;\" href=\"showitem.php?item_id=".$item_id."\">".$item_title."</a></td>";
						$counter += 1;
					} else {
						// counter is 2, after adding data close row and reset counter
						$display_block .= "<td style=\"background-image: URL(Pictures/".$item_title_nospace.".jpg); background-size: 80%; background-repeat: no-repeat; background-position: center; color: white; height:200px; width: 26%; text-align: center;\"><a style=\"color: white;\" href=\"showitem.php?item_id=".$item_id."\">".$item_title."</a></td></tr>";
						$counter = 0;
					}
					
                }

				$display_block .= "</tbody></table>";
			}

			//free results
			mysqli_free_result($get_items_res);
		}
	}
	if ($counter == 1){
		//$display_block .= "</tr>";
		$counter = 0;
	}
	//$display_block .= "</tbody></table>";
}
//free results
mysqli_free_result($get_cats_res);

//close connection to MySQL
mysqli_close($mysqli);
?>



<!DOCTYPE html>

<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>My Categories</title>
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
			<?php echo $display_block; ?>
		</div>

	</body>
</html>
