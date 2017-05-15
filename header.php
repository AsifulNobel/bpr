<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand">Admin Panel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li><a href="http://localhost/bpr/admin_panel.php">Home</a></li>
        <li><a href="http://localhost/bpr/pending_users.php">Pending</a></li>
        <li><a href="http://localhost/bpr/role.php">Role</a></li>  
        <li><a href="http://localhost/bpr/all_repositories.php">Repositories</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/bpr/user_profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
        <li><a onclick="return logout();" href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<script type="text/javascript">

  function logout(){
    
    $.post("backend/logout.php",{},function(result){
      if (result=="Okay") {
        window.location.replace("http://localhost/bpr/login.php");
      }
    });

    return false;
  }

</script>