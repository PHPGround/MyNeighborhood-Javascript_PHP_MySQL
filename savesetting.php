<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$userId = $_SESSION['userId'];
$prefValue = $_POST["prefValue"];
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }

$sql = "UPDATE UserPreference set prefValue = $prefValue WHERE userId=$userId and prefName='NOTIFICATION'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE)
    {
    echo '{"status":true}';
    }
  else
    {
    echo '{"status":false}';
    }

$conn->close();
?>