<?php
session_start();
require 'database_connection.php';
if(!isset($_GET['courseCode'])){
    header('location:edit_courses.php');
}
$courseCode = $_GET['courseCode'];
$_SESSION['updateCourseCode'] = $courseCode;

$departmentList = $mysqli->query("SELECT departmentName FROM department ORDER BY departmentName ASC") or die($mysqli->error);


$query = $mysqli->query("SELECT * FROM course WHERE courseCode='$courseCode' LIMIT 1") or die($mysqli->error);
if($query->num_rows){
  while($row = $query->fetch_array(MYSQLI_ASSOC)){
    $courseCode = $row['courseCode'];
    $departmentName = $row['departmentName'];
    $courseName = $row['courseName'];
    $year = $row['year'];
    $semester = $row['semester'];
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Room</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/plugin.css">
    <style type="text/css">
        .imp{
            display: inline-block;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>


<!--Navigation-->
 <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="index.php" id="logo-container" class="brand-logo">Room Booking System</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="profile.html"><?= $_SESSION['rsUserName']?></a></li>
                    <li>|</li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        
        
        </div>
        
    </nav>
</div>
<h2>BOOK ROOM</h2>
   <div class="row">
    <form class="col s6">
        
        <div class="row">
            <div class="input-field col s12">
        <p>Course Name</p><input name="courseName" id="courseName" type="text" value="<?=$courseName?>"/>
         </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
        <p>Departments offering the course</p>

            <select name="departmentName" id='departmentName' class="imp" required>

                    <?php 
                        if($departmentList->num_rows){
                            while ($row = $departmentList->fetch_array(MYSQLI_ASSOC)) {
                                $departmentName1 = $row['departmentName'];
                    ?>
                        <option id="departmentName" value="<?= $departmentName1 ?>" <?php 
                            if($departmentName1 == $departmentName) echo "selected";

                        ?>><?= $departmentName1 ?></option>
                    <?php } }else{ ?>
                        <option value="" id="departmentName"></option>
                    <?php }?>         
            </select>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <p>Course Code</p> <input name="courseCode" id="courseCode" type="text" value="<?=$courseCode?>"/>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <p>Year</p><input name="year" id="year" type="number" value="<?=$year?>"/>
                </div>
        </div>
         <div class="row">
            <div class="input-field col s12">
                <p>Semester</p><input name="semester" id="semester" type="number" min="1" max="2" value="<?=$semester?>"/>
                </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="button" id="saveDetail" name="saveDetails" value="Save new Details"/>
                </div>
        </div>

    </form>
</div>

<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_course.js"></script>

</body>