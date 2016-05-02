<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$userId=$_SESSION['userId'];
$blockId=$_SESSION['blockId'];
$hoodId=$_SESSION['hoodId'];
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
        { // Check connection
        die("Connection failed: " . $conn->connect_error);
        }

//$sql = "SELECT * FROM Topic WHERE tagType='PERSONAL' ORDER BY created DESC";
//$result = $conn->query($sql);


        $sql0 = "SELECT count FROM BlockMember  where userId = $userId";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0)
    {

while ($row = $result0->fetch_assoc())
        {

            if($row["count"]>0){
                //
            }
            else{
//$sql = "CALL get_feed($userId,$hoodId,$blockId,'PERSONAL')";
$sql = "SELECT * FROM Topic WHERE tagType='PERSONAL' ORDER BY created DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0)
        {

        // output data of each row

        while ($row = $result->fetch_assoc())
                {
                echo '<div class="panel panel-primary">';
                echo '<div class="panel-heading"><h3 class="panel-title">' . $row["subject"] . '';
                if(!($row["location"]=="" OR $row["location"]==0)){echo '<span name="'.$row["location"].'" class="zoom-map pull-right" data-toggle="modal" data-target="#topicMapZoom"></span></span>';}
                echo '</h3></div>';
                echo '<ul class="list-group">';
                $sql2 = "SELECT messageId, authorUserId, created, message, userName FROM Message, User
                WHERE userId=authorUserId
                AND topicId = " . $row["topicId"];
                $result2 = $conn->query($sql2);
                while ($row2 = $result2->fetch_assoc())
                        {
                        echo '<li class="list-group-item">';
                        echo '<div class="media lstmsg">';
                        echo '<div class="media-left"><img class="media-object" width= "32px" src="image/user' . ($row2["authorUserId"] % 4) . '.png"></div>';
                        echo '<div class="media-body">';
                        echo '<div class=""><strong><span style="color:#3b5998">' . $row2["userName"] . ' </span></strong>' . $row2["message"] . '</div>';
                        echo '<div class=" timestamp msg' . $row2["messageId"] . '"><script type="text/javascript">$(".msg' . $row2["messageId"] . '").html(moment("' . $row2["created"] . '").fromNow());</script></div>';
                        echo '</div></div></li>';
                        }

                echo '<li class="list-group-item">';
                echo '<div class="input-group">';
                echo '<input type="text" class="form-control" placeholder="Write a reply...">';
                echo '<span class="input-group-btn"><button name="' . $row["topicId"] . '" class="btn btn-default btn-reply" type="button">Reply</button></span>';
                echo '</div>';
                echo '</li></ul>';
                echo '</div>';
                }
        }
  else
        {
        echo "<div class='panel-heading'><h3>There are no messages.</h3></div>";
        }
}}}
$conn->close();
?>