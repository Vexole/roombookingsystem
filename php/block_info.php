<?php
session_start();
	require 'database_connection.php';
	$display = "";
	$count = 0;
	if(!isset($_GET['blockNo'])){
		header('location:index.php');
	}
	$blockNo = $mysqli->real_escape_string($_GET['blockNo']);
	$query = $mysqli->query("SELECT * FROM room WHERE blockNo = $blockNo ORDER BY roomNo ASC") or die($mysqli->error); 
	if ($query->num_rows){
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$roomNo = $row['roomNo'];
		
			$display .= '
			<tr>
				<td style="border-left:5px solid  #303F9F; opacity:1;">' . $roomNo . '</td>';
				for($i=9;$i<16;$i++){
					$check1 = $mysqli->query("SELECT * FROM booked_room WHERE roomNo='$roomNo' AND blockNo='$blockNo' AND bookedDate='$current_date' AND startTime BETWEEN '$i:00' AND '$i:59' ORDER BY startTime DESC LIMIT 1") or die($mysqli->error);
					if($check1->num_rows){
						while($rows = $check1->fetch_array(MYSQLI_ASSOC)){
							$finishTime = $rows['finishTime'];
							$startTime = $rows['startTime'];
							$diff =  (strtotime($finishTime) - strtotime($startTime))/3600;	
							$count = $diff-1;
						}
						if($diff==1){
							$display .=	'<td style="border-bottom: 3px solid #CFDBC5;">Booked</td>';	
						}else{
							$display .=	'<td style="border-bottom: 3px solid #CFDBC5;">Booked</td>';		
						}
					}else{
						if($count != 0){
							$count--;
							$display .=	'<td style="border-bottom: 3px solid #CFDBC5;">Booked</td>';		
						}else{
							$display .=	'<td style="border-bottom: 3px solid #00C000 ; opacity:1;">Free</td>';
						}
					}
				}
		}
	}else{
		$display .= "No rooms available yet.";
	}
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
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
		<div class="row">
   			<div  class="col s5">
   			    <h2 class="header text_b" style="color:	white;">Block No <?=$blockNo?></h2>

 		</div>
        <div class="col s2 offset-s5">
        	<a href="room_book.php?blockNo=<?=$blockNo?>"><button class="waves-effect waves-light btn-large">Book a Room</button></a>
        </div>
 		
		</div>

	
		<table class="highlight">
			<thead>
			  <tr>
				  <th data-field="id"> Room No</th>
				  <th data-field="name">9-10</th>
				  <th data-field="price">10-11</th>
				  <th data-field="price">11-12</th>
				  <th data-field="price">12-1</th>
				  <th data-field="price">1-2</th>
				  <th data-field="price">2-3</th>
				  <th data-field="price">3-4</th>
			  </tr>
			</thead>
			
			<tbody>
			  <?=$display?>
			</tbody>
		  </table>
	</div>
</div>



<div id="popup" class="modal">
  <div class="modal-content">
    <span class="close"> x </span>
    <h4>Book a Room</h4>
    <div class="modal-body">
	  	<form class="col s12">
			<p> Course Code</p> <input class="input-field" type="text" id="courseCode"/>
			<p> Room No.</p> <input class="input-field" type="number" id="roomNo"/>
			<p> Date</p> <input class="input-field" type="date" id="bookedDate"/>
			<p> Start Time</p> <input id="timepicker1" class="input-field" type="text" id="startTime"/>
			<p> End time</p> <input id="timepicker2" class="input-field" type="text" id="finishTime"/>
			<p> Requested By</p> <input class="input-field" type="text" id="teacherMail"/>
			<!--<input type="hidden" id="blockNo" value="<?=$blockNo?>">-->
			<input type="submit" id="bookRoom"/>
		</form>
    </div>
  </div>
</div>

	
	<script src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/book_room.js"></script>
    <script src="../js/timepicki.js"></script>
    <script>$('#timepicker1').timepicki();  </script>
    <script>$('#timepicker2').timepicki();  </script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>

