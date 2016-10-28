<?php
require 'database_connection.php';


$date = date("Y-m-d");

if(isset($_GET['blockNo']) && isset($_GET['roomNo'])){
	$blockNo = $mysqli->real_escape_string( $_GET['blockNo']);
	$roomNo = $mysqli->real_escape_string( $_GET['roomNo']);	
}else{
	header('location: show_rooms.php');
}

$query = $mysqli->query("SELECT * FROM course ORDER BY courseCode ASC") or die($mysqli->error);
$query1 = $mysqli->query("SELECT * FROM teacher ORDER BY teacherMail ASC") or die($mysqli->error);


?>

<html>
<head>
<title>Book Room</title></head>
<body>
<center>
    <br><br><br>
    <form method="post">
        <br/>
        <h2>BOOK ROOM</h2>
        <table width="50%">
            <tr>
                <td><label>Block Number</label><br/><br/></td>
                <td><input name="blockNo" id="blockNo" type="number" disabled="disabled" value="<?=$blockNo?>"/><br/><br/></td>
            </tr>
            
            <tr>
                <td><label>Room Number</label><br/><br/></td>
                <td><input name="roomNo" id="roomNo" min="1" max="30" type="number" disabled="disabled" value="<?=$roomNo?>"/><br/><br>
            </tr>

            <tr>
                <td><label>Date</label></td>
                <td><input name="bookedDate" id="bookedDate" min="<?=$date?>" type="date" required/><br/><br/></td>
            </tr>

             <tr>
                <td><label>Start Time</label></td>
                <td><input name="startTime" id="startTime" type="time" required/><br/><br/></td>
            </tr>

			<tr>
                <td><label>Finish Time</label></td>
                <td><input name="finishTime" id="finishTime" type="time" required/><br/><br/></td>
            </tr>
                    
            <tr>
                <td><label>Course Code</label></td>
            	<td><select name="courseCode" id='courseCode'>

                <?php 
              
                 while ($rows = $query->fetch_array(MYSQLI_ASSOC)) {
                            $courseCode = $rows['courseCode'];
                    ?>
                     <option id="courseCode" value="<?= $courseCode ?>"><?= $courseCode ?></option>
                    <?php } ?>
                 </select>
             <br><br></td>
            </tr>


            <tr>
                <td><label>Teacher Email</label></td>
                <td><select name="teacherMail" id='teacherMail'>

                <?php 
              
                 while ($row = $query1->fetch_array(MYSQLI_ASSOC)) {
                            $teacherMail = $row['teacherMail'];
                    ?>
                     <option id="teacherMail" value="<?= $teacherMail ?>"><?= $teacherMail ?></option>
                    <?php } ?>
                 </select>
             <br><br></td>
            </tr>


            <tr>
                <td><input type="submit" id="bookRoom" name="bookRoom" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/book_room.js"></script>

</body>