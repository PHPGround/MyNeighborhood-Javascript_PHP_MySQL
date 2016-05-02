<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";

$toUserId = $_POST["toUserId"];
$message = $_POST["message"];
// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");
$headers = 'From: MyHood@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();



$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }


//check if user has notificqtions enabled
$sql = 'Select u.email, u.userName from UserPreference p,User u where p.userId=u.userId and p.userId='.$toUserId.' and prefName="NOTIFICATION" and prefValue=1';
$result = $conn->query($sql);
if ($result->num_rows > 0)
    {           
//if yes, send email alerts
while ($row = $result->fetch_assoc())
    {
        mail($row["email"], 'New Notification', $message, $headers);
        echo 'Notification sent to :'.$row["email"].'';
    }
}else{
	echo 'User has not enabled Notification';
}


$conn->close();
?>