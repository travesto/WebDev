<!-- http://tutorialzine.com/2009/09/shopping-cart-php-jquery/ -->
<!-- DB Set Up 
CREATE TABLE IF NOT EXISTS 'products_list' (
    'sku' varchar(50) NOT NULL,
    'model' varchar(60) NOT NULL,
    'vendor' varchar(60) NOT NULL,
    'operator' varchar(30) NOT NULL,
    'size' int(5) NOT NULL,
    'weight' int(6) NOT NULL,
    'flight_time' int(3) NOT NULL,
    'range' int(3) NOT NULL,
    'msrp' decimal(10,2) NOT NULL,
    'speed' int(3) NOT NULL,
    'gimbal' varchar(7) NOT NULL,
    'video' varchar(10),
    'camera' varchar(10)
    primary key (sku);
)
}

-->
<?php
session_start();
//$link = new mysqli("localhost","root","","storyqueue");
$user = new mysqli("localhost","root","travis","webdev");
//Creat SQL table

$sql = "CREATE TABLE IF NOT EXISTS products_list (
    sku varchar(50) NOT NULL,
    model varchar(60) NOT NULL,
    vendor varchar(60) NOT NULL,
    operator varchar(30) NOT NULL,
    size int(5) NOT NULL,
    weight int(6) NOT NULL,
    flight_time int(3) NOT NULL,
    _range int(3) NOT NULL,
    msrp decimal(10,2) NOT NULL,
    speed int(3) NOT NULL,
    gimbal varchar(7) NOT NULL,
    video varchar(10),
    camera varchar(10),
    primary key (sku)
)";
// if (mysqli_query($user, $sql)) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($user);
// }
if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    $name = $_SESSION['use'];
 }
else{
    header("Location:login.php");
}


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
<html>
    <head>
        <title>Crazy Clark's Copters</title>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/slider.css"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker|Coming+Soon" rel="stylesheet"> 
    </head>
    <body>
        <div>
            <h1>Crazy Clark's Copters</h1>
        </div>
        <ul>
            <li><a class="active" href="home.php">Home</a></li>
            <li><a href="mini.php">Mini Copters</a></li>
            <li><a href="fpv.php">FPV Copters</a></li>
            <li><a href="uav.php">UAV Drones</a></li>
            <li><a href="mil.php">Military Drones</a></li>
            <li style="float:right"><a href="logout.php">Log Out</a></li>
            <li class="hello" style="float:right"><a><?php echo("Hello, ".$name)?></a></li>
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
