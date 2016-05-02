<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyHood";
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
		{ // Check connection
		die("Connection failed: " . $conn->connect_error);
		}

// $result = mysqli_query($conn, "CALL reply_message($topicId,$userId,'$message')") or die("Query fail: " . mysqli_error());

$sql = "select distinct(b.blockId) as bid,b.blockName as bname, hoodName from Block b,BlockMember bm, Hood h
where b.blockId=bm.blockId and b.hoodId = h.hoodId
order by bm.timestamp desc
limit 10";

$result = $conn->query($sql);

if ($result->num_rows > 0)
		{
		
		while ($row = $result->fetch_assoc())
				{
				//echo '<h6>' . $row["blockName"] . '</h6>';
				echo '<h6 class="rjb" name="'.$row["bname"].'">' . $row["bname"] . ' <small> '.$row["hoodName"].'</small></h6>';
				}

	
		}
  else
		{
		echo '';
		}

$conn->close();
?>