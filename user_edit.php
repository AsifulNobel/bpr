<!DOCTYPE html>
<html>
	<head>
		<title>Account Info</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "user_redirect.php"; ?>
		<?php require "backend/profile_info.php" ?>

		<div class="container">

			<h2 class="text-center">Edit User Info</h2>

			<div class="col-md-12 col-md-offset-2">
				<form class="form-horizontal" id="edit-user-form">

					<input type="hidden" name="user_id" value="">

					<div class="form-group">
						<label for="name" class="control-label col-sm-2">Name</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="name" id="name" value="<?php echo $list['name']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="control-label col-sm-2">Email</label>
						<div class="col-sm-4">
							<input class="form-control" type="email" name="email" id="email" value="<?php echo $list['email']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="sex" class="control-label col-sm-2">Gender</label>
						<div class="btn-group col-sm-4" data-toggle="buttons">
						  <label class="btn btn-primary active">
						    <input type="radio" name="gender" id="option1" value="Male" <?php if($list['gender']=="Male"){echo "checked";}?>> Male
						  </label>
						  <label class="btn btn-primary">
						    <input type="radio" name="gender" id="option2" value="Female" <?php if($list['gender']=="Female"){echo "checked";}?>> Female
						  </label>
						</div>
					</div>

					<div class="form-group">
						<label for="date_of_birth" class="control-label col-sm-2">Date of Birth</label>
						<div class="col-sm-4">
							<input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo $list['date_of_birth']; ?>">
						</div>
					</div>

					<div class="form-group">
					    <label for="photo" class="col-sm-2 control-label">Change Photo</label>
					    <div class="col-sm-4">
					        <input type="file" id="photo" name="photo" class="form-control">
					    </div>
					</div>

					<div class="form-group">
						<div class="col-md-6" style="margin-left:190px;">
							<input class="btn btn-success" type="submit" name="submit" value="Save user Information">
						</div>
						<div class="col-md-4" style="margin-left:-370px;">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change_password_modal">Change Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="modal fade" id="change_password_modal" role="dialog">
		    <div class="modal-dialog">

		      <!-- Modal content-->
		          <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal">&times;</button>
		              <h4 class="modal-title">Change Password</h4>
		            </div>

		            <div class="modal-body">
		              <div class="form-group">
		                <label for="old_password" class="control-label">Old Password</label>
		                <input id="old_password" type="password" name="old_password" class="form-control" value="">
		              </div>

		              <div>
		                <label for="new_password" class="control-label">New Password</label>
		                <input id="new_password" type="password" name="new_password" class="form-control">
		              </div>

		              <div>
		                <label for="confirm_password" class="control-label">Confirm Password</label>
		                <input id="confirm_password" type="password" name="confirm_password" class="form-control">
		              </div>

		            </div>

		            <div class="modal-footer">

		              <button type="button" onclick="save_password()" class="btn btn-success">Save</button>
		              <button type="button" onclick="hide_modal()" class="btn btn-danger" data-dismiss="modal">Cancel</button>

		            </div>
		          </div>

		        </div>
	      </div>
	    <!-- Modal End -->

	</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$("#edit-user-form").submit(function(e){
			e.preventDefault();
			proceed = true;

			if(proceed){
				$.ajax({
						url: "backend/update_user.php",
						type: "POST",
						data:  new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						success: function(data){
							if (data=="Okay") {
								alert("Information Updated");
								location.reload(true);
							}
							else{
								alert("Sorry");
							}
						}

				});
			}
		});

		function save_password() {
			var new_pass = $("#new_password").val();
			var confirm_pass = $("#confirm_password").val();
			var old_pass = $("#old_password").val();

			if (new_pass == confirm_pass && new_pass.length > 0) {
				$.post("backend/change_password.php",
				{old_password: old_pass, confirm_password: confirm_pass},
				function(result) {
					if (result=="Okay") {
						$("#change_password_modal").modal('toggle');
					}
					else if (result == "Non-match") {
						alert("Incorrect Password!");
					}
					else {
						alert("Database Error!");
					}
				})
			}
			else {
				alert("New Passwords do not match!");
			}
		}
	</script>
</html>
