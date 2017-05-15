<!DOCTYPE html>
<html>
<head>
	<title>BSSE Project Reposiritory</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php 

	session_start();

	if (!isset($_SESSION['login_id'])) {
        header ("Location: http://localhost/bpr/login.php");
    }
 ?> 

<?php

  include 'user_header.php';
?>

<?php
    
    include 'db/db_connect.php';
?>

<div class="container">

	<form id="search-form" style="margin-bottom:10px">
  		<div class="input-group">
    		<input type="text" id="search-key" class="form-control" placeholder="Search repository">
    		<div class="input-group-btn">
      			<button class="btn btn-default" type="submit">
        		<i class="glyphicon glyphicon-search"></i>
      			</button>
    		</div>
  		</div>

	</form>

	<div id="project-list">

  	</div>

</div>

</body>

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">

	$("#search-form").submit(function(e){
		e.preventDefault();
		show_repository_list();
	});
  
  $(document).ready(function(){

		show_repository_list();

	});

  function show_repository_list(){

  	var search_key = $("#search-key").val();

  	$.post("backend/browse_repositories_panel.php",{search_key:search_key},function(result){
			
			$("#project-list").html(result);
		});
  	}

</script>

</html>