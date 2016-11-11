<html>
<head>
	<title></title>
</head>
<body>
	<form>
		<select name="try"><option name="hello">Hello</option></select>
			
	</form>	

	    $diff =  (strtotime($finishTime) - strtotime($startTime))/3600; 
    $hourQuery = $mysqli->query("SELECT hour FROM room WHERE blockNo='$blockNo' AND roomNo='$roomNo'") or die($mysqli->error);
    while ($rows = $hourQuery->fetch_array(MYSQLI_ASSOC)) {
            $hour = $rows['hour'];
        } 
        $hour += $diff;