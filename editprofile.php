<?php
session_start();
$userId=$_SESSION['userId'];
?>
<!DOCTYPE html>
  <html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        myHood
    </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/toaster.css" rel="stylesheet">
    <link href="css/jquery.scrollbar.css" rel="stylesheet">
    <script src="js/moment.js"></script>
</head>
  <body>
    <?php
//    function getconnect(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "MyHood";
    $conn = new mysqli($servername, $username, $password, $dbname); // Create connection

    if ($conn->connect_error)
        { // Check connection
        die("Connection failed: " . $conn->connect_error);
        }
//    }

    ?>
     <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="home.php">
                    <img src="image/logo.png" style="height:36px; background-repeat:no-repeat; margin-top:10px">
                </a>
            </div>
        </div>
    </nav>
   
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <!-- Example row of columns -->
      <div class="row"><br><br><br>
        Do you want to change your hood/block? If yes, Click
       <a href="changehood.php">here</a><br><br>
        
        <div class="col-md-4">
        <form method="POST"> 
        <?php
//        $conn = getconnect();
        /*$sql = "CALL user_profile($userId)";
        $result = $conn->query($sql);
        while($row=$result->fetch_assoc())
        {
          echo '<label for="inputUsername">Username</label>
            <input type="text" id="inputUsername" name="userName" class="form-control" value="'.$row['userName'].'" required autofocus><br>
            <label for="inputEmail">Email Address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" value="'.$row['email'].'" required><br>
            <label for="inputAbout">About</label>
            <input type="text" id="inputAbout" name="about" class="form-control" value="'.$row['about'].'"><br>
            <label for="inputFamily">Family</label>
            <input type="text" id="inputFamily" name="family" class="form-control" value="'.$row['family'].'"><br>
            <div style="max-width: 650px; margin: auto;">';
        $uname=$row['userName'];
        $email=$row['email'];
        $about=$row['about'];
        $family=$row['family'];
        
        }*/
        
        ?><label for="inputUsername">Username</label>
            <input type="text" id="inputUsername" name="userName" class="form-control"  required autofocus><br>
            <label for="inputEmail">Email Address</label>
            <input type="email" id="inputEmail" name="email" class="form-control"  required><br>
            <label for="inputAbout">About</label>
            <input type="text" id="inputAbout" name="about" class="form-control" ><br>
            <label for="inputFamily">Family</label>
            <input type="text" id="inputFamily" name="family" class="form-control" ><br>
            <div style="max-width: 650px; margin: auto;">
    
            <label for="inputPhoto">Upload your Profile Picture</label>
        

            <div id="inputPhoto" style="display: none">
            <br>
            <img id="preview-img" src="noimage">
            </div>
            <div class="form-group">
            <input type="file" name="file" id="file">
            </div><br>
          <!--<button class="btn btn-lg btn-primary" id="upload-button" type="submit">Upload image</button>-->

      <button class="btn btn-primary" type="submit" name="profile-submit">Submit</button>
        
      <button class="btn btn-success" type="reset">Clear</button>
      
    </div><?php    
        if(isset($_POST['profile-submit']))
        {
       // get values from the post
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         //$conn = getconnect(); // connect to database 
        $uname=$_POST['userName'];
        $email=$_POST['email'];
        $about=$_POST['about'];
        $family=$_POST['family'];
        $con = new mysqli($servername, $username, $password, $dbname); // Create connection

        if ($con->connect_error)
        { // Check connection
        die("Connection failed: " . $con->connect_error);
        }
        $sql2 = "CALL edit_user_profile($userId,'$uname','$email','$about','$family','')";
        //$sql2->execute();
        $result1 = $con->query($sql2);
        if($result1 === TRUE){echo "Data saved successfully";}
        //header("location: editprofile.php");
         // echo '<script type="text/javascript">toastr.error("No such registered email id found.")</script>';
        }else{
         

        }   
         
   }
?>






    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
$(document).ready(function() {

    $.post('php/fetchuserdetails.php',function(d){
        var obj = JSON.parse(d);
        $('#inputUsername').val(obj.username);
        $('#inputEmail').val(obj.useremail);
        $('#inputAbout').val(obj.about);
        $('#inputFamily').val(obj.family);
    })
})
    </script>

  </body>
</html>
