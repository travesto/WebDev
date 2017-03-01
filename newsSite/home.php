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

if($action == "write")   // it checks whether the user clicked login button or not 
{
    $title = $_POST['title'];
    $story = $_POST['story'];
    $date = date("Y-m-d");
    $user = $_SESSION['use'];
    echo $user;
    echo ("Hallo");
    $result = $link->query("INSERT INTO queue VALUES ('$title', '$story', '$date', '$user', 0, '')");
	if(!$result) {
		die ('Can\'t query users because: ' . $link->error);
        echo "<h2>Bad Request.</h2>";
    }
	else
		$message = "User Added";
        echo "<h2>Story Submitted.</h2>";   
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
                <p>Wilkommen!</p>
                    <?php 
                    $result = $link->query("SELECT * FROM queue WHERE approved='1' ORDER BY date DESC");
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo ("<article><h2 span>".$row['title']."</h2 span>");
                        echo ("<h3>".$row['story']."</h3>");
                        echo ("Submitted by: ".$row['submitted_by']." // ");
                        echo $row['date'];
                        echo (" // Approved by: ".$row['approved_by']);
                        echo ("</article>");
                    }
                    ?>
            </section>
            <section>
                <article><h2>Submit A Story</h2>
                    <form name="storySub" action="" method="post">
                        <table>
                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="title" required></td>
                            </tr>
                            <tr>
                                <td>Story</td>
                                <td width=85%><textarea rows="4" name="story" required></textarea></td>
                            </tr>
                            <tr>
                                <input type="hidden" id="allClear" name="action" value="write" />
                                <td><input type=submit position="center" name="button" value="Submit Story"/></td>
                            </tr>
                        </table>
                    </form>
                </article>
            </section>
    </body>
</html>
    