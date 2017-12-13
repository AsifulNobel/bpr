<?php
    require "db/db_connect.php";
    session_start();

    if ($_SESSION['login_role_id'] == 2) {
        header('Location: login.php');
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Course List</title>
        <link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php require "user_redirect.php"; ?>

        <?php if($_SESSION['login_role_id']==1): ?>
        <div class="container">
            <h2 class="text-center">Add Course</h2>

			<div class="col-md-offset-3 col-md-9">
				<form class="form-horizontal" id="edit-course-form">
					<div class="form-group">
						<label for="code" class="control-label col-sm-2">Course Code</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="code" id="code" value="" data-required>
						</div>
					</div>

                    <div class="form-group">
						<label for="title" class="control-label col-sm-2">Course Title</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="title" id="title" value="" data-required>
						</div>
					</div>

					<div class="form-group">
						<label for="initial" class="control-label col-sm-2">Faculty Initial</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="initial" id="initial" value="" data-required>
						</div>
					</div>

                    <div class="form-group">
						<label for="section" class="control-label col-sm-2">Section</label>
						<div class="col-sm-4">
							<input class="form-control" type="number" name="section" id="section" value="" data-required>
						</div>
					</div>

                    <div class="form-group">
                        <label for="semester" class="col-sm-2 control-label">Semester</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="semester" name="semester">
                              <option value="Spring">Spring</option>
                              <option value="Summer">Summer</option>
                              <option value="Fall">Fall</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="year" class="col-sm-2 control-label">Year</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="number" name="year" id="year" value="<?php echo date('Y'); ?>" data-required>
                        </div>
                    </div>

					<div class="form-group">
						<div class="col-md-6" style="margin-left:190px;">
							<input class="btn btn-success" type="submit" name="submit" value="Save Course Information">
						</div>
					</div>
				</form>
			</div>
        </div>
        <?php endif; ?>

        <div id="course-table" class="container" style="padding-top: 10px;">
        </div>
    </body>
    <script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $("#edit-course-form").submit(function(e){
            e.preventDefault();
            proceed = true;

            $($(this).find("input[data-required=true], textarea[data-required=true]")).each(function(){
                    if(!$.trim($(this).val())){
                        $(this).css('border-color','red');
                        proceed = false;
                    }

            }).on("input", function(){
                 $(this).css('border-color', border_color);
            });

            if(proceed){
                $.ajax({
                    url: "backend/add_course.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        if(data=="Okay"){
                            alert("Course Added!");
                        }
                        else{
                            alert(data);
                        }
                    }
                });
            }
        });

        $(document).ready(function(){
            $.get('backend/get_course.php', function(result) {
                $('#course-table').html(result);
            });
        })
    </script>
</html>
