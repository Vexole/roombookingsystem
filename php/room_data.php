<?php

require 'database_connection.php';

$query = $mysqli->query("SELECT * FROM room") or die($mysqli->error);
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

print json_encode($data);

?>