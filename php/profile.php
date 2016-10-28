<?php
session_start();
require 'database_connection.php';
	if(isset($_SESSION['rsUserName']) && isset($_SESSION['rsPassword'])){
		
	}else{
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Room Booking System</title>

    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/plugin.css" type="text/css" rel="stylesheet" >
</head>
<body >

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!--Navigation-->
  <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="index.php" id="logo-container" class="brand-logo">Room Booking System</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="profile.php"><?php echo $_SESSION['rsUserName']; ?></a></li>
                    <li>|</li>
                    <li><a href="logout.php">LOG OUT</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
</div>
    <div class="container">

    <h2 class="header text_b" style="color: white;">User Information</h2>
</div>
</div>
</body>
</html>