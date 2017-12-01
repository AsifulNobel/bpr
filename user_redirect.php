<?php
    session_start();
    
    if (isset($_SESSION['login_role_id']) && ($_SESSION['login_role_id']==2)) {
        require "user_header.php";
    }
    elseif (isset($_SESSION['login_role_id']) && ($_SESSION['login_role_id']==1)) {
        require "admin_header.php";
    }
    else {
        header("Location: index.php");
    }
?>
