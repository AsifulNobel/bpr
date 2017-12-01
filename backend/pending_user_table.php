<?php
	session_start();

	include '../db/db_connect.php';

	$query = $_POST['query'];

	$list = '<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email Address</th>
			<th>ID</th>
			<th>Role</th>';

	if($_SESSION['login_role_id']==1){
		$list .= '<th colspan="2">Actions</th>';
	}

	$list .= '</tr>
			</thead>
			<tbody>';

	if (strlen($query) > 0) {
		$sql = "SELECT * FROM user WHERE CONCAT(name, student_id, email) LIKE '%$query%' AND user_status=0";
	} else {
		$sql = "SELECT * FROM user WHERE user_status=0";
	}

	$result = mysqli_query($connection, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$list.= '<tr>
					<td>'.$row['name'].'</td>
		    		<td>'.$row['email'].'</td>
		    		<td>'.$row['student_id'].'</td>';

		    		$role_id = $row['role_id'];

		    		$sql2 = "SELECT * FROM role WHERE role_id='$role_id'";
		    		$result2 = mysqli_query($connection, $sql2);
		    		$row2 = mysqli_fetch_assoc($result2);

		    		$list .= '<td>'.$row2['role_name'].'</td>';

		    		if($_SESSION['login_role_id']==1){
		    			$list .= '<td colspan="2">
							<button type="button" name="button" class="btn btn-primary" onclick="approve_user('.$row['user_id'].')" style="padding: 1px 5px;"><i class="fa fa-check" aria-hidden="true"></i></button>
							<button type="button" name="button" class="btn btn-danger" onclick="delete_user('.$row['user_id'].')" style="padding: 1px 5px;"><i class="fa fa-times" aria-hidden="true"></i></button>
						</td>';
		    		}

		    		$list .= '</tr>';
	}

	$list .= '</tbody>
				</table>';

	echo $list;
?>
