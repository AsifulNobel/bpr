<?php

	session_start();

	include '../db/db_connect.php';

	$code = $_POST['code'];
    $title = $_POST['title'];
    $initial = $_POST['initial'];
    $section = $_POST['section'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];

    $sql = "SELECT * FROM semester WHERE name='$semester' AND year='$year'";
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO semester (name, year) values ('$semester', '$year')";
        $result = mysqli_query($connection, $sql);
    }

    $sql = "SELECT * FROM semester WHERE name='$semester' AND year='$year'";
    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($result);
    $semester_id = $row['ID'];

    $sql = "SELECT * FROM faculty WHERE initial LIKE '%$initial%'";
    $result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) != 0) {
		$row = mysqli_fetch_assoc($result);
	    $faculty_id = $row['ID'];
	}
	else {
		$sql = "INSERT INTO faculty (initial) VALUES ('$initial')";
	    $result = mysqli_query($connection, $sql);
		$faculty_id = mysqli_insert_id($connection);
	}

    $sql = "INSERT INTO course (title, code, section, faculty_id, semester_id) VALUES ('$title', '$code', '$section', '$faculty_id', '$semester_id')";
    $result = mysqli_query($connection, $sql);

	if ($result) {
		echo "Okay";
	}
	else{
		echo "Sorry";
	}

?>
