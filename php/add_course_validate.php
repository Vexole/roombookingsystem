<?php

require 'database_connection.php';

if(isset($_POST['courseName']) && isset($_POST['courseCode']) && isset($_POST['department']) 
    && isset($_POST['year']) && isset($_POST['semester'])){
    $courseName = $mysqli->real_escape_string($_POST['courseName']);
    $courseCode = str_replace(" ", "", $mysqli->real_escape_string($_POST['courseCode']));
    $department = $mysqli->real_escape_string($_POST['department']);
    $year = $mysqli->real_escape_string($_POST['year']);
    $semester = $mysqli->real_escape_string($_POST['semester']);

    $query = $mysqli->query("SELECT * FROM course WHERE courseCode='$courseCode' AND departmentName = '$department'") or die($mysqli->error);
    $count = $query->num_rows;
    if($count>0){
        echo "0";
    }else{
    	$insert = $mysqli->query("INSERT INTO course(courseName, departmentName, courseCode, year, semester) VALUES('$courseName', '$department', '$courseCode', '$year', '$semester')") or die($mysqli->error);
   		echo "Course Successfully Added";
    }
}
?>