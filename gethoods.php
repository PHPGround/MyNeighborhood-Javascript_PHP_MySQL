<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
		{ // Check connection
		die("Connection failed: " . $conn->connect_error);
		}

// $result = mysqli_query($conn, "CALL reply_message($topicId,$userId,'$message')") or die("Query fail: " . mysqli_error());

$sql = "SELECT * FROM Hood";
$result = $conn->query($sql);

if ($result->num_rows > 0)
		{
		echo '[';
		while ($row = $result->fetch_assoc())
				{
				echo '{"hoodId":' . $row["hoodId"] . ',"hoodName":"' . $row["hoodName"] . '"},';
				}

		echo ']';
		}
  else
		{
		echo '';
		}

$conn->close();
?>