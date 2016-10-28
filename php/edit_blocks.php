<?php
session_start();
require 'database_connection.php';
	if(isset($_SESSION['rsUserName']) && isset($_SESSION['rsPassword'])){
		
	}else{
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Block No. | Room Booking System</title>

    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/plugin.css" type="text/css" rel="stylesheet" >
</head>
<body >

<!-- Pre Loader -->
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
                   
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        
        
        </div>
        
    </nav>
</div>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
    <h2 class="header text_b" style="color:	white;">EDIT</h2>
	
	<style>
			table>tbody>tr>td
			{
				color:white;
			}
			th
			{
				color:white;
			}
			</style>
	
		 <div class="row">
			<div class="col s2">
				<table>
					<tbody>
						<tr><td style="border-left:5px solid  #303F9F; opacity:1; background:#303F9F"><a href="edit_blocks.php" style="color:white">BLOCKS</a></td></tr>
		
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_rooms.php" style="color:white">ROOMS</a></td>
					  </tr>
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_courses.php" style="color:white">COURSES</a></td>
					  </tr>
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_teachers.php" style="color:white">TEACHERS</a></td>
					  </tr>
					</tbody>
				</table>
			</div>
			<div class="col s10">
				<div class="col s12 m6 l3">
					<div class="card">
						<a  id="openPopupButton">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="../images/add.png">
							</div>
							<div class="card-content">
								<span class="card-title activator grey-text text-darken-4">Add New Block</span>
								<p>Add a new block</p>
							</div>
						</a>
					</div>
				</div>

				<?php
				$query = $mysqli->query("SELECT * FROM department ORDER BY blockNo ASC") or die($mysqli->error);
				while($row = $query->fetch_array(MYSQLI_ASSOC))	{
			     echo '<a href="edit_block_details.php?blockNo=' . $row['blockNo'] . '">';
				 echo '<div class="col s12 m6 l3">';
				echo '	<div class="card">';
                    $blockImagePath = "block".$row['blockNo'];
                	echo '	<div class="card-image waves-effect waves-block waves-light">';
					$abcd = '		<img class="activator" src="../images/';
                    $abcd .=  $blockImagePath .'.jpg" />
						</div>
						<div class="card-content">';

					$abcd .= '	<span class="card-title activator grey-text text-darken-4"> Block ' . $row['blockNo'] . 
						'</span>
							<p><a href="#"> ' . $row['departmentName'] . ' | Engg.</a></p>
						</div>
					</div>
				</div>
			</a>';   

                echo $abcd;     
			 }
			

             ?>

			</div>
		</div>
		




	</div>
</div>




<div id="popup" class="modal">
  <div class="modal-content">
     <span class="close"> x </span>
      <h4>Add a new block</h4>
      <p>Enter the details below</p>
    <div class="modal-body">
	  <form class="col s12">
		<p> Block Name</p> <input class="input-field" type="text" id="department"/>
		<!--<p> Departments in the Block</p> <input class="input-field" type="text"/>-->
		<p> Block Number</p> <input class="input-field" type="text" id="blockNo"/>
		<p> Number of rooms</p> <input class="input-field" type="text" id="numberOfRooms"/>
		<input type="submit" id="addBlock"/>
	</form>
    </div>
  </div>

</div>

<script>
// Get the modal
var modalVar = document.getElementById('popup');

// Get the button that opens the modal
var openPopup = document.getElementById("openPopupButton");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
openPopup.onclick = function() {
    modalVar.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modalVar.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalVar) {
        modalVar.style.display = "none";
    }
}
</script>

<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_block.js"></script>

</body>
</html>