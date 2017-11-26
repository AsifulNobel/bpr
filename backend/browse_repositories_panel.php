<?php
	
	session_start();

	include '../db/db_connect.php';

	if(isset($_POST['search_key'])){

		$search_key = $_POST['search_key'];	
	}

	else{

		$search_key = "";	
	}
	
	$list = "";

	$sql = "SELECT * FROM project WHERE project_privacy = 1 AND (project_title LIKE '%$search_key%' OR project_description LIKE '%$search_key%')";

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
    					<a href="repositories/'.$row['project_url'].'" class="btn btn-success">Download</a>
    				</div>
    				
  					</div>
				</div>';
	}

	echo $list;

?>