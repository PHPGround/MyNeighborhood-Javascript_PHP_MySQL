<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$user_email = $_SESSION['email'];

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
        { // Check connection
        die("Connection failed: " . $conn->connect_error);
        }

$sql = "SELECT * FROM User where email='$user_email'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0)
    {
       while ($row = $result->fetch_assoc()){

            echo '{"username": "'.$row['userName'].'", "useremail": "'.$row['email'].'", "family": "'.$row['family'].'", "about":"'.$row['about'].'"}';
        }


    }else{
        //
    }

?> 

