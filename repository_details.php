<!DOCTYPE html>
<html>
<head>
	<title>BSSE Project Reposiritory</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php 

	session_start();

	$project_id = $_GET['project_id'];

	if (!isset($_SESSION['login_id'])) {
        header ("Location: http://localhost/bpr/login.php");
    }
 ?> 

<?php

  if($_SESSION['login_id']==1){

    include 'header.php';
  }

  else{

    include 'user_header.php';  
  }

  
?>

<?php
    
    include 'db/db_connect.php';
?>

<div class="container">


	<div id="repo_details">

		<?php
			
			$sql = "SELECT * FROM project WHERE project_id = '$project_id'";
			$result = mysqli_query($connection, $sql);

			while ($row = mysqli_fetch_assoc($result)) {
		
				echo '<div class="col-sm-12">

						<input type="hidden" id="project_id" value="'.$project_id.'"/>

						<div class="panel panel-default">

    						<div class="panel-heading text-center project_title">'.$row['project_title'].'</div>
    						<input type="hidden" id="project_title-'.$row['project_id'].'" value="'.$row['project_title'].'">

    					<div class="panel-body project_description">'.$row['project_description'].'</div>
    						<input type="hidden" id="project_description-'.$row['project_id'].'" value="'.$row['project_description'].'">

    					<div class="panel-footer">
    						<a href="repositories/'.$row['project_url'].'" class="btn btn-success">Download</a>
    					</div>';
    					

    					$sql2 = "SELECT * FROM review WHERE project_id = '$project_id'";
    					$result2 = mysqli_query($connection, $sql2);

    					while ($row2 = mysqli_fetch_assoc($result2)) {

    						$user_id = $row2['user_id'];
    						$sql3 = "SELECT * FROM user WHERE user_id = '$user_id'";
    						$result3 = mysqli_query($connection, $sql3);
    						$row3 = mysqli_fetch_assoc($result3);
    						
    						echo 	'<div class="panel-body review">
    									<div class="col-sm-2">
    										<h4>'.$row3['name'].'</h4>
    									</div>

    									<div class="col-sm-10">
    										<p>'.$row2['review_content'].'</p>
    									</div>

    								</div>';
    					}

    						$user_id = $_SESSION['login_id'];
    						$sql3 = "SELECT * FROM user WHERE user_id = '$user_id'";
    						$result3 = mysqli_query($connection, $sql3);
    						$row3 = mysqli_fetch_assoc($result3);

    						echo	'<div class="panel-body review">	

    									<div class="col-sm-2">
    										<h4>'.$row3['name'].'</h4>
    									</div>

    									<div class="col-sm-8">
    										<textarea rows="2" type="text" class="form-control" id="review_content"></textarea>
    									</div>

    									<div class="col-sm-2">
    										<button class="btn btn-primary" onclick="add_review()">Comment</button>
    									</div>

    								</div>';

  			echo	'</div>
				</div>';
			}
		?>


	</div>

</div>

</body>

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">
  	
  	function add_review () {
  		
  		var project_id = $("#project_id").val();
  		var review_content = $("#review_content").val();

  		$.post("backend/add_review.php",{project_id:project_id, review_content:review_content}, function(result){

  			if (result=="Okay") {

  				//alert("review added...");
  				location.reload();
  			}

  			else{

  				alert("Sorry... Try again...");
  			}
  		});
  	}

</script>

</html>