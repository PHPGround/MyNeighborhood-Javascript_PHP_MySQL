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

//call procedure
$sql2 = "CALL get_hood_members($userId ,$hoodId)";
$result = $conn->query($sql2);
if ($result->num_rows > 0)
        {
while ($row = $result->fetch_assoc())
    {
    echo '<span class="media private-message">
                  <div class="media-left" style="padding:5px 0 5px 10px"><img name="' . $row["userName"] . '" class="media-object" width= "48px" src="image/user' . ($row["userId"] % 4) . '.png"></div>
                  <div class="media-body" style="padding:5px 0 5px 0"><div class=""><strong><span name="' . $row["userName"] . '" style="color:#3b5998;  margin-left: 5px;">' . $row["userName"] . ' </span></strong></div>';
    if ($row["isFriend"]) //check for friends. If yes, disable add friend option.
        {
        echo '<span style="margin:0 5px 0 5px" class="text-success"><small>Friends</small></span>';
        }
      else
        {
        echo '<button name=' . $row["userId"] . ' style="margin:0 5px 0 5px; font-size: 10px;" type="button" class="btn btn-success btn-xs add-friend">Add Friend</button>';
        }

    if ($row["isNeighbor"]) //check for neighbors. If yes, disable add neighbor option.
        {
        echo '<span style="margin:0 5px 0 5px" class="text-info"><small>Neighbors</small></span>';
        }
      else
        {
        echo '<button name=' . $row["userId"] . ' style="margin:0 5px 0 5px; font-size: 10px;" type="button" class="btn btn-info btn-xs add-neighbor">Add Neighbor</button>';
        }

    echo '</div></span>';
    }
}

$conn->close();
?>