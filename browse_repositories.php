<!DOCTYPE html>
<html>
    <head>
    	<title>BSSE Project Reposiritory</title>
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
			</form>

			<div id="project-list">
				<table class="table table-striped table-hover table-bordered">
					<thead class="thead-dark">
					    <tr>
							<th>Name</th>
							<th>Created By</th>
							<th>Description</th>
							<th>Repository Link</th>
					    </tr>
					</thead>
					<tbody>
						<tr>
							<th>Sample Repository</th>
							<th>Asif</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
					</tbody>
				</table>
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
