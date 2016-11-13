<?php
session_start();
require 'database_connection.php';

	if(isset($_SESSION['rsUserName']) && isset($_SESSION['rsPassword'])){

		if(isset($_GET['teacherID'])){
			$teacherID = $_GET['teacherID'];
			$delete = $mysqli->query("DELETE FROM teacher where teacherID = '$teacherID'") or die($mysqli->error);
			header('location:edit_teachers.php');
		}

		if(isset($_GET['blockNo'])){
			$blockNo = $_GET['blockNo'];

		$departmentList = $mysqli->query("SELECT * FROM department ORDER BY departmentName ASC") or die($mysqli->error);
		$query1 = $mysqli->query("SELECT departmentName FROM department WHERE blockNo='$blockNo' LIMIT 1") or die($mysqli->error);
		while($row = $query1->fetch_array(MYSQLI_ASSOC)){
			$departmentName = $row['departmentName'];
		}

		$query = $mysqli->query("SELECT * FROM teacher WHERE departmentName='$departmentName' ORDER BY teacherName ASC") or die($mysqli->error);
		$display = "";

		if($query->num_rows){
			while($rows = $query->fetch_array(MYSQLI_ASSOC)){
				$teacherName = strtoupper($rows['teacherName']);
	  			$departmentName = $rows['departmentName'];
	   			$teacherMail = $rows['teacherMail'];
	   			$number = $rows['number'];
	   			$teacherID = $rows['teacherID'];
	   			
	    	$display .= "
	    	<tbody>
			 <tr>
			 	<td>$teacherName</td>
			 	<td>$departmentName</td>
			 	<td>$teacherMail</td>
			 	<td>$number</td>
			 	<td> <a href=\"edit_teacher_details.php?teacherID=$teacherID\" > Edit</td>
			 	<td><a href=\"edit_teachers.php?teacherID=$teacherID\">Delete</td>
			 </tr>
			</tbody>";
			}
		}else{
			$display .= "No teachers available yet";
		}
}
	}else{
		header("location:login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Teacher Info | Room Booking System</title>

    <link href="../css/style.css" type="text/css" rel="stylesheet"/>
    <link href="../css/plugin.css" type="text/css" rel="stylesheet" />
    <style type="text/css">
        .imp{
            display: inline-block;
            margin-bottom: 12px;
        }
    </style>
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
                    <li>|</li
>                    <li><a href="#">LOGOUT</a></li>
                </ul>
            </div>
        
        
        </div>
        
    </nav>
</div>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
   <div class="row">
   		 <h2 class="col s4 header text_b" style="color:	white;">EDIT</h2>
 			     <div class="col s4 offset-s10"><button class="waves-effect waves-light btn-large" id="openPopupButton">Add Teachers</button></div>
        
 		
		</div>
	
		 <div class="row">
			<div class="col s2">
				<table>
					<tbody>
						<tr><td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_blocks.php" style="color:white">BLOCKS</a></td></tr>
		
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;"><a href="edit_rooms.php" style="color:white">ROOMS</a></td>
					  </tr>
					  <tr>
						<td style="border-left:5px solid  #303F9F; opacity:1;  color:white"><a href="edit_courses.php" style="color:white">COURSES</a></td>
					  </tr>
					  <tr>
						<td style="border-left:5px solid  #303F9F; background:#303F9F; opacity:1;"><a href="edit_teachers.php" style="color:white">TEACHERS</a></td>
					  </tr>
					</tbody>
				</table>
			</div>
			<div class="col s10">


				<div class="row">
			    <div class="col s12">
			      	<ul class="tabs">
			      		<?php
			      			if($departmentList->num_rows){
			      				while ($rows = $departmentList->fetch_array(MYSQLI_ASSOC)) {
			      					$blockNo = $rows['blockNo'];
			      				?>	

							<div class="row">
							    <div class="col s12">
							     	<ul class="tabs">
							       		<li class="tab col s3"><a href="edit_teacher.php?blockNo=<?=$blockNo?>"> &nbsp; <?=$rows['departmentName']?> &nbsp;</a></li>
							      	</ul>
							    </div>
							</div>

			      				 <?php }
			      			}?>
					</ul>
				</div>
			</div>
        

				
				<table class="highlight">
			<thead>
			  <tr>
				  <th data-field="teacherName"> Teacher Name</th>
				  <th data-field="department">Department</th>
				  <th data-field="teacherMail">Teacher Mail</th>
				  <th data-field="number">Number</th>
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
      <h4>Add a new Teacher</h4>
    
    <div class="modal-body">
	  <form class="col s12">
		<p> Teacher Name</p> <input class="input-field" id="teacherName" type="text"/>
		<p> Deparment Associated</p> 

			<select name="departmentName" id='departmentName' class="imp" required>

                    <?php 
                        if($departmentList->num_rows){
                            while ($row = $departmentList->fetch_array(MYSQLI_ASSOC)) {
                                $departmentName = $row['departmentName'];
                    ?>
                        <option id="departmentName" value="<?= $departmentName ?>"><?= $departmentName ?></option>
                    <?php } }else{ ?>
                        <option value="" id="departmentName"></option>
                    <?php }?>         
            </select>

		<p> Mail </p> <input class="input-field" id="teacherMail" type="email"/>
		<p> Number </p> <input class="input-field" id="number" type="number"/>
		<input type="submit" id="addTeacher"/>
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
<script type="text/javascript" src="../js/add_teacher.js"></script>
</body>
</html>