<!DOCTYPE html>
<html>
	<head>
		<title>User Information</title>
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
				<li><a href="#">Pending</a></li>
				<li><a href="#">Browse Repositories</a></li>
				<li class="active"><a href="#">Add Admin</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Account</a></li>
		        <li><a onclick="" href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>

		<div class="container">
			<div>
		            <form id="registration-form" class="form-horizontal" role="form">
		                <h2 style="margin-left:3em;">Add Admin Credentials</h2>
		                <div class="form-group">
		                    <label for="email" class="control-label">Email</label>
		                    <div class="">
		                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" data-required="true">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="password" class="control-label">Password</label>
		                    <div class="">
		                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" data-required="true">
		                    </div>
		                </div>

						<div class="form-group">
		                    <label for="password" class=" control-label">Confirm Password</label>
		                    <div class="">
		                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" data-required="true">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="col-sm-4 col-sm-offset-4">
		                        <button type="submit" class="btn btn-primary btn-block">Add</button>
		                    </div>
		                </div>

		            </form>

		        </div>
		</div>

	</body>

<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
</html>
