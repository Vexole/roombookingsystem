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
    <title>Room Booking System</title>

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
            <a href="#" id="logo-container" class="brand-logo">Room Booking System</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="profile.php"><?php echo $_SESSION['rsUserName']; ?></a></li>
                    <li>|</li>
                    <li><a href="logout.php">LOG OUT</a></li>
					
                </ul>
            </div>
		</div>
    </nav>
</div>


<div class="container">

</div>
<!--Hero-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	
	 



<div id="intro" class="section scrollspy" style=" height: auto; text-decoration: underline;">
    <div class="container">
        <div class="row" >

            <div  class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <a href="all_rooms.php"> <h5 class="promo-caption" style="color: white;">SEE AVAILABLE ROOMS</h5></a>
                    
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                   <a href="all_courses.php"> <h5 class="promo-caption" style="color: white;">SEE ALL COURSES</h5></a>
                    
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                     <a href="edit_blocks.php"><h5 class="promo-caption" style="color: white;">EDIT</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>



       <div class="row">

			<?php
				$query = $mysqli->query("SELECT * FROM department ORDER BY blockNo ASC") or die($mysqli->error);
				while($row = $query->fetch_array(MYSQLI_ASSOC))	{
			     echo '<a href="block_info.php?blockNo=' . $row['blockNo'] . '">';
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


<!--Footer-->
<footer id="contact" class="page-footer default_color scrollspy">
    <div class="footer-copyright default_color">
        <div class="container">
           Kathamandu University Room booking system
        </div>
    </div>
</footer>


    <!--  Scripts-->
    <script src="../js/min/plugin-min.js"></script>
    <script src="../js/min/custom-min.js"></script>

    </body>
</html>


      
   