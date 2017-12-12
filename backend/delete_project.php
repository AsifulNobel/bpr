<?php

	include '../db/db_connect.php';

	$project_id = $_POST['project_id'];

	$sql = "SELECT a.user_id, b.location FROM project a JOIN project_files b ON a.project_id=b.project_id WHERE a.project_id='$project_id'";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);

	$sql = "DELETE FROM project_files WHERE project_id = '$project_id'";
	$result = mysqli_query($connection, $sql);

	if (file_exists('../repositories/'.$row['user_id'].'/'.$row['project_url'])) {
		unlink('../repositories/'.$row['user_id'].'/'.$row['project_url']);
	}
	elseif (file_exists('../repositories/'.$row['project_url'])) {
		unlink('../repositories/'.$row['project_url']);
	}

	$sql = "DELETE FROM project WHERE project_id = '$project_id'";
	$result = mysqli_query($connection, $sql);

	if ($result) {
		echo "Okay";
	}

	else{
		echo "Sorry";
	}

?>
