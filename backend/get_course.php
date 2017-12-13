<?php
    session_start();

    include '../db/db_connect.php';

    $list = '<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Section</th>
            <th>Faculty</th>
            <th>Faculty Initial</th>
			<th>Semester</th>';

	$list .= '</tr>
			</thead>
			<tbody>';

    // if ($_SESSION['login_role_id']==1) {
    //     $sql = "SELECT c.ID as id, c.title as title, c.code as code, c.section as section, f.name as faculty_name, CONCAT(s.name, '-',s.year) as semester FROM course c INNER JOIN faculty f on c.faculty_id=f.ID INNER JOIN semester s on c.semester_id=s.ID";
    // }
    // elseif ($_SESSION['login_role_id']==3) {
    //     $temp = $_SESSION['login_id'];
    //
    //     $sql = "SELECT c.ID as id, c.title as title, c.code as code, c.section as section, f.name as faculty_name, CONCAT(s.name, '-',s.year) as semester FROM course c INNER JOIN faculty f on c.faculty_id=f.ID INNER JOIN semester s on c.semester_id=s.ID WHERE f.user_id='$temp'";
    // }

    $sql = "SELECT c.ID as id, c.title as title, c.code as code, c.section as section, f.name as faculty_name, f.initial as initial, CONCAT(s.name, '-',s.year) as semester FROM course c INNER JOIN faculty f on c.faculty_id=f.ID INNER JOIN semester s on c.semester_id=s.ID";
	$result = mysqli_query($connection, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$list.= '<tr>
					<td>'.$row['code'].'</td>
		    		<td>'.$row['title'].'</td>
		    		<td>'.$row['section'].'</td>
                    <td>'.$row['faculty_name'].'</td>
                    <td>'.$row['initial'].'</td>
                    <td>'.$row['semester'].'</td>';

		    		$list .= '</tr>';
	}

	$list .= '</tbody>
				</table>';

	echo $list;
?>
