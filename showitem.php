<?php
//connect to database
$mysqli = mysqli_connect("sql105.epizy.com", "epiz_31874127", "yzkAC85Hbb5I", "epiz_31874127_mydatabase");

$display_block = "<h1>My Store - Item Detail</h1>";

//create safe values for use
$safe_item_id = mysqli_real_escape_string($mysqli, $_GET['item_id']);

//validate item
$get_item_sql = "SELECT c.id as cat_id, c.cat_title, si.item_title, si.item_price, si.item_desc, si.item_image FROM store_items AS si LEFT JOIN store_categories AS c on c.id = si.cat_id WHERE si.id = '".$safe_item_id."'";
$get_item_res = mysqli_query($mysqli, $get_item_sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_item_res) < 1) {
   //invalid item
   $display_block .= "<p><em>Invalid item selection.</em></p>";
} else {
   //valid item, get info
   while ($item_info = mysqli_fetch_array($get_item_res)) {
	   $cat_id = $item_info['cat_id'];
	   $cat_title = strtoupper(stripslashes($item_info['cat_title']));
	   $item_title = stripslashes($item_info['item_title']);
	   $item_price = $item_info['item_price'];
	   $item_desc = stripslashes($item_info['item_desc']);
	   $item_image = $item_info['item_image'];
	}

   //make breadcrum trail & display of item
   $display_block .= <<<END_OF_TEXT
   <p><em>You are viewing:</em><br>
   <strong><a href="showcat.php?cat_id=$cat_id">$cat_title</a> &gt; $item_title</strong></p>
   <div style="float: left;"><img src="$item_image" alt="$item_title"></div>
   <div style="float: left; padding-left: 12px">
   <p><strong>Description:</strong><br>$item_desc</p>
   <p><strong>Price:</strong> \$$item_price</p>
END_OF_TEXT;

   //free result
   mysqli_free_result($get_item_res);

   //get colors
   $get_colors_sql = "SELECT item_color FROM store_item_color WHERE item_id = '".$safe_item_id."' ORDER BY item_color";
   $get_colors_res = mysqli_query($mysqli, $get_colors_sql) or die(mysqli_error($mysqli));

   if (mysqli_num_rows($get_colors_res) > 0) {
        $display_block .= "<p><strong>Available Colors:</strong><br>";
        while ($colors = mysqli_fetch_array($get_colors_res)) {
           $item_color = $colors['item_color'];
           $display_block .= $item_color."<br>";
       }
   }

   //free result
   mysqli_free_result($get_colors_res);

   //get sizes
   $get_sizes_sql = "SELECT item_size FROM store_item_size WHERE item_id = '".$safe_item_id."' ORDER BY item_size";
   $get_sizes_res = mysqli_query($mysqli, $get_sizes_sql) or die(mysqli_error($mysqli));

   if (mysqli_num_rows($get_sizes_res) > 0) {
       $display_block .= "<p><strong>Available Sizes:</strong><br>";

       while ($sizes = mysqli_fetch_array($get_sizes_res)) {
          $item_size = $sizes['item_size'];
          $display_block .= $item_size."<br>";
       }
   }

   //free result
   mysqli_free_result($get_sizes_res);

   //close up the div
   $display_block .= "</div>";

}
//close connection to MySQL
mysqli_close($mysqli);
?>

<!DOCTYPE html>

<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>My Store</title>
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
