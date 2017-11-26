<!DOCTYPE html>
<html>
	<head>
		<title>Account Info</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<nav class="navbar navbar-default" id="navBorderFix">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand">ProLab</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		        <ul class="nav navbar-nav">
		            <li><a href="#">Home</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="#">Explore</a></li>
					<li><a href="#">Add Repository</a></li>
		        </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> Account</a></li>
		        <li><a onclick="" href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container">

			<h2 class="text-center">Edit User Info</h2>

			<div class="col-md-12 col-md-offset-2">
				<form class="form-horizontal" id="edit-user-form">

					<input type="hidden" name="user_id" value="">

					<div class="form-group">
						<label for="name" class="control-label col-sm-2">Name</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="name" id="name" value="Asiful Haque Latif">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="control-label col-sm-2">Email</label>
						<div class="col-sm-4">
							<input class="form-control" type="email" name="email" id="email" value="asiful.latif@northsouth.edu">
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

		              <button type="button" onclick="save_password()" class="btn btn-success" data-dismiss="modal">Save</button>
		              <button type="button" onclick="hide_modal()" class="btn btn-danger" data-dismiss="modal">Cancel</button>

		            </div>
		          </div>

		        </div>
	      </div>
	    <!-- Modal End -->

	</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>

</html>
