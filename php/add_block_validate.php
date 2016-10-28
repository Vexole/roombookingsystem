<?php

require 'database_connection.php';

if(isset($_POST['blockNo']) && isset($_POST['numberOfRooms']) && isset($_POST['department'])){
    $blockNo = $mysqli->real_escape_string($_POST['blockNo']);
    $numberOfRooms = $mysqli->real_escape_string($_POST['numberOfRooms']);
    $department = $mysqli->real_escape_string($_POST['department']);

    $query = $mysqli->query("SELECT * FROM department WHERE blockNo='$blockNo' AND departmentName = '$department'");
    $count = $query->num_rows;
    if($count>0){
        echo "0";
        exit;
    }else{
    	$insert = $mysqli->query("INSERT INTO department(blockNo, departmentName, numberOfRooms) VALUES('$blockNo', '$department', '$numberOfRooms')") or die($mysqli->error);
   		echo "Block Successfully Added";
    }
}