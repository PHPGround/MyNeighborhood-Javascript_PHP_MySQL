<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$searchkey = $_POST["searchkey"];
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    }

$sql = "SELECT * FROM Topic t, Message m
WHERE t.topicId = m.topicId AND
(t.subject like '%$searchkey%' OR m.message like '%$searchkey%')
group by t.topicId";
$result = $conn->query($sql);

if ($result->num_rows > 0)
    {

    // output data of each row

    while ($row = $result->fetch_assoc())
        {
        if ($row["tagType"] == 'HOOD')
            {
            echo '<div class="panel panel-danger">';
            }
          else
        if ($row["tagType"] == 'BLOCK')
            {
            echo '<div class="panel panel-warning">';
            }
          else
        if ($row["tagType"] == 'FRIENDS')
            {
            echo '<div class="panel panel-success">';
            }
          else
        if ($row["tagType"] == 'NEIGHBORS')
            {
            echo '<div class="panel panel-info">';
            }
          else
        if ($row["tagType"] == 'PERSONAL')
            {
            echo '<div class="panel panel-primary">';
            }
          else
            {
            echo '<div class="panel panel-primary">';
            }

        echo '<div class="panel-heading"><h3 class="panel-title">' . $row["subject"] . '</h3></div>';
        echo '<ul class="list-group">';
        $sql2 = "SELECT messageId, authorUserId, created, message, userName FROM Message, User
                WHERE userId=authorUserId
                AND topicId = " . $row["topicId"] . "
                ORDER BY created ASC";
        $result2 = $conn->query($sql2);
        while ($row2 = $result2->fetch_assoc())
            {
            echo '<li class="list-group-item">';
            echo '<div class="media lstmsg">';
            echo '<div class="media-left"><img class="media-object" width= "32px" src="image/user' . ($row2["authorUserId"] % 4) . '.png"></div>';
            echo '<div class="media-body">';
            echo '<div class=""><strong><span style="color:#3b5998">' . $row2["userName"] . ' </span></strong>' . ($row2["message"]) . '</div>';
            echo '<div class="timestamp"><script type="text/javascript">$(this).html(moment("' . $row2["created"] . '").fromNow());</script></div>';
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
    echo "<div class='panel-heading'><h3>No results found for this search.</h3></div>";
    }

$conn->close();
?>