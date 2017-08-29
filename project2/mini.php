<?php
session_start();
//$link = new mysqli("localhost","root","","storyqueue");
$user = new mysqli("localhost","root","","webdev");

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    $name = $_SESSION['use'];
 }
else{
    header("Location:login.php");
}
?>
<html>
    <head>
        <title>Mini Copters</title>
        <link rel="stylesheet" href="css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker|Coming+Soon" rel="stylesheet">  
    </head>
    <body>
        <div>
            <h1>Crazy Clark's Copters</h1>
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a class="active" href="mini.php">Mini Copters</a></li>
            <li><a href="fpv.php">FPV Copters</a></li>
            <li><a href="uav.php">UAV Drones</a></li>
            <li><a href="mil.php">Military Drones</a></li>
            <li style="float:right"><a href="logout.php">Log Out</a></li>
            <li class="hello" style="float:right"><a><?php echo("Hello, ".$name)?></a></li>
        </ul>
        <section>
            <h2>Mini Copters</h2>
            <table>
                <tr>
                    <td><img class="tpic" src="img/d3.jpg"></td>
                    <td><img class="tpic" src="img/d1.jpg"></td>
                    <td><img class="tpic" src="img/d2.jpg"></td>
                </tr>
            </table>
        </section>

    </body>
</html>
