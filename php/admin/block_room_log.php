<?php

require '../database_connection.php';
$display = "";

if(isset($_GET['blockNo'])){
	$blockNo = $_GET['blockNo'];
	$display .= "<h2>$blockNo </h2> booking details<hr><br>";
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
