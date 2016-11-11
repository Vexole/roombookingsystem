<?php
$flag = 0;
require 'database_connection.php';

if(isset($_POST['bookedDate']) && isset($_POST['startTime']) && isset($_POST['finishTime']) && isset($_POST['roomNo']) && isset($_POST['blockNo']) && isset($_POST['courseCode']) && isset($_POST['teacherMail'])){
    $bookedDate = $mysqli->real_escape_string($_POST['bookedDate']);
    $startTime = $_POST['startTime'] . ":00";
    $finishTime = $mysqli->real_escape_string($_POST['finishTime']);
    $roomNo = $mysqli->real_escape_string($_POST['roomNo']);
    $blockNo = $mysqli->real_escape_string($_POST['blockNo']);
    $courseCode = $mysqli->real_escape_string($_POST['courseCode']);
    $teacherMail = $mysqli->real_escape_string($_POST['teacherMail']);


    $query = $mysqli->query("SELECT * FROM booked_room WHERE bookedDate='$bookedDate' AND blockNo = '$blockNo' AND roomNo = '$roomNo' AND status='0'") or die($mysqli->error);
    if($query->num_rows){

        while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
            $bookStartTime = $row['startTime'];
            $bookFinishTime = $row['finishTime']; 

            if((($startTime >= $bookStartTime && $startTime < $bookFinishTime) &&  $startTime != $bookFinishTime || ($startTime<$bookStartTime && $finishTime>$bookFinishTime))){
                $flag = 1;  
                if($startTime == $finishTime){
                    $flag = 0;
                }
            }
        }      
    }
    if($flag == 1){
        echo "0";
    }else{
        $diff =  (strtotime($finishTime) - strtotime($startTime))/3600; 
       
        $hoursQuery = $mysqli->query("SELECT * FROM room WHERE blockNo='$blockNo' AND roomNo='$roomNo'") or die($mysqli->error);
        while ($row = $hoursQuery->fetch_array(MYSQLI_ASSOC)) {
            $hours = $row['hours'];
        } 
        $hours += $diff;
        $updateQuery = $mysqli->query("UPDATE room SET hours='$hours' WHERE roomNo='$roomNo' AND blockNo='$blockNo'") or die($mysqli->error);


        $hoursQuery1 = $mysqli->query("SELECT * FROM teacher WHERE teacherMail='$teacherMail'") or die($mysqli->error);
        while ($row = $hoursQuery1->fetch_array(MYSQLI_ASSOC)) {
            $hours = $row['hours'];
        } 
        $hours += $diff;
        $updateQuery = $mysqli->query("UPDATE teacher SET hours='$hours' WHERE teacherMail='$teacherMail'") or die($mysqli->error);


        $query1 = $mysqli->query("INSERT INTO booked_room (bookedDate, startTime, finishTime, roomNo, blockNo, courseCode, teacherMail) VALUES ('$bookedDate', '$startTime', '$finishTime', '$roomNo', '$blockNo', '$courseCode', '$teacherMail')") or die($mysqli->error);
        echo "1";
    }
}
?>