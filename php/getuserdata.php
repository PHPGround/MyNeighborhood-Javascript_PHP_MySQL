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

$sql = "CALL get_user_data('$user_email')"; 
$result = $conn->query($sql);
if ($result->num_rows > 0)
    {
       while ($row = $result->fetch_assoc()){
        
        	$_SESSION['userId'] = $row['userId'];
        	$_SESSION['blockId'] = $row['blockId'];
        	$_SESSION['hoodId'] = $row['hoodId'];

        	
        }
echo  ''.$_SESSION['userId'].'   '.$_SESSION['blockId'] .'   '.$_SESSION['hoodId'].'';

    }else{
    	echo  ''.$user_email.'';
    }

?> 

