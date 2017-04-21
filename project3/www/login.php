<?php
/*
// With copious help from
// w3schools.com 
// Ducket's HTML Book
// StackOverflow.com
*/
// session starts with the help of this function 
session_start();

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:http://ec2-54-203-21-228.us-west-2.compute.amazonaws.com:8082"); 
 }
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
	
	$password = crypt($password, "Grabalujah!");
	$result = $link->query("SELECT * FROM user WHERE name='$name'");
	if(!$result)
		die ('Can\'t query user because: ' . $link->error);

	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0) 
	{
        $row = $result->fetch_assoc();
        if($row["password"] == $password)
        {
            $_SESSION['use']=$name;
            echo '<script type="text/javascript"> window.open("http://ec2-54-203-21-228.us-west-2.compute.amazonaws.com:8082","_self");</script>'; //  On Successful Login redirects to home.php	  
        }
        else {
        // do something else
        echo "<h2>Invalid UserName or Password</h2";
	    }
    }
else {
// do something else
echo "<h2>Invalid UserName or Password</h2";
}

}
?>
<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" href="css/tanks.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker|Coming+Soon" rel="stylesheet">
    </head>
    <body>
        <div id="page">
            <h1>Tank Battle</h1>
                <div class="nice">
                    <h2 id="noteName">Log In Please</h2>
                        <form action="" method="post">
                            <table class="login" width="350" border="0">
                                <tr class="login">
                                    <td class="login" width="30%">Username</td>
                                    <td class="login" width="70%"> <input type="text" name="user" size=20> </td>
                                </tr>
                                <tr class="login">
                                    <td class="login">Password</td>
                                    <td class="login"><input type="password" name="pass" size="20"></td>
                                </tr>
                                <tr class="login">
                                    <td class="login"><input type="submit" name="login" value="LOGIN"></td>
                            </table>
                            <p class="textcenter">Don't have an account? Click <a href="accountCreate.php">here.</a></p>
                        </form>
                </div
        </div>
    </body>
</html>