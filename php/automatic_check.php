date_default_timezone_set("Asia/Kathmandu");
$date = date("Y-m-d");
$time = date("h:i:s");
$free = $mysqli->query("SELECT * FROM booked_room WHERE bookedDate = '$date'") or die($mysqli->error);
if($free->num_rows){
	while($rows = $free->fetch_array(MYSQLI_ASSOC)){
		$finishTime = $rows['finishTime'];
	}
}