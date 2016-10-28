<?php
    require 'database_connection.php';

    $query = $mysqli->query("SELECT departmentName from department") or die($mysqli->error);
?>

<html>
<head>
<title>Add Course</title></head>
<body>
<center>
    <br><br><br>
    <form method="post">
        <br/>
        <h2>ADD COURSE</h2>
        <table width="50%">
            <tr>
                <td><label>Course Name</label><br/><br/></td>
                <td><input name="courseName" id="courseName" type="text" required/><br/><br/></td>
            </tr>
            <tr>
                <td><label>Course Code</label><br/><br/></td>
                <td><input name="courseCode" id="courseCode" type="text" required/><br/><br>
            </tr>

            <tr>
                <td><label>Department</label></td>
                <td><select name="department" id='department'>

                <?php 
              
                 while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                            $department = $row['departmentName'];
                    ?>
                     <option id="department" value="<?= $department ?>"><?= $department ?></option>
                    <?php } ?>
                 </select>
             <br><br></td>
            </tr>

            <tr>
                <td><input type="submit" id="addCourse" name="submit" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_course.js"></script>

</body>