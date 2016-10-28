<?php
require '..\database_connection.php';

/*$mysqli = $mysqli->query("SELECT * FROM teacher") or die($mysqli->error);
if($mysqli->num_rows){
	while ($row = $mysqli->fetch_array(MYSQLI_ASSOC)) {
		echo $row['teacherName'] . " " . $row['teacherMail'] . " " . $row['departmentName'] . "<br>";
	}
}*/

$query = $mysqli->query("SELECT * FROM teacher") or die($mysqli->error);
if($query->num_rows){
	while($row = $query->fetch_array(MYSQLI_ASSOC)){
		$teacherName = $row['teacherName'];
		$department = $row['departmentName'];
		$teacherMail = $row['teacherMail'];

		$query1 = $mysqli->query("SELECT * FROM booked_room WHERE teacherMail = '$teacherMail'") or die($mysqli->error);
		echo $teacherName . " " . $department . " " . $query1->num_rows . "<br>";
	}
}