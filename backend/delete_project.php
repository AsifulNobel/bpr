<?php

	include '../db/db_connect.php';

	$project_id = $_POST['project_id'];

	$sql = "DELETE FROM project WHERE project_id = '$project_id'";
	$result = mysqli_query($connection, $sql);

	if ($result) {
		echo "Okay";
	}

	else{
		echo "Sorry";
	}

?>