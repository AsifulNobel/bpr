<?php
	
	session_start();

	include '../db/db_connect.php';

	$project_id = $_POST['project_id'];
	$review_content = $_POST['review_content'];
	$user_id = $_SESSION['login_id'];


	$sql = "INSERT INTO review (review_content, project_id, user_id) VALUES ('$review_content', '$project_id', '$user_id')";
	$result = mysqli_query($connection, $sql);

	if ($result) {
		echo "Okay";
	}

	else{
		echo "Sorry";
	}

?>