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
    <title>Validate My Opinions</title>
    
    <body>
        <p>Test</p>

        <form action="" method="post">
            <table width="200" border="0">
                <tr>
                    <td>UserName</td>
                    <td> <input type="text" name="user" > </td>
                </tr>
                <tr>
                    <td>PassWord</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td> <input type="submit" name="login" value="LOGIN"></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>