<?php
	
	session_start();

	include '../db/db_connect.php';
	
	$project_title = $_POST['project_title'];
	$project_description = $_POST['project_description'];
	$project_privacy = $_POST['project_privacy'];
	$project_url = $_FILES['project_file']['name'];
	$user_id = $_SESSION['login_id'];

	$targetdir = '../repositories/';   
	$targetfile = $targetdir.$_FILES['project_file']['name'];
	$project_file_upload_confirmation = move_uploaded_file($_FILES['project_file']['tmp_name'], $targetfile);


	if($project_file_upload_confirmation){

		$sql = "INSERT INTO project (project_title, project_description, project_url, project_privacy, user_id) VALUES ('$project_title', '$project_description', '$project_url', '$project_privacy', '$user_id')";
		$result = mysqli_query($connection, $sql);


		if ($result) {

			echo "Okay";
		} 

		else { 
	    
			echo "Sorry";
		}
	}

?>