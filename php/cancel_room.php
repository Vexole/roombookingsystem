<?php
require 'database_connection.php';

if(isset($_GET['bookedDate']) && isset($_GET['roomNo']) && isset($_GET['blockNo']) && isset($_GET['courseCode']) && isset($_GET['startTime'])){
	$bookedDate = $mysqli->real_escape_string($_GET['bookedDate']);
	$roomNo = $mysqli->real_escape_string($_GET['roomNo']);
	$blockNo = $mysqli->real_escape_string($_GET['blockNo']);
	$startTime = $mysqli->real_escape_string($_GET['startTime']);
	$courseCode = $mysqli->real_escape_string($_GET['courseCode']);
	$query = $mysqli->query("UPDATE booked_room SET status=1 WHERE bookedDate='$bookedDate' AND roomNo='$roomNo' AND blockNo='$blockNo' AND startTime='$startTime' AND courseCode='$courseCode'") or die($mysqli->error);
}
	header('location:show_rooms.php');

?>