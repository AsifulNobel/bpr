<!DOCTYPE html>
<html>
	<head>
		<title>User Information</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "admin_header.php"; ?>

		<div class="container">
			<h2>User Information</h2>
			<form id="search-form" class="form-inline">
				<div class="">
					<input class="form-control" type="text" id="query" name="query" placeholder="Search User">
					<input class="form-control" type="submit" id="search" name="submit" value="Search">
				</div>
			</form>

			<div>
				<table class="table table-striped table-hover table-bordered">
					<thead class="thead-dark">
					    <tr>
							<th>Name</th>
							<th>Email Address</th>
							<th>Profile Link</th>
							<th>Action</th>
					    </tr>
					</thead>
					<tbody id="user-table">

					</tbody>
				</table>
			</div>
		</div>

	</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$("#search-form").submit(function(e){
			e.preventDefault();
			show_user_list();
		});

		function show_user_list(){
			var query = $("#query").val();

			$.post("backend/all_users.php",{query:query},function(result){
			  $("#user-table").html(result);

			  delete_listener();
			});
		}

		function delete_listener() {
			$(".btn-danger").click(function(event) {
				event.preventDefault();
				var splitUrl = $(this)[0].href.split("/");
				var id = splitUrl[splitUrl.length-1];

				$.post("backend/delete_user.php", {user_id:id})
				location.reload(true);
			});
		}

		$(document).ready(function(){
			show_user_list();
		});

	</script>
</html>
