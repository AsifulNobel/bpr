<?php
    require_once "../db/db_connect.php";

    $project_id = $_POST['project_id'];
    $sql = "SELECT * FROM project_files WHERE project_id=$project_id";
    $file_result = mysqli_query($connection, $sql);

    $files = array();

    while ($row = mysqli_fetch_assoc($file_result)) {
        array_push($files, '../repositories/'.$row['location']);
    }

    $zipname = '../repositories/download/project'.$project_id.'.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);

    foreach ($files as $file) {
        if (file_exists($file)) {
            $zip->addFromString(basename($file),  file_get_contents($file));
        }
    }

    $zip->close();

    echo $zipname;
?>
