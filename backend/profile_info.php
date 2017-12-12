<?php
    session_start();

    // Calling from user_profile.php, that is why directory different
	require 'db/db_connect.php';

    if(isset($_GET['id'])) {
        $query = $_GET['id'];
    }
    elseif (isset($_SESSION['login_id'])) {
        $query = $_SESSION['login_id'];
    }
    else {
        exit;
    }

    $list = NULL;
    $sql = "SELECT * FROM user WHERE user_id=$query";
	$result = mysqli_query($connection, $sql);
	$list = mysqli_fetch_assoc($result);

    if ($list['role_id'] == 3) {
        $sql = "SELECT * FROM faculty WHERE user_id=$query";
        $result = mysqli_query($connection, $sql);
        $list['faculty'] = array(mysqli_fetch_assoc($result));
    }

    $sql = "SELECT * FROM project WHERE user_id=$query";
    $result = mysqli_query($connection, $sql);

    $list["project"] = array();
    $project_count = 0;

	while ($row = mysqli_fetch_assoc($result)) {
        $project_id = $row['project_id'];
        $commentCountSQL = "SELECT COUNT(*) as comment_count FROM review WHERE project_id=$project_id";
        $coult = mysqli_query($connection, $commentCountSQL);
        $countResult = mysqli_fetch_assoc($coult);
        $row['comment_count'] = $countResult['comment_count'];

	    array_push($list['project'], $row);
        $project_count += 1;
	}

    mysqli_free_result($result);
?>
