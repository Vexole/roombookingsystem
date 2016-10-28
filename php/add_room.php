<?php
require 'database_connection.php';

$query = $mysqli->query("SELECT blockNo FROM department ORDER BY blockNo ASC") or die($mysqli->error);
?>

<html>
<head>
<title>Add Room</title></head>
<body>
<center>
    <br><br><br>
    <form method="post">
        <br/>
        <h2>ADD ROOM</h2>
        <table width="50%">
            <tr>
                <td><label>Block Number</label><br/><br/></td>
                <td><select name="blockNo" id='blockNo'>

                <?php 
              
                 while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                            $blockNo = $row['blockNo'];
                    ?>
                     <option id="blockNo" value="<?= $blockNo ?>"><?= $blockNo ?></option>
                    <?php } ?>
                 </select>
             <br><br></td>
            </tr>
            <tr>
                <td><label>Room Number</label><br/><br/></td>
                <td><input name="roomNo" id="roomNo" min="1" max="30" type="number" required/><br/><br>
            </tr>

            <tr>
                <td><label>Capacity</label></td>
                <td><input name="capacity" id="capacity" min="10" max="60" type="number" required/><br/><br/></td>
            </tr>

            <tr>
                <td><input type="submit" id="addRoom" name="submit" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_room.js"></script>

</body>