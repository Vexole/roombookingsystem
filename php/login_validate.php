<?php
session_start();
require 'database_connection.php';

if(isset($_POST['userName']) && isset($_POST['password'])){
    $userName = $mysqli->real_escape_string($_POST['userName']);
    $password = md5($mysqli->real_escape_string($_POST['password']));

    $query = $mysqli->query("SELECT * FROM user WHERE userName ='$userName' AND password='$password' LIMIT 1") or die($mysqli->error);
    if($query->num_rows){
    	$_SESSION['rsUserName'] = $userName;
    	$_SESSION['rsPassword'] = $password;
       	echo "1";
    }else{
    	echo "0";
    }
}