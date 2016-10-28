<?php
session_start();
require 'database_connection.php';

	if(isset($_SESSION['rsUserName']) && isset($_SESSION['rsPassword'])){

		if(isset($_GET['courseCode'])){
			$courseCode = $_GET['courseCode'];
			$delete = $mysqli->query("DELETE FROM course where courseCode = '$courseCode'") or die($mysqli->error);
			header('location:edit_courses.php');
		}


		$query = $mysqli->query("SELECT * FROM course ORDER BY year ASC") or die($mysqli->error);
		$display = "";

		if($query->num_rows){
			while($rows = $query->fetch_array(MYSQLI_ASSOC)){
				$courseName = strtoupper($rows['courseName']);
	  			$courseCode = $rows['courseCode'];
	   			$departmentName = $rows['departmentName'];
	   			$year = $rows['year'];
	   			$semester = $rows['semester'];

	    	$display .= "
	    	<tbody>
			 <tr>
			 	<td>$courseCode</td>
			 	<td>$courseName</td>
			 	<td>$departmentName</td>
			 	<td>$year</td>
			 	<td>$semester</td>
			 	<td> <a href=\"edit_course_details.php?courseCode=$courseCode\" > Edit</td>
			 	<td><a href=\"edit_courses.php?courseCode=$courseCode\" >Delete</td>
			 </tr>
			</tbody>";
			}
		}else{
			$display .= "No courses available yet";
		}

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
                    <li><a href="profile.php"><?=$_SESSION['rsUserName']?></a></li>
                    <li>|</li>
                    <li><a href="#">LOGOUT</a></li>
                </ul>
            </div>
        
        
        </div>
        
    </nav>
</div>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
   <div class="row">
   		 <h2 class="col s4 header text_b" style="color:	white;">EDIT</h2>
 		
            <div class="col s4 offset-s10"><button class="waves-effect waves-light btn-large" id="openPopupButton">Add Course</button></div>
        
 		
		</div>
	
		 <div class="row">
			<div class="col s2">
				<table>
					<tbody>
						<tr><td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_blocks.php" style="color:white"> BLOCKS</a></td></tr>
		
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_rooms.php" style="color:white">ROOMS</a></td>
					  </tr>
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;  background:#303F9F" style="color:white"><a href="edit_courses.php" style="color:white">COURSES</a></td>
					  </tr>
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_teachers.php" style="color:white">TEACHERS</a></td>
					  </tr>
					</tbody>
				</table>
			</div>
			<div class="col s10">
				
				<table class="highlight">
			<thead>
			  <tr>
				  <th data-field="id"> Course Code</th>
				  <th data-field="name">Course Name</th>
				  <th data-field="department">Department</th>
				  <th data-field="year">Year</th>
				  <th data-field="semester">Semester</th>
				  <th></th>
				  <th></th>
				   </tr>
			</thead>
			
			<?=$display;?>
		  </table>

			</div>
		</div>
		
	</div>
</div>


<div id="popup" class="modal">
  <div class="modal-content">
     <span class="close"> x </span>
      <h4>Add a new Course</h4>
    
    <div class="modal-body">
	  <form class="col s12">
		<p> Course Name</p> <input class="input-field" id="courseName" type="text"/>
		<p> Course Code</p> <input class="input-field" id="courseCode" type="text"/>
		<p> Deparment Associated</p> <input class="input-field" id="department" type="text"/>
		<p> Year </p> <input class="input-field" id="year" type="number"/>
		<p> Semester </p> <input class="input-field" id="semester" type="number"/>
		<input type="submit" id="addCourse"/>
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
<script type="text/javascript" src="../js/add_course.js"></script>
</body>
</html>