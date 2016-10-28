<?php
session_start();
    if(isset($_SESSION['rsUserName']) && isset($_SESSION['rsPassword'])){
        header('location:index.php');
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
            <a href="index.html" id="logo-container" class="brand-logo">Room Booking System</a>
            <a href="#" class="brand-logo right">Kathmandu University</a>   
            </div>
        
        
        </div>
        
    </nav>
</div>
    <div class="container">

    <h2 class="header text_b" style="color: white;">Log in</h2>
    
     <div class="row">
    <form class="col s5">
      <div class="row">
        
        <div class="input-field col s12">
         <p>Username:</p> <input id="userName" type="text" class="validate">
        </div>
      </div>
   
      <div class="row">
        <div class="input-field col s12">
          <p>Password:</p><input id="password" type="password" class="validate">
        </div>
      </div>
        <div class="row">
            <div class="col s8 offset-s8"><button class="waves-effect waves-light btn-large" id="login">Log in</button></div>
        </div>
    </form>  
    
  </div>
    <div class="row">
        <div class="col s2">
        
        </div>
        <div class="col s5">
        
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>s
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/user_validate.js"></script>

</body>