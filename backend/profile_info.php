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

    $sql = "SELECT * FROM project WHERE user_id=$query";
    $result = mysqli_query($connection, $sql);

    $list["project"] = array();
    $project_count = 0;

	while ($row = mysqli_fetch_assoc($result)) {
	    array_push($list['project'], $row);
        $project_count += 1;
	}

    mysqli_free_result($result);
?>
