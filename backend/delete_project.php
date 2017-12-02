<?php

	include '../db/db_connect.php';

	$project_id = $_POST['project_id'];

	$sql = "SELECT project_url, user_id FROM project WHERE project_id=$project_id";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);

	$sql = "DELETE FROM project WHERE project_id = '$project_id'";
	$result = mysqli_query($connection, $sql);

	if (file_exists('../repositories/'.$row['user_id'].'/'.$row['project_url'])) {
		unlink('../repositories/'.$row['user_id'].'/'.$row['project_url']);
	}
	elseif (file_exists('../repositories/'.$row['project_url'])) {
		unlink('../repositories/'.$row['project_url']);
	}

	if ($result) {
		echo "Okay";
	}

	else{
		echo "Sorry";
	}

?>
