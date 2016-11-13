<?php
session_start();
require 'database_connection.php';

	if(isset($_SESSION['rsUserName']) && isset($_SESSION['rsPassword'])){

		if(isset($_GET['roomNo']) && isset($_GET['blockNo'])){
			$roomNo = $_GET['roomNo'];
			$blockNo = $_GET['blockNo'];
			$delete = $mysqli->query("DELETE FROM room where roomNo = '$roomNo' AND blockNo = '$blockNo'") or die($mysqli->error);
			header('location:edit_rooms.php');
		}

		if(isset($_GET['blockNo'])){
			$blockNo = $_GET['blockNo'];

		$departmentList = $mysqli->query("SELECT * FROM department ORDER BY departmentName ASC") or die($mysqli->error);

		$query = $mysqli->query("SELECT * FROM room WHERE blockNo='$blockNo' ORDER BY roomNo ASC") or die($mysqli->error);
		$display = "";

		if($query->num_rows){
			while($rows = $query->fetch_array(MYSQLI_ASSOC)){
				$roomNo = strtoupper($rows['roomNo']);
	  			$blockNo = $rows['blockNo'];
	   			$capacity = $rows['capacity'];
	   	
	    	$display .= "
	    	<tbody>
			 <tr>
			 	<td>$blockNo</td>
			 	<td>$roomNo</td>
			 	<td>$capacity</td>
			 	<td> <a href=\"edit_room_details.php?roomNo=$roomNo&&blockNo=$blockNo\" > Edit</td>
			 	<td><a href=\"edit_rooms.php?roomNo=$roomNo&&blockNo=$blockNo\" >Delete</td>
			 </tr>
			</tbody>";
			}
		}else{
			$display .= "No rooms available yet";
		}
}
	}else{
		header("location:login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Edit Room | Room Booking System</title>

    <style type="text/css">
        .imp{
            display: inline-block;
            margin-bottom: 12px;
        }
    </style>

    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
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
                    <li><a href="profile.php"><?=$_SESSION['rsUserName']?></a></li>
                    <li>|</li>
                    <li><a href="#">LOGOUT</a></li>
                </ul>
            </div>
        
        
        </div>
        
    </nav>
</div>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
   <div class="row">
   		 <h2 class="col s4 header text_b" style="color:	white;">EDIT</h2>
 	        
 		
		</div>
	
		 <div class="row">
			<div class="col s2">
				<table>
					<tbody>
						<tr><td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_blocks.php" style="color:white"> BLOCKS</a></td></tr>
		
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1; background:#303F9F" style="color:white"><a href="edit_rooms.php" style="color:white">ROOMS</a></td>
					  </tr>
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_courses.php" style="color:white">COURSES</a></td>
					  </tr>
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_teachers.php" style="color:white">TEACHERS</a></td>
					  </tr>
					</tbody>
				</table>
			</div>
			<div class="col s10">


		   <div class="row">
			    <div class="col s12">
			      	<ul class="tabs">
			      		<?php
			      			if($departmentList->num_rows){
			      				while ($rows = $departmentList->fetch_array(MYSQLI_ASSOC)) {
			      					$blockNo = $rows['blockNo'];
			      				?>	

							<div class="row">
							    <div class="col s12">
							     	<ul class="tabs">
							       		<li class="tab col s3"><a href="edit_room.php?blockNo=<?=$blockNo?>"> &nbsp; <?=$rows['departmentName']?> &nbsp;</a></li>
							      	</ul>
							    </div>
							</div>

			      				 <?php }
			      			}?>
					</ul>
				</div>
			</div>
        

        		<table class="highlight">
			<thead>
			  <tr>
				  <th data-field="blockNo"> Block Number</th>
				  <th data-field="roomNo">Room Number</th>
				  <th data-field="capacity">Capacity</th>
				  <th></th>
				  <th></th>
				   </tr>
			</thead>
			
			<?=$display;?>
		  </table>


			</div>
		</div>
		
	</div>
</div>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_room.js"></script>
</body>
</html>