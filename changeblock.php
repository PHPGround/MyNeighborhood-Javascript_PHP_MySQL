<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$userId = $_SESSION['userId'];
$hoodId = $_POST["hoodId"];
$blockName = $_POST["blockName"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }

$sql = "CALL join_block_request($userId,$hoodId,'$blockName',$lat,$lng)";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE)
    {
    echo TRUE;
    }
  else
    {
    echo FALSE;
    }

$conn->close();
?>

