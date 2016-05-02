<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$hoodId = $_SESSION["hoodId"];

//$hoodId = $_POST["hoodId"];
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
		{ // Check connection
		die("Connection failed: " . $conn->connect_error);
		}

// $result = mysqli_query($conn, "CALL reply_message($topicId,$userId,'$message')") or die("Query fail: " . mysqli_error());

$sql = "SELECT * FROM Block where hoodId=$hoodId";
$result = $conn->query($sql);
echo '[';

while ($row = $result->fetch_assoc())
		{
		echo '{"lat":' . $row["lat"] . ',"blockName":"' . $row["blockName"] . '", "lng":' . $row["lng"] . '},';

		// echo  '{"lat":'.$row["lat"].', "lng":'.$row["lng"].'},';

		}

echo ']';
$conn->close();
?>