<?php
    require "../db/db_connect.php";

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

    $query = $_POST['query'];
    $option = $_POST['option'];

    if ($option == "repo") {
        $sql = "SELECT * FROM project p JOIN user u ON p.user_id=u.user_id WHERE CONCAT(COALESCE(p.project_title, ''), COALESCE(p.project_description, '')) LIKE '%$query%' AND project_privacy=1";
    } else {
        $sql = "SELECT * FROM project p JOIN user u ON p.user_id=u.user_id WHERE CONCAT(COALESCE(u.name, ''), COALESCE(u.email, ''), COALESCE(student_id, '')) LIKE '%$query%'";
    }

    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        $list .= '<tr>
            <td>'.$row['project_title'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.substr($row['project_description'], 0, 10).'</td>
            <td><a href=user_repo.php/'.$row['project_id'].' class="btn btn-primary" style="padding: 1px 5px;">Visit</a></td>
        </tr>';
    }

    $list .= '</tbody></table>';

    echo $list;
 ?>
