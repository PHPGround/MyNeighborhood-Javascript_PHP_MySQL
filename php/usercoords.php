<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$userId = $_SESSION['userId'];
$hoodId = $_SESSION['hoodId'];
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
		{ // Check connection
		die("Connection failed: " . $conn->connect_error);
		}

$sql = "CALL get_hood_members($userId,$hoodId)";
$result = $conn->query($sql);

if ($result->num_rows > 0)
        {
        	echo '[';
while ($row = $result->fetch_assoc())
		{
		echo '{"userId":' . $row["userId"] . ', "userName":"' . $row["userName"] . '", "lat":' . $row["lat"] . ', "lng":' . $row["lng"] . '},';
		}

echo ']';
}
else{
	echo '[]';
}
$conn->close();
?>
