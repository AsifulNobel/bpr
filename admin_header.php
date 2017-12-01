<?php

	session_start();

	if (!isset($_SESSION['login_id'])) {
        header ("Location: login.php");
    }
?>

<nav class="navbar navbar-default" id="navBorderFix">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">ProLab</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li><a href="admin_panel.php">Home</a></li>
        <li><a href="pending_users.php">Pending</a></li>
        <li><a href="browse_repositories.php">Browse Repositories</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Account</a></li>
        <li><a onclick="logout()" href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<script type="text/javascript">

  function logout(){

    $.post("backend/logout.php",{},function(result){
      if (result=="Okay") {
        window.location.replace("login.php");
      }
    });

    return false;
  }

</script>
