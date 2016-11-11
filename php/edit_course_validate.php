<?php
session_start();
require 'database_connection.php';
$updateCourseCode = $_SESSION['updateCourseCode']; 

if(isset($_POST['courseCode']) && isset($_POST['courseName']) && isset($_POST['department']) 
	&& isset($_POST['year']) && isset($_POST['semester'])){
    $courseCode = str_replace(" ", "", $mysqli->real_escape_string($_POST['courseCode']));
    $courseName = $mysqli->real_escape_string($_POST['courseName']);
    $department = $mysqli->real_escape_string($_POST['department']);
    $year = $mysqli->real_escape_string($_POST['year']);
    $semester = $mysqli->real_escape_string($_POST['semester']);

    $update = $mysqli->query("UPDATE course SET courseCode='$courseCode', courseName='$courseName', departmentName='$department', year='$year', semester='$semester' WHERE courseCode='$updateCourseCode'") or die($mysqli->error);
        echo "Course Successfully Updated";
}else{
	echo "0";
}
?>