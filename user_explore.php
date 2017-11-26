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
					<li><a href="#">Profile</a></li>
					<li class="active"><a href="#">Explore</a></li>
					<li><a href="#">Add Repository</a></li>
		        </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Account</a></li>
		        <li><a onclick="" href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>

		<div class="container">
			<h2>Repository Information</h2>
			<form id="search-form" class="form-inline">
				<div class="">
					<input class="form-control" type="text" id="name" name="name" placeholder="Search Repository">
					<input class="form-control" type="submit" id="search" name="submit" value="Search">
				</div>
				<div class="btn-group" data-toggle="buttons" style="padding: 10px 1px;">
				  <label class="btn btn-primary active" style="padding:2px 5px;">
				    <input type="radio" name="options" id="option1" checked=""> By Name
				  </label>
				  <label class="btn btn-primary" style="padding:2px 5px;">
				    <input type="radio" name="options" id="option2"> By Description
				  </label>
				  <label class="btn btn-primary" style="padding:2px 5px;">
				    <input type="radio" name="options" id="option3"> By User
				  </label>
				</div>
			</form>

			<div id="user-table">
				<table class="table table-striped table-hover table-bordered">
					<thead class="thead-dark">
					    <tr>
					    	<th>#</th>
							<th>Name</th>
							<th>Created By</th>
							<th>Description</th>
							<th>Repository Link</th>
					    </tr>
					</thead>
					<tbody>
						<tr>
							<th>1</th>
							<th>Sample Repository</th>
							<th>Asif</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>2</th>
							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>3</th>
							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>4</th>
							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>5</th>
							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>6</th>
							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>7</th>

							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>8</th>
							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>9</th>
							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
						<tr>
							<th>10</th>
							<th>Sample Repository</th>
							<th>Sample Username</th>
							<th>lorem ipsum...</th>
							<th>
								<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit</button>
							</th>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="text-center">
			  <ul class="pagination">
			    <li class="page-item active">
			      <a class="page-link" href="#">1</a>
			    </li>
			    <li class="page-item">
			      <a class="page-link" href="#">2</a>
			    </li>
			    <li class="page-item">
			      <a class="page-link" href="#">3</a>
			    </li>
				<li class="page-item">
			      <a class="page-link" href="#">4</a>
			    </li>
			    <li class="page-item">
			      <a class="page-link" href="#">&raquo;</a>
			    </li>
			  </ul>
			</div>
		</div>

	</body>

<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
</html>
