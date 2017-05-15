<?php

	session_start();

	include '../db/db_connect.php';

	$name = $_POST['name'];
	$gender = $_POST['gender'];

	$list = '<table id="myTable" class="table">
		<thead>
		<tr>
			<th>Photo</th>
			<th data-sort="string">Name</th>
			<th data-sort="string">Email</th>
			<th data-sort="string">Date of Birth</th>
			<th data-sort="string">Gender</th>
			<th data-sort="string">Role</th>';

		if($_SESSION['login_role_id']==1){
			$list .= '<th>Actions</th>';
		}
		
		$list .= '</tr>
					</thead>

					<tbody>';


	$sql = "SELECT * FROM user WHERE name LIKE '%$name%' AND gender LIKE '$gender%' AND user_status=0";


	$result = mysqli_query($connection, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		    
		$list.= '<tr>
					<td><img src="uploads/'.$row['photo'].'" style="height: 50px; width: 50px"></td>
					<td>'.$row['name'].'</td>
		    		<td>'.$row['email'].'</td>
		    		<td>'.$row['date_of_birth'].'</td>
		    		<td>'.$row['gender'].'</td>';

		    		$role_id = $row['role_id'];

		    		$sql2 = "SELECT * FROM role WHERE role_id='$role_id'";
		    		$result2 = mysqli_query($connection, $sql2);
		    		$row2 = mysqli_fetch_assoc($result2);

		    		$list .= '<td>'.$row2['role_name'].'</td>';

		    		if($_SESSION['login_role_id']==1){

		    			$list .= '<td>

		    			<button class="btn btn-primary" onclick="approve_user('.$row['user_id'].')">Approve</button>';
		    			
		    			if($row['role_id']!=1){

		    				$list .= '<button class="btn btn-danger" onclick="delete_user('.$row['user_id'].')">Delete</button>';
		    			}

		    			$list .= '</td>';
		    		}

		    		$list .= '</tr>';                                   
	}

	$list .= '</tbody>
				</table>';

	echo $list;



?>