<?php
session_start();
require 'database_connection.php';
$updateTeacherID = $_SESSION['updateTeacherID']; 

if(isset($_POST['teacherMail']) && isset($_POST['teacherName']) && isset($_POST['department']) && isset($_POST['number'])){
    $teacherName = $mysqli->real_escape_string($_POST['teacherName']);
    $teacherMail = $mysqli->real_escape_string($_POST['teacherMail']);
    $department = $mysqli->real_escape_string($_POST['department']);
    $number = $mysqli->real_escape_string($_POST['number']);

    $update = $mysqli->query("UPDATE teacher SET teacherName='$teacherName', departmentName='$department', number='$number', teacherMail='$teacherMail' WHERE teacherID='$updateTeacherID'") or die($mysqli->error);
        echo "Teacher Successfully Updated";
}