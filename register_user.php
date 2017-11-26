<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="static/css/style.css">
		<link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "unauthenticated_header.php"; ?>

		<div class="container">

			<div id="registration">
		            <form id="registration-form" class="form-horizontal" role="form">

		                <h2>Signup Form</h2>

						<div class="form-group">
		                    <label for="name" class="control-label">Name</label>
		                    <div class="">
		                        <input type="text" id="name" name="name" placeholder="Full Name" class="form-control" data-required="true">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="email" class="control-label">Email</label>
		                    <div class="">
		                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" data-required="true">
		                    </div>
		                </div>

						<div class="form-group">
		                    <label for="gender" class="control-label">Gender</label>
		                    <div class="">
		                        <input type="text" id="gender" name="gender" placeholder="Sex" class="form-control" data-required="true">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="password" class="control-label">Password</label>
		                    <div class="">
		                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" data-required="true">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="col-sm-6 col-sm-offset-3">
		                        <button type="submit" class="btn btn-primary btn-block">Register</button>
		                    </div>
		                </div>

		            </form>

		        </div>

		    </div>

		</body>

	<script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		var border_color = "#2c3e50";

		$("#registration-form").submit(function(e){
			e.preventDefault();
			proceed = true;

			$($(this).find("input[data-required=true], textarea[data-required=true]")).each(function(){
					if(!$.trim($(this).val())){
						$(this).css('border-color','red');
						proceed = false;
					}

					var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
						$(this).css('border-color','red');
						proceed = false;
					}

		}).on("input", function(){
			 $(this).css('border-color', border_color);
		});

		if(proceed){
			$.ajax({
				url: "backend/register.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					if(data=="Okay"){
						alert("User Added!");
						window.location.replace("register_user_request.php");
					}
					else if(data=="Exists") {
						alert("User already exists!");
						window.location.replace("login.php");
					}
					else{
						alert("Sorry. Try With University Email Address...!");
					}
				}
			});
		}
		});
	</script>
</html>
