<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$blockid = $_SESSION['blockId'];
$myUserId = $_SESSION['userId'];
$friendUserId = $_POST["friendUserId"];
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }
$sql = "CALL approve_join_request($blockid,$myUserId,$friendUserId)";
$result = $conn->query($sql);
if ($result === TRUE)
    {
    echo TRUE;
    }
  else
    {
    echo FALSE;
    }
$conn->close();
?>
