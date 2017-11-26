<?php
	
	session_start();

	include '../db/db_connect.php';

	$user_id = $_SESSION['login_id'];
	$list = "";

	$sql = "SELECT * FROM project WHERE user_id = '$user_id'";
	$result = mysqli_query($connection, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		
		$list.= '<div class="col-sm-4">
					<div class="panel panel-default">

    				<div class="panel-heading text-center project_title">'.$row['project_title'].'</div>
    				<input type="hidden" id="project_title-'.$row['project_id'].'" value="'.$row['project_title'].'">

    				<div class="panel-body project_description">'.$row['project_description'].'</div>
    				<input type="hidden" id="project_description-'.$row['project_id'].'" value="'.$row['project_description'].'">

    				<div class="panel-footer">
    					<a href="repository_details.php?project_id='.$row['project_id'].'" class="btn btn-primary">View</a>
    					<button class="btn btn-primary" onclick="edit_repository('.$row['project_id'].')" >Edit</button>
    					<button class="btn btn-danger" onclick="delete_repository('.$row['project_id'].')" >Delete</button>
    				</div>
    				
  					</div>
				</div>';
	}

	echo $list;

?>