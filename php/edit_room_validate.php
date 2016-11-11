<?php
session_start();
require 'database_connection.php';
$updateRoomNo = $_SESSION['updateRoomNo']; 
$updateBlockNo = $_SESSION['updateBlockNo']; 

if(isset($_POST['capacity']) && isset($_POST['roomNo']) && isset($_POST['blockNo'])){
    $roomNo = $mysqli->real_escape_string($_POST['roomNo']);
    $blockNo = $mysqli->real_escape_string($_POST['blockNo']);
    $capacity = $mysqli->real_escape_string($_POST['capacity']);

    $update = $mysqli->query("UPDATE room SET roomNo='$roomNo', blockNo='$blockNo', capacity='$capacity' WHERE roomNo='$updateRoomNo' AND blockNo='$blockNo'") or die($mysqli->error);
        echo "Room Successfully Updated";
}else{
	echo "0";
}
?>