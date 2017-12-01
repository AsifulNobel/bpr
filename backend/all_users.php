<?php
    session_start();

	require '../db/db_connect.php';

    if(isset($_POST['query'])) {
        $query = $_POST['query'];
        $sql = "SELECT * FROM user WHERE CONCAT(name, ' ', email) LIKE '%$query%' AND user_status=1";
    }
    else {
        $sql = "SELECT * FROM user WHERE user_status=1";
    }

    $list = '';
	$result = mysqli_query($connection, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
        if($_SESSION['login_id']==$row['user_id']) {
            continue;
        }

		$list .= '<tr>
					<td>'.$row['name'].'</td>
		    		<td>'.$row['email'].'</td>
		    		<td><a href=user_profile.php?id='.$row['user_id'].' class="btn btn-primary" style="padding: 1px 5px;">Visit This Profile</a></td>
		    		<td><a href='.$row['user_id'].' class="btn btn-danger" style="padding: 1px 5px;">Delete</a></td>';
        $list .= '</tr>';
	}

    mysqli_free_result($result);
    echo $list;
?>
