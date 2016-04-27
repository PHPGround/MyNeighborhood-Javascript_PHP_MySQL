<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$topicId = $_POST["topicId"];
$userId = $_SESSION["userId"];
$message = htmlentities($_POST["message"], ENT_QUOTES);
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
		{ // Check connection
		die("Connection failed: " . $conn->connect_error);
		}

// $result = mysqli_query($conn, "CALL reply_message($topicId,$userId,'$message')") or die("Query fail: " . mysqli_error());

$sql = "CALL reply_message($topicId,$userId,'$message')";

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
