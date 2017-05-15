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

	if (!isset($_SESSION['login_id'])) {
        header ("Location: http://localhost/bpr/login.php");
    }
 ?> 

<?php

  include 'user_header.php';
?>

<?php
    
    include 'db/db_connect.php';
?>

<div class="container">

	<div id="project-list">

	</div>


	<div class="modal fade" id="repository_edit_modal" role="dialog">
 	    <div class="modal-dialog">
 	    
 	      <!-- Modal content-->
 	      <div class="modal-content">
 	        <div class="modal-header">
 	          <button type="button" class="close" data-dismiss="modal">&times;</button>
 	          <h4 class="modal-title">Edit Repository</h4>
 	        </div>
 	        <div class="modal-body">
 	          <div class="form-group">
 	          	<label for="edited_project_title" class="control-label"></label>
 	          	<input id="edited_project_title" type="text" name="edited_project_title" class="form-control" value="">

 	          	<label for="edited_project_description" class="control-label"></label>
 	          	<textarea rows="3" id="edited_project_description" type="text" name="edited_project_description" class="form-control" value=""></textarea>

 	          	<input id="edited_project_id" type="hidden" name="edited_project_id" value="">
 	          </div>
 	        </div>
 	        <div class="modal-footer">
 	          <button type="button" onclick="save_edited_project()" class="btn btn-success" data-dismiss="modal">Save</button>
 	          <button type="button" onclick="hide_modal()" class="btn btn-danger" data-dismiss="modal">Cancel</button>
 	        </div>
 	      </div>
 	      
 	    </div>
 	  </div>

</div>

</body>

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function(){

		show_project_list();

	});

  function show_project_list(){

  	$.post("backend/my_repositories_panel.php",{},function(result){
			
			$("#project-list").html(result);
		});
  }

  function edit_repository(project_id){

  	var project_title = $("#project_title-"+project_id).val();
  	var project_description = $("#project_description-"+project_id).val();

	$("#edited_project_id").val(project_id);
	$("#edited_project_title").val(project_title);
	$("#edited_project_description").val(project_description);

	$("#repository_edit_modal").modal('show');

  }

  function save_edited_project(){

		var edited_project_id = $("#edited_project_id").val();
		var edited_project_title = $("#edited_project_title").val();
		var edited_project_description = $("#edited_project_description").val();

		$.post("backend/update_project.php",{edited_project_id:edited_project_id, edited_project_title:edited_project_title, edited_project_description:edited_project_description}, function(result){

				if(result=="Okay"){
					alert("Project Edited");
					show_project_list();
				}
		});
	}

  function delete_repository(project_id){

  	$.post("backend/delete_project.php",{project_id:project_id}, function(result){

			if (result=="Okay") {
				alert("Project deleted");
				show_project_list();
			}
		});
  }

  function hide_modal(){

		$("#edited_project_title").val("");
		$("#edited_project_description").val("");
		$("#edited_project_id").val("");
		$("#repository_edit_modal").modal('hide');
	}

</script>

</html>