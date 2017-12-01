<!DOCTYPE html>
<html>
	<head>
		<title>User Information</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "user_redirect.php"; ?>

		<div class="container">
			<h2>Repository Information</h2>
			<form id="search-form" class="form-inline">
				<div class="">
					<input class="form-control" type="text" id="name" name="name" placeholder="Search Repository">
					<input class="form-control" type="submit" id="search" name="submit" value="Search">
				</div>
				<div class="btn-group" data-toggle="buttons" style="padding: 10px 1px;">
				  <label class="btn btn-primary active" style="padding:2px 5px;">
				    <input type="radio" name="options" id="option1" value="repo" checked=""> By Repo Name
				  </label>
				  <label class="btn btn-primary" style="padding:2px 5px;">
				    <input type="radio" name="options" id="option2" value="user"> By User
				  </label>
				</div>
			</form>

			<div id="user-table">

			</div>
		</div>

	</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#search-form').submit(function(e) {
			e.preventDefault();

			var query = $('#name').val();
			var option = $('input[name=options]:checked', '#search-form').val();

			if (query.length > 0) {
				$.post("backend/explore.php", {query: query, option: option},
					function(result) {
						console.log(result);
						$("#user-table").html(result);
					})
			}
		})
	</script>
</html>
