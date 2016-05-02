<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

$userId = $_SESSION["userId"];
$blockId = $_SESSION["blockId"];

if ($conn->connect_error)
        { // Check connection
        die("Connection failed: " . $conn->connect_error);
        }

$sql = "CALL block_requests($userId,$blockId)";
$result = $conn->query($sql);

        echo '<div class="panel panel-warning">';
        echo '<div class="panel-heading"><h3 class="panel-title">PENDING REQUESTS</h3></div>';
        echo '<ul class="list-group">';
                    
if ($result->num_rows > 0)
        {

        // output data of each row

        while ($row = $result->fetch_assoc())
                {
                        echo '<li class="list-group-item">';
                        echo '<div class="media lstmsg">';
                        echo '<div class="media-left"><img class="media-object" width= "32px" src="image/user' . ($row["userId"] % 4) . '.png"></div>';
                        echo '<div class="media-body">';
                        echo '<div class=""><strong><span style="color:#3b5998">' . $row["userName"] . '</span></strong> wants to join your block</div>';
                        echo '<button name=' . $row["userId"] . ' style="margin:0 5px 0 5px; font-size: 10px;" type="button" class="btn btn-success btn-xs accept-block-request">Accept</button>';
                        echo '</div></div></li>';
                        
        
 
                }
        }
  else
        {
        echo "<div class='panel-heading'><h5>There are no Block Requests.</h5></div>";
        }

$conn->close();


$con = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($con->connect_error)
        { // Check connection
        die("Connection failed: " . $con->connect_error);
        }

$sql2 = "CALL friend_requests($userId)";
$results = $con->query($sql2);

if ($results->num_rows > 0)
        {

        while ($row1 = $results->fetch_assoc())
                {
                        echo '<li class="list-group-item">';
                        echo '<div class="media lstmsg">';
                        echo '<div class="media-left"><img class="media-object" width= "32px" src="image/user' . ($row1["userId"] % 4) . '.png"></div>';
                        echo '<div class="media-body">';
                        echo '<div class=""><strong><span style="color:#3b5998">' . $row1["userName"] . '</span></strong> wants to be friends with you</div>';
                        echo '<button name=' . $row1["userId"] . ' style="margin:0 5px 0 5px; font-size: 10px;" type="button" class="btn btn-success btn-xs add-friend">Add Friend</button>';
                        echo '</div></div></li>';
                        
        
 
                }
        }
  else
        {
        echo "<div class='panel-heading'><h5>There are no Friend Requests.</h5></div>";

        }
        echo '</ul></div>';


$con->close();
?>