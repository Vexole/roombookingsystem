<?php
session_start();
require 'database_connection.php';

    if(isset($_SESSION['rsUserName']) && isset($_SESSION['rsPassword'])){
        $query = $mysqli->query("SELECT * FROM course ORDER BY year ASC") or die($mysqli->error);
        $display = "";

        if($query->num_rows){
            while($rows = $query->fetch_array(MYSQLI_ASSOC)){
                $courseName = strtoupper($rows['courseName']);
                $courseCode = $rows['courseCode'];
                $departmentName = $rows['departmentName'];
                $year = $rows['year'];
                $semester = $rows['semester'];

            $display .= "
            <tbody>
             <tr>
                <td>$courseCode</td>
                <td>$courseName</td>
                <td>$departmentName</td>
                <td>$year</td>
                <td>$semester</td>
              </tr>
            </tbody>";
            }
        }else{
            $display .= "No courses available yet";
        }

    }else{
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Room Booking System</title>

    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/plugin.css" type="text/css" rel="stylesheet" >
</head>
<body >

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!--Navigation-->
 <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="index.php" id="logo-container" class="brand-logo">Room Booking System</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="profile.php"><?=$_SESSION['rsUserName']?></a></li>
                    <li>|</li>
                    <li><a href="#">LOGOUT</a></li>
                </ul>
            </div>
        
        
        </div>
        
    </nav>
</div>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">

    <h2 class="header text_b" style="color: white;">All Courses</h2>


     <div class="row">
            
            <div class="col s10 offset-s2">
                
                <table class="highlight">
            <thead>
              <tr>
                  <th data-field="id"> Course Code</th>
                  <th data-field="name">Course Name</th>
                  <th data-field="department">Department</th>
                  <th data-field="year">Year</th>
                  <th data-field="semester">Semester</th>
                  <th></th>
                  <th></th>
                   </tr>
            </thead>
            
            <?=$display;?>
          </table>

            </div>
        </div>

</div>
</div>
</body>
</html>