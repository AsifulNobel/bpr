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

		        <li class="active"><a href="#">Home</a></li>
				<li><a href="#">Pending</a></li>
				<li><a href="#">Browse Repositories</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Account</a></li>
		        <li><a onclick="" href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>

		<div class="container">
			<h2>User Information</h2>
			<form id="search-form" class="form-inline">
				<div class="">
					<input class="form-control" type="text" id="name" name="name" placeholder="Search User" value="haque">
					<input class="form-control" type="submit" id="search" name="submit" value="Search">
				</div>
				<div class="btn-group" data-toggle="buttons" style="padding: 10px 1px;">
				  <label class="btn btn-primary active" style="padding:2px 5px;">
				    <input type="radio" name="options" id="option1" checked=""> By Name
				  </label>
				  <label class="btn btn-primary" style="padding:2px 5px;">
				    <input type="radio" name="options" id="option2"> By ID
				  </label>
				  <label class="btn btn-primary" style="padding:2px 5px;">
				    <input type="radio" name="options" id="option3"> By Email
				  </label>
				</div>
			</form>

			<div id="user-table">
				<table class="table table-striped table-hover table-bordered">
					<thead class="thead-dark">
					    <tr>
					    	<th>#</th>
							<th>Name</th>
							<th>Email Address</th>
							<th>ID</th>
							<th>Profile Link</th>
							<th>Action</th>
					    </tr>
					</thead>
					<tbody>
						<tr>
							<th>1</th>
							<th>Asiful Haque Latif</th>
							<th>asiful.latif@northsouth.edu</th>
							<th>1410125042</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit This Profile</button>
							</th>
							<th>
								<button type="button" name="button" class="btn btn-danger" style="padding: 1px 5px;">Delete</button>
							</th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	</body>

<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
</html>
