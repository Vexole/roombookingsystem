<?php
session_start();
require 'database_connection.php';
if(!isset($_GET['blockNo'])){
    header('location:edit_blocks.php');
}
$blockNo = $_GET['blockNo'];
$_SESSION['updateBlockNo'] = $blockNo;

$query = $mysqli->query("SELECT * FROM department WHERE blockNo=$blockNo LIMIT 1") or die($mysqli->error);
if($query->num_rows){
  while($row = $query->fetch_array(MYSQLI_ASSOC)){
    $blockNo = $row['blockNo'];
    $departmentName = $row['departmentName'];
    $numberOfRooms = $row['numberOfRooms'];
  }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Room</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/plugin.css">
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
        <p>Block Name</p><input name="departmentName" id="departmentName" type="text" value="<?=$departmentName?>" required/>
         </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
        <p>Block No.</p><input name="blockNo" id="blockNo" type="text" value="<?=$blockNo?>" required/>
            </div>
        </div>
        
        <div class="row">
            <div class="input-field col s12">
                <p>Number of Rooms</p><input name="numberOfRooms" id="numberOfRooms" type="text" value="<?=$numberOfRooms?>" required/>
                </div>
        </div>
        <div class="row">
            <div class="col s12">
                <input type="button" id="saveDetails" name="saveDetails" value="Save new Details"/>
                </div>
        </div>

    </form>
</div>

<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_block.js"></script>

</body>