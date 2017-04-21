<?php
session_start();
//$link = new mysqli("localhost","root","","storyqueue");
$user = new mysqli("localhost","root","travis","webdev");

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

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Tank Battle</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/tanks.css">

	<link rel="shortcut icon" href="img/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker|Coming+Soon" rel="stylesheet">  


</head>
<body>
	<!--[if lt IE 7]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div id="header">
		<h1>Tank Battle</h1>
	</div>
	<div id="prompt" class="name-prompt">
		<div class="input-group">
	      <input id="tank-name" type="text" class="form-control" placeholder="Name your tank" autocomplete="off">
	      <span class="input-group-btn">
	        <input id="join" class="btn btn-primary" type="submit" value="Join the battle">
	      </span>
	    </div>
	    <div class="tank-select col-md-12">
	    	<label>Choose your tank:</label>
	      	<ul class="tank-selection">
	      		<li class="selected" data-tank="1">
	      			<img src="img/preview-tank-1.png">
	      		</li>
	      		<li data-tank="2">
	      			<img src="img/preview-tank-2.png">
	      		</li>
	      		<li data-tank="3">
	      			<img src="img/preview-tank-3.png">
	      		</li>
	      	</ul>
    	</div>
	</div>

	<div id="arena" class="arena">
	</div>
	<!--<button class="nice"><a class="noce" href="logout.php">Log Out</a></button>-->
	
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/socket.io.js"></script>
	<script type="text/javascript" src="js/tanks.js"></script>
	<script type="text/javascript" src="js/client.js"></script>

</body>
</html>
