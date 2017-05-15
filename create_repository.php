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

			<div id="new-repository">

	            <form id="new-repository-form" class="form-horizontal" role="form">
	                <div class="form-group">
	                    <label for="project_title" class="col-sm-3 control-label">Project Title</label>
	                    <div class="col-sm-9">
	                        <input type="text" id="project_title" name="project_title" placeholder="Project Title" class="form-control" autofocus data-required="true">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="project_description" class="col-sm-3 control-label">Project Description</label>
	                    <div class="col-sm-9">
	                        <textarea rows="10" type="text" id="project_description" name="project_description" placeholder="Description" class="form-control" data-required="true"></textarea>
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="project_file" class="col-sm-3 control-label">Select File (ZIP/RAR)</label>
	                    <div class="col-sm-9">
	                        <input type="file" id="project_file" name="project_file" class="form-control">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label class="control-label col-sm-3">Project Privacy</label>
	                    <div class="col-sm-6">
	                        <div class="row">
	                            <div class="col-sm-4">
	                                <label class="radio-inline">
	                                    <input type="radio" id="project_privacy" name="project_privacy" value="1">Public
	                                </label>
	                            </div>
	                            <div class="col-sm-4">
	                                <label class="radio-inline">
	                                    <input type="radio" id="project_privacy" name="project_privacy" value="0">Private
	                                </label>
	                            </div>
	                        </div>
	                    </div>
	                </div>


	                

	                <div class="form-group">
	                    <div class="col-sm-9 col-sm-offset-3">
	                        <button type="submit" class="btn btn-primary btn-block">Create Repository</button>
	                    </div>
	                </div>

	            </form> 

	            </div>

</div>

</body>

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">

	var allowed_files = ['application/zip', 'application/rar'];
	var border_color = "#C2C2C2";

	$("#new-repository-form").submit(function(e){
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
	    

	    if(window.File && window.FileReader && window.FileList && window.Blob){
	        var total_files_size = 0;
	        $(this.elements['project_file'].files).each(function(i, ifile){
	            if(ifile.value !== ""){ 
	                if(allowed_files.indexOf(ifile.type) === -1){ 
	                    alert( ifile.name + " is unsupported file type!");
	                    proceed = false;
	                }
	             total_files_size = total_files_size + ifile.size; 
	            }
	            else{
	            	alert("Please select zip/rar file");
	            	proceed = false;
	            }
	        });
	    }
	    
	    
	    if(proceed){

	        $.ajax({

	        		url: "backend/create_new_repository.php",
	        		type: "POST",
	        		data:  new FormData(this),
	        		contentType: false,
	        		cache: false,
	        		processData:false,
	        		success: function(data){

	        			if(data=="Okay"){
	        				alert("Repository Added!");
	        				window.location.replace("http://localhost/bpr/my_repositories.php");
	        			}

	        			else{
	        				
	        				alert(data);
	        			}

	        		}	        
	        		
	        });
	    }
	});


</script>

</html>