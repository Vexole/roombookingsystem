<?php


require '../database_connection.php';

if(isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['department']) && isset($_POST['school'])){
    $userName = $mysqli->real_escape_string($_POST['userName']);
    $password = md5($mysqli->real_escape_string($_POST['password']));
    $school = $mysqli->real_escape_string($_POST['school']);
    $department = $mysqli->real_escape_string($_POST['department']);

    $query = $mysqli->query("SELECT * FROM user WHERE userName='$userName'");
    $count = $query->num_rows;
    if($count>0){
        echo "Username Already Used";
        exit;
    }else{
    	$insert = $mysqli->query("INSERT INTO user(userName, password, school, department) VALUES('$userName', '$password', '$school', '$department')") or die($mysqli->error);
   		echo "User Successfully Added";
    }
}