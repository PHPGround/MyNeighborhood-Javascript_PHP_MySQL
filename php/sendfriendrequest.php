<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$userId = $_SESSION['userId'];
$friendUserId = $_POST["friendUserId"];
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }

$sql = "CALL send_friend_request($userId,$friendUserId)";
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