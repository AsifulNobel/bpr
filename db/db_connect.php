<?php

	$host = "127.0.0.1";
	$username = "root";
	$password = "eM0t10nw";
	$db_name = "prolab";
	$connection = mysqli_connect($host, $username, $password) or die("Host not connected");
	mysqli_select_db($connection, $db_name) or die("DB not selected");

?>
