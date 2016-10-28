<?php
session_start();
require 'database_connection.php';


$date = date("Y-m-d");

$query = $mysqli->query("SELECT * FROM course ORDER BY courseCode ASC") or die($mysqli->error);
$query1 = $mysqli->query("SELECT * FROM teacher ORDER BY teacherMail ASC") or die($mysqli->error);


?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Block No. <?=$blockNo?> | Room Booking System</title>

    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/plugin.css" type="text/css" rel="stylesheet" >
    <link href="../css/timepicki.css" rel="stylesheet">
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
                    <li><a href="profile.html"><?= $_SESSION['rsUserName']?></a></li>
                    <li>|</li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<style type="text/css">
	
h2{
	color: white;
	padding-left: 5%;
	margin-bottom: 25px;
}

label{
	color: white !important;
	font-size: 20px;
}

.form-control{
	width: 55%;
	padding-left: 25%;
}

.btn{
	border: 1px solid green !important;
	border-radius: 3px !important;
}
</style>
	


<form method="post">
    <h2>BOOK ROOM</h2>
    <div class="form-control">
       	<div class="row">
       		<div class="col-md-6">
	            <label name="blockNo">Block Number</label>
	            <input name="blockNo" id="blockNo" type="number" class="form-control"/>
	        </div>

	        <div class="col-md-6">
	            <label name="roomNo">Room Number</label>
	            <input name="roomNo" id="roomNo" type="number" class="form-control"/>
	        </div>

	        <div class="col-md-6">
	            <label name="courseCode">Course Code</label>
	            <input name="courseCode" id="courseCode" type="number" class="form-control"/>
	        </div>

	        <div class="col-md-6">
	            <label name="bookedDate">Booked Date</label>
	            <input name="bookedDate" id="bookedDate" type="date" class="form-control"/>
	        </div>

	        <div class="col-md-6">
	            <label name="startTime">Start Time</label>
	            <input name="startTime" id="startTime" type="time" class="form-control"/>
	        </div>

	        <div class="col-md-6">
	            <label name="finishTime">Finish Time</label>
	            <input name="finishTime" id="finishTime" type="time" class="form-control"/>
	        </div>

	        <div class="col-md-6">
	       		<label name="teacherMail">Requested By</label>
	            <input name="finishTime" id="finishTime" type="email" class="form-control"/>
       		</div>
   			
   			<input type="submit" id="bookRoom" name="bookRoom" class="btn" value="Submit"/>

       	</div>
    </div>
</form>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/book_room.js"></script>


</body
</html>