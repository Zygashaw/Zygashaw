<?php
include("includes/dbcon.php");

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this home page -->
    <link href="css/homepage.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mystyle.css">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">JOB TRACKING</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="appviewresult.php">View Result</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/  .jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Find Job</h1>
              <span class="subheading">Debremarkos NO 1 Job Site!</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">

          <!--Services-->

            <div id="services" class="services" style="margin-top:-100px;">

            <h2>Services</h2>
            <p>Online Registration and reservation of vacancy for the person who want jobs.</p>
            <div class="row">
            <div class="col-lg-3 col-md-3">
            <i class="fa fa-desktop" aria-hidden="true"></i>
            <h4>POST JOBS</h4>
            <p>We offer you different Jobs From Differnt Organizations to meet your job Job Finding needs.
            your chances of finding and recruiting a suitable Organizations And Jobs is higher with Debremarkos Civil Servies  Job Tracking Site.</p>
            </div>
            <div class="col-lg-3 col-md-3">
            <i class="fa fa-user" aria-hidden="true"></i>
            <h4>SEND DOCUMENTS</h4>
            <p>Online Registration and reservation of vacancy for the person who want jobs.</p>
            <a href="post.php"><button class="btn btn-success">Find Job</button></a>
            </div>
            <div class="col-lg-3 col-md-3">
            <i class="fa fa-database" aria-hidden="true"></i>

            <h4>EMPLOYER BRANDING</h4>
            <p>Candidates just want to find a job. 
            We Are Looking top candidates for work that matches their values and organizations 
            with a great culture.Just Visit Our Site Because Our Site is the right choice To Get You A Job.</p>
            </div>
            <div class="col-lg-3 col-md-3">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>

            <h4>EMAIL ALERT</h4>
            <p>Set Up Job Alerts, Get Right Jobs<br>
            Create Alert For Your Job Searches
            </p>
            <a href="post.php"><button class="btn btn-success">Find Job</button></a>
            </div>
            </div>
            </div>
            </div>

            <!--end of Services-->

          </div>                  


            
            <!--FOOTER-->
        <div id="footer" class="footer">
          <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-4">
              <h4>Contact Us</h4>
              <p><i class="fa fa-home" aria-hidden="true"></i> Debremarkos,Ethiopia</p>
              <p><i class="fa fa-envelope" aria-hidden="true"></i> DMCivilServies@gmail.com</p>
              <p><i class="fa fa-phone" aria-hidden="true"></i> +251912345656</p>
              <p><i class="fa fa-globe" aria-hidden="true"></i> Www.Dm Job Tracking.com</p>
              </div>

              <div class="col-lg-4 col-md-4">
                      <h4>About</h4>
              <p><i class="fa fa-home" aria-hidden="true"></i> About Us</p>
              <p><i class="fa fa-envelope" aria-hidden="true"></i> Privacy</p>
              <p><i class="fa fa-phone" aria-hidden="true"></i>  Term & Condition</p>
               </div>

              <div class="col-lg-4 col-md-4">
              <h4>Stay In Touch</h4>
              <i class="social fa fa-facebook" aria-hidden="true"></i>
              <i class="social fa fa-twitter" aria-hidden="true"></i>
              <i class="social fa fa-linkedin" aria-hidden="true"></i>
              <i class="social fa fa-pinterest" aria-hidden="true"></i>
              <i class="social fa fa-youtube" aria-hidden="true"></i>
              <i class="social fa fa-github" aria-hidden="true"></i><br>
              <input type="email" placeholder="Subscribe Now!">
              <button class="btn btn-success">Subscribe</button>
              </div>
              </div>
              </div>
              </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/homepage.min.js"></script>

  </body>

</html>
