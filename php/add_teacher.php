<?php
require 'database_connection.php';

$query = $mysqli->query("SELECT departmentName FROM department ORDER BY departmentName ASC") or die($mysqli->error);
?>
<html>
<head>
<title>Add Teacher</title></head>
<body>
<center>
    <br><br><br>
    <form method="post">
        <br/>
        <h2>ADD Teacher</h2>
        <table width="50%">
            <tr>
                <td><label>Teacher Name</label><br/><br/></td>
                <td><input name="teacherName" id="teacherName" type="text" required/><br/><br/></td>
            </tr>
        
            <tr>
                <td><label>Department</label></td>

                <td><select name="departmentName" id='departmentName'>

                <?php 
              
                 while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                            $departmentName = $row['departmentName'];
                    ?>
                     <option id="departmentName" value="<?= $departmentName ?>"><?= $departmentName ?></option>
                    <?php } ?>
                 </select>
             <br><br></td>
            </tr>

            <tr>
                <td><label>Number</label></td>
                <td><input name="number" id="number" type="number" required/><br/><br/></td>
            </tr>

            <tr>
                <td><label>Email</label></td>
                <td><input name="teacherMail" id="teacherMail" type="email" required/><br/><br/></td>
            </tr>

            <tr>
                <td><input type="submit" id="addTeacher" name="submit" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_teacher.js"></script>

</body>