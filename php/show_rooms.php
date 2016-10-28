
<?php
require 'database_connection.php';


//Get all the departments
$query = $mysqli->query("SELECT * FROM department ORDER BY blockNo ASC") or die($mysqli->error);

$display = "";
$i = 1;
date_default_timezone_set("Asia/Kathmandu");
$date = date("Y-m-d");

if($query->num_rows){
	while($rows = $query->fetch_array(MYSQLI_ASSOC)){
	    $departmentName = strtoupper($rows['departmentName']);
	    $blockNo = $rows['blockNo'];
	    $numberOfRooms = $rows['numberOfRooms'];

	    $display .= "<h2>Block No: $blockNo  $departmentName </h2>";

	    //Get rooms from each department
	    $query1 = $mysqli->query("SELECT * FROM room WHERE blockNo = '$blockNo' ORDER BY capacity ASC") or die($mysqli->error);

	    if($query1->num_rows){
	    	while($row = $query1->fetch_array(MYSQLI_ASSOC)){
	    		$roomNo = $row['roomNo'];
	    		$capacity = $row['capacity'];

	    		$display .= "Room No: &nbsp; $roomNo".
	    					"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
	    					"Capacity : &nbsp; $capacity".
	    					"&nbsp;&nbsp;&nbsp;<a href='book_room.php?blockNo=$blockNo&roomNo=$roomNo'>Book</a>".
	    					"<br>";

	    		//Get the reserved rooms from booked_room
	    		$query2 = $mysqli->query("SELECT * FROM booked_room WHERE bookedDate = '$date' AND roomNo = '$roomNo' AND blockNo = '$blockNo' AND status=0") or die($mysqli->error);
	    			if($query2->num_rows){
	    				while($row2 = $query2->fetch_array(MYSQLI_ASSOC)){
	    					$startTime = $row2['startTime'];
	    					$finishTime = $row2['finishTime'];
	    					$courseCode = $row2['courseCode'];
	    					$bookedDate = $row2['bookedDate'];
	    					$display .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Room booked from $startTime to $finishTime for $courseCode".
	    								"&nbsp;&nbsp;&nbsp;&nbsp;<a href='cancel_room.php?roomNo=$roomNo&blockNo=$blockNo&courseCode=$courseCode&startTime=$startTime&bookedDate=$bookedDate'>Cancel</a>".
	    								"<br><br>";
	    				}
	    			}else{
	    				$display .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Room not booked for today <br><br>";
	    			}

	    	}
	    }
	}
}
?>


<html><head><title>Show Room</title></head><body>

<?=$display?>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
</body>