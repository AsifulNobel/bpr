<!DOCTYPE html>
<html>
<head>
	<title>BSSE Project Reposiritory</title>
	<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
</head>
<body>

<?php

	session_start();

	if (!isset($_SESSION['login_id'])) {
        header ("Location: login.php");
    }
 ?>

<?php

  include 'user_header.php';
?>

<?php

    include 'db/db_connect.php';
?>

<div class="container">


	<div class="jumbotron text-center">
		<h2>Welcome to BSSE Project Repository</h2>

	</div>

</div>

</body>

<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">


</script>

</html>
