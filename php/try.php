<?php
session_start();
	require 'database_connection.php';
	$display = "<table>";
	$blockNo = 3;
$query = $mysqli->query("SELECT * FROM room WHERE blockNo = 3 ORDER BY roomNo ASC") or die($mysqli->error); 
	if ($query->num_rows){
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$roomNo = $row['roomNo'];
			$display .= "$roomNo";
		
			for($i=9;$i<16;$i++){
					$check1 = $mysqli->query("SELECT * FROM booked_room WHERE roomNo='$roomNo' AND blockNo='$blockNo' AND bookedDate='$current_date' AND startTime BETWEEN '$i:00' AND '$i:59' ORDER BY startTime DESC LIMIT 1") or die($mysqli->error);
					if($check1->num_rows){
						while($rows = $check1->fetch_array(MYSQLI_ASSOC)){
							$finishTime = $rows['finishTime'];
							$startTime = $rows['startTime'];
							$diff =  (strtotime($finishTime) - strtotime($startTime))/3600;	
						}
						for($j=0; $j<$diff; $j++){
							++$i;
							$display .=	'<td style="border-bottom: 3px solid #CFDBC5;">Booked</td>';	
						}
					}else{
						$display .=	'<td style="border-bottom: 3px solid #00C000 ; opacity:1;">Free</td>';
					}
				}
		}
	}else{
		$display .= "No rooms available yet.";
	}

?>

<html>
<head>

</head><title></title>
<body>
<table class="highlight">
			<thead>
			  <tr>
				  <th data-field="id"> Room No</th>
				  <th data-field="name">9-10</th>
				  <th data-field="price">10-11</th>
				  <th data-field="price">11-12</th>
				  <th data-field="price">12-1</th>
				  <th data-field="price">1-2</th>
				  <th data-field="price">2-3</th>
				  <th data-field="price">3-4</th>
			  </tr>
			</thead>
			
			<tbody>
			  <?=$display?>
			</tbody>
		  </table>
		</body>