<?php

	include '../db/db_connect.php';
	
	$user_id = $_POST['user_id'];


	$sql = "UPDATE user SET user_status = '1' WHERE user_id='$user_id'";
	

	$result = mysqli_query($connection, $sql);


	if ($result) {

	    echo "Okay";
	  } 

	else { 
	    
	    echo "Sorry";
	}

?>