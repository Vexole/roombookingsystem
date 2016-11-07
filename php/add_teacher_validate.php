<?php

require 'database_connection.php';

if(isset($_POST['teacherMail']) && isset($_POST['number']) && isset($_POST['department']) && isset($_POST['teacherName'])){
    $teacherMail = $mysqli->real_escape_string($_POST['teacherMail']);
    $teacherName = $mysqli->real_escape_string($_POST['teacherName']);
    $number = $mysqli->real_escape_string($_POST['number']);
    $department = $mysqli->real_escape_string($_POST['department']);

    $query = $mysqli->query("SELECT * FROM teacher WHERE teacherMail = '$teacherMail'") or die($mysqli->error);
    if($query->num_rows){
        echo "0";
    }else{
    	$insert = $mysqli->query("INSERT INTO teacher(teacherName, departmentName, teacherMail, number) VALUES('$teacherName', '$department', '$teacherMail', '$number')") or die($mysqli->error);
   		echo "Teacher Successfully Added";
    }
}
?>