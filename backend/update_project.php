<?php

	include '../db/db_connect.php';
	
	$edited_project_id = $_POST['edited_project_id'];
	$edited_project_title = $_POST['edited_project_title'];
	$edited_project_description = $_POST['edited_project_description'];
	

	$sql = "UPDATE project SET project_title = '$edited_project_title', project_description = '$edited_project_description' WHERE project_id='$edited_project_id'";

	$result = mysqli_query($connection, $sql);


	if ($result) {

	    echo "Okay";
	  } 

	else { 
	    
	    echo "Sorry";
	}

?>