<!DOCTYPE html>
<html>
<head>
  <title>Pending Users</title>
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
    
    include 'db/db_connect.php';
?>

<?php

  include 'header.php';
?>

<div class="container">

  <h2>Pending User Information</h2>

  <form id="search-form" class="form-inline">
    
    <input class="form-control" type="text" id="name" name="name" placeholder="Search by Name">
    <input class="form-control" type="text" id="gender" name="gender" placeholder="Search by Gender">
    <input class="form-control" type="submit" id="search" name="submit" value="Search">

  </form>


  <div id="user-table">
    
  </div>
  
</div>

</body>

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/stupidtable.js"></script>

<script type="text/javascript">

  $("#search-form").submit(function(e){
    e.preventDefault();
    show_pending_user_list();
  });

  function show_pending_user_list(){

    var name = $("#name").val();

    var gender = $("#gender").val();

    $.post("backend/pending_user_table.php",{name:name, gender:gender},function(result){
      /*alert(result);*/
      $("#user-table").html(result);

      $("#myTable").stupidtable();
    });
  }

  $(document).ready(function(){

    show_pending_user_list();

  });

  function approve_user(user_id){

    $.post("backend/approve_user.php",{user_id:user_id}, function(result){

      if (result=="Okay") {

        show_pending_user_list();
        alert("User approved");
      }
    });

  }

  function delete_user(user_id){

    $.post("backend/delete_user.php",{user_id:user_id}, function(result){

      if (result=="Okay") {

        show_pending_user_list();
        alert("User deleted");
      }
    });
  }

</script>

</html>