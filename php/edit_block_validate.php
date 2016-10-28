<?php
session_start();
require 'database_connection.php';
$updateBlockNo = $_SESSION['updateBlockNo']; 

if(isset($_POST['blockNo']) && isset($_POST['numberOfRooms']) && isset($_POST['department'])){
    $blockNo = $mysqli->real_escape_string($_POST['blockNo']);
    $numberOfRooms = $mysqli->real_escape_string($_POST['numberOfRooms']);
    $department = $mysqli->real_escape_string($_POST['department']);

    $update = $mysqli->query("UPDATE department SET blockNo='$blockNo', departmentName='$department', numberOfRooms='$numberOfRooms' WHERE blockNo=$updateBlockNo") or die($mysqli->error);
        echo "Block Successfully Updated";
}