<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$name = $_SESSION['unam'];
$hoodId = $_POST["hoodId"];
$_SESSION['hoodId']=$hoodId;
$blockName = $_POST["blockName"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

$userId;
if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }

$sql0 = "SELECT userId from User where userName = '$name'";
$result0 = $conn->query($sql0);

if ($result0->num_rows > 0)
    {

    // output data of each row

    while ($row = $result0->fetch_assoc())
        {
            $userId= $row["userId"];
        }
        $sql = "CALL join_block_request($userId,$hoodId,'$blockName',$lat,$lng)";
$result = $conn->query($sql);

    }




$conn->close();
?>

