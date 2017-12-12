<!DOCTYPE html>
<html>
    <head>
        <title>Pending Users</title>
        <link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php require "admin_header.php"; ?>

        <div class="container">

          <h2>Pending User Information</h2>

          <div class="container">
              <form id="search-form" class="form-inline" method="post" action="backend/pending_user_table.php">
                <div class="">
  					<input class="form-control" type="text" id="query" name="query" placeholder="Search User">
  					<input class="form-control" type="submit" id="search" name="submit" value="Search">
  				</div>
              </form>
          </div>


          <div id="user-table" class="container" style="padding-top: 10px;">
          </div>

        </div>

    </body>

    <script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="static/js/stupidtable.js"></script>
    <script type="text/javascript">
      $("#search-form").submit(function(e){
        e.preventDefault();
        show_pending_user_list();
      });

      function show_pending_user_list(){
        var query = $("#query").val();

        $.post("backend/pending_user_table.php",{query:query},function(result){

            $("#user-table").html(result);
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
          else {
              alert(result);
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
