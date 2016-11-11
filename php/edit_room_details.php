<?php
session_start();
require 'database_connection.php';
if(!isset($_GET['blockNo']) && !isset($_GET['roomNo'])){
    header('location:edit_rooms.php');
}
$blockNo = $_GET['blockNo'];
$roomNo = $_GET['roomNo'];
$_SESSION['updateBlockNo'] = $blockNo;
$_SESSION['updateRoomNo'] = $roomNo;

$departmentList = $mysqli->query("SELECT blockNo FROM department ORDER BY departmentName ASC") or die($mysqli->error);


$query = $mysqli->query("SELECT * FROM room WHERE roomNo='$roomNo' AND blockNo='$blockNo' LIMIT 1") or die($mysqli->error);
if($query->num_rows){
  while($row = $query->fetch_array(MYSQLI_ASSOC)){
    $roomNo = $row['roomNo'];
    $blockNo = $row['blockNo'];
    $capacity = $row['capacity'];
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
        <p>Block Number</p>
             <select name="blockNo" id='blockNo' class="imp" required>

                    <?php 
                        if($departmentList->num_rows){
                            while ($row = $departmentList->fetch_array(MYSQLI_ASSOC)) {
                                $blockNo1 = $row['blockNo'];
                    ?>
                        <option id="blockNo" value="<?= $blockNo ?>" <?php 
                            if($blockNo1 == $blockNo) echo "selected";

                        ?>><?= $blockNo1 ?></option>
                    <?php } }else{ ?>
                        <option value="" id="blockNo"></option>
                    <?php }?>         
            </select>

         </div>
        </div>
       
        <div class="row">
            <div class="input-field col s12">
                <p>Room Number</p> <input name="roomNo" id="roomNo" type="text" value="<?=$roomNo?>"/>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <p>capacity</p><input name="capacity" id="capacity" type="number" value="<?=$capacity?>"/>
                </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="button" id="saveDetail" name="saveDetails" value="Save new Details"/>
                </div>
        </div>

    </form>
</div>

<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_room.js"></script>

</body>