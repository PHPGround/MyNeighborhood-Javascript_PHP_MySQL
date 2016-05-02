<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$hoodId = $_SESSION['hoodId'];
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }

$sql = "SELECT * FROM HoodMap WHERE hoodId=$hoodId";
$result = $conn->query($sql);
if ($result->num_rows > 0)
		{
echo '[';

while ($row = $result->fetch_assoc())
    {
    echo '{"hoodId":' . $row["hoodId"] . ', "lat":' . $row["lat"] . ', "lng":' . $row["lng"] . '},';
    }

echo ']';
}
$conn->close();
?>
