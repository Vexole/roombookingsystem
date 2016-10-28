<?php
require 'database_connection.php';

if(isset($_POST['blockNo']) && isset($_POST['roomNo']) && isset($_POST['capacity'])){
    $blockNo = $mysqli->real_escape_string($_POST['blockNo']);
    $roomNo = $mysqli->real_escape_string($_POST['roomNo']);
    $capacity = $mysqli->real_escape_string($_POST['capacity']);

    $query = $mysqli->query("SELECT * FROM room WHERE blockNo='$blockNo' AND roomNo = '$roomNo'");
    $count = $query->num_rows;
    if($count>0){
        echo "0";
        exit;
    }else{
    	$insert = $mysqli->query("INSERT INTO room(blockNo, roomNo, capacity) VALUES('$blockNo', '$roomNo', '$capacity')") or die($mysqli->error);
   		echo "Room Successfully Added";
    }
}