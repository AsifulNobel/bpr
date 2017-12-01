<?php

	session_start();

	if (isset($_SESSION['login_id'])) {
        if ($_SESSION['login_role_id']==1) {
            header ("Location: admin_panel.php");
        }
        elseif ($_SESSION['login_role_id']==2) {
            header ("Location: home.php");
        }
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
      <a class="navbar-brand" href="index.php">ProLab</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="login.php">Login</a></li>
        <li><a href="register_user.php">Signup</a></li>
      </ul>
    </div>
  </div>
</nav>
