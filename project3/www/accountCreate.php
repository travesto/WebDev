<?php
session_start();
$link = new mysqli("localhost","root","travis","webdev");

if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    exit();
}
if(isset($_REQUEST["action"]))
	$action = $_REQUEST["action"];
else 
    $action = "none";

if($action == "create")
{
    $name = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $name = htmlentities($link->real_escape_string($name));
        $email = htmlentities($link->real_escape_string($email));
        $password = htmlentities($link->real_escape_string($password));
        $password = crypt($password, "Grabalujah!");
        $result = $link->query("INSERT INTO user VALUES ('$name', '$email', '$password', 0)");
        if(!$result) {
            die ('Can\'t query users because: ' . $link->error);
            echo "<h2>User already exists.</h2>";
        }
        else
            $message = "User Added";
            echo "<div><h2>Account created. Logging you in.</h2></div>";
            $_SESSION['use']=$name;
            header("refresh:3;url=http://ec2-54-203-21-228.us-west-2.compute.amazonaws.com:8082");
    }
    else {
        echo ("<h2>Please enter a valid email address.</h2>");
    }
    
	
}


?>
<html>
    <title>Create An Account</title>
    <head>
        <link rel="stylesheet" href="css/tanks.css" /> 
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker|Coming+Soon" rel="stylesheet"> 
        <script id="formFill">   
            function check_pass()
			{
				var pass1 = document.getElementById("pass").value;
				var pass2 = document.getElementById("pass2").value;
				if(pass1==pass2)
				{
					document.getElementById("pass_same").innerHTML = "Passwords Match!";
					document.getElementById("pass_same").style.background = "Green";
					document.getElementById("pass_same").style.color = "White";
				}
				else
				{
					document.getElementById("pass_same").innerHTML = "Passwords Don't Match";
					document.getElementById("pass_same").style.background = "Red";
					document.getElementById("pass_same").style.color = "White";
				}
            }
		</script>
    </head>
    <body>
        <div id="page">
            <h1>Tank Battle</h1>
                <div class="nice">
                    <h2 id="noteName">Create An Account</h2>
                    <hr class="hidden">
                        <form id="createForm" name="create" action="" method="post">
                            <table class="login" width="350" border="0">
                                <tr class="login">
                                    <td class="login" width="30%">Username</td>
                                    <td class="login" width="70%"><input type="text" name="user" id="name" required> </td>
                                </tr>
                                <tr class="login">
                                    <td class="login">Email</td>
                                    <td class="login"><input type="text" name="email" id="email" required></td>
                                </tr>
                                <tr class="login">
                                    <td class="login">Password</td>
                                    <td class="login"><input type="password" name="pass" id="pass" required></td>
                                </tr>
                                <tr class="login">
                                    <td class="login">Re-enter Password</td>
                                    <td class="login"><input type="password" id="pass2" onKeyUp="check_pass()" required></td>
                                </tr>
                                <tr class="login">
                                    <input type="hidden" id="allClear" name="action" value="create" />
                                    <td class="login"><input type="submit" name="submit" value="Create Account" /></td>
                                    <td class="login"><div id="pass_same">&nbsp;</div></td>
                                </tr>
                            </table>
                            <p class="textcenter">Already have an account? Click <a href="login.php">here.</a></p>
                        </form>
                </div>
        </div>
    </body>
</html>