<!DOCTYPE html>
<html>
	<head>
		<title>Add Repository</title>
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
					<li class="active"><a href="#">Add Repository</a></li>
		        </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Account</a></li>
		        <li><a onclick="" href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container">

			<h2 class="text-center">New Repository Info</h2>

			<div class="col-md-12 col-md-offset-2">
				<form class="form-horizontal" id="edit-user-form">

					<input type="hidden" name="user_id" value="">

					<div class="form-group">
						<label for="name" class="control-label col-sm-2">Project Title</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="name" id="name">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="control-label col-sm-2">Project Description</label>
						<div class="col-sm-4">
							<input class="form-control" type="email" name="text" id="email" value="">
						</div>
					</div>

					<div class="form-group">
					    <label for="photo" class="col-sm-2 control-label">Upload new files</label>
					    <div class="col-sm-4">
					        <input type="file" id="photo" name="photo" class="form-control">
					    </div>
					</div>

					<div class="form-group">
						<div class="col-md-6" style="margin-left:190px;">
							<input class="btn btn-success" type="submit" name="submit" value="Save Repository Information">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>

</html>
