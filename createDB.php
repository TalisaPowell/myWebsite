<?php
$mysqli = mysqli_connect("sql105.epizy.com", "epiz_31874127", "yzkAC85Hbb5I", "epiz_31874127_records");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "CREATE TABLE person (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	firstname VARCHAR (255), lastname VARCHAR (255), email VARCHAR (255))";
	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
	   	echo "Table person successfully created.";
	} else {
		printf("Could not create table: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}
?>

