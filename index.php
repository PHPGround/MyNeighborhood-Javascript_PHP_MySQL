<?php
session_start(); 
$_currentSessionId = session_id();
error_reporting(E_ALL);
$error = "";
    $valid = "";
    $conn = "";
    $eml = "";
    $err = ""; 
   


if(isset($_POST['login-submit']))
   {
       // get values from the post
       $email = $_POST["email"];
        
     if($_SERVER["REQUEST_METHOD"] == "POST"){
         $conn = getconnect(); // connect to database 
         //checks if user exists
         $valid = checklogin($conn,$email);
         if($valid == false){ $err = "Invalid email id";

         // echo '<script type="text/javascript">toastr.error("No such registered email id found.")</script>';
        }else{
         

        }   
         
   }
  }

    if(isset($_POST['register-submit']))
   {
 // get values from the post
       $name = $_POST["uname"];
       $mail = $_POST["emailadd"];  
         if($_SERVER["REQUEST_METHOD"] == "POST"){
            //$conn = getconnect(); // connect to database 
            $_SESSION['unam'] = $name;
            $_SESSION['email'] = $mail;
            header("location: userdetail.php");
    
            
          }
    }

  if ($valid)
   {
    $_SESSION['email'] = $email;
    header("location: home.php");
    exit();
   }
 
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>index</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--<link href="http://localhost/Project/bootstrap-3.3.6/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

        <link href="css/style.css" rel="stylesheet">

        <link href="css/toaster.css" rel="stylesheet">

        <!--<script src="http://localhost/Project/bootstrap-3.3.6/docs/assets/js/ie-emulation-modes-warning.js"></script>-->

    </head>

    <body style="background-image:url('image/login.png')">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="">
                        <img src="image/logo.png" style="height:36px; background-repeat:no-repeat; margin-top:10px">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" class="index.php" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your Email Address" class="form-control" style="width:200px">
                        </div>
                        <button class="btn btn-primary" name="login-submit" type="submit">Login</button>
                        <br>
                        <?php echo $err;  ?>
                    </form>


                </div>
            </div>
        </nav>


        <?php

    function getconnect(){
       // connect to database
          $servername = "localhost";
          $username = "root";
          $password = "root";
          $dbname = "MyHood";$dbname = "MyHood";

       $conn = new mysqli($servername,$username, $password, $dbname);
      //check connection
       if ($conn->connect_error){ 
           echo "conct err";
           die("Connection failed: " . $conn->connect_error);
       }else {return $conn;}
    }

    function checklogin($conn,$email)
    {
       // check if login is valid
       $query = "SELECT email FROM User where email = ?";
       
       if($stmt = $conn->prepare($query))
       {
        $stmt->bind_param("s",$email);
        $em = $email;

        $stmt->execute();
        $stmt->bind_result($em);
        $stmt->store_result();
        
         if(($stmt->num_rows())>0){$eml = $em; return $val = true;}
         else{
          
          return $val = false;
        }        
         
        
        $conn->close();
        $stmt->close();
       }
    }



    ?>

            <div class="container">
                <div class="row">
                    <div  class="col-md-6">





<div   id="carousel-example-generic " class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div style="height:400px; opacity:0.7; color:#fff; text-shadow: 0px 1px 0px rgb(0, 0, 0)" class="carousel-inner" role="listbox">
    <div class="item active">
      <h1>MyHood is the private social network for your neighborhood <small style="color:#fff" >Neighbors create private groups for their neighborhoods where they can ask questions, 
        get to know one another, and exchange local advice and recommendations.</small> </h1>
    </div>
    <div class="item">
      <h1>The easiest way to keep up with
everything in your neighborhood.</h1>
    </div>
        <div class="item">
      <h1>Over 84,000 neighborhoods
across the U.S. rely on MyHood.</h1>
    </div>

  </div>

  <!-- Controls -->
<!--   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>




                    </div>
                    <div class="col-md-6 well" style="opacity:0.7">
                        <h3>Don't have an account yet? Register here</h3>
                        <form action="index.php" method="POST">
                            <label for="inputUsername">Username</label>
                            <input type="text" id="inputUsername" name="uname" class="form-control" placeholder="Enter your Username" required autofocus>
                            <br>
                            <label for="inputEmail">Email Address</label>
                            <input type="email" id="inputEmail" name="emailadd" class="form-control" placeholder="Enter your email" required>
                            <br>
                            <button class="btn btn-success" type="submit" name="register-submit">Sign Up</button>


                    </div>
                </div>
            </div>
            <!-- Bootstrap core JavaScript
    ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
            <script src="js/toaster.js">
            </script>


    </body>

    </html>