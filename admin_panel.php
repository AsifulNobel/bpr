<!DOCTYPE html>
<html>
<head>
	<title>User Information</title>
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

    include 'db/db_connect.php';
?>

<?php

	include 'header.php';
?>

<div class="container">

	<h2>User Information</h2>

	<form id="search-form" class="form-inline">

		<input class="form-control" type="text" id="name" name="name" placeholder="Search by Name">
		<input class="form-control" type="submit" id="search" name="submit" value="Search">

	</form>


	<div id="user-table">

	</div>

</div>

</body>

<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="static/js/stupidtable.js"></script>

<script type="text/javascript">

	$("#search-form").submit(function(e){
		e.preventDefault();
		show_user_list();
	});

	function show_user_list(){

		var name = $("#name").val();

		$.post("backend/user_table.php",{name:name},function(result){
			/*alert(result);*/
			$("#user-table").html(result);

			$("#myTable").stupidtable();
		});
	}

	$(document).ready(function(){

		show_user_list();

	});

	function edit_user(user_id){

		window.location.replace("user_edit.php?user_id="+user_id);
	}

	function delete_user(user_id){

		$.post("backend/delete_user.php",{user_id:user_id}, function(result){

			if (result=="Okay") {

				show_user_list();
				alert("user deleted");
			}
		});
	}

</script>

</html>
