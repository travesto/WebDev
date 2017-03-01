<!-- http://tutorialzine.com/2009/09/shopping-cart-php-jquery/ -->
<?php
session_start();
//$link = new mysqli("localhost","root","travis","storyqueue");
//$user = new mysqli("localhost","root","travis","webdev");

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    echo $_SESSION['use'];
 }
else
    echo ("not logged in");

/*
if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    echo("Not connected");
    exit();
}
else {
    echo ("connected");
}
*/
if(isset($_REQUEST["action"]))
	$action = $_REQUEST["action"];
else 
    $action = "none";

?>
<!DOCTYPE html>
<html>
    <head>
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/slider.css"/>
            <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker|Coming+Soon" rel="stylesheet"> 
    </head>
    <body>
        <h1>Copter Crazy</h1>
        <ul>
            <li><a class="active" href="home.php">Home</a></li>
            <li><a href="mini.html">Mini Copters</a></li>
            <li><a href="fpv.html">FPV Copters</a></li>
            <li><a href="uav.html">UAV Drones</a></li>
            <li><a href="mil.html">Military Drones</a></li>
            <li style="float:right"><a href="cart.html">Shopping Cart</a></li>
        </ul>
         <section>
            <div class="slider">
                <div class="slide-viewer">
                <div class="slide-group">
                    <div class="slide slide-1">
                    <img src="img/quad1.jpg" alt="No two are the same" />
                    </div>
                    <div class="slide slide-2">
                    <img src="img/quad2.jpg" alt="Monsieur Mints"  />
                    </div>
                    <div class="slide slide-3">
                    <img src="img/quad3.jpg" alt="The Flower Series"  />
                    </div>
                    <div class="slide slide-4">
                    <img src="img/quad4.jpg" alt="Salt o' The Sea"  />
                    </div>
                </div>
                </div>
                <div class="slide-buttons"></div>
            </div>

        </section>
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/slider.js"></script>    
    </body>
</html>
