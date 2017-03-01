<?php
// session starts with the help of this function 
session_start();

$link = new mysqli("localhost","root","travis","webdev");
if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    exit();
}


if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
    $name = $_POST['user'];
    $password = $_POST['pass'];

    $name = htmlentities($link->real_escape_string($name));
    $password = htmlentities($link->real_escape_string($password));
	
	
	
	$result = $link->query("SELECT * FROM user WHERE name='$name'");
	if(!$result)
		die ('Can\'t query user because: ' . $link->error);

	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0) 
	{
        $row = $result->fetch_assoc();
        if($row["password"] == $password && $row["admin"] == true)
        {
            $_SESSION['use']=$name;
            echo '<script type="text/javascript"> window.open("admintool.php","_self");</script>'; //  On Successful Login redirects to home.php	  
        }
        else {
        // do something else
        echo "<h2>Access Denied</h2";
	    }
    }
else {
// do something else
echo "<h2>Invalid UserName or Password</h2";
}

}
?>
<html>
    <title>Validate My Opinions</title>
    <link rel="stylesheet" href="../css/style.css" />
    <body>
        <div id="page">
            <h1>Asinine Ramblings</h1>
                <h2 id="noteName">Admin Log In</h2>
                <form action="" method="post">
                    <table width="350" border="0">
                        <tr>
                            <td width="30%">Username</td>
                            <td width="70%"> <input type="text" name="user" size=20> </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="pass" size="20"></td>
                        </tr>
                        <tr>
                            <td> <input type="submit" name="login" value="LOGIN"></td>
                    </table>
                </form>
       </form>
    </div>
    </body>
</html>