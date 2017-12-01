<?php

	session_start();

	include '../db/db_connect.php';

	if(isset($_POST['search_key'])){
		$search_key = $_POST['search_key'];
	}
	else{
		$search_key = "";
	}

	$list = '<table class="table table-striped table-hover table-bordered">
		<thead class="thead-dark">
			<tr>
				<th>Name</th>
				<th>Created By</th>
				<th>Description</th>
				<th>Repository Link</th>
			</tr>
		</thead>
		<tbody>';

	if (isset($_SESSION['login_role_id']) && ($_SESSION['login_role_id'] == 1)) {
		$sql = "SELECT * FROM project p INNER JOIN user u ON p.user_id=u.user_id WHERE (p.project_title LIKE '%$search_key%' OR p.project_description LIKE '%$search_key%' OR u.name LIKE '%$search_key%')";
	}
	else {
		$sql = "SELECT * FROM project p INNER JOIN user u ON p.user_id=u.user_id WHERE p.project_privacy=1 AND (project_title LIKE '%$search_key%' OR p.project_description LIKE '%$search_key%' OR u.name LIKE '%$search_key%')";
	}

	$result = mysqli_query($connection, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$list.= '<tr>
			<th>'.$row['project_title'].'</th>
			<th>'.$row['name'].'</th>
			<th>'.substr($row['project_description'], 0, 10).'...</th>
			<th>
				<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
			</th>
		</tr>';
	}

	echo $list;
?>
