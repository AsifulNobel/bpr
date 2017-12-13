<?php
    require "../db/db_connect.php";

    $list = '<table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Created By</th>
                <th>Description</th>
                <th>Repository Link</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Faculty</th>
            </tr>
        </thead>
        <tbody>';

    $query = $_POST['query'];
    // $option = $_POST['option'];

    // if ($option == "repo") {
    //     $sql = "SELECT * FROM project p JOIN user u ON p.user_id=u.user_id WHERE CONCAT(COALESCE(p.project_title, ''), COALESCE(p.project_description, '')) LIKE '%$query%' AND project_privacy=1";
    // } else {
    //     $sql = "SELECT * FROM project p JOIN user u ON p.user_id=u.user_id WHERE CONCAT(COALESCE(u.name, ''), COALESCE(u.email, ''), COALESCE(student_id, '')) LIKE '%$query%'";
    // }

    $sql = 'SELECT * FROM project p
    JOIN user u ON p.user_id=u.user_id
	LEFT JOIN (
        SELECT co.ID as ID,co.title as title, co.code as code, f.initial as initial, CONCAT(s.name, " ", s.year) sem FROM course co
        JOIN faculty f ON co.faculty_id=f.ID
    	JOIN semester s ON co.semester_id=s.ID) c
        ON p.course_id=c.ID WHERE CONCAT(COALESCE(p.project_title, ""), " ", COALESCE(p.project_description, ""), " ",COALESCE(c.title, ""),
        COALESCE(c.code, ""), " ", COALESCE(c.initial, ""), " ",
        COALESCE(c.sem, "")) LIKE "%'.$query.'%" AND project_privacy=1';

    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        $list .= '<tr>
            <td>'.$row['project_title'].'</td>
            <td><a href="user_profile.php?id='.$row['user_id'].'">'.$row['name'].'</a></td>
            <td>'.substr($row['project_description'], 0, 10).'...</td>
            <td><a href="user_repo.php?id='.$row['project_id'].'" class="btn btn-primary" style="padding: 1px 5px;">Visit</a></td>
            <td>'.$row['sem'].'</td>
            <td>'.$row['code'].'</td>
            <td>'.$row['initial'].'</td>
        </tr>';
    }

    $list .= '</tbody></table>';

    echo $list;
 ?>
