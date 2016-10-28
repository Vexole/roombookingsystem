<html>
<head>
<title>Add Admin</title></head>
<body>
<center>
    <br><br><br>
    <form method="post">
        <br/>
        <h2>ADD ADMIN</h2>
        <table width="50%">
            <tr>
                <td><label>UserName</label><br/><br/></td>
                <td><input name="userName" id="userName" type="text" required/><br/><br/></td>
            </tr>
            <tr>
                <td><label>Password</label><br/><br/></td>
                <td><input name="password" id="password" type="password" required/><br/><br>
            </tr>

            <tr>
                <td><label>School of</label></td>
                <td><input name="school" id="school" type="text" required/><br/><br/></td>
            </tr>
            
            <tr>
                <td><label>Department</label></td>
                <td><input name="department" id="department" type="text" required/><br/><br/></td>
            </tr>


            <tr>
                <td><input type="submit" id="addAdmin" name="submit" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>


<script type="text/javascript" src="../../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../../js/add_user.js"></script>

</body>