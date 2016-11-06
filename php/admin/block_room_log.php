<?php

require '../database_connection.php';
$display = "";

if(isset($_GET['blockNo']) && !isset($_GET['roomNo'])){
	$blockNo = $_GET['blockNo'];
	$display .= "<h2>Block Number $blockNo Rooms</h2><hr>";

	$log = $mysqli->query("SELECT * FROM room WHERE blockNo = '$blockNo'") or die($mysqli->error);

	if($log->num_rows){
		$display .= " 
			<tbody>
				<tr>
					<td>Room Number&nbsp;&nbsp;&nbsp;</td>
					<td>Capacity&nbsp;&nbsp;&nbsp;</td>
					<td></td>
				</tr>
			</tbody>
		";

		while($rows = $log->fetch_array(MYSQLI_ASSOC)){
			$roomNo = $rows['roomNo'];
			$capacity = $rows['capacity'];
			$display .= " 
				<tbody>
					<tr>
						<td>$roomNo &nbsp;&nbsp;&nbsp;</td>
						<td>$capacity &nbsp;&nbsp;&nbsp;</td>
						<td><a href='block_room_log.php?roomNo=$roomNo&blockNo=$blockNo'>View Details </a>&nbsp;</td>
					</tr>
				</tbody>
			";
		}
	}else{
		$display .= "No rooms available yet";
	}
	/*$display .= "<h2>Block Number $blockNo </h2> booking details<hr><br>";
	$logQuery = $mysqli->query("SELECT * FROM booked_room WHERE blockNo = '$blockNo' ORDER BY bookedDate ASC") or die($mysqli->error);
	if($logQuery->num_rows){
		$display .= " 
			<tbody>
				<tr>
					<td>Booked Date&nbsp;&nbsp;&nbsp;</td>
					<td>Room No&nbsp;&nbsp;&nbsp;</td>
					<td>Course Code&nbsp;&nbsp;&nbsp;</td>
					<td>Start Time&nbsp;&nbsp;&nbsp;</td>
					<td>Finish Time&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</tbody>
		";

		while($rows = $logQuery->fetch_array(MYSQLI_ASSOC)){
			$bookedDate = $rows['bookedDate'];
			$roomNo = $rows['roomNo'];
			$courseCode = $rows['courseCode'];
			$startTime = $rows['startTime'];
			$finishTime = $rows['finishTime'];
			$display .= " 
				<tbody>
					<tr>
						<td>$bookedDate &nbsp;&nbsp;&nbsp;</td>
						<td>$roomNo &nbsp;&nbsp;&nbsp;</td>
						<td>$courseCode &nbsp;&nbsp;&nbsp;</td>
						<td>$startTime &nbsp;&nbsp;&nbsp;</td>
						<td>$finishTime &nbsp;&nbsp;&nbsp;</td>
					</tr>
				</tbody>
			";
		}
	}else{
		$display .= "No rooms booked yet";
	}*/
	
}else if(isset($_GET['blockNo']) && isset($_GET['roomNo'])){
	$blockNo = $_GET['blockNo'];
	$roomNo = $_GET['roomNo'];
	
	$display .= "<h2>Block Number $blockNo Room Number $roomNo</h2> booking details<hr><br>";
	$logQuery = $mysqli->query("SELECT * FROM booked_room WHERE blockNo = '$blockNo' AND roomNo = '$roomNo' ORDER BY bookedDate ASC") or die($mysqli->error);
	if($logQuery->num_rows){
		$display .= " 
			<tbody>
				<tr>
					<td>Booked Date&nbsp;&nbsp;&nbsp;</td>
					<td>Course Code&nbsp;&nbsp;&nbsp;</td>
					<td>Start Time&nbsp;&nbsp;&nbsp;</td>
					<td>Finish Time&nbsp;&nbsp;&nbsp;</td>
					<td>Teacher Mail&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</tbody>
		";

		while($rows = $logQuery->fetch_array(MYSQLI_ASSOC)){
			$bookedDate = $rows['bookedDate'];
			$courseCode = $rows['courseCode'];
			$startTime = $rows['startTime'];
			$finishTime = $rows['finishTime'];
			$teacherMail = $rows['teacherMail'];
			$display .= " 
				<tbody>
					<tr>
						<td>$bookedDate &nbsp;&nbsp;&nbsp;</td>
						<td>$courseCode &nbsp;&nbsp;&nbsp;</td>
						<td>$startTime &nbsp;&nbsp;&nbsp;</td>
						<td>$finishTime &nbsp;&nbsp;&nbsp;</td>
						<td>$teacherMail &nbsp;&nbsp;&nbsp;</td>
					</tr>
				</tbody>
			";
		}
	}else{
		$display .= "Room not booked yet";
	}

}else{
$query = $mysqli->query("SELECT * FROM department ORDER BY blockNo ASC") or die($mysqli->error);
$display .= " 
		<tbody>
			<tr>
				<td>Block No &nbsp;&nbsp;&nbsp;</td>
				<td>Department Name &nbsp;&nbsp;&nbsp;</td>
			</tr>
		</tbody>
		";
	while($row = $query->fetch_array(MYSQLI_ASSOC)){
		$departmentName = $row['departmentName'];
		$blockNo = $row['blockNo'];
		$display .= "
			<tbody>
				<tr>
					<td>$blockNo&nbsp;&nbsp;&nbsp;</td>
					<td>$departmentName&nbsp;&nbsp;&nbsp;</td>
					<td><a href=\"block_room_log.php?blockNo=$blockNo\">View Details</a></td>
				</tr>
			</tbody>
		";
	}
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
	<table>
		<?=$display?>
	</table>
