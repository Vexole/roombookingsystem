<?php

$mysqli = new mysqli("localhost", "root", "", "room_booking");


date_default_timezone_set("Asia/Kathmandu");
$current_time = date("H:i:s");
$current_date = date("Y-m-d");

$updateQuery = $mysqli->query("UPDATE booked_room SET status=1 WHERE bookedDate <= '$current_date' AND finishTime <= '$current_time'") or die($mysqli->error);
?>