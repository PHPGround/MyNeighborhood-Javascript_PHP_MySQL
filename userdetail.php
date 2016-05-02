<?php
session_start();
$un=$_SESSION['unam'];
$em=$_SESSION['email'];
if(isset($_POST['Save']))
   {
 // get values from the post
    $target = "your directory"; 
    $target = $target . basename( $_FILES['photo']['name']); 
       $abo = $_POST["about"];
       $fm = $_POST["family"];  
       $pic=($_FILES['photo']['name']);
       //$ph = $_POST["photo"];
         if($_SERVER["REQUEST_METHOD"] == "POST"){
            //$conn = getconnect(); // connect to database 
            $_SESSION['abou'] = $abo;
            $_SESSION['famil'] = $fm;
            $_SESSION['phot'] = $pic;
            header("location: selecthood.php");

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "MyHood";
$userId = $_SESSION['userId'];
$prefValue = $_POST["prefValue"];
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error)
    { // Check connection
    die("Connection failed: " . $conn->connect_error);
    } 

              $sql = "INSERT INTO User (userName,email, family, about) values('$un','$em','$fm','$abo')";
          $result = $conn->query($sql);

if ($conn->query($sql) === TRUE)
    {
    echo '{"status":true}';
    }
  else
    {
    echo '{"status":false}';
    }

$conn->close();


            
          }
    }

if(isset($_POST['Skip']))
   {
 // get values from the post
       $abo = $_POST["about"];
       $fm = $_POST["family"];
       $ph = $_POST["photo"];  
         if($_SERVER["REQUEST_METHOD"] == "POST"){
            //$conn = getconnect(); // connect to database 
            $_SESSION['abou'] = "";
            $_SESSION['famil'] = "";
            $_SESSION['phot'] = "";
            header("location: selecthood.php");
    
            
          }
    }


?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="C:/Users/Afroze Ali/Downloads/bootstrap-3.3.6/bootstrap-3.3.6/docs/favicon.ico">-->

    <title>Enter your Details</title>

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="http://localhost/Project/bootstrap-3.3.6/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="http://localhost/Project/bootstrap-3.3.6/docs/assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!--<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">The Hood</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
        </div>
      </div>
    </nav>-->

    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row"><br><br><br>

        <div class="col-md-6">

        
          <form action="userdetail.php" method="POST">
        <label for="inputAbout">About</label>
        <input type="text" id="inputAbout" name="about" class="form-control" placeholder="Enter about yourself"><br>
        <label for="inputFamily">Family</label>
        <input type="text" id="inputFamily" name="family" class="form-control" placeholder="Enter about your Family"><br>
        <!--<div style="max-width: 650px; margin: auto;">-->
        <input type="hidden" name="size" value="350000"> 
        <input type="file" name="photo">
        <!--<label for="inputPhoto">Upload your Profile Picture</label>-->
        

          <!--<div id="inputPhoto" style="display: none">
            <br>
            <img id="preview-img" src="noimage">
            </div>
            <div class="form-group">-->
            <!--<input type="file" name="photo" class="form-control" id="inputPhoto">-->
            <!--</div><br>-->
          <!--<button class="btn btn-lg btn-primary" id="upload-button" type="submit">Upload image</button>-->

      <button class="btn btn-primary" type="submit" name="Save">Save and Continue</button>
      <button class="btn btn-success" type="submit" name="Skip">Skip</button>
      

    </div> <!-- /container -->
<?php 
      function getconnect(){
       // connect to database
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "MyHood";

       $conn = new mysqli($servername,$username, $password, $dbname);
      //check connection
       if ($conn->connect_error){ 
           echo "conct err";
           die("Connection failed: " . $conn->connect_error);
       }else {return $conn;}
       $sql="INSERT INTO User values(?,?,?,?,?)";
       
    }

?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


  </body>
</html>
