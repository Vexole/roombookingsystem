<?php

require '../database_connection.php';
$display = "";

$overallLog = $mysqli->query("SELECT * FROM booked_room ORDER BY bookedID ASC") or die($mysqli->error);
if($overallLog->num_rows){
	$display .= "
 		<table>
	 		<tr>
	 			<th># &nbsp;&nbsp;&nbsp;</th>
	 			<th>Booked Date &nbsp;&nbsp;&nbsp;</th>
	 			<th>Block Number &nbsp;&nbsp;&nbsp;</th>
	 			<th>Room Number &nbsp;&nbsp;&nbsp;</th>
	 			<th>Course Code &nbsp;&nbsp;&nbsp;</th>
	 			<th>Teacher Mail &nbsp;&nbsp;&nbsp;</th>
	 			<th>Start Time &nbsp;&nbsp;&nbsp;</th>
	 			<th>Finish Time &nbsp;&nbsp;&nbsp;</th>
	 		</tr>
 		";
	
	while($rows = $overallLog->fetch_array(MYSQLI_ASSOC)){
		$bookedID = $rows['bookedID'];
		$bookedDate = $rows['bookedDate'];
		$blockNo = $rows['blockNo'];
		$roomNo = $rows['roomNo'];
		$courseCode = $rows['courseCode'];
		$teacherMail = $rows['teacherMail'];
		$startTime = $rows['startTime'];
 		$finishTime = $rows['finishTime'];

 		$display .= "
	 		<tr>
	 			<td>$bookedID &nbsp;&nbsp;&nbsp;</td>
	 			<td>$bookedDate &nbsp;&nbsp;&nbsp;</td>
	 			<td>$blockNo &nbsp;&nbsp;&nbsp;</td>
	 			<td>$roomNo &nbsp;&nbsp;&nbsp;</td>
	 			<td>$courseCode &nbsp;&nbsp;&nbsp;</td>
	 			<td>$teacherMail &nbsp;&nbsp;&nbsp;</td>
	 			<td>$startTime &nbsp;&nbsp;&nbsp;</td>
	 			<td>$finishTime &nbsp;&nbsp;&nbsp;</td>
 			</tr>
 		";
 	}
 	$display .= "</table>";
}else{
	$display .= "No booking records available";
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
