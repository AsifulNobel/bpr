<!DOCTYPE html>
<?php
	require "db/db_connect.php";
	session_start();

	if (!isset($_GET['id'])) {
		die('No project id passed');
	}

	$project_id = $_GET['id'];
	$sql = "SELECT * FROM project WHERE project_id=$project_id";
	$result = mysqli_query($connection, $sql);
	$project = mysqli_fetch_assoc($result);

	if ($project['project_privacy']==0 && $project['user_id']!=$_SESSION['login_id']) {
		if ($_SESSION['login_role_id']!=1) {
			header("Location: login.php");
		}
	}

	$sql = "SELECT * FROM project_files WHERE project_id=$project_id";
	$result = mysqli_query($connection, $sql);
	$project_files = array();

	while ($row = mysqli_fetch_assoc($result)) {
		array_push($project_files, array(
				0 => substr($row['location'], strrpos($row['location'], '/')+1),
				1 => $row['ID']
			)
		);
	}

	$sql = "SELECT c.ID as id, c.title as title, c.code as code, c.section as section, f.initial as initial, CONCAT(s.name, '-',s.year) as semester FROM course c INNER JOIN faculty f on c.faculty_id=f.ID INNER JOIN semester s on c.semester_id=s.ID";
	$result = mysqli_query($connection, $sql);
 ?>
<html>
	<head>
		<title>Repository Info</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "user_redirect.php"; ?>

		<div class="container">

			<h2 class="text-center">Edit Repository Info</h2>

			<div class="col-md-10 col-md-offset-3">
				<form class="form-horizontal" id="edit-repo-form">

					<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">

					<div class="form-group">
						<label for="name" class="control-label col-sm-2">Project Title</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="project_title" id="project_title" data-required="true" value="<?php echo $project['project_title']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="control-label col-sm-2">Project Description</label>
						<div class="col-sm-4">
							<textarea rows="10" class="form-control" name="project_description" id="project_description" data-required="true"><?php echo $project['project_description']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
	                    <label class="control-label col-sm-2">Project Privacy</label>
	                    <div class="btn-group col-sm-4">
                            <div class="radio">
								<label>
									<input type="radio" id="project_privacy" name="project_privacy" value="1" <?php if($project['project_privacy']==1){echo "checked";}?>>Public
								</label>
                            </div>
							<div class="radio">
								<label>
									<input type="radio" id="project_privacy" name="project_privacy" value="0" <?php if($project['project_privacy']==0){echo "checked";}?>>Private
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
					    <label for="project_file" class="col-sm-2 control-label">Upload new files</label>
					    <div class="col-sm-4">
					        <input type="file" id="project_file" name="project_file" class="form-control">
					    </div>
					</div>

					<div class="form-group">
						<label for="file_delete" class="col-sm-2 control-label">Delete existing files</label>
							<div class="col-sm-4">
								<select class="form-control" id="file_delete" name="file_delete[]" multiple>
									<?php foreach ($project_files as $file) {
										echo '<option value="'.$file[1].'">'.$file[0].'</option>';
									} ?>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-offset-4 col-sm-3">
								<input class="btn btn-success" type="submit" name="submit" value="Save Repository Information">
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-primary" onclick="delete_repo()">Delete Repo</button>
							</div>
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

		$("#edit-repo-form").submit(function(e){
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
					url: "backend/update_project.php",
					type: "POST",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data){
						if(data=="Okay"){
							alert("Repository Updated!");
							window.location.replace("user_repo.php?id="+<?php echo $project_id; ?>);
						}
						else{
							alert(data);
						}
					}
				});
			}
		});

		function delete_repo() {
			$.post('backend/delete_project.php', {project_id: <?php echo $project['project_id']; ?>},
				function(result) {
					if (result=="Okay") {
						alert("Project Deleted");
						window.location.replace('user_profile.php');
					}
					else {
						alert("Project Deletion Failure");
					}
				})
		}
	</script>
</html>
