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

$sql = "SELECT * FROM UserPreference WHERE userId=$userId and prefName='NOTIFICATION'";
$result = $conn->query($sql);

if ($result->num_rows > 0)
    {           

while ($row = $result->fetch_assoc())
    {
                echo '{"userId": '.$row["userId"].', "prefName": "'.$row["prefName"].'", "prefValue": '.$row["prefValue"].'}';
    }
}else{
    echo '{"userId": $myUserId, "prefName": "NOTIFICATION", "prefValue": 0}';
}


$conn->close();
?>