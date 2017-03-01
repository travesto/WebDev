<?php
// session starts with the help of this function 
session_start();

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];

      if($user == "Blee" && $pass == "1234")  // username is  set to "Ank"  and Password   
         {                                   // is 1234 by default     

          $_SESSION['use']=$user;

	  //  On Successful Login redirects to home.php
	  
	  echo '<script type="text/javascript"> window.open("home.php","_self");</script>';
	  
	 }
      
      else
        {
	  echo "<h2>Invalid UserName or Password</h2";
        }
}
?>
<html>
    <title>Copter Crazy</title>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/slider.css"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker|Coming+Soon" rel="stylesheet"> 
    <body>
        <div id="page">
            <h1>Copter Crazy</h1>
                <h2 id="noteName">Log In Please</h2>
                <form action="" method="post">
                    <table class="login" width="350">
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
                    <p>Don't have an account? Click <a href="">here.</a></p>
                </form>
       </form>
    </div>
    </body>
</html>