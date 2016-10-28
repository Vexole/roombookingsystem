<html>
<head>
<title>Add Block</title></head>
<body>
<center>
    <br><br><br>
    <form method="post">
        <br/>
        <h2>ADD BLOCK</h2>
        <table width="50%">
            <tr>
                <td><label>Block Number</label><br/><br/></td>
                <td><input name="blockNo" id="blockNo" type="number" required/><br/><br/></td>
            </tr>
            <tr>
                <td><label>Department</label><br/><br/></td>
                <td><input name="department" id="department" type="text" required/><br/><br>
            </tr>

            <tr>
                <td><label>Number of Rooms</label></td>
                <td><input name="numberOfRooms" id="numberOfRooms" min="5" max="20" type="number" required/><br/><br/></td>
            </tr>

            <tr>
                <td><input type="submit" id="addBlock" name="submit" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>


<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/add_block.js"></script>

</body>