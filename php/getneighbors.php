<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$userId = $_SESSION['userId'];

$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }

$sql2 = "CALL get_neighbors($userId)";
$result = $conn->query($sql2);

while ($row = $result->fetch_assoc())
    {
    echo '<span name="' . $row["userName"] . '" class="media private-message">
                  <div class="media-left" style="padding:5px 0 5px 10px"><img name="' . $row["userName"] . '" class="media-object" width= "48px" src="image/user' . ($row["userId"] % 4) . '.png"></div>
                  <div class="media-body media-middle" style="padding:5px 0 5px 0"><div class=""><strong><span name="' . $row["userName"] . '" style="color:#3b5998">' . $row["userName"] . ' </span></strong></div>
                  </div></span>';
    }

$conn->close();
?>
