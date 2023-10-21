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
    <link rel="stylesheet" href="css/register.css">


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
    <header class="masthead" style="background-image: url('img/22.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row" style="margin-top:80px;">
          <!-- <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Find Job</h1>
              <span class="subheading">Debremarkos NO 1 Job Site!</span>
            </div>
          </div> -->
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">

            

      <?php
      $currentdate=date('Y-m-d');
        if($con)
        {

            $sql="SELECT * from postvacany ORDER by `posted_date` DESC";
            $jobexist=mysqli_query($con,$sql);
            $c=mysqli_num_rows($jobexist);
            if($c >= '1')
            {
             while($row = mysqli_fetch_assoc($jobexist)){
                $dead=$row['dead_line'];
               if ($dead<=$currentdate){ 
                    
         ?>

              <h2 class="post-title">
              <span><p class="pull-right" style="margin-top:-5px;">Posted Date:&nbsp;<?php echo $row['posted_date']; ?>E.C</p></span>
              <p>Vacancy Id:<?php echo $row['vid']; ?></br></p>

              <?php echo $row['jobtitle']; ?>
              </h2>
              <h3><?php echo $row['organaization_name']; ?></h3>
              <p><span class="btn-danger">Deadline</span>&nbsp;<?php echo $row['dead_line']; ?></p>
              <p>
                <?php echo $row['workdescription']; ?><br><br>
                <b>Quantity:&nbsp;<?php echo $row['requestedno']; ?></b><br>
                <b>Hiring Process:&nbsp;<?php echo $row['workprocess']; ?></b><br>
              </p>
            
              <p><b>Registration:Starting In:</b>&nbsp;<?php echo $row['registration_date']; ?>&nbsp;&nbsp;<b>Up To:</b>&nbsp;<?php echo $row['dead_line']; ?></p>
              <p><b>Test Date:</b>&nbsp;<?php echo $row['test_will_beon']; ?></p>
              <p class="post-meta">Posted by
              <a href="#"><?php echo $row['postedby']; ?></a>
              
            <div class="input-group ">
            <a href="register.php? jtitle=<?php echo $row['jobtitle'];?>" role="button">
              <input type="submit" name="submit" class="btn btn-xs btn-primary" value="Apply Now!"/></a>
            </div>
              <hr></p>

              <?php
            }
          }
        }
      }
      ?>


          </div>
          
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="footer">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/homepage.min.js"></script>

  </body>

</html>
