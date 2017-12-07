<!DOCTYPE html>
<html>
	<head>
		<title>User Profile</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "user_redirect.php"; ?>
		<?php require "backend/profile_info.php" ?>

		<div class="container-fluid">
		  <div class="col-md-3" style="height:588px;">
			  <div class="panel panel-primary">
				<div class="panel-heading">
				  <h2 class="panel-title">User Info</h2>
				</div>
				<div class="panel-body">
					<table class="table">
    			      <tr>
    			        <td colspan="2" style="padding-left:30px;"><img style="height: 200px; width: 200px;" src="uploads/<?php echo $list['photo']; ?>"></td>
    			      </tr>

    			      <tr>
    			        <td><strong>Name</strong></td>
    			        <td><?php echo $list['name']; ?></td>
    			      </tr>

    			      <tr>
    			        <td><strong>Email</strong></td>
    			        <td><?php echo $list['email']; ?></td>
    			      </tr>

    				  <tr>
    			        <td><strong>NSU ID</strong></td>
    			        <td><?php echo $list['student_id']; ?></td>
    			      </tr>
    			  </table>
				</div>
			  </div>
		  </div>

		  <div class="col-md-8" style="">
			  <ul class="nav nav-tabs">
				  <li class="active"><a href="#repos" data-toggle="tab">Repositories <span class="badge"><?php echo $project_count; ?></span></a></li>
				  <!-- <li><a href="#followers" data-toggle="tab">Followers <span class="badge">3</span></a></li>
				  <li><a href="#following" data-toggle="tab">Following <span class="badge">2</span></a></li> -->
			  </ul>
			  <div id="myTabContent" class="tab-content">
				  <div class="tab-pane fade active in" id="repos">
				    <div class="repo-detail" style="margin-top:20px;">
						<?php
							foreach ($list['project'] as $value) {
								if ($value['project_privacy']==0 &&  $_SESSION['login_id'] != $value['user_id']) {
									$proceed = False;
								}
								else{
									$proceed = True;
								}

								if ($_SESSION['login_role_id']==1) {
									$proceed = True;
								}

								if ($proceed) {
						?>
							<div class="panel panel-primary">
							  <div class="panel-heading">
								<h2 class="panel-title"><?php echo $value['project_title']; ?><a href="user_repo.php?id=<?php echo $value['project_id']; ?>" style="color:#51cd4b;"> [Visit]</a></h2>
							  </div>
							  <div class="panel-body">
								<?php echo $value['project_description']; ?>
							  </div>
								<div class="panel-body">
									<ul class="nav nav-pills">
									  <!-- <li class="active"><a href="#">Likes <span class="badge">21</span></a></li> -->
									  <li class="active"><a href="#">Comments <span class="badge">
										  <?php echo $value['comment_count']; ?></span></a></li>
									  <!-- <li class="active"><a href="#">Downloads <span class="badge">33</span></a></li> -->
									</ul>
								</div>
							</div>
						<?php
					}
				}
						?>
				    </div>
				  </div>
				  <div class="tab-pane fade" id="following">
					  <table class="table table-striped table-hover table-bordered">
  						<tbody>
  							<tr>
								<td><img style="height: 50px; width: 50px;margin-left:20px;" src="uploads/default_user_male.jpg"></td>
								<th>Rifatt Bin Assad</th>
								<th>rifatt.assad@northsouth.edu</th>
								<th>1331024042</th>
								<th>
									<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit Profile</button>
								</th>
								<th><button type="button" name="button" class="btn btn-warning" style="padding: 1px 5px;">Unfollow</button></th>
  							</tr>
							<tr>
								<td><img style="height: 50px; width: 50px;margin-left:20px;" src="uploads/default_user_male.jpg"></td>
								<th>Sample Name</th>
								<th>sample.name@northsouth.edu</th>
								<th>10-digit ID</th>
								<th>
									<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit Profile</button>
								</th>
								<th><button type="button" name="button" class="btn btn-warning" style="padding: 1px 5px;">Unfollow</button></th>
							</tr>
  						</tbody>
  					</table>
				  </div>
				  <div class="tab-pane fade" id="followers">
				    <table class="table table-striped table-hover table-bordered">
				    	<tbody>
							<tr>
								<td><img style="height: 50px; width: 50px;margin-left:20px;" src="uploads/default_user_male.jpg"></td>
								<th>Sample Name</th>
								<th>sample.name@northsouth.edu</th>
								<th>10-digit ID</th>
								<th>
									<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit Profile</button>
								</th>
							</tr>
							<tr>
								<td><img style="height: 50px; width: 50px;margin-left:20px;" src="uploads/default_user_male.jpg"></td>
								<th>Sample Name</th>
								<th>sample.name@northsouth.edu</th>
								<th>10-digit ID</th>
								<th>
									<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit Profile</button>
								</th>
							</tr>
							<tr>
								<td><img style="height: 50px; width: 50px;margin-left:20px;" src="uploads/default_user_male.jpg"></td>
								<th>Sample Name</th>
								<th>sample.name@northsouth.edu</th>
								<th>10-digit ID</th>
								<th>
									<button type="button" name="button" class="btn btn-primary" style="padding: 1px 5px;">Visit Profile</button>
								</th>
							</tr>
				    	</tbody>
				    </table>
				  </div>
			  </div>
		  </div>
		</div>

	</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
</html>
