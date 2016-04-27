<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$userId = $_SESSION['userId'];
$hoodId = $_SESSION['hoodId'];
// $hoodId = $_POST["hoodId"];


$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
		{ // Check connection
		die("Connection failed: " . $conn->connect_error);
		}

// $result = mysqli_query($conn, "CALL reply_message($topicId,$userId,'$message')") or die("Query fail: " . mysqli_error());

$sql = "CALL get_hood_members($userId, $hoodId)";
$result = $conn->query($sql);

if ($result->num_rows > 0)
		{

		// output data of each row

		while ($row = $result->fetch_assoc())
				{
				// echo '<option value=' . $row["userId"] . ' data-content="<img width= &quot;16px&quot; src=&quot;image/user' . ($row["userId"] % 4) . '.png&quot;> ' . $row["userName"] . '</option>';
				echo '<option value="' . $row["userId"] .'"  >'.$row["userName"] .'</option>';
				}
		}
  else
		{
		echo '';
		}

$conn->close();
?>