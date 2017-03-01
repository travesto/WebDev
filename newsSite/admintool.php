<?php
session_start();
$link = new mysqli("localhost","root","travis","storyqueue");
$user = new mysqli("localhost","root","travis","webdev");

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    echo $_SESSION['use'];
 }
else
    echo ("not logged in");

if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    echo("Not connected");
    exit();
}
else {
    echo ("connected");
}
if(isset($_REQUEST["action"]))
	$action = $_REQUEST["action"];
else 
    $action = "none";

if($action == "Approve")   // it checks whether the user clicked login button or not 
{
    $title = $_POST['title'];
    $admin = $_SESSION['use'];
    $result = $link->query("UPDATE queue SET approved=1, approved_by='$admin' WHERE title='$title'");
    echo $result;
    echo $admin;
    if(!$result) {
		die ('Can\'t query users because: ' . $link->error);
        echo "<h2>Bad Request.</h2>";
    }
	else
		$message = "User Added";
        echo "<h2>Story approved.</h2>";   
}
else {

}

?>
<html>
    <head>
        <title>Validate My Opinions</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <header id="siteName">
            <h1></h1>
            <h2>Asinine Ramblings</h2>
            <div>
                <nav>
                    <ul id="navList">
                        <li><a href=#>RSS</a></li>
                        <li><a href="home.php">Recent Posts</a></li>
                        <li><a href=#>Top Posts</a></li>
                        <li><a href=#>Random Posts</a></li>
                        <li><a href=#>Forum</a></li>
                        <li><a href=#>Other Things</a></li>
                        <li><a href=#>Your Account</a></li>
                        <li><a href="admin.php">Admin Tools</a></li>
                        <li><a href="logout.php">Log Out</a></li>  
                    </ul>
                </nav>
            </div>
            <section>
                <p>Posts Needing Approval</p>
                    <?php 
                    $result = $link->query("SELECT * FROM queue WHERE approved='0' ORDER BY 'date'");
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo ("<form method='POST'><article><h2 span>".$row['title']."</h2 span>");
                        echo ("<h3>".$row['story']."</h3>");
                        echo ("Sumbitted by: ".$row['submitted_by']." // ");
                        echo $row['date'];
                        echo ("<input type='hidden' value='".$row['title']."' name='title' />");
                        echo ("<input type=submit position='center' name='action' value='Approve'/>");
                        echo ("<br></br></article></form>");
                    }
                    ?>
                    
            </section>
    </body>
</html>
    