<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$hoodId = $_SESSION['hoodId'];
$userId = $_SESSION['userId'];
$message = htmlentities($_POST["message"], ENT_QUOTES);
$subject = htmlentities($_POST["subject"], ENT_QUOTES);
$tagType = $_POST["tagType"];
$recipient = $_POST["recipient"];
$location = $_POST["location"];
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
		{ // Check connection
		die("Connection failed: " . $conn->connect_error);
		}

// $result = mysqli_query($conn, "CALL reply_message($topicId,$userId,'$message')") or die("Query fail: " . mysqli_error());

$sql = "CALL create_topic('$subject','$message', $userId, '$location','$tagType', '$recipient', $hoodId)";

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