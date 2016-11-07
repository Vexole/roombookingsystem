<?php
session_start();
require 'database_connection.php';
if(!isset($_GET['blockNo']) || !isset($_SESSION['rsUserName'])){
    header('location:block_info.php');
}
$blockNo = $_GET['blockNo'];

$date = date("Y-m-d");

$query = $mysqli->query("SELECT * FROM course ORDER BY courseCode ASC") or die($mysqli->error);
$query1 = $mysqli->query("SELECT * FROM teacher ORDER BY teacherMail ASC") or die($mysqli->error);
$query2 = $mysqli->query("SELECT * FROM room WHERE blockNo='$blockNo'")or die($mysqli->error);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Room</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/plugin.css">
</head>
<body>

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
                    <li><a href="profile.html"><?= $_SESSION['rsUserName']?></a></li>
                    <li>|</li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        
        
        </div>
        
    </nav>
</div>

    <style type="text/css">
        h2{
            color: white;
            padding-left: 5%;
            margin-left: 20px !important;
            padding-top: 0;
        }

        label{
            font-size: 20px;
            color: white;
            padding-right: 0;
            margin-right: 0;
        }

        .form-control{
            width: 55%;
        }

        input{
            font-size: 20px;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        td{
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .imp{
            display: inline-block;
            margin-bottom: 12px;
        }
    </style>

<center>
    <br>
    <form method="post">
        <h2>BOOK ROOM</h2>
      
        <table class="form-control">
            <tr>
                
                <td><input name="blockNo" id="blockNo" type="hidden"  disabled="disabled" class="form-control" value="<?=$blockNo?>"/></td>
            </tr>
            


            <tr>
                <td><label>Room Number</label></td>
                <td>
                   <select name="roomNo" id='roomNo' class="imp" required>

                    <?php 
                        if($query2->num_rows){
                            while ($row = $query2->fetch_array(MYSQLI_ASSOC)) {
                                $roomNo = $row['roomNo'];
                    ?>
                        <option id="roomNo" value="<?= $roomNo ?>"><?= $roomNo ?></option>
                    <?php } }else{ ?>
                        <option value="" id="roomNo"></option>
                    <?php }?>         
                     </select>
               </td>
            </tr>

            <tr>
                <td><label>Date</label></td>
                <td><input name="bookedDate" id="bookedDate" min="<?=$date?>" type="date" required/><br/></td>
            </tr>

             <tr>
                <td><label>Start Time</label></td>
                <td><input name="startTime" id="startTime" type="time" required/></td>
            </tr>

            <tr>
                <td><label>Finish Time</label></td>
                <td><input name="finishTime" id="finishTime" type="time" required/></td>
            </tr>
                    
            <tr>
                <td><label>Course Code</label></td>
                <td>
                   <select name="courseCode" id='courseCode' class="imp" required>

                    <?php 
                        if($query->num_rows){
                            while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                                $courseCode = $row['courseCode'];
                    ?>
                        <option id="courseCode" value="<?= $courseCode ?>"><?= $courseCode ?></option>
                    <?php } }else{ ?>
                        <option value="" id="courseCode"></option>
                    <?php }?>         
                     </select>
               </td>
            </tr>


            <tr>
                <td><label>Requested By</label></td>
                <td>
                   <select name="teacherMail" id='teacherMail' class="imp" required>

                    <?php 
                        if($query1->num_rows){
                            while ($row = $query1->fetch_array(MYSQLI_ASSOC)) {
                                $teacherMail = $row['teacherMail'];
                    ?>
                        <option id="teacherMail" value="<?= $teacherMail ?>"><?= $teacherMail ?></option>
                    <?php } }else{ ?>
                        <option value="" id="teacherMail"></option>
                    <?php }?>         
                     </select>
               </td>
            </tr>

            <tr>
                <td><input type="submit" id="bookRoom" name="bookRoom" value="Submit"/></td>
            </tr>
            <br>
        </table>
        <br>
    </form>
</center>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/book_room.js"></script>

</body>