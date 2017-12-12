<?php
	session_start();

	require_once 'db/db_connect.php';

	$sql = "SELECT c.ID as id, c.title as title, c.code as code, c.section as section, f.initial as initial, CONCAT(s.name, '-',s.year) as semester FROM course c INNER JOIN faculty f on c.faculty_id=f.ID INNER JOIN semester s on c.semester_id=s.ID";
	$result = mysqli_query($connection, $sql);
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Repository</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "user_redirect.php"; ?>

		<div class="container">

			<h2 class="text-center">New Repository Info</h2>

			<div class="col-md-offset-3 col-md-10">
				<form class="form-horizontal" id="new-repo-form">

					<input type="hidden" name="user_id" value="">

					<div class="form-group">
						<label for="name" class="control-label col-sm-2">Project Title</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="project_title" id="project_title" autofocus data-required="true" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="control-label col-sm-2">Project Description</label>
						<div class="col-sm-4">
							<textarea rows="10" class="form-control" name="project_description" id="project_description" data-required="true" value=""></textarea>
						</div>
					</div>

					<div class="form-group">
					    <label for="project_file" class="col-sm-2 control-label">Select File (ZIP/RAR)</label>
					    <div class="col-sm-4">
					        <input type="file" id="project_file" name="project_file" class="form-control">
					    </div>
					</div>

					<div class="form-group">
	                    <label class="control-label col-sm-2">Project Privacy</label>
	                    <div class="btn-group col-sm-4" data-toggle="buttons">
							<div class="radio">
	                            <label>
									<input type="radio" id="project_privacy" name="project_privacy" value="1" checked>Public
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" id="project_privacy" name="project_privacy" value="0">Private
								</label>
							</div>
	                    </div>
	                </div>

					<div class="form-group">
						<label for="course" class="col-sm-2 control-label">Course</label>
						<div class="col-sm-4">
							<select class="form-control" id="course" name="course">
								<option disabled selected> -- select an option -- </option>
								<?php
									while ($row = mysqli_fetch_assoc($result)) {
										echo '<option value="'.$row['id'].'">'.$row['code'].'-'.$row['section'].'-'.$row['initial'].
										'-'.$row['semester'].'</option>';
									}
								 ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-2 col-md-6">
							<input class="btn btn-success" type="submit" name="submit" value="Save Repository Information">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var allowed_files = ['application/zip', 'application/rar'];
		var border_color = "#2c3e50";

		$("#new-repo-form").submit(function(e){
			e.preventDefault();
			proceed = true;

			$($(this).find("input[data-required=true], textarea[data-required=true]")).each(function(){
					if(!$.trim($(this).val())){
						$(this).css('border-color','red');
						proceed = false;
					}

			}).on("input", function(){
				 $(this).css('border-color', border_color);
			});


			if(window.File && window.FileReader && window.FileList && window.Blob){
				var total_files_size = 0;

				$(this.elements['project_file'].files).each(function(i, ifile){
					if(ifile.value !== ""){
						if(allowed_files.indexOf(ifile.type) === -1){
							alert( ifile.name + " is unsupported file type!");
							proceed = false;
						}
					 total_files_size = total_files_size + ifile.size;
					}
					else{
						alert("Please select zip/rar file");
						proceed = false;
					}
				});
			}


			if(proceed){
				$.ajax({
					url: "backend/create_new_repository.php",
					type: "POST",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data){
						if(data=="Okay"){
							alert("Repository Added!");
							window.location.replace("user_profile.php");
						}
						else{
							alert(data);
						}
					}
				});
			}
		});
	</script>
</html>
