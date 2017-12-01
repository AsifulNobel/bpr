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

	$sql = "SELECT * FROM review r JOIN user u ON r.user_id=u.user_id WHERE r.project_id=$project_id";
	$result = mysqli_query($connection, $sql);
 ?>
<html>
	<head>
		<title>Sample Repo</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "user_redirect.php"; ?>

		<div class="container-fluid">
		  <div class="col-md-12" style="">
			  <div class="tab-pane fade active in" id="repos">
			    <div class="repo-detail" style="margin-top:20px;">
					<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h2 class="panel-title"><?php echo $project['project_title']; ?> <a href="#" style="color:#51cd4b;">[View]</a></h2>
					  </div>
					  <div class="panel-body">
					    <?php echo $project['project_description']; ?>
					  </div>
						<div class="panel-body">
							<ul class="nav nav-pills">
							  <li class="active"><a href="#">Likes <span class="badge">21</span></a></li>
							  <li class="active"><a href="#">Downloads <span class="badge">33</span></a></li>
							  <li><a href="#" class="btn-success">Download Repo</a></li>
							  <?php
							  	if ($project['user_id'] == $_SESSION['login_id']) {
							  		echo '<li><a href="#" class="btn-info">Settings</a></li>';
							  	}
							   ?>
							</ul>
						</div>
					</div>
			    </div>
			  </div>

			  <h3>Comments</h3>
			  <form class="form-inline" id="comment-form">
				  <div class="form-group">
				  	<textarea cols="100" rows="3" class="form-control" id="review" name="review_content" value="" placeholder="Add a comment..."></textarea>
					<button type="submit" class="form-control" name="Submit">Comment</button>
					<input type="hidden" id="project_id" name="project_id" value="<?php echo $project['project_id']; ?>">
				  </div>
			  </form>
			  <div id="comments">
				  <?php
				  	while ($row=mysqli_fetch_assoc($result)) {
				  		echo '<div class="repo-detail" style="margin-top:20px;">
	  					<div class="panel">
	  					  <div class="panel-heading">
	  					    <h2 class="panel-title">'.$row['name'].' <a href=user_profile.php?id='.$row['user_id'].' style="color:#51cd4b;">[Visit]</a></h2>
	  					  </div>
	  					  <div class="panel-body">
	  					    '.$row['review_content'].'
	  					  </div>
	  					</div>
	  			    </div>';
				  	}
				   ?>
			  </div>
		  </div>
		</div>

	</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#comment-form').submit(function() {
			var review = $('#review').val();
			var project_id = $('#project_id').val();
			$.post("backend/add_review.php", {review_content: review, project_id: project_id}, function(data) {
				if (data == "Okay") {
					location.reload();
				}
				else {
					alert("Database Error");
				}
			})
		});
	</script>
</html>
